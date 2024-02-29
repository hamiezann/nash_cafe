<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $products = Product::all();
        $products_promoted = Product::where('promoted', true)->get();
        return view('user.home', ['products' => $products],['products_promoted' => $products_promoted]);
     
        // return view('user.home');
    }

    public function aboutUs()
    {
        return view('user.aboutUs');
    }

    // public function order()
    // {
    //     // Retrieve the user's pending orders created within the last 1 hour
    // $userOrders = Order::where('user_id', auth()->id())
    //         ->where('order_status', 'Pending')
    //         ->with('orderItems')
    //         // ->whereBetween('created_at', [now()->subHour(), now()])
    //         // ->latest()
    //         ->get();

    //             // Retrieve completed orders for the authenticated user
    // $completedOrders = Order::where('user_id', auth()->id())
    // ->where('order_status', 'Completed')
    // ->with('orderItems') // Eager load the orderItems relationship
    // ->latest()
    // ->get();
    //     // return view('user.order',compact('userOrders','completedOrders'));
    //     return view('user.order',compact('userOrders','completedOrders'));
    // }

    public function order()
{
    // Retrieve pending orders for the authenticated user
    $userOrders = Order::where('user_id', auth()->id())
        ->where('order_status', 'Pending')
        ->with('orderItems') // Eager load the orderItems relationship
        ->latest()
        ->get();

    // Retrieve completed orders for the authenticated user
    $completedOrders = Order::where('user_id', auth()->id())
        ->where('order_status', 'Completed')
        ->with('orderItems') // Eager load the orderItems relationship
        ->latest()
        ->get();

    // Pass both pending and completed orders to the view
    return view('user.order', compact('userOrders', 'completedOrders'));
}


    public function contact()
    {
        return view('user.contact');
    }

    public function review()
    {
        return view('user.review');
    }

    // public function cart()
    // {
    //     return view('product.cart');
    // }

    // public function productlist()
    // {
    //     return view('user.productlist');
    // }

    // public function show(){
        
    //     // $products = Product::all(); // Retrieve all products from the database
    
    //     // return view('product.show', ['products' => $products]);
    
    //         $products = Product::with('product_name', 'description', 'product_price', 'image', 'category_id')->get();
    //         return view('product.show', compact('product'));
        
    //     }
}
