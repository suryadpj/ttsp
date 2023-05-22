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
})->middleware('auth');;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('formkpi', App\Http\Controllers\KpiController::class);
Route::post('/submitkpi', [App\Http\Controllers\KpiController::class, 'store'])->name('submitkpi');
Route::get('/formkpiaftersales', [App\Http\Controllers\KpiController::class, 'createaftersales'])->name('kpiaftersales');
Route::get('/formkpitradein', [App\Http\Controllers\KpiController::class, 'createtradein'])->name('kpitradein');
Route::get('/formkpisalesv2', [App\Http\Controllers\KpiController::class, 'createsalesv2'])->name('kpisalesv2');
Route::get('/formkpiaftersalesv2', [App\Http\Controllers\KpiController::class, 'createaftersalesv2'])->name('kpiaftersalesv2');
Route::get('/formkpitradeinv2', [App\Http\Controllers\KpiController::class, 'createtradeinv2'])->name('kpitradeinv2');

Route::get('/formkpiupload', [App\Http\Controllers\HomeController::class, 'formkpiupload'])->name('formkpiupload');
Route::get('/kpireport', [App\Http\Controllers\HomeController::class, 'kpireport'])->name('kpireport');
