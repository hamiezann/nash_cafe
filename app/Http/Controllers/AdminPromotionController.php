<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminPromotionController extends Controller
{

    // public function update(Request $request)
    // {
    //     // Validate the form submission
    //     $request->validate([
    //         'promoted' => 'array',
    //         'discounts' => 'array',
    //     ]);
    
    //     // Get the array of promoted product IDs and their respective discounts
    //     $promotedProductIds = $request->input('promoted', []);
    //     $discounts = $request->input('discounts', []);
    
    //     // Use a transaction to ensure atomic updates
    //     DB::transaction(function () use ($promotedProductIds, $discounts) {
    //         // Update the promotion status and discount for selected products
    //         foreach ($promotedProductIds as $productId) {
    //             $product = Product::find($productId);
    
    //             // Update promotion status
    //             $product->promoted = true;
    //             $product->save();
    
    //             // Update discount
    //             if (isset($discounts[$productId])) {
    //                 $product->discount = $discounts[$productId];
    //                 $product->save();
    //             }
    //         }
    
    //         // Update the promotion status for products not selected
    //         Product::whereNotIn('id', $promotedProductIds)->update(['promoted' => false]);
    //     });
    
    //     return redirect()->route('admin.index')->with('success', 'Promotion settings updated successfully.');
    // }

    public function update(Request $request)
{
    // Validate the form submission
    $request->validate([
        'promoted' => 'array',
        'discounts' => 'array',
    ]);

    // Get the array of promoted product IDs and their respective discounts
    $promotedProductIds = $request->input('promoted', []);
    $discounts = $request->input('discounts', []);

    // Use a transaction to ensure atomic updates
    DB::transaction(function () use ($promotedProductIds, $discounts) {
        // Update the promotion status and discount for selected products
        foreach ($promotedProductIds as $productId) {
            $product = Product::find($productId);

            // Update promotion status
            $product->promoted = true;
            $product->save();

            // Update discount only if provided
            if (isset($discounts[$productId])) {
                $product->discount = $discounts[$productId];
                $product->save();
            }
        }

        // Update the promotion status for products not selected
        Product::whereNotIn('id', $promotedProductIds)->update(['promoted' => false]);
    });

    return redirect()->route('admin.index')->with('success', 'Promotion settings updated successfully.');
}


}
