<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = 'order';
    protected $fillable = [
        'user_id',
        'order_status',
        'total_price',
        'payment_id',
        'image',
        'store_id',
        'order_option'
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
{
    return $this->hasMany(Order_Item::class, 'order_id');
}


    public $timestamps = true;
}
