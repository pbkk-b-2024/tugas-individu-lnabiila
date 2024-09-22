<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pertemuan1Controller;

Route::get('/', function(){
    return view('layout.base');
});

Route::prefix('/Tugas1')->group(function(){
 Route::get('/ganjilgenap',[Pertemuan1Controller::class,'genapGanjil'])->name('genap-ganjil');
 Route::get('/fibonacci',[Pertemuan1Controller::class,'fibonacci'])->name('fibonacci');
 Route::get('/prima', [Pertemuan1Controller::class, 'bilanganPrima'])->name('bilangan-prima');
 
 Route::get('/param', fn() => view('tugas1.param'))->name('param');
 Route::get('/param/{param1}', [Pertemuan1Controller::class, 'param1'])->name('param1');
 Route::get('/param/{param1}/{param2}', [Pertemuan1Controller::class, 'param2'])->name('param2');

 Route::get('/basicrouting', function () {
    return view('tugas1.basic-routing');
 })->name('basic-routing');

 Route::get('/namedroutes', function () {
    return view('tugas1.named-routes');
 })->name('named-routes');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/routegroups', function () {
    return view('tugas1.route-groups');
})->name('route-groups');

Route::get('/fallbackroutes', function () {
    return view('tugas1.fallback-routes');
})->name('fallback-routes');

Route::fallback(function () {
    return response()->view('tugas1.404', [], 404);
});

Route::get('/viewroutes', function () {
    return view('tugas1.view-routes');
})->name('view-routes');

Route::view('/welcome', 'tugas1.welcome', ['name' => 'Lana']);