<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKos;
use App\Models\PemilikKos;
use RealRashid\SweetAlert\Facades\Alert;
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
            'telepon'        => 'required|min:12',
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
        ]);
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

        Alert::success('Data Kos', 'Berhasil menambahkan data kos');
        return redirect('admin/data_kos');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data_kos = DB::table('data_kos')
        ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
        ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
        ->where('data_kos.id', $id)
        ->get(); 

        return view('admin.data_kos.detail', compact('data_kos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Query builder
        $pemilik_kos = DB::table('pemilik_kos')->get();
        $data_kos = DB::table('data_kos')->where('id', $id)->get();
        $ar_jenis_kos = ['laki-laki', 'perempuan', 'campur'];
        $ar_kabupaten_kota = ['Kabupaten Malang', 'Kota Malang'];

        return view('admin.data_kos.edit', compact('data_kos', 'pemilik_kos', 'ar_jenis_kos', 'ar_kabupaten_kota'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                'nama_kos'       => 'required|max:50',
                'jenis_kos'      => 'required',
                'fasilitas'      => 'required|max:100',
                'luas_ruang'     => 'required',
                'gambar'         => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
                'harga'          => 'required|numeric',
                'deskripsi'      => 'required|max:100',
                'kabupaten_kota' => 'required',
                'kecamatan'      => 'required|max:50',
                'jalan'          => 'required|max:50',
                'kode_pos'       => 'required|numeric',
                'telepon'        => 'required|min:12',
                'pemilik_kos_id' => 'required',
            ]
        );
        // foto lama apabila mengganti fotonya
        $gambar = DB::table('data_kos')->select('gambar')->where('id', $request->id)->get();
        foreach ($gambar as $g) {
            $namaFileGambarLama = $g->gambar;
        }
        //apakah user ingin mengganti foto lama
        if (!empty($request->gambar)) {
            //jika ada foto lama maka hapus dulu fotonya
            if (!empty($dk->gambar)) unlink('admin/image/' . $dk->gambar);
            //proses ganti foto
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
        
        Alert::info('Data Kos', 'Berhasil mengedit data kos');
        return redirect('admin/data_kos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('data_kos')->where('id', $id)->delete();

        return redirect('admin/data_kos');
    }
}
