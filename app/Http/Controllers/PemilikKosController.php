<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikKos;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Exports\PemilikKosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PemilikKosImport;

class PemilikKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builder
        $pemilik_kos = DB::table('pemilik_kos')->get();
        return view('admin.pemilik_kos.index', compact('pemilik_kos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pemilik_kos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // fungsi untuk mengisi data pada form
        $request->validate(
            [
                'nama'     => 'required|max:45',
                'jk'       => 'required',
                'alamat'   => 'required',
                'telepon'  => 'required',
            ],
            [
                'nama.required'     => 'Nama wajib diisi',
                'nama.max'          => 'Nama maksimal 45 karakter',
                'jk.required'       => 'Jenis kelamin wajib diisi',
                'alamat.required'   => 'Alamat wajib diisi',
                'telepon.required'  => 'Telepon wajib diisi',

            ]
        );
        //fungsi untuk menambahkan pemilik kos
        DB::table('pemilik_kos')->insert([
            'nama'     => $request->nama,
            'jk'       => $request->jk,
            'alamat'   => $request->alamat,
            'telepon'  => $request->telepon,
        ]);

        Alert::success('Pemilik Kos', 'Berhasil menambahkan data pemilik kos');
        return redirect('admin/pemilik_kos');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $pemilik_kos =  DB::table('pemilik_kos')->where('id', $id)->get();
        return view('admin.pemilik_kos.detail', compact('pemilik_kos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //arahkan ke file edit yang ada di pemilik kos view
        $pemilik_kos = DB::table('pemilik_kos')->where('id', $id)->get();
        $ar_jk = ['l', 'p'];

        return view('admin.pemilik_kos.edit', compact('pemilik_kos', 'ar_jk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama'     => 'required|max:45',
            'jk'       => 'required',
            'alamat'   => 'nullable|string|min:10',
            'telepon'  => 'required',
        ]);
        //fungsi untuk menambahkan pemilik kos
        DB::table('pemilik_kos')->where('id', $request->id)->update([
            'nama'     => $request->nama,
            'jk'       => $request->jk,
            'alamat'   => $request->alamat,
            'telepon'  => $request->telepon,
        ]);

        Alert::info('Pemilik Kos', 'Berhasil mengedit data pemilik Kos');
        return redirect('admin/pemilik_kos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('pemilik_kos')->where('id', $id)->delete();
        return redirect('admin/pemilik_kos');
    }

    //ini adalah fungsi percontohan untuk export pdf
    public function pemilik_kosPDF()
    {
        $pemilik_kos = PemilikKos::all();
        $pdf = PDF::loadView('admin.pemilik_kos.pemilik_kosPDF', ['pemilik_kos' => $pemilik_kos])->setPaper('a4', 'landscape');
        // return $pdf->download('data_pemilik_kos.pdf');
        return $pdf->stream();
    }

    //export excel
    public function exportExcel()
    {
        return Excel::download(new PemilikKosExport, 'pemilik_kos.xlsx');
    }

    //import excel
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_excel', $nama_file);
        Excel::import(new PemilikKosImport, public_path('/file_excel/' . $nama_file));
        return redirect('admin/pemilik_kos');
    }

    //API
    public function apiPemilikKos()
    {
        $pemilik_kos = PemilikKos::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data Pemilik Kos',
                'data' => $pemilik_kos
            ],
            200
        );
    }

    public function apiPemilikKosDetail($id)
    {
        $pemilik_kos =  DB::table('pemilik_kos')->where('id', $id)->get();
        if ($pemilik_kos) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Detail Data Pemilik Kos',
                    'data' => $pemilik_kos,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Detail Data Pemilik Kos Tidak Dikenali'
                ],
                404
            );
        }
    }
}
