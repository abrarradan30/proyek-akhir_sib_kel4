<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// API pelanggan

// API pembayaran

// API pemilik kos

// API riwayat pesanan
Route::get('/riwayat_pesanan', [RiwayatPesananController::class, 'index']);
Route::get('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'show']);
Route::post('/riwayat_pesanan-create', [RiwayatPesananController::class, 'store']);
Route::put('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'update']);
Route::delete('/riwayat_pesanan/{id}', [RiwayatPesananController::class, 'destroy']);