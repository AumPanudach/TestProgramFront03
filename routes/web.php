<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart/view' , [CartController::class,'viewCart']);
Route::get('/cart/add/{id}',[CartController::class,'addToCart']);
Route::get('/cart/delete/{id}',[CartController::class,'deleteCart']);
Route::get('/cart/update/{id}/{qty}',[CartController::class,'updateCart']);
Route::get('/cart/checkout',[CartController::class,'checkout']);
Route::get('/cart/complete',[CartController::class,'complete']);
Route::get('/cart/finish',[CartController::class,'finish_order']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('home');
