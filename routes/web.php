<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
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

Route::get('/', [App\Http\Controllers\AppController::class, 'index'])->name('home');
Route::resource('menus', MenuController::class);
Route::get('/order', [App\Http\Controllers\OrderController::class, 'order'])->name('order');
Route::get('/createOrder', [App\Http\Controllers\OrderController::class, 'createOrder'])->name('createorder');
