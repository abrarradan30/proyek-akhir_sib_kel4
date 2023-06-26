<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataKosController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\PemilikKosController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\RiwayatPesananController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API datakos
Route::get('/data_kos', [DataKosController::class, 'index']);
Route::get('/data_kos/{id}', [DataKosController::class, 'show']);
Route::post('/data_kos-create', [DataKosController::class, 'store']);
Route::put('/data_kos/{id}', [DataKosController::class, 'update']);
Route::delete('/data_kos/{id}', [DataKosController::class, 'destroy']);

// API pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/{id}', [PelangganController::class, 'show']);
Route::post('/pelanggan-create', [PelangganController::class, 'store']);
Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']);

// API pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::get('/pembayaran/{id}', [PembayaranController::class, 'show']);
Route::post('/pembayaran-create', [PembayaranController::class, 'store']);
Route::put('/pembayaran/{id}', [PembayaranController::class, 'update']);
Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy']);

// API pemilik kos
Route::get('/pemilik_kos', [PemilikKosController::class, 'index']);
Route::get('/pemilik_kos/{id}', [PemilikKosController::class, 'show']);
Route::post('/pemilik_kos-create', [PemilikKosController::class, 'store']);
Route::put('/pemilik_kos/{id}', [PemilikKosController::class, 'update']);
Route::delete('/pemilik_kos/{id}', [PemilikKosController::class, 'destroy']);

// API riwayat pesanan
Route::get('/riwayat_pesanan', [RiwayatPesananController::class, 'index']);
Route::get('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'show']);
Route::post('/riwayat_pesanan-create', [RiwayatPesananController::class, 'store']);
Route::put('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'update']);
Route::delete('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'destroy']);

