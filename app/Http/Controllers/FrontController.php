<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKos;
use DB;

class FrontController extends Controller
{
    //
    public function index()
    {
        $ar_datakos = DB::table('data_kos')
        ->join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
        ->select('data_kos.*', 'pemilik_kos.nama as nama_pemilik_kos')
        // ->groupBy('data_kos.nama_kos')
        // ->take(6)
        ->get();

        $ar_datakos = DataKos::all();

        return view('front', compact('ar_datakos'));
    }
}
