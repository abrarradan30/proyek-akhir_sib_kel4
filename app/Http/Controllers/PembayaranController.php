<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use PDF;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PembayaranImport;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builder
        $pembayaran = DB::table('pembayaran')->get();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'durasi_sewa' => 'required',
            'jumlah_kamar' => 'required|integer',
            'tanggal' => 'required',
            'total' => 'required',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,gif,svg|max:2048',
        ],
        [
            'durasi_sewa.required' => 'Durasi sewa wajib diisi',
            'jumlah_kamar.required' => 'Jumlah kamar wajib diisi',
            'tanggal.required'=> 'Tanggal Wajib Diisi',
            'total.required'=> 'Total Bayar Wajib Diisi',
            'bukti.required'=> 'Bukti Pembayaran Wajib Diisi',
        ]
        );
        //
        if (!empty($request->bukti)) {
            $fileName = 'bukti-' . $request->id . '.' . $request->bukti->extension();
            $request->bukti->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = '';
        }
        DB::table('pembayaran')->insert([
            'durasi_sewa' => $request->durasi_sewa,
            'jumlah_kamar' => $request->jumlah_kamar,
            'tanggal'=> $request->tanggal,
            'total'=> $request->total,
            'bukti'=> $fileName,
        ]);

        Alert::success('Pembayaran', 'Berhasil menambahkan pembayaran');
        return redirect('admin/pembayaran');
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        //
        $pembayaran = DB::table('pembayaran')->where('id', $id)->get();

        return view('admin.pembayaran.detail', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //arahkan ke file edit yang ada di pembayaran view
        $pembayaran = DB::table('pembayaran')->where('id', $id)->get();
        $ar_durasi_sewa = ['per bulan', 'per 3 bulan', 'per 6 bulan', 'per tahun'];

        return view('admin.pembayaran.edit', compact('pembayaran', 'ar_durasi_sewa'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $request->validate([
            'durasi_sewa' => 'required',
            'jumlah_kamar' => 'required|integer',
            'tanggal' => 'required',
            'total' => 'required',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,gif,svg|max:2048',
        ]);
        // foto lama apabila mengganti fotonya
        $bukti = DB::table('pembayaran')->select('bukti')->where('id', $request->id)->get();
        foreach ($bukti as $b) {
            $namaFileBuktiLama = $b->bukti;
        }
        //apakah user ingin mengganti foto lama
        if (!empty($request->bukti)) {
        //jika ada foto lama maka hapus dulu fotonya
        if (!empty($py->bukti)) unlink('admin/image/'.$py->bukti);
        //proses ganti foto
            $fileName = 'bukti-'.$request->id.'.'.$request->bukti->extension();
            $request->bukti->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = $namaFileBuktiLama;
        }
        //Buat proses edit form
        DB::table('pembayaran')->where('id', $request->id)->update([
            'durasi_sewa' => $request->durasi_sewa,
            'jumlah_kamar' => $request->jumlah_kamar,
            'tanggal'=> $request->tanggal,
            'total'=> $request->total,
            'bukti'=> $fileName,
        ]);

        Alert::info('Pembayaran', 'Berhasil mengedit pembayaran');
        return redirect('admin/pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('pembayaran')->where('id', $id)->delete();

        return redirect('admin/pembayaran');
        
    }

    public function pembayaranPDF(){
        $pembayaran = Pembayaran::all();
        $pdf = PDF::loadview('admin.pembayaran.pembayaranPDF', ['pembayaran' => $pembayaran])->setPaper('a4','landscape');
        return $pdf->stream();
    }

    public function exportExcel(){
        return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
    }

    public function importExcel(Request $request){
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_excel', $nama_file);
        Excel::import(new PembayaranImport, public_path('/file_excel/'.$nama_file));
        return redirect('admin/pembayaran');
    }
}
