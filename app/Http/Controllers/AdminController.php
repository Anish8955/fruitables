<?php

namespace App\Http\Controllers;

use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
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

    public function allUsers()
    {
        
        $users = User::all();

        return view('admin.alluser', ['users' => $users]);
    }

    public function allOrder()
    {
        $orders = Order::with(['user' => function ($query) {
            $query->withTrashed();
        }, 'address'])->get();
        
        return view('admin.allorder', ['orders' => $orders]);
    }
    
    
    public function deleteuser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    
        return redirect()->route('allUsers');
    } 

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();
    
        return redirect()->route('allOrder');
    } 

    public function orderDetails($id)
    {  
        $orderedProduct = OrderedProduct::where('order_id', $id)->get();
        
        return view('admin.orderdetails', ['orderedProduct' =>  $orderedProduct]);
    }


}
