<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKos;
use DB;

class DaftarKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_datakos = DB::table('data_kos')
        ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
        ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
        // ->groupBy('data_kos.nama_kos')
        // ->take(6)
        ->get();

        $ar_datakos = DataKos::all();

        return view('daftar_kos', compact('ar_datakos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        return view('show_daftarkos');
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
