<?php

namespace App\Http\Controllers;
use App\Models\DataKos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetailKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('detail_kos');
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
    public function show($id)
    {
        $data_kos = DB::table('data_kos')
        ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
        ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
        ->where('data_kos.id', $id)
        ->get();

        return view('detail_kos', compact('data_kos'));
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
