<?php

use App\Http\Controllers\barangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\userController;
use App\Http\Controllers\roleController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layout.base');
});


Route::prefix('/pertemuan2')->group(function(){
    Route::resource('/crud-barang', barangController::class)->parameters(['crud-barang' => 'barang']);
    Route::resource('/crud-kategori', KategoriController::class)->parameters(['crud-kategori' => 'kategori']);
    Route::resource('/crud-role', roleController::class)->parameters(['crud-role' => 'role']);
    Route::resource('/crud-user', userController::class)->parameters(['crud-user' => 'user']);
});

Route::fallback(function () {
    return redirect('/');
});