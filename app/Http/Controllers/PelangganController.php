<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use DB;

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
        DB::table('pelanggan')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'jk' => $request->jk,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);
        return redirect('admin/pelanggan');
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
        $p = DB::table('pelanggan')->where('id', $id)->first();
        return view('admin.pelanggan.update', compact('p'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        DB::table('pelanggan')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

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
}
