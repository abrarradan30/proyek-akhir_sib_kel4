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
Route::prefix('admin')->group(function(){
// route data kos
Route::get('/data_kos',[DataKosController::class, 'index']);
Route::get('/data_kos/create',[DataKosController::class, 'create']);
Route::post('/data_kos/store', [DataKosController::class, 'store']);
//route pelanggan
Route::get('/pelanggan',[PelangganController::class, 'index']);
// route pembayaran
Route::get('/pembayaran',[PembayaranController::class, 'index']);
Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
Route::post('/pembayaran/update/', [PembayaranController::class, 'update']);

//route pemilik kos
Route::get('/pemilik_kos',[PemilikKosController::class, 'index']);
//route riwayat pesanan
Route::get('/riwayat_pesanan',[RiwayatPesananController::class, 'index']);
//route user
Route::get('/user',[UserKosController::class, 'index']);
});