<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKos;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\PemilikKos;
use App\Models\RiwayatPesanan;
use App\Models\UserKos;

use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // diarahkan ke view dashboard
        $data_kos = DataKos::count();
        $pelanggan = Pelanggan::count();
        $pembayaran = Pembayaran::count();
        $pemilik_kos = PemilikKos::count();
        $riwayat_pesanan = RiwayatPesanan::count();
        $user = UserKos::count();
        $ar_role = DB::table('user')
        ->selectRaw('role, count(role) as jumlah')
        ->groupBy('role')
        ->get();
        $ar_jenis_kos = DB::table('data_kos')
        ->selectRaw('jenis_kos, count(jenis_kos) as jumlah')
        ->groupBy('jenis_kos')
        ->get();

        return view('admin.dashboard', compact('data_kos', 'pelanggan', 'pembayaran', 
        'pemilik_kos', 'riwayat_pesanan', 'user', 'ar_role', 'ar_jenis_kos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
