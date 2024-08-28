<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsUserAdmin;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::middleware('IsUserAdmin')->group(function(){
//     Route::get('/admin','admin.index')->name('admin.index');


Route::middleware([IsUserAdmin::class, 'auth'])->group(function(){
    Route::view('/admin', 'admin.index')->name('admin');
    Route::get('/admin/products/', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/admin/product/add', [ProductController::class, 'create'])->name('admin.product.add');
    Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');

    Route::get('/admin/brands/', [BrandController::class, 'index'])->name('admin.brands');
    Route::get('/admin/brands/add', [BrandController::class, 'create'])->name('admin.brands.add');
    Route::post('/admin/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
    Route::post('/admin/brands/{brand}/update', [BrandController::class, 'update'])->name('admin.brands.update');
    Route::delete('/admin/brands/{brand}/destroy', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    Route::get('/admin/cateogry/all', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/admin/cateogry/add', [CategoryController::class, 'create'])->name('admin.category.add');
    Route::post('/admin/cateogry/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/cateogry/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::delete('/admin/cateogry/{category}/delete', [CategoryController::class, 'destroy'])->name('admin.category.delete');
});

require __DIR__.'/auth.php';
