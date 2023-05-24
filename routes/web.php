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
    Route::get('/data_kos',[DataKosController::class, 'index']);
    
    Route::prefix('pelanggan')
    ->name('pelanggan.')
    ->group(function(){
        Route::get('/',[PelangganController::class,'index'])->name('index');
        Route::get('/create',[PelangganController::class,'create'])->name('create');
        Route::get('/{id}',[PelangganController::class,'edit'])->name('edit');

        Route::post('/',[PelangganController::class,'store'])->name('store');
        Route::put('/',[PelangganController::class,'update'])->name('update');
        Route::delete('/',[PelangganController::class,'destroy'])->name('destroy');
    });
    
    // route pembayaran
    Route::get('/pembayaran',[PembayaranController::class, 'index']);
    //route pemilik kos
    Route::get('/pemilik_kos',[PemilikKosController::class, 'index']);
    //route riwayat pesanan
    Route::get('/riwayat_pesanan',[RiwayatPesananController::class, 'index']);
    //route user
    Route::get('/user',[UserKosController::class, 'index']);
});