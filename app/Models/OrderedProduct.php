<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    public $table = 'ordered_product';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'rate',
        'name',
        'photo',
    ];
}
