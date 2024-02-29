<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $table = 'payment';
    protected $fillable = [
        
        'transaction_id',
        'payment_amount',
       
    ];

    public $timestamps = true;
}
