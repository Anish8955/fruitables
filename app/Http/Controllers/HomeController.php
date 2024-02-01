<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index() 
    {
       $products = Product::with('cartItems')->get();
        return view('welcome',compact('products'));
    }

    public function shopview( ) 
    {
       $products = Product::all();
       $products = Product::simplepaginate(6);
        return view('shop',compact('products'));
    }
    
    public function cartview( ) 
    {
        $userId = Auth::user()->id;
        $cartItems = CartItem::with('product')->where('user_id',$userId)->get();
        return view('cartpage',compact('cartItems'));
        
    }

    public function contactview( ) 
    {
        return view('contact');
    }

    public function checkoutview( ) 
    {
        $userId = Auth::user()->id;
        $cartItems = CartItem::with('product')->where('user_id',$userId)->get();
        return view('checkoutPage',compact('cartItems'));
    }

    public function orderview()
    {
        $userId = auth()->user()->id;
        $orders = Order::with('orderedProducts')->where('user_id', $userId)->get();
        return view('orderPage', compact('orders'));
    }
    

}
