<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('post/create', [PostController::class, 'create']);
Route::get('post/edit/{post}', [PostController::class, 'edit']);
Route::put('post/update/{post}', [PostController::class, 'update']);
Route::delete('post/delete/{post}', [PostController::class, 'destroy']);
Route::post('post', [PostController::class, 'store']);
Route::get('post/{post}', [PostController::class, 'show']);