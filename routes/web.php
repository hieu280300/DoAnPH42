<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('frontend.auth.homepage');
// });

// Auth::routes();

// Route::get('/Home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class ,'shop'])->name('shop');
Route::get('/Home/Shop_Detail/{id}', [App\Http\Controllers\Frontend\HomeController::class ,'shop_detail'])->name('shop_details');
// Route::get('/Home/Add_Cart/{id}', [App\Http\Controllers\Frontend\HomeController::class ,'add_cart'])->name('add_carts');
// Route::get('/Home/Cart', [App\Http\Controllers\Frontend\HomeController::class ,'cart'])->name('carts');
// Route::get('/Home/Update_Cart', [App\Http\Controllers\Frontend\CartController::class ,'update_card'])->name('update_Cart');
Route::post('add-cart/{id}', [App\Http\Controllers\Frontend\CartController::class,'save_cart'])->name('addCart');
Route::get('show-cart',[App\Http\Controllers\Frontend\CartController::class,'show_cart'])->name('showCart');
Route::post('update{id}',[App\Http\Controllers\Frontend\CartController::class,'update_quantity'])->name('updateCart');
Route::get('delete-cart/{rowId}', [App\Http\Controllers\Frontend\CartController::class,'delete_cart'])->name('deleteCart');
Route::get('checkout',[App\Http\Controllers\Frontend\CartController::class,'checkout'])->name('checkout');
Route::post('checkout-complete',[App\Http\Controllers\Frontend\CartController::class,'checkoutComplete'])->name('checkoutComplete');
Route::get('complete',[App\Http\Controllers\Frontend\CartController::class,'complete'])->name('complete');
require __DIR__ . '/auth.php';
