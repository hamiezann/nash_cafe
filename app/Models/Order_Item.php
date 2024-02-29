<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    use HasFactory;
    public $table = 'order_item';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'order_amount',
        
       
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

// Order_Item.php
public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}



    public $timestamps = true;
}
