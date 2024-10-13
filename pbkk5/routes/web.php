<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
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
    Route::get('/siswa/create', [SiswaController::class,'create'])->name('siswa.create');
    Route::post('/siswa',[SiswaController::class,'store'])->name('siswa.store');
    Route::get('/siswa/{siswa}/edit', [SiswaController::class,'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswa}', [SiswaController::class,'update'])->name('siswa.update');
    Route::delete('/siswa/{siswa}', [SiswaController::class,'destroy'])->name('siswa.destroy');

    Route::get('/kelas/create', [KelasController::class,'create'])->name('kelas.create');
    Route::post('/kelas',[KelasController::class,'store'])->name('kelas.store');
    Route::put('/kelas/{kelas}', [KelasController::class,'update'])->name('kelas.update');
    Route::get('/kelas/{kelas}/edit', [KelasController::class,'edit'])->name('kelas.edit');
    Route::delete('/kelas/{kelas}', [KelasController::class,'destroy'])->name('kelas.destroy');

    Route::get('/guru/create', [GuruController::class,'create'])->name('guru.create');
    Route::post('/guru',[GuruController::class,'store'])->name('guru.store');
    Route::put('/guru/{guru}', [GuruController::class,'update'])->name('guru.update');
    Route::get('/guru/{guru}/edit', [GuruController::class,'edit'])->name('guru.edit');
    Route::delete('/guru/{guru}', [GuruController::class,'destroy'])->name('guru.destroy');
});

    Route::get('/siswa', [SiswaController::class,'index'])->name('siswa.index');
    Route::get('/siswa/{siswa}', [SiswaController::class,'show'])->name('siswa.show');
    Route::get('/kelas', [KelasController::class,'index'])->name('kelas.index');
    Route::get('/kelas/{kelas}', [KelasController::class,'show'])->name('kelas.show');
    Route::get('/guru', [GuruController::class,'index'])->name('guru.index');
    Route::get('/guru/{guru}', [GuruController::class,'show'])->name('guru.show');

