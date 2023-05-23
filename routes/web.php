<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKosController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemilikKosController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\UserKosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/data_kos',[DataKosController::class, 'index']);
Route::get('/pelanggan',[PelangganController::class, 'index']);
Route::get('/pembayaran',[PembayaranController::class, 'index']);
Route::get('/pemilik_kos',[PemilikKosController::class, 'index']);
Route::get('/riwayat_pesanan',[RiwayatPesananController::class, 'index']);
Route::get('/user',[UserKosController::class, 'index']);