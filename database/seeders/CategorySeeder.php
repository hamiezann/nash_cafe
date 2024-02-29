<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_seed = [
            ['category_name'=> 'Food',
            'description' => "'Indulge your senses in a culinary journey with our exquisite dish—a harmonious blend of flavors,
             textures, and aromas that dance on the palate. Savor the richness of meticulously selected ingredients, each contributing
            to the dish's depth and complexity. From the first tantalizing bite to the lingering aftertaste, our food encapsulates the 
            essence of culinary artistry. Whether it's the succulent tenderness of the protein, the vibrant burst of freshness from 
            handpicked vegetables, or the expertly crafted sauces that tie it all together, every element is thoughtfully curated.
             Our food is a celebration of creativity and passion, inviting you to experience the joy of exceptional dining.
             Immerse yourself in the symphony of tastes that await, and let each mouthful transport you to a realm of gastronomic delight.'",
            ],

            ['category_name' => 'Beverages',
            'description' => "Embark on a sensory journey with our exquisite beverage—a harmonious blend of flavors, aromas, and textures 
            that dance on the palate. Revel in the richness of thoughtfully selected ingredients, each contributing to the drink's depth 
            and complexity. From the initial sip to the lingering aftertaste, our beverage encapsulates the essence of liquid artistry. 
            Whether it's the velvety smoothness of the brew, the invigorating burst of freshly infused botanicals, or the skillfully blended
             notes that unite in perfect harmony, every element is carefully curated. Our drink is a celebration of creativity and passion,
              inviting you to savor the pleasure of an exceptional drinking experience. Immerse yourself in the symphony of tastes that await,
               and let each sip transport you to a realm of beverage bliss."
            ],

            ['category_name' => 'Smoothies',
            'description' => "Revitalize your senses with our refreshing smoothies—a vibrant fusion of flavors, textures, and wholesome ingredients
             that invigorate your taste buds. Immerse yourself in the fruity richness of carefully selected ingredients, each contributing to the
            smoothie's depth and nutritional profile. From the first sip of tropical goodness to the lingering freshness, our smoothies encapsulate
            the essence of blended artistry. Whether it's the velvety smoothness of banana, the zing of citrus, or the burst of antioxidants from berries, 
            every element is blended to perfection. Our smoothies are a celebration of health and creativity, inviting you to experience the joy of
             a revitalizing drink. Immerse yourself in the symphony of
             fruity tastes that await, and let each sip transport you to a realm of wholesome refreshment."],

             ['category_name' => 'Coffee',
             'description' => "Elevate your coffee experience with our exceptional brew—a symphony of nuanced flavors, enticing aromas, and the perfect balance of strength and smoothness. Revel in the richness of thoughtfully selected coffee beans, each contributing to the beverage's depth and complexity. From the initial aromatic whiff to the lingering aftertaste, our coffee encapsulates the essence of the barista's artistry. Whether it's the robust notes of dark roast, the delicate hints of fruitiness, or the velvety crema that crowns each cup, every element is crafted with precision. Our coffee is a celebration of the bean and the brew, inviting you to savor the pleasure of an exceptional coffee moment. Immerse yourself in the world of coffee delights, and let each sip transport you to a realm of caffeinated bliss."]
            ,

            ['category_name' => 'Desserts',
            'description' => "Delight your senses with our decadent sweet creations—a symphony of flavors, textures, and aromas that enchant the taste buds. Indulge in the luxurious richness of carefully selected ingredients, each contributing to the dessert's depth and complexity. From the first blissful bite to the lingering sweetness, our desserts encapsulate the essence of culinary artistry. Whether it's the velvety smoothness of the chocolate, the crisp layers of pastry, or the artful drizzle of caramel, every element is meticulously crafted. Our desserts are a celebration of indulgence and passion, inviting you to experience the joy of exceptional sweetness. Immerse yourself in the world of confectionery delight, and let each bite transport you to a realm of sugary bliss."]

         ,

            ['category_name' => 'Drinks',
            'description' => "Quench your thirst with our exceptional drinks—a symphony of flavors, aromas, and refreshing qualities that tantalize your senses. Imbibe in the richness of thoughtfully selected ingredients, each contributing to the drink's depth and complexity. From the first sip to the lingering aftertaste, our drinks encapsulate the essence of liquid artistry. Whether it's the effervescent sparkle of a fizzy concoction, the herbal infusion of a botanical blend, or the balanced sweetness of a crafted cocktail, every element is meticulously curated. Our drinks are a celebration of diverse tastes and creative mixology, inviting you to savor the pleasure of an exceptional drinking experience. Immerse yourself in the symphony of liquid delights that await, and let each sip transport you to a realm of beverage bliss."]

        ];


            foreach ($category_seed as $category_seed)
        {
            Category::firstOrCreate($category_seed);
        }
    }
}
