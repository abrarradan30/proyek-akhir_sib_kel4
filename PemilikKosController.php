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
        // query builer
        $pemilik_kos = PemilikKos::get();
        return view('admin.pemilik_kos.index', compact('pemilik_kos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pemilik_kos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pemilik_kos = new Pelanggan;
        $pemilik_kos->nama = $request->name;
        $pemilik_kos->username = $request->username;
        // $pemilik_kos->password = Hash::make($request->password);
        $pemilik_kos->password = $request->password;
        $pemilik_kos->email = $request->email;
        $pemilik_kos->jk = $request->jk;
        $pemilik_kos->alamat = $request->alamat;
        $pemilik_kos->telepon = $request->telepon;

        if ($pemilik_kos->save()) {
            return redirect(route('pemilik_kos.index'));
        }
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
        $pemilik_kos = PemilikKos::findOrFail($id);
        return view('admin.pemilik_kos.edit', ['pemilik_kos' => $pemilik_kos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pemilik_kos = PemilikKos::findOrFail($request->idx);
        $pemilik_kos->nama = $request->name;
        $pemilik_kos->username = $request->username;
        // $pelanggan->password = Hash::make($request->password);
        $pemilik_kos->password = $request->password;
        $pemilik_kos->email = $request->email;
        $pemilik_kos->jk = $request->jk;
        $pemilik_kos->alamat = $request->alamat;
        $pemilik_kos->telepon = $request->telepon;

        if ($pemilik_kos->save()) {
            return redirect(route('pemilik_kos.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $del = PemilikKos::findOrFail($request->idx);
        if ($del->delete()) {
            return back();
        }
    }
}
