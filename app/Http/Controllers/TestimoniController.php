<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use DB;

class TestimoniController extends Controller
{
    //
    public function index() 
    {
        $ar_feedback = DB::table('feedback')->get();

        $ar_feedback = Contact::all();

        return view('front', compact('ar_feedback'));
    }    
}
