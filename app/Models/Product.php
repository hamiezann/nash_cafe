<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = 'product';
    protected $fillable = [
        'product_name',
        'description',
        'product_price',
        'image',
        'category_id',
        'promoted',
        'discount',
       
    ];

    public $timestamps = true;
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product.php (assuming the name of your model is Product)
public function getDiscountedPrice()
    {
    // Calculate the discounted price based on the discount percentage
    $discountedPrice = $this->product_price - ($this->product_price * ($this->discount / 100));

    // Make sure the discounted price is not less than 0
    return max($discountedPrice, 0);
    }
    


}

