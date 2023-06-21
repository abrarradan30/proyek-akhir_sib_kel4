<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPesanan;
use App\Http\Resources\RiwayatPesananResource;
use DB;
use Illuminate\Support\Facades\Validator;

class RiwayatPesananController extends Controller
{
    //
    public function index()
    {
        $riwayat_pesanan = RiwayatPesanan::join('data_kos', 'riwayat_pesanan.data_kos_id', '=', 'data_kos.id')
        ->join('pembayaran', 'riwayat_pesanan.pembayaran_id', '=', 'pembayaran.id')
        ->join('pelanggan', 'riwayat_pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->select('riwayat_pesanan.*', 'pelanggan.nama as nama_pelanggan', 'data_kos.nama_kos',
        'pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 'pembayaran.tanggal as tanggal_pembayaran', 
        'pembayaran.total as total_bayar')
        ->get();

        return new RiwayatPesananResource(true, 'Data Riwayat Pesanan', $riwayat_pesanan);
    }

    public function show()
    {
    $riwayat_pesanan = RiwayatPesanan::join('data_kos', 'riwayat_pesanan.data_kos_id', '=', 'data_kos.id')
        ->join('pembayaran', 'riwayat_pesanan.pembayaran_id', '=', 'pembayaran.id')
        ->join('pelanggan', 'riwayat_pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->select('riwayat_pesanan.*', 'pelanggan.nama as nama_pelanggan', 'data_kos.nama_kos',
        'pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 'pembayaran.tanggal as tanggal_pembayaran', 
        'pembayaran.total as total_bayar')
        ->where('riwayat_pesanan.id', $id)
        ->get();

        return new RiwayatPesananResource(true, 'Detail Riwayat Pesanan', $riwayat_pesanan);
    }    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'no_kwitansi' => 'required|max:10',
            'tanggal' => 'required',
            'status' => 'required',
            'data_kos_id' => 'required|integer',
            'pembayaran_id' => 'required|integer',
            'pelanggan_id' => 'required|integer', 
        ]);
        if($validator->fails()) {
            return response()->join($validator->$errors(), 442);
        }
        $riwayat_pesanan = RiwayatPesanan::create([
            'no_kwitansi' => $request->no_kwitansi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'data_kos_id' => $request->data_kos_id,
            'pembayaran_id' => $request->pembayaran_id,
            'pelanggan_id' => $request->pelanggan_id,
        ]);
        return new RiwayatPesananResource(true, 'Data berhasil diinputkan', $riwayat_pesanan);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'no_kwitansi' => 'required|max:10',
            'tanggal' => 'required',
            'status' => 'required',
            'data_kos_id' => 'required|integer',
            'pembayaran_id' => 'required|integer',
            'pelanggan_id' => 'required|integer', 
        ]);
        if($validator->fails()) {
            return response()->join($validator->$errors(), 442);
        }
        $riwayat_pesanan = RiwayatPesanan::whereId($id)->update([
            'no_kwitansi' => $request->no_kwitansi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'data_kos_id' => $request->data_kos_id,
            'pembayaran_id' => $request->pembayaran_id,
            'pelanggan_id' => $request->pelanggan_id,
        ]);
        return new RiwayatPesananResource(true,'Data Riwayat Pesanan Berhasil Diubah!', $riwayat_pesanan);      
    }

    public function destroy($id)
    {
        $riwayat_pesanan = RiwayatPesanan::where($id)->first();
        $riwayat_pesanan->delete();
        return new RiwayatPesananResource(true, 'Data riwayat pesanan berhasi dihapus', $riwayat_pesanan);
    }
}
