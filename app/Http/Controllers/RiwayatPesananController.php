<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPesanan;
use App\Models\DataKos;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use PDF;
use App\Exports\RiwayatPesananExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RiwayatPesananImport;

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
        ->select('riwayat_pesanan.*', 'pelanggan.nama as nama_pelanggan', 'data_kos.nama_kos',
        'pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 'pembayaran.tanggal as tanggal_pembayaran', 
        'pembayaran.total as total_bayar')
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
        ->select('riwayat_pesanan.*', 'pelanggan.nama as nama_pelanggan', 'data_kos.nama_kos',
        'pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 'pembayaran.tanggal as tanggal_pembayaran', 
        'pembayaran.total as total_bayar')
        ->get();

        return view('admin.riwayat_pesanan.create', compact('riwayat_pesanan','data_kos','pelanggan','pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_kwitansi' => 'required|max:10',
            'tanggal' => 'required',
            'status' => 'required',
            'data_kos_id' => 'required|integer',
            'pembayaran_id' => 'required|integer',
            'pelanggan_id' => 'required|integer',
        ],
        [
            'no_kwitansi.required' => 'No kwitansi wajib diisi',
            'no_kwitansi.max' => 'No kwitansi maksimal 10 karakter',
            'tanggal.required' => 'Tanggal wajib diisi',
            'status.required' => 'Status pembayaran jumlah bayar wajib diisi',
            'pelanggan_id.required' => 'Nama pelanggan wajib diisi',
            'data_kos_id.required' => 'Nama kos wajib diisi',
            'pembayaran_id.required' => 'Durasi sewa wajib diisi',
            'pembayaran_id.required' => 'Jumlah kamar wajib diisi',
            'pembayaran_id.required' => 'Tanggal wajib diisi',
            'pembayaran_id.required' => 'Total pembayaran wajib diisi',
        ]
        );
        //
        DB::table('riwayat_pesanan')->insert([
            'no_kwitansi' => $request->no_kwitansi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
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
        ->select('riwayat_pesanan.*', 'pelanggan.nama as nama_pelanggan', 'data_kos.nama_kos',
        'pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 'pembayaran.tanggal as tanggal_pembayaran', 
        'pembayaran.total as total_bayar')
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
        $ar_status = ['lunas', 'belum lunas'];
        return view('admin.riwayat_pesanan.edit', compact('riwayat_pesanan','data_kos','pelanggan','pembayaran','ar_status'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $request->validate([
            'no_kwitansi' => 'required|max:10',
            'tanggal' => 'required',
            'status' => 'required',
            'data_kos_id' => 'required|integer',
            'pembayaran_id' => 'required|integer',
            'pelanggan_id' => 'required|integer',
        ]);
        //
        DB::table('riwayat_pesanan')->where('id', $request->id)->update([
            'no_kwitansi' => $request->no_kwitansi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'status' => $request->status,
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
    // fungsi export PDF
    public function riwayat_pesananPDF()
    {
        $riwayat_pesanan = RiwayatPesanan::all();
        $pdf = PDF::loadView('admin.riwayat_pesanan.riwayat_pesananPDF', ['riwayat_pesanan' => $riwayat_pesanan])->setPaper('a4', 'landscape');
        //return $pdf->download('data_riwayat_pesanan.pdf'); 
        return $pdf->stream('data_riwayat_pesanan.pdf');
    }
    //fungsi export-importExcel
    public function exportExcel()
    {
        return Excel::download(new RiwayatPesananExport, 'riwayat_pesanan.xlsx');
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_excel', $nama_file);
        Excel::import(new RiwayatPesananImport, public_path('/file_excel/'.$nama_file));
        return redirect('admin/riwayat_pesanan');
    }
}
