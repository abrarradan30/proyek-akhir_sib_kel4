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
            'no_kwitansi' => 'required|max:45',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'bukti' => 'required',
        ],
        [
            'no_kwitansi.required' => 'Nomor Kwitansi Wajib Diisi ',
            'no_kwitansi.max' => 'Nomor Kwitansi Maksimal 45 karakter ',
            'tanggal.required'=> 'Tanggal Wajib Diisi',
            'jumlah.required'=> 'Jumlah Wajib Diisi',
            'bukti.required'=> 'Bukti Pembayaran Wajib Diisi',
        ]
        );

        DB::table('pembayaran')->insert([
            'no_kwitansi' => $request->no_kwitansi,
            'tanggal'=> $request->tanggal,
            'jumlah'=> $request->jumlah,
            'bukti'=> $request->bukti,
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
        $ar_status = ['lunas', 'belum lunas'];

        return view('admin.pembayaran.edit', compact('pembayaran','ar_status'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $request->validate([
            'no_kwitansi' => 'required|max:45',
            'tanggal'=> 'required',
            'jumlah'=> 'required',
            'bukti'=> 'required',
        ]);
        //Buat prose edit form
        DB::table('pembayaran')->where('id', $request->id)->update([
            'no_kwitansi'=> $request->no_kwitansi,
            'tanggal'=> $request->tanggal,
            'jumlah'=> $request->jumlah,
            'bukti'=> $request->bukti,
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
