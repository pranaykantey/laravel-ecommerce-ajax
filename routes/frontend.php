<?php
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsUserAdmin;
use Illuminate\Support\Facades\Route;


Route::view('/', 'frontend.index')->name('home');
Route::view('/shop', 'frontend.shop')->name('shop');
Route::view('/cart', 'frontend.cart')->name('cart');
Route::view('/about', 'frontend.about')->name('about');
Route::view('/contact', 'frontend.contact')->name('contact');

// Route::view('/user-login', 'frontend.login')->name('frontend.login');
// Route::view('/user-register', 'frontend.register')->name('frontend.register');
Route::view('/user-account', 'frontend.my-account')->name('frontend.user-account');
