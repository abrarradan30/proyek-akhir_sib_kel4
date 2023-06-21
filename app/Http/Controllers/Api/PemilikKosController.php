<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemilikKos;
use App\Http\Resources\PemilikKosResource;
use DB;
use Illuminate\Support\Facades\Validator;

class PemilikKosController extends Controller
{
    //
    public function index()
    $pemilik_kos = DB :: table('pemilik_kos')->get();
    return new PemilikKosResource(true,'Data Pemilik Kos',$pemilik_kos);
    
}

/**
 * Display the specified resource.
 */
public function show($id)
{
    $pemilik_kos = DB::table('pemilik_kos')->where('id', $id)->get();
    return new PemilikKosResource(true,'Detail Data Pemilik Kos',$pemilik_kos);
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
        'alamat'  => 'required',
        'telepon' => 'required',
    ]);
    [
        'nama.required'    => 'Nama wajib diisi',
        'nama.max'         => 'Nama maksimal 45 karakter',
        'jk.required'      => 'Jenis kelamin wajib diisi',
        'alamat.required'  => 'Alamat wajib diisi',
        'telepon.required' => 'Telepon wajib diisi',

    ];
    if($validator->fails()) {
        return new PemilikKosResource(false, 'Data error', $validator->errors());
    }
    $insert = DB::table('pemilik_kos')->insert([
        'nama'    => $request->nama,
        'jk'      => $request->jk,
        'alamat'  => $request->alamat,
        'telepon' => $request->telepon,
    ]);
    
    return new PemilikKosResource(true, 'Data berhasil di inputkan', $request->all());
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
        'alamat'  => 'required',
        'telepon' => 'required',
    ]);
    [
        'nama.required'    => 'Nama wajib diisi',
        'nama.max'         => 'Nama maksimal 45 karakter',
        'jk.required'      => 'Jenis kelamin wajib diisi',
        'alamat.required'  => 'Alamat wajib diisi',
        'telepon.required' => 'Telepon wajib diisi',

    ];
    if($validator->fails()) {
        return new PemilikKosResource(false, 'Data error', $validator->errors());
    }
    DB::table('pemilik_kos')->where('id', $request->id)->update([
        'nama'    => $request->nama,
        'jk'      => $request->jk,
        'alamat'  => $request->alamat,
        'telepon' => $request->telepon,
    ]);

    return new PemilikKosResource(true, 'Data berhasil di update', $request->all());
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Request $request)
{
    DB::table('pemilik_kos')->where('id', $request->id)->delete();
    return new PemilikKosResource(true, 'Data berhasil di hapus', $request->all()); 
}

