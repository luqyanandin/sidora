<?php

use App\Http\Controllers\RapatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [DashboardController::class,'index']);
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/dashboard/search',[DashboardController::class,'search'])->name('rapat');
// Route::get('/dashboard',[DashboardController::class,'tabel']);
// Route::view('/dokumen','admin.v_dokumen');
Route::get('/rapat',[RapatController::class,'index'])->name('rapat');
Route::get('/rapat/add',[RapatController::class,'add']);
Route::get('/rapat/detail/{id_rapat}',[RapatController::class,'detail']);
Route::post('/rapat/insert',[RapatController::class,'insert']);
Route::get('/rapat/edit/{id_rapat}',[RapatController::class,'edit']);
Route::post('/rapat/update/{id_rapat}',[RapatController::class,'update']);
Route::get('/rapat/delete/{id_rapat}',[RapatController::class,'delete']);
Route::get('/rapat/dokumen/{id_rapat}',[RapatController::class,'dokumen']);


Route::post('/bahan/insertBahan/{id_rapat}',[DokumenController::class,'insertBahan']);
Route::get('/bahan/deleteBahan/{id_bahan}',[DokumenController::class,'deleteBahan']);

Route::post('/bahan/insertNotulensi/{id_rapat}',[DokumenController::class,'insertNotulensi']);
Route::get('/bahan/deleteNotulensi/{id_notulensi}',[DokumenController::class,'deleteNotulensi']);

Route::post('/bahan/insertUndangan/{id_rapat}',[DokumenController::class,'insertUndangan']);
Route::get('/bahan/deleteUndangan/{id_undangan}',[DokumenController::class,'deleteUndangan']);
// Route::get('/dokumen', [DokumenController::class,'index']);
// Route::view('/akun','admin.v_akun');
Route::get('/akun',[AkunController::class,'index'])->name('akun');
Route::get('/akun/add',[AkunController::class,'add']);
Route::post('/akun/insert',[AkunController::class,'insert']);
Route::get('/akun/edit/{username}',[AkunController::class,'edit']);
Route::post('/akun/update/{username}',[AkunController::class,'update']);
Route::get('/akun/delete/{username}',[AkunController::class,'delete']);

Auth::routes();

Route::get('/home', [DashboardController::class,'index']);


Route::get('admin-page', function() {
    return 'Halaman untuk Admin';
})->middleware('role:admin')->name('admin.page');

Route::get('user-page', function() {
    return 'Halaman untuk User';
})->middleware('role:user')->name('user.page');



Route::get('/charts', 'DashboardController@chart')->name('charts');
