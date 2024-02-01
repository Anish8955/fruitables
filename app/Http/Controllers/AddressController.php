<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderedProduct;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;


class AddressController extends Controller
{
    public function checkoutPost(Request $request)
    {
        $user_id=Auth::user()->id;
        $transaction_id = Str::random(10).'_'.$user_id;
        $request->validate([
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'address' => 'required|string|max:65535', 
            'town' => 'required|string|max:250',
            'state' => 'required|string|max:250',
            'pin_code' => 'required|integer|digits:6',
            'mobile' => 'required|string|regex:/^[0-9]{10}$/',
            'email' => 'required|email|max:250'
        ]);

       $newAddress = Addresses::create([
            'user_id' => $user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'town' => $request->town,
            'state' => $request->state,
            'pin_code' => $request->pin_code,
            'mobile' => $request->mobile,
            'email' => $request->email
        ]);
        
        $newOrder = Order::create([
            'user_id' => Auth::user()->id,
            'address_id' => $newAddress->id,
            'transaction_id' => $transaction_id,
        ]);
        $cartItems = CartItem::where('user_id',$user_id)->get();
        foreach ( $cartItems as $cartItem) {
            OrderedProduct::create([
                'order_id' => $newOrder->id,
                'product_id' => $cartItem->product_id,
                'name' => $cartItem->name,
                'photo' => $cartItem->photo,
                'quantity' => $cartItem->quantity,
                'rate' => $cartItem->rate,
            ]);
        }
        CartItem::where('user_id',$user_id)->delete();
        return redirect()->route('orderPlaced')
            ->with('success', 'Your order is  successfully placed');
    }

    public function orderPlaced( ) 
    {
       
        return view('OrderPlaced');
    }

}
