<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKos;
use App\Models\PemilikKos;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FormDataKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        return view ('form_datakos');
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

            // dd($pemilik_kos);
            return view('form_datakos', compact('pemilik_kos', 'data_kos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'nama_kos'       => 'required|max:50',
                'no_kamar'       => 'required|unique:data_kos|max:10',
                'jenis_kos'      => 'required',
                'fasilitas'      => 'required|max:100',
                'luas_ruang'     => 'required',
                'gambar'         => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
                'harga'          => 'required|numeric',
                'deskripsi'      => 'required|max:100',
                'kabupaten_kota' => 'required',
                'kecamatan'      => 'required|max:50',
                'jalan'          => 'required|max:50',
                'kode_pos'       => 'required|numeric',
                'telepon'        => 'required|max:20',
                'pemilik_kos_id' => 'required',
            ],
            [
                'nama_kos.required'       => 'Nama Kos Wajib Diisi !!!',
                'no_kamar.required'       => 'Nomor Kamar Wajib Diisi !!!',
                'no_kamar.unique'         => 'Nomor Kamar Sudah Ada, Masukkan Nomor Kamar yang Lain !!!',
                'jenis_kos.required'      => 'Jenis Kos Wajib Diisi !!!',
                'fasilitas.required'      => 'Fasilitas Kos Wajib Diisi !!!',
                'luas_ruang.required'     => 'Luas Ruang Wajib Diisi !!!',
                'gambar.required'         => 'Gambar Kos Wajib Diisi !!!',
                'gambar.image'            => 'File Gambar Harus jpg, jpeg, png, svg !!!',
                'harga.required'          => 'Harga Wajib Diisi !!!',
                'deskripsi.required'      => 'Deskripsi Kos Wajib Diisi !!!',
                'kabupaten_kota.required' => 'Kabupaten/Kota Wajib Diisi !!!',
                'kecamatan.required'      => 'Kecamatan Wajib Diisi !!!',
                'jalan.required'          => 'Jalan Wajib Diisi !!!',
                'kode_pos.required'       => 'Kode Pos Wajib Diisi !!!',
                'telepon.required'        => 'Nomor Telepon Pemilik Kos Wajib Diisi !!!',
                'pemilik_kos_id.required' => 'Nama Pemilik Kos Wajib Diisi !!!',
            ]
        );
        if (!empty($request->gambar)) {
            $fileName = 'gambar-' . $request->id . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = '';
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

        Alert::success('Data Kos', 'Berhasil menambahkan data kos');
        return redirect()->back();
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
