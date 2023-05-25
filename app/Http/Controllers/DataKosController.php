<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKos;
use App\Models\PemilikKos;
// use DB;
use Illuminate\Support\Facades\DB;

class DataKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
            $data_kos = DB::table('data_kos')
            ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
            ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
            ->get(); 

            return view('admin.data_kos.index', compact('data_kos'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pemilik_kos = DB::table('pemilik_kos')->get();
        $data_kos = DB::table('data_kos')
        ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
        ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
        ->get(); 

        return view('admin.data_kos.create', compact('data_kos', 'pemilik_kos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if(!empty($request->gambar)){
            $fileName = 'gambar-'.$request->id.'.'.$request->gambar->extension();
            $request->gambar->move(public_path('admin/image'), $fileName);
        }else{
            $fileName= '';
        }
        DB::table('data_kos')->insert([
            'nama_kos'       => $request->nama_kos,
            'no_kamar'       => $request->no_kamar,
            'jenis_kos'      => $request->jenis_kos,
            'fasilitas'      => $request->fasilitas,
            'luas_ruang'     => $request->luas_ruang,
            'gambar'         => $fileName,
            'harga'          => $request->harga,
            'deskripsi'      => $request->deskripsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan'      => $request->kecamatan,
            'jalan'          => $request->jalan,
            'kode_pos'       => $request->kode_pos,
            'telepon'        => $request->telepon,
            'pemilik_kos_id' => $request->pemilik_kos_id,
        ]);
        return redirect('admin/data_kos');
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
    public function edit($id)
    {
        //Query builder
        $pemilik_kos = DB::table('pemilik_kos')->get();
        $data_kos = DB::table('data_kos')->where('id', $id)->get();

        return view('admin.data_kos.edit', compact('data_kos', 'pemilik_kos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        if(!empty($request->gambar)){
            $fileName = 'gambar-'.$request->id.'.'.$request->gambar->extension();
            $request->gambar->move(public_path('admin/image'), $fileName);
        }else{
            $fileName= '';
        }
        DB::table('data_kos')->where('id', $request->id)->update([
            'nama_kos'       => $request->nama_kos,
            'no_kamar'       => $request->no_kamar,
            'jenis_kos'      => $request->jenis_kos,
            'fasilitas'      => $request->fasilitas,
            'luas_ruang'     => $request->luas_ruang,
            'gambar'         => $fileName,
            'harga'          => $request->harga,
            'deskripsi'      => $request->deskripsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan'      => $request->kecamatan,
            'jalan'          => $request->jalan,
            'kode_pos'       => $request->kode_pos,
            'telepon'        => $request->telepon,
            'pemilik_kos_id' => $request->pemilik_kos_id,
        ]);
        return redirect('admin/data_kos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
