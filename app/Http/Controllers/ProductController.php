<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function productlist(){

        $products = Product::paginate(7);
        return view('user.productlist', compact('products'));
    
    }

    public function show($productId){
        $other_product = Product::all();
        $product = Product::findOrFail($productId); 
        return view('product.show', compact('product', 'other_product') );
    }

    public function cart($productId){
        // $products = Product::all();
        $product = Product::findOrFail($productId); 
        return view('product.cart', compact('product') );
    }

    //Admin Product

    public function index()
        {

   
        $product = Product::all();
       
    
        return view('admin.product.index',compact('product'));
        }
    
    public function create_product()
        {
        $product = Product::all();
        $categories = Category::all(); 
     
            return view('admin.product.create', compact('categories'));  
        }
    
    public function store_product(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'product_price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            // 'promoted' => true,
            //  'discount' => 0.00, 
        ]);
    
        // Handle image upload using the Storage facade
        $imageName = time().'.'.$request->image->extension();
        $imagePath = $request->image->storeAs('db_img', $imageName);
      



        // $imagePath = $request->image->storeAs('db_img', $imageName);
    
        // Create the product with the image path
        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'product_price' => $request->product_price,
            'image' => $imageName,
            'category_id' => $request->category_id,
            // 'promoted' => $request->promoted,
            // 'discount' => $request->discount, 
        ]);
    
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
    }
    
    
    

    public function show_product($productId) 
        { 
        $product = Product::findOrFail($productId); 
        
        return view('admin.product.show', compact('product'));  
        } 

    public function edit_product($productId) 
         { 
            $product= Product::findOrFail($productId);
            $categories = Category::all();   
            return view('admin.product.edit', compact('product','categories'));  
         } 
        
         
    

         public function update_product(Request $request)
         {
             $product = Product::findOrFail($request->id);
         
             $request->validate([
                 'product_name' => 'required',
                 'description' => 'required',
                 'product_price' => 'required',
                 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Not required for update
                 'category_id' => 'required',
             ]);
         
             if ($request->hasFile('image')) {
                 // Handle image upload using the Storage facade if a new image is provided
                 $imageName = time() . '.' . $request->image->extension();
                 $imagePath = $request->image->storeAs('db_img', $imageName);
         
                 // Update the product with the new image path and category ID
                 $product->update([
                     'product_name' => $request->product_name,
                     'description' => $request->description,
                     'product_price' => $request->product_price,
                     'image' => $imageName,
                     'category_id' => $request->category_id,
                 ]);
             } else {
                 // Update the product without changing the image
                 $product->update([
                     'product_name' => $request->product_name,
                     'description' => $request->description,
                     'product_price' => $request->product_price,
                     'category_id' => $request->category_id,
                 ]);
             }
         
             return redirect()->route('admin.product.index')->with('success', 'Product updated successfully');
         }
         


    public function destroy_product(Product $product) 
        { 
      
        $product->delete(); 
    
        return redirect()->route('admin.product.index') 
                        ->with('success','Product deleted successfully'); 
        } 

    


}
