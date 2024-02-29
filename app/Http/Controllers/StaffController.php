<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    //     $this->middleware('auth:staff'); 
    // }

    public function staff_dashboard()
    {
        $staff = Auth::guard('staff')->user();
        return view('staff.dashboard', compact('staff'));
    }



    public function staff_logout()
    {
        // Check if the user is logged in
        $staffUser = Auth::guard('staff')->user();
    
        if ($staffUser) {
            // Update online status to offline during logout
            $staffUser->update(['online_status' => 0]);
        }
    
        // Logout user
        Auth::guard('staff')->logout();
    
        // Redirect to login page
        return redirect()->route('login.form');
    }

 

    
    
    
    //Admin side
    public function index(){

   
        $staff = Staff::all();
    
        return view('admin.staff.index',compact('staff'));
    }
    public function create_staff(){
        $staff = Staff::all(); 
     
        
            return view('admin.staff.create');  
     }

     
     public function store_staff(Request $request) 
     { 
         $request->validate([ 
             'name' => 'required', 
             'email' => 'required', 
             'username' => 'required' ,
             'password' => 'required', 
         ]); 
         $hashedPassword = Hash::make($request->password);
    
        //  Staff::create($request->all()); 
         Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $hashedPassword,
        ]);
     
         return redirect()->route('admin.staff.index') 
                         ->with('success','Staff created successfully.'); 
     } 
     public function show_staff($staffId) 
     { 
        $staff = Staff::findOrFail($staffId);  
        return view('admin.staff.show', compact('staff'));  
     } 

     public function edit_staff($staffId) 
     { 
        $staff = Staff::findOrFail($staffId);  
        return view('admin.staff.edit', compact('staff'));  
     } 

     
     public function update_staff(Request $request) 
    { 
        $staff = Staff::findOrFail($request->id);
        $request->validate([ 
            'name' => 'required', 
            'email' => 'required', 
            'username' => 'required' ,
            'password' => 'required', 
        ]); 
    
         $staff->update($request->all()); 
    
        return redirect()->route('admin.staff.index') 
                        ->with('success','Staff updated successfully'); 
     
    
    } 
    public function destroy_staff(Staff $staff) 
    { 
      
        $staff->delete(); 
    
        return redirect()->route('admin.staff.index') 
                        ->with('success','Staff deleted successfully'); 
    } 
}
