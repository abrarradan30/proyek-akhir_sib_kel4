<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataKosResource;
use Illuminate\Http\Request;
use App\Models\DataKos;
use App\Http\Resources\PemilikKosResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataKosController extends Controller
{
    //
    public function index()
    {
        $data_kos = DataKos::join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
            ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
            ->get();

        return new DataKosResource(true, 'Data Kos', $data_kos);
    }
    public function show($id)
    {
        $data_kos = DataKos::join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
            ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
            ->where('data_kos.id', $id)
            ->get();

        return new DataKosResource(true, 'Detail Data Kos', $data_kos);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_kos'       => 'required|max:50',
            'no_kamar'       => 'required|unique:data_kos|max:10',
            'jenis_kos'      => 'required',
            'fasilitas'      => 'required|max:100',
            'luas_ruang'     => 'required',
            'harga'          => 'required|numeric',
            'deskripsi'      => 'required|max:100',
            'kabupaten_kota' => 'required',
            'kecamatan'      => 'required|max:50',
            'jalan'          => 'required|max:50',
            'kode_pos'       => 'required|numeric',
            'telepon'        => 'required|max:20',
            'pemilik_kos_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }
        $data_kos = DataKos::create([
            'nama_kos'       => $request->nama_kos,
            'no_kamar'       => $request->no_kamar,
            'jenis_kos'      => $request->jenis_kos,
            'fasilitas'      => $request->fasilitas,
            'luas_ruang'     => $request->luas_ruang,
            'harga'          => $request->harga,
            'deskripsi'      => $request->deskripsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan'      => $request->kecamatan,
            'jalan'          => $request->jalan,
            'kode_pos'       => $request->kode_pos,
            'telepon'        => $request->telepon,
            'pemilik_kos_id' => $request->pemilik_kos_id,
        ]);

        return new DataKosResource(true, 'Data Kos Berhasil Diinput', $data_kos);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'nama_kos'       => 'required|max:50',
                'jenis_kos'      => 'required',
                'fasilitas'      => 'required|max:100',
                'luas_ruang'     => 'required',
                'harga'          => 'required|numeric',
                'deskripsi'      => 'required|max:100',
                'kabupaten_kota' => 'required',
                'kecamatan'      => 'required|max:50',
                'jalan'          => 'required|max:50',
                'kode_pos'       => 'required|numeric',
                'telepon'        => 'required|max:20',
                'pemilik_kos_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 442);
        }
        $data_kos = DataKos::whereId($id)->update([
            'nama_kos'       => $request->nama_kos,
            'no_kamar'       => $request->no_kamar,
            'jenis_kos'      => $request->jenis_kos,
            'fasilitas'      => $request->fasilitas,
            'luas_ruang'     => $request->luas_ruang,
            'harga'          => $request->harga,
            'deskripsi'      => $request->deskripsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan'      => $request->kecamatan,
            'jalan'          => $request->jalan,
            'kode_pos'       => $request->kode_pos,
            'telepon'        => $request->telepon,
            'pemilik_kos_id' => $request->pemilik_kos_id,
        ]);

        return new DataKosResource(true, 'Data Kos Berhasil Diubah', $data_kos);
    }
    public function destroy($id){
        $data_kos = DataKos::whereId($id)->first();
        $data_kos->delete();

        return new DataKosResource(true, 'Data Kos Berhasil Dihapus', $data_kos);
    }
}
