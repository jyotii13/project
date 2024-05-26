<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;


Route::get('/', [App\Http\Controllers\SiteController::class, 'getHome']);

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'removeCartItem'])->name('cart.remove');

Route::get('/product', [ProductController::class, 'index'])->name('products.index');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category
Route::get('/add/category', [App\Http\Controllers\HomeController::class, 'getAddCategory'])->name('getAddCategory');
Route::post('/add/category', [App\Http\Controllers\HomeController::class, 'postAddCategory'])->name('postAddCategory');
Route::get('manage/category',[App\Http\Controllers\HomeController::class, 'getManageCategory'])->name('getManageCategory');

//product
Route::get('/add/product', [App\Http\Controllers\HomeController::class, 'getAddProduct'])->name('getAddProduct');
Route::post('/add/product', [App\Http\Controllers\HomeController::class, 'postAddProduct'])->name('postAddProduct');
Route::get('manage/product',[App\Http\Controllers\HomeController::class, 'getManageProduct'])->name('getManageProduct');

Route::get('delete/product/{product}',[App\Http\Controllers\HomeController::class, 'getDeleteProduct'])->name('getDeleteProduct');
Route::get('edit/product/{product}',[App\Http\Controllers\HomeController::class, 'getEditProduct'])->name('getEditProduct');


