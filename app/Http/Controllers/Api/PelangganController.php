<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PelangganResource;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
class PelangganController extends Controller
{
    
    public function index()
    {
        // query builer
        $pelanggan = DB::table('pelanggan')->get();
        return new PelangganResource(true,'Data Pelanggan',$pelanggan);
        // return view('admin.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = DB::table('pelanggan')->where('id', $id)->get();
        return new PelangganResource(true,'Detail Data Pelanggan',$pelanggan);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // fungsi untuk mengisi data pada form
        $validator = Validator::make($request->all(),[
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
        if($validator->fails()) {
            return new PelangganResource(false, 'Data error', $validator->errors());
        }
        $insert = DB::table('pelanggan')->insert([
            'nama'    => $request->nama,
            'jk'      => $request->jk,
            'telepon' => $request->telepon,
            'alamat'  => $request->alamat,
        ]);
        
        return new PelangganResource(true, 'Data berhasil di inputkan', $request->all());
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
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
        if($validator->fails()) {
            return new PelangganResource(false, 'Data error', $validator->errors());
        }
        DB::table('pelanggan')->where('id', $request->id)->update([
            'nama'    => $request->nama,
            'jk'      => $request->jk,
            'telepon' => $request->telepon,
            'alamat'  => $request->alamat,
        ]);

        return new PelangganResource(true, 'Data berhasil di update', $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('pelanggan')->where('id', $request->id)->delete();
    
        return new PelangganResource(true, 'Data berhasil di hapus', $request->all()); 
    }
}
