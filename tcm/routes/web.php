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
Route::get('/homesales', [App\Http\Controllers\HomeController::class, 'homesales'])->name('homesales');
Route::get('/homegr', [App\Http\Controllers\HomeController::class, 'homegr'])->name('homegr');
Route::get('/homebp', [App\Http\Controllers\HomeController::class, 'homebp'])->name('homebp');

Route::resource('formkpi', App\Http\Controllers\KpiController::class);
Route::post('/submitkpi', [App\Http\Controllers\KpiController::class, 'store'])->name('submitkpi');
Route::get('/formkpiaftersales', [App\Http\Controllers\KpiController::class, 'createaftersales'])->name('kpiaftersales');
Route::get('/formkpivehdev', [App\Http\Controllers\KpiController::class, 'createvehdev'])->name('kpivehicledelivery');
Route::get('/formkpisalesv2', [App\Http\Controllers\KpiController::class, 'createsalesv2'])->name('kpisalesv2');
Route::get('/formkpiaftersalesv2', [App\Http\Controllers\KpiController::class, 'createaftersalesv2'])->name('kpiaftersalesv2');
Route::get('/formkpitradeinv2', [App\Http\Controllers\KpiController::class, 'createtradeinv2'])->name('kpitradeinv2');

Route::resource('checksheet', App\Http\Controllers\ChechsheetController::class);
Route::get('checksheetext/createmingguan', [App\Http\Controllers\ChechsheetController::class, 'createmingguan'])->name('checksheet.createmingguan');

Route::resource('summaryreport', App\Http\Controllers\SummaryReportController::class);
Route::get('/summaryreportsearch', [App\Http\Controllers\SummaryReportController::class, 'summaryreportsearch'])->name('summaryreportsearch')->middleware('auth');

Route::get('/formkpiupload', [App\Http\Controllers\HomeController::class, 'formkpiupload'])->name('formkpiupload');
Route::get('/kpireport', [App\Http\Controllers\HomeController::class, 'kpireport'])->name('kpireport');
