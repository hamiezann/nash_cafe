<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class Order_ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderItemSeed = [
            [
                'order_id' => 3, // Replace with an existing order ID
                'product_id' => 1, // Replace with an existing product ID
                'quantity' => 2,
                'order_amount' => 33.90,
            ],

            [
                'order_id' => 4, // Replace with another existing order ID
                'product_id' => 2, // Replace with another existing product ID
                'quantity' => 1,
                'order_amount' => 12.50,
            ],

            // Add more order item entries as needed
        ];

        foreach ($orderItemSeed as $orderItemEntry) {
            // Check if the referenced order_id and product_id exist in the respective tables
            $orderExists = Order::where('id', $orderItemEntry['order_id'])->exists();
            $productExists = Product::where('id', $orderItemEntry['product_id'])->exists();

            if ($orderExists && $productExists) {
                Order_item::firstOrCreate($orderItemEntry);
            } else {
                // Handle cases where the referenced order_id or product_id does not exist
                // You may want to log an error or skip the insertion
                echo "Skipped insertion for order_item: " . json_encode($orderItemEntry) . PHP_EOL;
            }}
    }
}
