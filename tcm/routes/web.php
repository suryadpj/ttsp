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

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('formkpi', App\Http\Controllers\KpiController::class);

Route::get('/formkpiupload', [App\Http\Controllers\HomeController::class, 'formkpiupload'])->name('formkpiupload');
Route::get('/kpireport', [App\Http\Controllers\HomeController::class, 'kpireport'])->name('kpireport');
