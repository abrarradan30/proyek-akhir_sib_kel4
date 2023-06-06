<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPesanan;
use App\Models\DataKos;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class RiwayatPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $riwayat_pesanan = RiwayatPesanan::join('data_kos', 'riwayat_pesanan.data_kos_id', '=', 'data_kos.id')
        ->join('pembayaran', 'riwayat_pesanan.pembayaran_id', '=', 'pembayaran.id')
        ->join('pelanggan', 'riwayat_pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->select('riwayat_pesanan.*', 'data_kos.nama_kos', 'pembayaran.status as status_pembayaran', 'pelanggan.nama as nama_pelanggan')
        ->get();
        return view('admin.riwayat_pesanan.index', compact('riwayat_pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // arahkan ke folder riwayat_pesanan
        $data_kos = DB::table('data_kos')
        ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
        ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
        ->get(); 
        $pelanggan = DB::table('pelanggan')->get();
        $pembayaran = DB::table('pembayaran')->get();
        $riwayat_pesanan = RiwayatPesanan::join('data_kos', 'riwayat_pesanan.data_kos_id', '=', 'data_kos.id')
        ->join('pembayaran', 'riwayat_pesanan.pembayaran_id', '=', 'pembayaran.id')
        ->join('pelanggan', 'riwayat_pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->select('riwayat_pesanan.*', 'data_kos.nama_kos', 'pembayaran.status as status_pembayaran', 'pelanggan.nama as nama_pelanggan')
        ->get();

        return view('admin.riwayat_pesanan.create', compact('riwayat_pesanan','data_kos','pelanggan','pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'durasi_sewa' => 'required|max:10',
            'tanggal' => 'required',
            'jumlah_kamar' => 'required|integer',
            'total' => 'required',
            'data_kos_id' => 'required|integer',
            'pembayaran_id' => 'required|integer',
            'pelanggan_id' => 'required|integer',
        ],
        [
            'durasi_sewa.required' => 'Durasi sewa wajib diisi',
            'durasi_sewa.max' => 'Durasi sewa maksimal 10 karakter',
            'tanggal.required' => 'Tanggal wajib diisi',
            'jumlah_kamar.required' => 'Jumlah kamar wajib diisi',
            'total.required' => 'Total jumlah bayar wajib diisi',
            'data_kos_id.required' => 'Nama kos wajib diisi',
            'pembayaran_id.required' => 'Status pembayaran wajib diisi',
            'pelanggan_id.required' => 'Nama pelanggan wajib diisi',
        ]
        );
        //
        DB::table('riwayat_pesanan')->insert([
            'durasi_sewa' => $request->durasi_sewa,
            'tanggal' => $request->tanggal,
            'jumlah_kamar' => $request->jumlah_kamar,
            'total' => $request->total,
            'data_kos_id' => $request->data_kos_id,
            'pembayaran_id' => $request->pembayaran_id,
            'pelanggan_id' => $request->pelanggan_id,
        ]);

        Alert::success('Riwayat Pesanan', 'Berhasil menambahkan riwayat pesanan');
        return redirect('admin/riwayat_pesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $riwayat_pesanan = RiwayatPesanan::join('data_kos', 'riwayat_pesanan.data_kos_id', '=', 'data_kos.id')
        ->join('pembayaran', 'riwayat_pesanan.pembayaran_id', '=', 'pembayaran.id')
        ->join('pelanggan', 'riwayat_pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->select('riwayat_pesanan.*', 'data_kos.nama_kos', 'pembayaran.status as status_pembayaran', 'pelanggan.nama as nama_pelanggan')
        ->where('riwayat_pesanan.id', $id)
        ->get();

        return view('admin.riwayat_pesanan.detail', compact('riwayat_pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data_kos = DB::table('data_kos')
        ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
        ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
        ->get(); 
        $pelanggan = DB::table('pelanggan')->get();
        $pembayaran = DB::table('pembayaran')->get();
        $riwayat_pesanan = DB::table('riwayat_pesanan')->where('id', $id)->get();
        return view('admin.riwayat_pesanan.edit', compact('riwayat_pesanan','data_kos','pelanggan','pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $request->validate([
            'durasi_sewa' => 'required|max:10',
            'tanggal' => 'required',
            'jumlah_kamar' => 'required|integer',
            'total' => 'required',
            'data_kos_id' => 'required|integer',
            'pembayaran_id' => 'required|integer',
            'pelanggan_id' => 'required|integer',
        ]);
        //
        DB::table('riwayat_pesanan')->where('id', $request->id)->update([
            'durasi_sewa' => $request->durasi_sewa,
            'tanggal' => $request->tanggal,
            'jumlah_kamar' => $request->jumlah_kamar,
            'total' => $request->total,
            'data_kos_id' => $request->data_kos_id,
            'pembayaran_id' => $request->pembayaran_id,
            'pelanggan_id' => $request->pelanggan_id,
        ]);

        Alert::info('Riwayat pesanan', 'Berhasil mengedit riwayat pesanan');
        return redirect('admin/riwayat_pesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('riwayat_pesanan')->where('id', $id)->delete();
        return redirect('admin/riwayat_pesanan');
    }
}
