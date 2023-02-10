<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/logout', [LoginController::class, 'logout'])->name('home')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/salestool', [App\Http\Controllers\HomeController::class, 'salestool'])->name('salestool');
Route::get('/mquote', [App\Http\Controllers\HomeController::class, 'mquote'])->name('mquote');
Route::get('/addmquote', [App\Http\Controllers\HomeController::class, 'addmquote'])->name('addmquote');
Route::get('/digitalcontent', [App\Http\Controllers\HomeController::class, 'digitalcontent'])->name('digitalcontent');
Route::get('/promo', [App\Http\Controllers\HomeController::class, 'promo'])->name('promo');
Route::get('/tcare', [App\Http\Controllers\HomeController::class, 'tcare'])->name('tcare');
Route::get('/sosialmedia', [App\Http\Controllers\HomeController::class, 'sosialmedia'])->name('sosialmedia');
Route::get('/salestool', [App\Http\Controllers\HomeController::class, 'salestool'])->name('salestool');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboardadmin'])->name('dashboardadmin');
Route::get('/dashboardnow', [App\Http\Controllers\HomeController::class, 'dashboardfilter5'])->name('dashboardfilter5');
Route::get('/dashboardchartnow', [App\Http\Controllers\HomeController::class, 'dashboardfilter6'])->name('dashboardfilter6');
Route::get('/dashboard/{periode}', [App\Http\Controllers\HomeController::class, 'dashboardfilter1'])->name('dashboardfilter1');
Route::get('/dashboardchart/{periode}', [App\Http\Controllers\HomeController::class, 'dashboardfilter3'])->name('dashboardfilter3');
Route::get('/dashboard/{periode}/{spv}', [App\Http\Controllers\HomeController::class, 'dashboardfilter2'])->name('dashboardfilter2');
Route::get('/dashboardchart/{periode}/{spv}', [App\Http\Controllers\HomeController::class, 'dashboardfilter4'])->name('dashboardfilter4');
Route::get('/dashboard1', [App\Http\Controllers\HomeController::class, 'dashboardadmin1'])->name('dashboardadmin1');
Route::get('/dashboard2', [App\Http\Controllers\HomeController::class, 'dashboardadmin2'])->name('dashboardadmin2');
Route::get('/dashboard3', [App\Http\Controllers\HomeController::class, 'dashboardadmin3'])->name('dashboardadmin3');
Route::get('/dashboard4', [App\Http\Controllers\HomeController::class, 'dashboardadmin4'])->name('dashboardadmin4');
Route::get('/dashboard/{id}/', [App\Http\Controllers\HomeController::class, 'dashboardadminfilter'])->name('dashboardadminfilter');
Route::get('/password/{pass}', [App\Http\Controllers\HomeController::class, 'password'])->name('passmaker');
Route::get('/sidebar', function () {
    return view('sidebar');
});
