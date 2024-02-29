<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_seed = [
            [
                // 'order_id' => 1, // Replace with an existing order ID
                'transaction_id' => 'txn_1234567890',
                'payment_amount' => 33.39,
            ],

            [
                // 'order_id' => 2, // Replace with another existing order ID
                'transaction_id' => 'txn_9876543210',
                'payment_amount' => 21.49,
            ],

            // Add more payment entries as needed
        ];

        foreach ($payment_seed as $payment_entry) {
            Payment::firstOrCreate($payment_entry);
        }
    }
}
