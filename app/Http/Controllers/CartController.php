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
        $userId = auth()->id(); // Retrieve the current authenticated user's ID

        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('')->with('error', 'Product not found.');
        }
          CartItem::addItemToCart([
            'product_id' => $productId,
            'rate' => $price,
            'quantity' => 1,
            'user_id' => $userId,
    
]);

return redirect()->route('cart')->with('success', 'Product added to cart successfully.');

}


public function deleteitem($id)
{
    $cartItem = CartItem::findOrFail($id);

    $cartItem->delete();

    // Redirect back to user list or other appropriate page
    return redirect()->route('cart');
} 

public function updateCartQuantity(Request $request)
{
    $productId = $request->input('product_id');
    $newQuantity = $request->input('quantity');

    // Update the quantity in the database (you may want to add validation and error handling)
    CartItem::where('product_id', $productId)
        ->update(['quantity' => $newQuantity]);

    return response()->json(['success' => true]);
}


}