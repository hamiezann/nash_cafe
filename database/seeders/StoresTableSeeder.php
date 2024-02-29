<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stores')->insert([
            [
                'name' => 'Store A',
                'address' => 'A location',
                'latitude' => 1.6104007925821717,
                'longitude' => 103.31336881256392,
            ],
            [
                'name' => 'Store B',
                'address' => 'B location',
                'latitude' => 2.191085455967455,
                'longitude' => 102.2476576925585,
            ],
            // Add more stores as needed
        ]);
    }
}
