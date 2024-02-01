<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;



Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('/shop', 'shopview')->name('shop');
    Route::get('/cart', 'cartview')->name('cart');
    Route::get('/contact', 'contactview')->name('contact');
    Route::get('/checkout', 'checkoutview')->name('checkout');
    Route::get('/orders', 'orderview')->name('orders');
});
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/signup', 'registerPost')->name('register.post');
    Route::post('/signin', 'loginPost')->name('loginpost');
    Route::get('/logoutmain', 'logout')->name('logout');
});


Route::controller(CartController::class)->middleware('guest')->middleware('checkUser')->group(function() {

    Route::post('/cart/add', 'addToCart')->name('cart.add');
    Route::delete('/cart/{id}/delete', 'deleteitem')->name('deleteitem');
    Route::put('/updateCartItem/{id}', 'updateCartItem')->name('updateCartItem');
    

});

Route::controller(AdminController::class)->middleware('checkAdmin')->group(function() {
    Route::get('/dashboard', 'admindashboard')->name('admin.dashboard');
    Route::get('/addProduct', 'addproduct')->name('addProduct');
    Route::post('/addProduct', 'addproductpost')->name('addProduct');
    Route::get('/logout', 'logout')->name('logoutadmin');
    Route::get('/allProduct', 'allProduct')->name('allProduct');
    Route::get('/allUsers', 'allUsers')->name('allUsers');
    Route::get('/allOrder', 'allOrder')->name('allOrder');
    Route::get('/order/{id}/details', 'orderDetails')->name('orderDetails');
    Route::delete('/product/{id}/delete', 'deleteproduct')->name('deleteproduct');
    Route::delete('/user/{id}/delete', 'deleteuser')->name('deleteuser');
    Route::delete('/order/{id}/delete', 'deleteOrder')->name('deleteOrder');
});

Route::controller(ContactController::class)->middleware('checkUser')->group(function() {

    Route::post('/contact', 'contact')->name('message');

});

Route::controller(AddressController::class)->middleware('checkUser')->group(function() {

    Route::post('/checkoutOrder', 'checkoutPost')->name('checkoutPost');
    Route::get('/orderPlaced', 'orderPlaced')->name('orderPlaced');
    
   
    

});