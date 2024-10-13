<?php

use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('siswa', SiswaController::class);
Route::apiResource('kelas', KelasController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function(){
    return response()->json([
        'message' => 'Welcome to the Laravel API'
    ]);
});

Route::get('/home', [HomeController::class, 'index']);