<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order_seed = [
            [
                'user_id' => 1, // Replace with an existing user ID
                'order_status' => 'pending',
                'total_price' => 33.39,
                'payment_id' => '2',
                'image' => '', // Add the image URL or path here
                'store_id' => '2',
                'order_option' => 'Dine in',
   
            ],

            [
                'user_id' => 1, // Replace with another existing user ID
                'order_status' => 'completed',
                'total_price' => 21.49,
                'payment_id' => '1',
                'image' => '', // Add the image URL or path here
                'store_id' => '3',
                'order_option' => 'Takeaway',
            ],

            // Add more order entries as needed
        ];

        foreach ($order_seed as $order_entry) {
            Order::firstOrCreate($order_entry);
        }
    }
}
