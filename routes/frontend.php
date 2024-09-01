<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsUserAdmin;
use Illuminate\Support\Facades\Route;


Route::view('/', 'frontend.index')->name('home');
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::get('/product/{id}/product', [ProductController::class, 'singleProduct'])->name('product.single');
Route::view('/cart', [CartController::class, 'index'])->name('cart');


Route::get('cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::view('/about', 'frontend.about')->name('about');
Route::view('/contact', 'frontend.contact')->name('contact');

// Route::view('/user-login', 'frontend.login')->name('frontend.login');
// Route::view('/user-register', 'frontend.register')->name('frontend.register');
Route::view('/user-account', 'frontend.my-account')->name('frontend.user-account');
