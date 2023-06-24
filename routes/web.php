<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKosController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemilikKosController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\UserKosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DaftarKosController;
use App\Http\Controllers\FormPelangganController;
use App\Http\Controllers\FormPembayaranController;

use App\Http\Controllers\DetailKosController;
use App\Http\Controllers\FormDataKosController;
use App\Http\Controllers\FormPemilikKosController;
use App\Http\Controllers\FrontRiwayatPesananController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\SyaratController;

use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    Alert::success('Success Title', 'Success Message');
    return view('welcome');
}); */
Route::get('/', function () {
    return view('front');
});

// Route Front


// Route Front Form
Route::group(['middleware' => ['auth']], function() {

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/daftar_kos', function () {
    return view('daftar_kos');
});

Route::get('/form_pelanggan', function () {
    return view('form_pelanggan');
});

Route::get('/form_pembayaran', function () {
    return view('form_pembayaran');
}); 



Route::get('/form_datakos', function () {
    return view('form_datakos');
});
Route::get('/detail_kos', function () {
    return view('detail_kos');
});
Route::get('/form_pemilikkos', function () {
    return view('form_pemilikkos');
});
Route::get('/front_riwayat_pesanan', function () {
    return view('front_riwayat_pesanan');
});
Route::get('/info', function () {
    return view('info');
});
Route::get('/syarat', function () {
    return view('syarat');
});
});

// Route front pelanggan dan pemilik kos
Route::get('/form_pembayaran/create', [FormPembayaranController::class, 'create']);
Route::post('/form_pembayaran/store', [FormPembayaranController::class, 'store']);

Route::get('/form_pelanggan/create', [FormPelangganController::class, 'create']);
Route::post('/form_pelanggan/store', [FormPelangganController::class, 'store']);


//Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact/store', [ContactController::class, 'store']);


// Route Admin
Route::group(['middleware' => ['auth', 'peran:admin']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        //Route::prefix('admin')->group(function () {
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
        Route::get('/pelanggan/exportexcel', [PelangganController::class, 'exportExcel']);
        Route::post('/pelanggan/importexcel', [PelangganController::class, 'importExcel']);

       

    
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
        Route::get('/pemilik_kos/exportexcel/', [PemilikKosController::class, 'exportExcel']);
        Route::post('/pemilik_kos/importexcel', [PemilikKosController::class, 'importExcel']);
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
        //route user kos
        Route::get('/user_kos', [UserKosController::class, 'index']);
        Route::get('/user_kos/create', [UserKosController::class, 'create']);
        Route::post('/user_kos/store', [UserKosController::class, 'store']);
        Route::get('/user_kos/edit/{id}', [UserKosController::class, 'edit']);
        Route::post('/user_kos/update', [UserKosController::class, 'update']);
        Route::get('/user_kos/show/{id}', [UserKosController::class, 'show']);
        Route::get('/user_kos/delete/{id}', [UserKosController::class, 'destroy']);
        Route::get('/user_kos/user_kosPDF', [UserKosController::class, 'user_kosPDF']);
        Route::get('user_kos/exportexcel', [UserKosController::class, 'exportExcel']);
        Route::post('/user_kos/importexcel', [UserKosController::class, 'importExcel']);
        //route user
        Route::get('/user', [UserController::class, 'index']);
    });
});
Auth::routes();
Route::get('/after_register', function () {
    return view('after_register');
});
Route::get('/acces_denied2', function () {
    return view('admin/acces_denied');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route REST API
// Data Kos
Route::get('/data_kos_api', [DataKosController::class, 'apiDataKos']);
Route::get('/data_kos_api/{id}', [DataKosController::class, 'apiDataKosDetail']);
//Pemilik Kos
Route::get('/pemilik_kos_api', [PemilikKosController::class, 'apiPemilikKos']);
Route::get('/pemilik_kos_api/{id}', [PemilikKosController::class, 'apiPemilikKosDetail']);
// Pelanggan
Route::get('/pelangganapi', [PelangganController::class, 'apiPelanggan']);
Route::get('/pelangganapi/{id}', [PelangganController::class, 'apiPelangganDetail']);
// Pembayaran
Route::get('/pembayaranapi', [PembayaranController::class, 'apiPembayaran']);
Route::get('/pembayaranapi/{id}', [PembayaranController::class, 'apiPembayaranDetail']);
//Riwayat Pesanan
Route::get('/riwayat_pesanan_api', [RiwayatPesananController::class, 'apiRiwayatPesanan']);
Route::get('/riwayat_pesanan_api/{id}', [RiwayatPesananController::class, 'apiRiwayatPesananDetail']);
