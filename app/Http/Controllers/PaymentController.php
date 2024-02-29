<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Order_Item;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


                public function stripePayment(Request $request)
{
    try {
        $session = $this->createStripeSession();
        return redirect($session->url);
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['stripe_error' => $e->getMessage()]);
    }
}
    
                private function createStripeSession()
    {
        // Retrieve cart items from session
        $cartItems = session()->get('cart', []);
    
        // Calculate total price
        $totalPrice = 0;
        $productNames = [];
    
        
    
        foreach ($cartItems as $cartItem) {
            $productNames[] = $cartItem['product']['name'];
            $totalPrice += $cartItem['quantity'] * $cartItem['product']['price'];
        }
    
        // Convert total price to cents
        $totalPriceCents = $totalPrice * 100;
    
        // Set your Stripe secret key
        Stripe::setApiKey(config('stripe.sk'));
    
        // Create a Stripe session
        return Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => [
                            'name' => implode(', ', $productNames),
                        ],
                        'unit_amount' => $totalPriceCents,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success',),
            'cancel_url' => route('payment.cancel'), // Add a cancel route
        ]);
    }

                public function handleStripeSuccess()
    {
        try {
            DB::beginTransaction();

                // $this->updateDatabaseAfterSuccessfulPayment();
                $paymentDetails = $this->updateDatabaseAfterSuccessfulPayment();

            
    
            DB::commit();
           
            session()->flash('success', 'Payment successful.');
            session()->forget('cart');
                    // Pass additional information to the success route using session
        // session()->put('paymentDetails', $paymentDetails);
        // $cookieValue = json_encode($paymentDetails);
        // Cookie::queue('paymentDetails', $cookieValue, 30); // Set the expiration time as needed

        // return redirect()->route('payment.success');
        return redirect()->route('order');
    
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['stripe_error' => $e->getMessage()]);
        }
    }
    
    
    private function updateDatabaseAfterSuccessfulPayment()
    {
        // Retrieve cart items from session
        $cartItems = session()->get('cart', []);
        // Calculate total price
        $totalPrice = 0;
        $productNames = [];
        // $store_id = session()->get('store_id'); // Retrieve store_id from session
        // $order_option = session()->get('order_option'); // Retrieve store_id from session
    
        foreach ($cartItems as $cartItem) {
            $productNames[] = $cartItem['product']['name'];
            $totalPrice += $cartItem['quantity'] * $cartItem['product']['price'];
        }
    
        $user = Auth::user();
        $transactionId = Str::uuid()->toString();
    
        $payment = Payment::create([
            'transaction_id' => $transactionId,
            'payment_amount' => $totalPrice,
            // Add more fields as needed
        ]);
    
        $order = Order::create([
            'user_id' => $user->id,
            'order_status' => "Pending",
            'total_price' => $totalPrice,
            'payment_id' => $payment->id,
            'image' => '/',
            // 'store_id' => $store_id, // Set the store_id in the order
            // 'order_option' => $order_option, // Set the store_id in the order
            'store_id' =>  $cartItem['store_id'],// Set the store_id in the order
            'order_option' =>  $cartItem['order_option'], // Set the store_id in the order
        ]);
    
        foreach ($cartItems as $cartItem) {
            Order_Item::create([
                'order_id' => $order->id,
                'product_id' => $cartItem['product']['id'],
                'quantity' => $cartItem['quantity'],
                'order_amount' => $cartItem['product']['price'] * $cartItem['quantity'],
            ]);
        }
    
        return [
            'payment_id' => $payment->id,
            'order_id' => $order->id,
            'total_amount' => $totalPrice,
        ];
    }
    


    public function success()
    {
       
        // $userOrders = Order::where('user_id', auth()->id())
        // ->where('order_status', 'Pending')
        // // ->whereBetween('created_at', [now()->subMinutes(30), now()])
        // ->with('orderItems') 
        // ->latest()
        // ->get();
        // ->where('order_status', 'pending')
        // ->whereBetween('created_at', [now()->subMinutes(30), now()])
        // ->with('orderItems') // Eager load the orderItems relationship
        // ->latest()
        // ->get();

        // $completedOrders = Order::where('user_id', auth()->id())
        // ->where('order_status', 'Completed')
        // ->with('orderItems') // Eager load the orderItems relationship
        // ->latest()
        // ->get();

        // return view('product.success_order', compact('userOrders'));
         return view('user.order', compact('userOrders', 'completedOrders'));
        
        
    }

    
    

    public function cancelPayment()
    {
                // Redirect or respond as needed
                return redirect()->route('cart')->with('error', 'Payment canceled.');
          
    }




    //Admin Part
    public function payment_dashboard()
    {
        return view('payment.dashboard');
    }

    public function payment_logout(){
        Auth::guard('payment')->logout();
        return redirect()->route('login.form');
    }

    public function index(){
   
        $payment = Payment::all();
    
        return view('admin.payment.index',compact('payment'));
    }

     public function show_payment($paymentId) 
     { 
        $payment = Payment::findOrFail($paymentId);  
        return view('admin.payment.show', compact('payment'));  
     } 

    public function destroy_payment(Payment $payment) 
    { 
        $payment->delete(); 
        return redirect()->route('admin.payment.index') 
                        ->with('success','Payment deleted successfully'); 
    } 





}
