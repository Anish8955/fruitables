<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use  SoftDeletes;
    protected $fillable = [
        'user_id',
        'address_id',
        'transaction_id',
    ];

    public function orderedProducts()
    {
        
        return $this->hasMany(OrderedProduct::class, 'order_id');
    }

    public function user()
    {

        return $this->hasOne(User::class,  'id','user_id');

    }

    public function address()
    {

        return $this->hasOne(Addresses::class, 'id','address_id');

    }

    
}
