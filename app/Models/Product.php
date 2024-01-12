<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'weight_type',
        'rating',
        'price',
        'photo',
        'description'
    ];
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
