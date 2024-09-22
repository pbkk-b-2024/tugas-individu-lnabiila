<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class,'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class,'destroy'])->name('product.destroy');

    Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('/category',[CategoryController::class,'store'])->name('category.store');
    Route::put('/category/{category}', [CategoryController::class,'update'])->name('category.update');
    Route::get('/category/{category}/edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::delete('/category/{category}', [CategoryController::class,'destroy'])->name('category.destroy');
});

    Route::get('/product', [ProductController::class,'index'])->name('product.index');
    Route::get('/product/{product}', [ProductController::class,'show'])->name('product.show');
    Route::get('/category', [CategoryController::class,'index'])->name('category.index');
    Route::get('/category/{category}', [CategoryController::class,'show'])->name('category.show');

