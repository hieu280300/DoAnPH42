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
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class ,'shop'])->name('shop');

Route::get('shop-details/{id}', [App\Http\Controllers\Frontend\HomeController::class ,'shop_detail'])->name('shop_detail');
Route::post('add-carts/{id}', [App\Http\Controllers\Frontend\CartController::class,'save_cart'])->name('add_cart');
Route::get('show-carts',[App\Http\Controllers\Frontend\CartController::class,'show_cart'])->name('show_cart');
Route::get('update',[App\Http\Controllers\Frontend\CartController::class,'update_quantity'])->name('update_cart');
Route::get('delete-carts/{rowId}', [App\Http\Controllers\Frontend\CartController::class,'delete_cart'])->name('delete_cart');
Route::get('checkout',[App\Http\Controllers\Frontend\CartController::class,'checkout'])->name('checkout')->middleware('auth');
Route::get('manage_orders',[App\Http\Controllers\Frontend\CartController::class,'manage_order'])->name('manage_order') ->middleware('auth');;
Route::get('order-details/{id}',[App\Http\Controllers\Frontend\CartController::class,'order_detail'])->name('order_detail')->middleware('auth');
Route::post('checkout-complete',[App\Http\Controllers\Frontend\CartController::class,'checkout_complete'])->name('checkout_complete')->middleware('auth');
Route::get('complete',[App\Http\Controllers\Frontend\CartController::class,'complete'])->name('complete')->middleware('auth');
Route::get('search-category/{id}',[App\Http\Controllers\Frontend\Search::class,'search_category'])->name('search_category');
Route::get('search-size/{id}',[App\Http\Controllers\Frontend\Search::class,'search_size'])->name('search_size');
Route::get('search-color/{id}',[App\Http\Controllers\Frontend\Search::class,'search_color'])->name('search_color');


Route::get('info-user',[App\Http\Controllers\Frontend\HomeController::class,'info_user'])->name('info_user');
Route::get('edit-profile/{id}',[App\Http\Controllers\Frontend\HomeController::class,'edit_profile'])->name('edit_profile');
Route::post('update-profile/{id}',[App\Http\Controllers\Frontend\HomeController::class,'update_profile'])->name('update_profile');
Route::post('change-password1',[App\Http\Controllers\Frontend\HomeController::class,'change_password'])->name('change_password');
Route::get('/change-password',[App\Http\Controllers\Frontend\HomeController::class,'show_change_password'])->name('show_change_password');

Route::post('send-verify-code', [CartController::class, 'sendVerifyCode'])->name('send-verify-code');
Route::post('confirm-verify-code', [CartController::class, 'confirmVerifyCode'])->middleware(['auth'])->name('confirm-verify-code');


Route::get('{id}/check-quantity', [ProductAjaxController::class, 'checkQuantity'])->name('check-quantity');
require __DIR__ . '/auth.php';
