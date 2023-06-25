<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\RiwayatPesanan;

class FrontRiwayatPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ar_riwayat_pesanan = RiwayatPesanan::join('data_kos', 'riwayat_pesanan.data_kos_id', '=', 'data_kos.id')
        ->join('pembayaran', 'riwayat_pesanan.pembayaran_id', '=', 'pembayaran.id')
        ->join('pelanggan', 'riwayat_pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->select('riwayat_pesanan.*', 'pelanggan.nama as nama_pelanggan', 'data_kos.nama_kos',
        'pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 'pembayaran.tanggal as tanggal_pembayaran', 
        'pembayaran.total as total_bayar')
        // ->groupBy('data_kos.nama_kos')
        // ->take(6)
        ->get();

        $ar_riwayat_pesanan = RiwayatPesanan::all();

        return view('front_riwayat_pesanan', compact('ar_riwayat_pesanan'));
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
        $riwayat_pesanan = RiwayatPesanan::join('data_kos', 'riwayat_pesanan.data_kos_id', '=', 'data_kos.id')
        ->join('pembayaran', 'riwayat_pesanan.pembayaran_id', '=', 'pembayaran.id')
        ->join('pelanggan', 'riwayat_pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->select('riwayat_pesanan.*', 'pelanggan.nama as nama_pelanggan', 'data_kos.nama_kos', 'data_kos.harga',
        'pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 'pembayaran.tanggal as tanggal_pembayaran', 
        'pembayaran.total as total_bayar')
        ->where('riwayat_pesanan.id', $id)
        ->get();

        return view('front_riwayat_pesanan', compact('riwayat_pesanan'));
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
