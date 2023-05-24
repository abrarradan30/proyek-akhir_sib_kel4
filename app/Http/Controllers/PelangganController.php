<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use DB;
use view;
use Hash;
class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builer
        $pelanggan = Pelanggan::get();
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelanggan = new Pelanggan;
        $pelanggan->nama = $request->name;
        $pelanggan->username = $request->username;
        // $pelanggan->password = Hash::make($request->password);
        $pelanggan->password = $request->password;
        $pelanggan->email = $request->email;
        $pelanggan->jk = $request->jk;
        $pelanggan->telepon = $request->telepon;

        if($pelanggan->save()){
            return redirect(route('pelanggan.index'));
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
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit',['pelanggan'=>$pelanggan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pelanggan = Pelanggan::findOrFail($request->idx);
        $pelanggan->nama = $request->name;
        $pelanggan->username = $request->username;
        // $pelanggan->password = Hash::make($request->password);
        $pelanggan->password = $request->password;
        $pelanggan->email = $request->email;
        $pelanggan->jk = $request->jk;
        $pelanggan->telepon = $request->telepon;

        if($pelanggan->save()){
            return redirect(route('pelanggan.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $del = Pelanggan::findOrFail($request->idx);
        if($del->delete()){
            return back();
        }
    }
}
