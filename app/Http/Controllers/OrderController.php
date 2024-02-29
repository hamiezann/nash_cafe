<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Support\Facades\Auth;
use PDF;
class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        $staff = Auth::guard('staff')->user();
        
return view('staff.order', ['order' => $order], ['staff' => $staff]);
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function show_order_details($orderId){
        $order_item = Order_Item::where('order_id', $orderId)->get();
        $staff = Auth::guard('staff')->user();
        return view('staff.details', compact('order_item', 'staff'));
    }
    public function showOrders()
{
    $order = Order::all();
    $totalPriceSum = Order::sum('total_price');

    return view('staff.orders', compact('order', 'totalPriceSum'));
}


    public function show_status_update_form($orderId){
        $order = Order::findOrFail($orderId);
        $staff = Auth::guard('staff')->user();
        return view('staff.status_update', compact('order','staff'));
    }
    
    public function update_status(Request $request, $orderId){
        $order = Order::findOrFail($orderId);
        $order->update(['order_status' => $request->input('order_status')]);
        $staff = Auth::guard('staff')->user();
        return redirect()->route('order.list')->with('success', 'Order status updated successfully');
    }
    //admin

    public function admin_index(){
        $order = Order::all();
        return view('admin.order.index', ['order' => $order]);
    }
    public function admin_show_order($orderId){
        $order = Order::findOrFail($orderId); // Retrieve the specific order
        $order_item = Order_Item::where('order_id', $orderId)->get();
        return view('admin.order.show', compact('order', 'order_item')); // Pass both variables to the view
    }
    

    //All about pdf

    public function print_pdf_user($orderId)
    {
        $order = Order::findOrFail($orderId); // Assuming you want to retrieve a specific order
        $order_item = Order_Item::where('order_id', $orderId)->get();
    
        $data = [
            'order' => $order,
            'product_bought'=> $order_item,
        ];
    
        $timestamp = now()->timestamp; // Get the current timestamp
        $filename = 'order_details_' . $orderId . '_' . $timestamp . '.pdf'; // Create a unique filename
    
        $pdf = PDF::loadView('user.pdf.view', $data);
    
        return $pdf->download($filename);
    }

//     public function show_completed()
// {
//     // Retrieve completed orders for the authenticated user
//     $completedOrders = Order::where('user_id', auth()->id())
//         ->where('order_status', 'completed')
//         ->with('orderItems') // Eager load the orderItems relationship
//         ->latest()
//         ->get();

//     // Store the completed orders data in the session
//     session()->flash('completed_orders', $completedOrders);

//     // Redirect to the user.order route
//     return redirect()->route('user.order');
// }


   

   
}