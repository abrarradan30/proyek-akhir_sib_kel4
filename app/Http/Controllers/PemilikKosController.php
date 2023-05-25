<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikKos;
use DB;

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
        DB::table('pemilik_kos')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);
        return redirect('admin/pemilik_kos');
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