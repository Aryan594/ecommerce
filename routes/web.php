<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CommentController as ControllersCommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserController\CommentController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[UserController::class,'index']);


Route::get('/view-product/{id}',[UserController::class,'viewProduct']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[AdminController::class,'index']);
//to view total users
Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/retrieveUserData',[AdminController::class,'retrieveUserData']);

Route::get('/categories',[AdminController::class,'categories']);
Route::post('/add-category',[CategoryController::class,'store']);
Route::get('/edit-category/{id}',[CategoryController::class,'edit']);
Route::post('/update-category/{id}',[CategoryController::class,'update']);
Route::get('/delete-category/{id}',[CategoryController::class,'destroy']);

Route::get('/products',[AdminController::class,'products']);
Route::post('/add-product',[ProductController::class,'store']);
Route::get('/edit-product/{id}',[ProductController::class,'edit']);
Route::post('/update-product/{id}',[ProductController::class,'update']);
Route::get('/delete-product/{id}',[ProductController::class,'destroy']);


Route::post('/add-to-cart/{id}',[CartController::class,'addToCart']);
//check out
Route::get('/checkout', [CheckoutController::class,'checkout']);
Route::post('/place-order', [CheckoutController::class,'placeOrder']);

Route::get('/pay-with-khalti/{price}/{order_id}', [CheckoutController::class,'payWithKhalti']);

Route::get('/update-order/{id}',[CheckoutController::class,'updateOrder']);

Route::post('/change-order-details/{id}',[OrderController::class,'changeOrderDetails']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about',function(){
    return view('user.layout.about');
})->name('about');

Route::get('/contact',function(){
    return view('user.layout.contact');
})->name('contact');

Route::get('/search', [App\Http\Controllers\Admin\ProductController::class, 'search'])->name('search');
//for contact information


//cartpage
Route::get('/cart/{id}',[CartController::class,'destroy'])->name('destroy');
Route::get('/cart',[CartController::class,'viewcart'])->name('cart');

//checkoutpage
Route::get('/checkout',function(){
    return view('user.layout.checkout');
})->name('checkout');

//orders routes
Route::get('/orders',[OrderController::class,'index']);
Route::get('/orders/{id}',[OrderController::class,'orderdestroy'])->name('orders.destroy');

//userorderdetails
Route::get('/userOrder',[OrderController::class,'userindex'])->name('userOrder');

//shopproducts
Route::get('/shop', [CategoryController::class, 'shop'])->name('shop');

//for comment
Route::post('/comments', [ControllersCommentController::class, 'addtocomment'])->name('comments.store');
//to destory comment
Route::delete('/comments/{id}', [ControllersCommentController::class, 'destroy'])->name('comments.destroy');

//wishlist
Route::get('/wishlist',[WishlistController::class,'viewwishlist'])->name('wishlist');
Route::post('/wishlist/add', [WishlistController::class,'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class,'removeFromWishlist'])->name('wishlist.remove');
//to navigate to productview
Route::get('/product/{product_id}', [ProductController::class,'showwishlist'])->name('productview');
//khaltiordercancel
Route::get('/cancel-order/{order_id}', [OrderController::class, 'cancelOrder'])->name('order.cancelled');
//chart
Route::get('/newRegisteredAccounts', [AdminController::class,'getNewRegisteredAccounts']);








