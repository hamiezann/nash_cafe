<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // public function customer_dashboard()
    // {
    //     return view('customer.dashboard');
    // }
    // public function customer_logout(){
    //     Auth::guard('customer')->logout();
    //     return redirect()->route('login.form');
    // }

    public function index(){

        $customer = User::all();
    
        return view('admin.customer.index',compact('customer'));
    }
     public function show_customer($customerId) 
     { 
        $customer = User::findOrFail($customerId);  
        return view('admin.customer.show', compact('customer'));  
     }  


    public function destroy_customer(User $customer) 
    { 
        $customer->delete(); 
    
        return redirect()->route('admin.customer.index') 
                        ->with('success','Customer deleted successfully'); 
    } 

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
}
