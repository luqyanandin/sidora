<?php

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\AkunController;
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

Route::get('/', [HomeController::class,'index']);

Route::view('/dashboard','admin.v_dashboard');
// Route::view('/dokumen','admin.v_dokumen');
Route::get('/dokumen',[DokumenController::class,'index'])->name('dokumen');
Route::get('/dokumen/add',[DokumenController::class,'add']);
Route::get('/dokumen/detail/{id_dokumen}',[DokumenController::class,'detail']);
Route::post('/dokumen/insert',[DokumenController::class,'insert']);
Route::get('/dokumen/edit/{id_dokumen}',[DokumenController::class,'edit']);
Route::post('/dokumen/update/{id_dokumen}',[DokumenController::class,'update']);
Route::get('/dokumen/delete/{id_dokumen}',[DokumenController::class,'delete']);
//Route::view('/akun','admin.v_akun');
Route::get('/akun',[AkunController::class,'index'])->name('akun');
Route::get('/akun/add',[AkunController::class,'add']);
Route::post('/akun/insert',[AkunController::class,'insert']);
Route::get('/akun/edit/{nip}',[AkunController::class,'edit']);
Route::post('/akun/update/{nip}',[AkunController::class,'update']);
Route::get('/akun/delete/{nip}',[AkunController::class,'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
