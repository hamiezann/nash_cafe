<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_seed = [
            [
                'product_name' => 'Chicken Chop',
                'description' => "A delicious chicken that has been chop", // Add your product description here
                'product_price' => 16.90,
                'image' => 'chickenchop.jpg', // Add the image URL or path here
                'category_id' => '1'
            ],

            [
                'product_name' => 'Beef Burger',
                'description' => "A burger that created with a heavenly taste", // Add your product description here
                'product_price' => 12.50,
                'image' => 'beefburger.jpg', // Add the image URL or path here
                'category_id' => '1'
            ],

            [
                'product_name' => 'Iced Caramel Macchiato',
                'description' => "A delightful blend of espresso, milk, and vanilla-flavored syrup poured over ice and finished with a caramel drizzle. Refreshingly sweet and energizing.",
                'product_price' => 4.99,
                'image' => 'machiato.jpg',
                'category_id' => '4', // Assuming 'Drinks' category
            ],

            [
                'product_name' => 'Chocolate Lava Cake',
                'description' => "Indulge in the heavenly goodness of a warm chocolate lava cake with a molten chocolate center. Served with a scoop of vanilla ice cream for the perfect combination of gooey and creamy.",
                'product_price' => 8.99,
                'image' => 'lava.jpg',
                'category_id' => '5'
            ],

            [
                'product_name' => 'Tropical Fruit Smoothie',
                'description' => "Escape to the tropics with our refreshing tropical fruit smoothie. A vibrant blend of pineapple, mango, and banana for a taste of paradise in every sip.",
                'product_price' => 5.49,
                'image' => 'smoothietropical.jpg',
                'category_id' => '3'
            ],

            
        ];

        foreach ($product_seed as $product_entry) {
            Product::firstOrCreate($product_entry);
        }
    }
}
