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
