<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admindashboard()
    {
        return view('admin');
    } 

    public function addProduct()
    {
        return view('admin.addproduct');
    } 

    
    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
   
     */
    public function addproductpost(Request $request)
{
    
    
        $request->validate([
            'name' => 'required|string|max:250',
            'type' => 'required',
            'weight_type' => 'required',
            'rating' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'description' => 'required',
        ]);   
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoName = time() . '_' . $photo->getClientOriginalName();
        // Check if the directory exists, otherwise create it
        $request->photo->move(public_path('webImage'), $photoName);
    }
    // Rest of your code remains the same...
    Product::create([
        'name' => $request->name,
        'type' => $request->type,
        'weight_type' => $request->weight_type,
        'rating' => $request->rating,
        'price' => $request->price,
        'photo' => $photoName,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.dashboard')->withSuccess('Product added successfully!');
} 



     /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')
            ->withSuccess('You have logged out successfully!');;
    }    

    public function allProduct()
    {
        // Retrieve all products
        $products = Product::all();

        // Return view with the products data
        return view('admin.allproduct', ['products' => $products]);
    }
    
    public function deleteproduct($id)
    {
        $products = Product::findOrFail($id);

        $products->delete();
    
        // Redirect back to user list or other appropriate page
        return redirect()->route('allProduct');
    } 


}
