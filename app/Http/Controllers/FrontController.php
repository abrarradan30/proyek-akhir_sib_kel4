<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        return view('front');
    }
    public function create()
    {
        //
        $pemilik_kos = DB::table('pemilik_kos')->get();
        $data_kos = DB::table('data_kos')
            ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
            ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
            ->get();

        return view('admin.data_kos.create', compact('data_kos', 'pemilik_kos'));
    }
}
