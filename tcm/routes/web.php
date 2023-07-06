<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
})->middleware('auth');

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
Route::get('checksheetdata', [App\Http\Controllers\ChechsheetController::class, 'datatable'])->name('checksheet.datatable');
Route::get('checksheetext/createmingguan', [App\Http\Controllers\ChechsheetController::class, 'createmingguan'])->name('checksheet.createmingguan');

Route::resource('summaryreport', App\Http\Controllers\SummaryReportController::class);
Route::get('/summaryreportexcel', [App\Http\Controllers\SummaryReportController::class, 'cetaklaporan'])->name('cetaklaporan')->middleware('auth');
Route::get('/summaryreportsearch', [App\Http\Controllers\SummaryReportController::class, 'summaryreportsearch'])->name('summaryreportsearch')->middleware('auth');


Route::resource('dashboardsales', App\Http\Controllers\DashboardSalesController::class)->middleware('auth');

Route::resource('dashboardgr', App\Http\Controllers\DashboardGRController::class)->middleware('auth');

Route::resource('dashboardbp', App\Http\Controllers\DashboardBPController::class)->middleware('auth');

Route::get('/formkpiupload', [App\Http\Controllers\HomeController::class, 'formkpiupload'])->name('formkpiupload');
Route::get('/kpireport', [App\Http\Controllers\HomeController::class, 'kpireport'])->name('kpireport');


//peraturan
Route::get('/rulesadm', function()
{
    auth()->user()->assignRole('ho'); //memberikan akses
});
Route::get('/cekadm', function()
{
    if(auth()->user()->hasRole('ho')) //cek akses
    {
        return 'oke';
    }
    else
    {
        return 'you dont have access';
    }
});
// Route::get('/remove', function()
// {
//     if(auth()->user()->removeRole('admin')) //hapus akses
//     {
//         return 'oke';
//     }
//     else
//     {
//         return 'you dont have access';
//     }
// });
// Route::get('/sync', function()
// {
//     if(auth()->user()->syncRoles('admin')) //synkron akses
//     {
//         return 'oke';
//     }
//     else
//     {
//         return 'you dont have access';
//     }
// });

// //perijinan
// Route::get('/giveper', function()
// {
//     auth()->user()->givePermissionTo('operasional_approve_vp'); //add permision
// });
Route::get('/cekper', function()
{
    dd(auth()->user()->hasPermissionTo('users_all_div')); //cek permision
});
// Route::get('/delete', function()
// {
//     auth()->user()->revokePermissionTo('pr'); //hapus permision
// });
// // Route::get('/sync', function()
// // {
// //     auth()->user()->syncPermissions(['*data_surat*','*add_surat*','*delete_surat*']); //add permision
// // });
