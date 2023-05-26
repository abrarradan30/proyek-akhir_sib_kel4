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

Route::prefix('admin')->group(function () {
    // route data kos
    Route::get('/data_kos', [DataKosController::class, 'index']);
    Route::get('/data_kos/create', [DataKosController::class, 'create']);
    Route::post('/data_kos/store', [DataKosController::class, 'store']);
    Route::get('/data_kos/edit/{id}', [DataKosController::class, 'edit']);
    Route::post('/data_kos/update', [DataKosController::class, 'update']);
    //route pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/create', [PelangganController::class, 'create']);
    Route::post('/pelanggan/store', [PelangganController::class, 'store']);
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit']);
    Route::post('/pelanggan/update', [PelangganController::class, 'update']);
    Route::post('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);
    // route pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
    Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
    Route::post('/pembayaran/update', [PembayaranController::class, 'update']);
    //route pemilik kos
    Route::get('/pemilik_kos', [PemilikKosController::class, 'index']);
    Route::get('/pemilik_kos/create', [PemilikKosController::class, 'create']);
    Route::post('/pemilik_kos/store', [PemilikKosController::class, 'store']);
    Route::get('/pemilik_kos/edit/{id}', [PemilikKosController::class, 'edit']);
    Route::post('/pemilik_kos/update', [PemilikKosController::class, 'update']);
    Route::get('/pemilik_kos/show/{id}', [PemilikKosController::class, 'show']);
    Route::get('/pemilik_kos/delete/{id}', [PemilikKosController::class, 'destroy']);
    //route riwayat pesanan
    Route::get('/riwayat_pesanan', [RiwayatPesananController::class, 'index']);
    Route::get('/riwayat_pesanan/create', [RiwayatPesananController::class, 'create']);
    Route::post('/riwayat_pesanan/store', [RiwayatPesananController::class, 'store']);
    Route::get('/riwayat_pesanan/edit/{id}', [RiwayatPesananController::class, 'edit']);
    Route::post('/riwayat_pesanan/update', [RiwayatPesananController::class, 'update']);
    //route user
    Route::get('/user', [UserKosController::class, 'index']);
    Route::get('/user/create', [UserKosController::class, 'create']);
    Route::post('/user/store', [UserKosController::class, 'store']);
    Route::get('/user/edit/{id}', [UserKosController::class, 'edit']);
    Route::post('/user/update', [UserKosController::class, 'update']);
});
