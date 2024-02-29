<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'user',
        //     'email' => 'user@com',
        //     'password' => Hash::make('1234567890'),
        // ]);

        // \App\Models\Admin::create([
        //     'name' => 'admin',
        //     'email' => 'admin@com',
        //     'username' => 'admin',
        //     'password' => Hash::make('123'),
        // ]);
        // \App\Models\Staff::create([
        //     'name' => 'staff',
        //     'email' => 'staff@com',
        //     'username' => 'staff',
        //     'password' => Hash::make('1234567890'),
        //     'online_status' => false,
        // ]);
        // $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(PaymentSeeder::class);
        // $this->call(OrderSeeder::class);
        //$this->call(Order_itemSeeder::class);
        $this->call(StoresTableSeeder::class);

       
    }
}
