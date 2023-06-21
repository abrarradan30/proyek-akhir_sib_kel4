<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RiwayatPesananController;
use App\Http\Controllers\Api\DataKosController;

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

// API pembayaran

// API pemilik kos

// API riwayat pesanan
Route::get('/riwayat_pesanan', [RiwayatPesananController::class, 'index']);
Route::get('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'show']);
Route::post('/riwayat_pesanan-create', [RiwayatPesananController::class, 'store']);
Route::put('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'update']);
Route::delete('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'destroy']);