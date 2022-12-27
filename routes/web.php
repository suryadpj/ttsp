<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/salestool', [App\Http\Controllers\HomeController::class, 'salestool'])->name('salestool');
Route::get('/digitalcontent', [App\Http\Controllers\HomeController::class, 'digitalcontent'])->name('digitalcontent');
Route::get('/promo', [App\Http\Controllers\HomeController::class, 'promo'])->name('promo');
Route::get('/tcare', [App\Http\Controllers\HomeController::class, 'tcare'])->name('tcare');
Route::get('/sosialmedia', [App\Http\Controllers\HomeController::class, 'sosialmedia'])->name('sosialmedia');
Route::get('/salestool', [App\Http\Controllers\HomeController::class, 'salestool'])->name('salestool');
