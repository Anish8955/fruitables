<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'rate',
        'quantity',
        'user_id',
        'name',
        'photo',
    ];


    public static function addItemToCart($data)
    {
        return self::create($data);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
