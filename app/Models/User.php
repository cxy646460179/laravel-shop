<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name' , 'email' , 'password' , 'email_verified',
    ];

    protected $casts = [
        'email_verified' => 'boolean',
    ];

    protected $hidden = [
        'password' , 'remember_token' ,
    ];

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
    // 收藏
    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'user_favorite_products')
            ->withTimestamps()
            ->orderBy('user_favorite_products.created_at', 'desc');
    }
}
