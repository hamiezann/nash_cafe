<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

   
        $category = Category::all();
    
        return view('admin.category.table',compact('category'));
    }
    public function create_category(){

        $category= Category::all(); 
     
        
            return view('admin.category.create');  
     }
     public function store_category(Request $request) 
     { 
         $request->validate([ 
             'category_name' => 'required', 
             'description' => 'required', 
          
         ]); 
    
         Category::create($request->all()); 
     
         return redirect()->route('admin.category.table') 
                         ->with('success','Category created successfully.'); 
     } 
     public function show_category($categoryId) 
     { 
        $category = Category::findOrFail($categoryId);  
        return view('admin.category.show', compact('category'));  
     } 

     public function edit_category($categoryId) 
     { 
        $category= Category::findOrFail($categoryId);  
        return view('admin.category.edit', compact('category'));  
     } 
    
     
     public function update_category(Request $request) 
    { 
        $category = Category::findOrFail($request->id);
        $request->validate([ 
            'category_name' => 'required', 
            'description' => 'required', 
        ]); 
    
         $category->update($request->all()); 
    
        return redirect()->route('admin.category.table') 
                        ->with('success','Category updated successfully'); 
     
    
    } 
    public function destroy_category(Category $category) 
    { 
      
        $category->delete(); 
    
        return redirect()->route('admin.category.table') 
                        ->with('success','Category deleted successfully'); 
    } 
}
