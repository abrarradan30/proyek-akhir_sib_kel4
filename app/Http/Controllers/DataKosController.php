<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKos;
use App\Models\PemilikKos;
//use App\Models\RiwayatPesanan;
use DB;

class DataKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
    /*    $data_kos = DataKos::join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'data_kos.id')
        //->join('riwayat_pesanan', 'data_kos.id', '=', 'riwayat_pesanan.data_kos_id')
        ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
        ->get();
        return view('admin.data_kos.index', compact('data_kos')); */
        
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
