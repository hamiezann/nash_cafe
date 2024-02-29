<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Staff extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'online_status',
        'last_login_at', 
        
    ];
    

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
