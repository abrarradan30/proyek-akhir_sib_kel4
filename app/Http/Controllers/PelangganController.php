<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use PDF;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PelangganImport;
use App\Exports\PelangganExport;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builer
        $pelanggan = DB::table('pelanggan')->get();
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // fungsi untuk mengisi data pada form
        $request->validate([
            'nama'    => 'required|max:45',
            'jk'      => 'required',
            'telepon' => 'required',
            'alamat'  => 'required',
        ]);
        [
            'nama.required'    => 'Nama wajib diisi',
            'nama.max'         => 'Nama maksimal 45 karakter',
            'jk.required'      => 'Jenis kelamin wajib diisi',
            'telepon.required' => 'Telepon wajib diisi',
            'alamat.required'  => 'Alamat wajib diisi',

        ];
        DB::table('pelanggan')->insert([
            'nama'    => $request->nama,
            'jk'      => $request->jk,
            'telepon' => $request->telepon,
            'alamat'  => $request->alamat,
        ]);
        
        Alert::success('Pelanggan', 'Berhasil menambahkan pelanggan');
        return redirect('admin/pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = DB::table('pelanggan')->where('id', $id)->get();
        // dd($pelanggan);
        return view('admin.pelanggan.detail', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pelanggan = DB::table('pelanggan')->where('id', $id)->get();
        $ar_jk = ['l', 'p'];
        return view('admin.pelanggan.edit', compact('pelanggan', 'ar_jk'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        //
        $request->validate([
            'nama'    => 'required|max:45',
            'jk'      => 'required',
            'telepon' => 'required',
            'alamat'  => 'required',
        ]);
        [
            'nama.required'    => 'Nama wajib diisi',
            'nama.max'         => 'Nama maksimal 45 karakter',
            'jk.required'      => 'Jenis kelamin wajib diisi',
            'telepon.required' => 'Telepon wajib diisi',
            'alamat.required'  => 'Alamat wajib diisi',

        ];
        DB::table('pelanggan')->where('id', $request->id)->update([
            'nama'    => $request->nama,
            'jk'      => $request->jk,
            'telepon' => $request->telepon,
            'alamat'  => $request->alamat,
        ]);

        Alert::info('Pelanggan', 'Berhasil mengedit pelanggan');
        return redirect('admin/pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('pelanggan')->where('id', $request->id)->delete();
        return redirect('admin/pelanggan');
    }
    public function pelangganPDF()
    {
        $pelanggan = Pelanggan::all();
        $pdf = PDF::loadView('admin.pelanggan.pelangganPDF', ['pelanggan' => $pelanggan])->setPaper('a4', 'landscape');
        //return $pdf->download('data_user.pdf'); 
        return $pdf->stream('data_pelanggan.pdf');
    }
    public function exportExcel() 
    {
        return Excel::download(new PelangganExport, 'pelanggan.xlsx');    
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_excel', $nama_file);
        Excel::import(new PelangganImport, public_path('/file_excel/'.$nama_file));
        return redirect('admin/pelanggan');
        
    }
}
