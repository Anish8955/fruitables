<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {   
           $productId = $request->input('product_id');
           $price = $request->input('price');
           $userId = auth()->id(); 

           $name = $request->input('name');
           $photo = $request->input('photo');

           $product = Product::find($productId);

          if (!$product) {
            return redirect()->route('')->with('error', 'Product not found.');
           }
            CartItem::addItemToCart([
            'product_id' => $productId,
            'rate' => $price,
            'quantity' => 1,
            'user_id' => $userId,
            'name' => $name,
            'photo'=> $photo
        ]);

        return redirect()->route('home')->with('success', 'Product added to cart successfully.');

    }


    public function deleteitem($id)
    {
        $cartItem = CartItem::findOrFail($id);

        $cartItem->delete();

        // Redirect back to user list or other appropriate page
        return redirect()->route('cart');
    }

    public function updateCartItem(Request $request, $cartId)
    {
        $quantity = $request->quantity;
        $cartItem = CartItem::where('id', $cartId)->first();
        $cartItem->quantity = $quantity;
        $cartItem->save();

        return response()->json(['success' => true]);
    }
}