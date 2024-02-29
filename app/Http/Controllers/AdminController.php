<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Staff;
use App\Models\Product;
use App\Models\User;
use PDF;
use Illuminate\Support\Str;
// use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //todo: admin login form
    public function login_form()
    {
        return view('login-form');
    }

    public function login_functionality(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }
    
         $staff = Staff::where('email', $request->email)->first();
    
        if ($staff && Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Update online_status to 1 (online)
            $staff->update([
                'online_status' => true,
                'last_login_at' => now(), // Set last_login_at explicitly
            ]);
    
            return redirect()->route('staff.dashboard');
        }
    
        // If neither admin nor staff authentication is successful
        Session::flash('error-message', 'Invalid Email or Password');
        return back();
    }

    public function admin_dashboard(){
        return view('admin.dashboard');
    }
    
    
    
    
    public function admin_index(Request $request)
    {
        // Retrieve payment records from the database
        $payments = Order::all();
        $staff_status = Staff::all();
        $products = Product::all()->each(function ($product) {
            $product->promoted = $product->promoted ?? false;
        });
    
        // Retrieve all order items with eager-loaded product relationship
        $item_list = Order_Item::with('product')->get();
    
        // Calculate total quantity for each unique product ID
        $totalQuantities = $item_list->groupBy('product_id')->map(function ($items) {
            return $items->sum('quantity');
        });
    
        // Calculate order amount for each unique product ID
        $orderAmounts = $item_list->groupBy('product_id')->map(function ($items) {
            return $items->sum('order_amount');
        });
    
        // Calculate total profit
        $totalProfit = $payments->sum('total_price');
    
        // Sort products by the highest quantity sold
        // $products = $products->sortByDesc(function ($product, $key) use ($totalQuantities) {
        //     return $totalQuantities[$product->id] ?? 0;
        // });

        $sortOrder = $request->get('sort', 'desc'); // Default to descending order

        if ($sortOrder === 'asc') {
            $products = $products->sortBy(function ($product, $key) use ($totalQuantities) {
                return $totalQuantities[$product->id] ?? 0;
            });
        } else {
            $products = $products->sortByDesc(function ($product, $key) use ($totalQuantities) {
                return $totalQuantities[$product->id] ?? 0;
            });
        }

        $availableDiscounts = [0, 5, 10, 15, 20];

 
        // Calculate the number of unique customers
        $topCustomers = $payments->pluck('customer_id')->unique()->count();

        // Calculate the total number of orders
        $totalOrders = $payments->count();

        $totalUsers = User::count();

        // Get total number of orders (you need to define your relationships and adjust this query)
        // $totalOrders = User::withCount('orders')->get()->sum('order_id');
        $totalOrders = Order::count();
        // Calculate percentage change
        $prevMonthOrders = 100; // Replace this with your actual value
        $percentageChange = ($totalOrders - $prevMonthOrders) / $prevMonthOrders * 100;

     
        // Pass the calculated data to the view
        return view('admin.index', compact('totalProfit', 'staff_status', 'totalQuantities', 'orderAmounts', 'item_list', 'products','availableDiscounts', 'topCustomers','totalUsers', 'totalOrders', 'percentageChange'));
    }
    
    
    //todo: admin logout functionality
    public function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login.form');
    }


    public function user_login(){
      return view('user.authentication.login');
    }

    public function user_register(){
        return view('user.authentication.register');
      }

    //all about pdf 
    public function print_pdf($orderId)
    {
        $order = Order::findOrFail($orderId); // Assuming you want to retrieve a specific order
        $order_item = Order_Item::where('order_id', $orderId)->get();
    
        $data = [
            'order' => $order,
            'product_bought'=> $order_item,
        ];
    
        $timestamp = now()->timestamp; // Get the current timestamp
        $filename = 'order_details_' . $orderId . '_' . $timestamp . '.pdf'; // Create a unique filename
    
        $pdf = PDF::loadView('admin.order.pdf_view', $data);
    
        return $pdf->download($filename);
    }
    
    
}

