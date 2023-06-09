<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKosController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemilikKosController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\UserKosController;
use App\Http\Controllers\DashboardController;

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
    Alert::success('Success Title', 'Success Message');
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    // route data kos
    Route::get('/data_kos', [DataKosController::class, 'index']);
    Route::get('/data_kos/create', [DataKosController::class, 'create']);
    Route::post('/data_kos/store', [DataKosController::class, 'store']);
    Route::get('/data_kos/edit/{id}', [DataKosController::class, 'edit']);
    Route::post('/data_kos/update', [DataKosController::class, 'update']);
    Route::get('/data_kos/show/{id}', [DataKosController::class, 'show']);
    Route::get('/data_kos/delete/{id}', [DataKosController::class, 'destroy']);
    Route::get('/data_kos/data_kosPDF', [DataKosController::class, 'data_kosPDF']);
    Route::get('/data_kos/exportexcel/', [DataKosController::class, 'exportExcel']);
    Route::post('/data_kos/importexcel/', [DataKosController::class, 'importExcel']);
    //route pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/create', [PelangganController::class, 'create']);
    Route::post('/pelanggan/store', [PelangganController::class, 'store']);
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit']);
    Route::post('/pelanggan/update', [PelangganController::class, 'update']);
    Route::get('/pelanggan/show/{id}', [PelangganController::class, 'show']);
    Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);
    Route::get('/pelanggan/pelangganPDF', [PelangganController::class, 'pelangganPDF']);
    Route::get('/pelanggan/pelangganEXCEL', [PelangganController::class, 'pelangganEXCEL']);
    Route::post('/pelanggan/pelangganIMPORT', [PelangganController::class, 'pelangganIMPORT']);
    // route pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
    Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
    Route::post('/pembayaran/update/', [PembayaranController::class, 'update']);
    Route::get('/pembayaran/show/{id}', [PembayaranController::class, 'show']);
    Route::get('/pembayaran/delete/{id}', [PembayaranController::class, 'destroy']);
    Route::get('/pembayaran/pembayaranPDF', [PembayaranController::class, 'pembayaranPDF']);
    Route::get('/pembayaran/exportexcel/', [PembayaranController::class, 'exportExcel']);
    Route::post('/pembayaran/importexcel', [PembayaranController::class, 'importExcel']);
    //route pemilik kos
    Route::get('/pemilik_kos', [PemilikKosController::class, 'index']);
    Route::get('/pemilik_kos/create', [PemilikKosController::class, 'create']);
    Route::post('/pemilik_kos/store', [PemilikKosController::class, 'store']);
    Route::get('/pemilik_kos/edit/{id}', [PemilikKosController::class, 'edit']);
    Route::post('/pemilik_kos/update', [PemilikKosController::class, 'update']);
    Route::get('/pemilik_kos/show/{id}', [PemilikKosController::class, 'show']);
    Route::get('/pemilik_kos/delete/{id}', [PemilikKosController::class, 'destroy']);
    Route::get('/pemilik_kos/pemilik_kosPDF', [PemilikKosController::class, 'pemilik_kosPDF']);
    //route riwayat pesanan
    Route::get('/riwayat_pesanan', [RiwayatPesananController::class, 'index']);
    Route::get('/riwayat_pesanan/create', [RiwayatPesananController::class, 'create']);
    Route::post('/riwayat_pesanan/store', [RiwayatPesananController::class, 'store']);
    Route::get('/riwayat_pesanan/edit/{id}', [RiwayatPesananController::class, 'edit']);
    Route::post('/riwayat_pesanan/update', [RiwayatPesananController::class, 'update']);
    Route::get('/riwayat_pesanan/show/{id}', [RiwayatPesananController::class, 'show']);
    Route::get('/riwayat_pesanan/delete/{id}', [RiwayatPesananController::class, 'destroy']);
    Route::get('/riwayat_pesanan/riwayat_pesananPDF', [RiwayatPesananController::class, 'riwayat_pesananPDF']);
    Route::get('riwayat_pesanan/exportexcel', [RiwayatPesananController::class, 'exportExcel']);
    Route::post('/riwayat_pesanan/importexcel', [RiwayatPesananController::class, 'importExcel']);
    //route user
    Route::get('/user', [UserKosController::class, 'index']);
    Route::get('/user/create', [UserKosController::class, 'create']);
    Route::post('/user/store', [UserKosController::class, 'store']);
    Route::get('/user/edit/{id}', [UserKosController::class, 'edit']);
    Route::post('/user/update', [UserKosController::class, 'update']);
    Route::get('/user/show/{id}', [UserKosController::class, 'show']);
    Route::get('/user/delete/{id}', [UserKosController::class, 'destroy']);
    Route::get('/user/userPDF', [UserKosController::class, 'userPDF']);
    Route::get('user/exportexcel', [UserKosController::class, 'exportExcel']);
    Route::post('/user/importexcel', [UserKosController::class, 'importExcel']);
});
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
