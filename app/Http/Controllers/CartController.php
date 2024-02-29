<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;

class CartController extends Controller
{
    public function cart()
    {
        $cartItems = session()->get('cart', []); // Retrieve existing cart or create an empty array
        $stores = Store::all(); 
        // $categories  Product::all();
        //  dd($stores);
        return view('product.cart', ['cartItems' => $cartItems, 'stores' => $stores]);
    }
    


// public function __construct()
//     {
//         session()->start();
//     }

        public function __construct()
    {
        session()->start();
        $this->middleware('auth');
    }

// public function add(Request $request)
//     {
//         $productId = $request->input('productId'); // Get the product ID from the request
//         $quantity = $request->input('quantity'); // Get the selected quantity

//         // Retrieve the product from the database
//         $product = Product::findOrFail($productId);
//         $cartItems = session()->get('cart', []); // Retrieve existing cart or create an empty array


        
//         if (!isset($cartItems[$productId])) {
//             $cartItems[$productId] = [
//                 'quantity' => 0,
//                 'product' => [
//                     'id' => $product->id,
//                     'image' => $product->image,
//                     'name' => $product->product_name,
//                     'price' => $product->product_price,
                          
//                 ],
//             ];
//         }

//         $cartItems[$productId]['quantity'] += $quantity;

//         session()->put('cart', $cartItems);
       

//         return redirect()->route('productlist', ['cartItems' => $cartItems])->with('success', 'Product added to cart!');
//     }

public function add(Request $request)
{
    $productId = $request->input('productId'); // Get the product ID from the request
    $quantity = $request->input('quantity'); // Get the selected quantity
    $store_id = $request->input('store_id');
    $order_option = $request->input('order_option');
    // 'order_option' => 'required|in:dine_in,takeaway',

    // Retrieve the product from the database
    $product = Product::findOrFail($productId);
    $cartItems = session()->get('cart', []); // Retrieve existing cart or create an empty array

    if (!isset($cartItems[$productId])) {
        $cartItems[$productId] = [
            'quantity' => 0,
            'store_id' => $store_id,
            'order_option' => $order_option,
            'product' => [
                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->product_name,
                'price' => $product->getDiscountedPrice(), // Call the accessor to get the discounted price
            ],
        ];
    }

    // Update the quantity
    $cartItems[$productId]['quantity'] += $quantity;
    $cartItems[$productId]['store_id'] = $store_id;
    $cartItems[$productId]['order_option'] = $order_option;

    session()->put('cart', $cartItems);

    return redirect()->route('productlist', ['cartItems' => $cartItems])->with('success', 'Product added to cart!');
}


public function remove($productId)
    {
    $cartItems = session()->get('cart', []);

    if (isset($cartItems[$productId])) {
        unset($cartItems[$productId]);
        session()->put('cart', $cartItems);
    }

    return redirect()->route('cart')->with('success', "Product removed from cart!");
    }

public function update(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->route('cart')->withErrors($validator)->withInput();
        }

        $cartItems = session()->get('cart', []);

        if (isset($cartItems[$productId])) {
            $cartItems[$productId]['quantity'] = $request->input('quantity');
        }

        session()->put('cart', $cartItems);

        return redirect()->route('cart')->with('success', "Cart updated successfully");
    }


    public function update_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required|exists:stores,id',
            'order_option' => 'required|in:Dine In,Takeaway', // Ensure the values match your select options
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('cart')->withErrors($validator)->withInput();
        }
    
        $store_id = $request->input('store_id');
        $order_option = $request->input('order_option');
    
        $cartItems = session()->get('cart', []);
    
        // Update store_id and order_option for each item in the cart
        foreach ($cartItems as &$item) {
            $item['store_id'] = $store_id;
            $item['order_option'] = $order_option;
        }
    
        session()->put('cart', $cartItems);
    
        return redirect()->route('cart')->with('success', 'Store updated successfully');
    }
    



}
