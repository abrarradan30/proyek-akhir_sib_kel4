<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserKos;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use PDF;
use App\Exports\UserKosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserKosImport;

class UserKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builder
        $user = DB::table('user')->get();
        return view('admin.user_kos.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // arahkan ke file create
        return view('admin.user_kos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'username' => 'required|unique:user|max:50',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,gif,svg|max:2048', 
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah ada, masukkan Username yang lain',
            'username.max' => 'Username maksimal 50 karakter',
            'password.required' => 'Password wajib diisi',
            'email.required' => 'Email wajib diisi',
            'role.required' => 'Role wajib diisi',
        ]
        );
        // fungsi untuk mengisi data pada form
        if(!empty($request->foto)){
            $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
            $request->foto->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = '';
        }
        DB::table('user')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
            'foto' => $fileName,
        ]);

        Alert::success('User', 'Berhasil menambahkan user');
        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = DB::table('user')->where('id', $id)->get();
        return view('admin.user_kos.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = DB::table('user')->where('id', $id)->get();
        $ar_role = ['admin', 'pemilik kos', 'pelanggan'];
        return view('admin.user_kos.edit', compact('user', 'ar_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'username' => 'required|max:50',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,gif,svg|max:2048', 
        ]);
        // foto lama apabila mengganti fotonya
        $foto = DB::table('user')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        // apakah user ingin ganti foto lama
        if(!empty($request->foto)){
        // jika ada foto lama maka hapus dulu fotonya
        if(!empty($p->foto)) unlink('admin/image/'.$p->foto);
        // proses ganti foto
            $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
            $request->foto->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }
        DB::table('user')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
            'foto' => $fileName,
        ]);

        Alert::info('User', 'Berhasil mengedit user');
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('user')->where('id', $id)->delete();
        return redirect('admin/user');
    }
    // fungsi export PDF
    public function userPDF()
    {
        $user = UserKos::all();
        $pdf = PDF::loadView('admin.user_kos.userPDF', ['user' => $user])->setPaper('a4', 'landscape');
        //return $pdf->download('data_user.pdf'); 
        return $pdf->stream('data_user.pdf');
    }
    //fungsi export-importExcel
    public function exportExcel()
    {
        return Excel::download(new UserKosExport, 'user.xlsx');
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_excel', $nama_file);
        Excel::import(new UserKosImport, public_path('/file_excel/'.$nama_file));
        return redirect('admin/user');
    }
}
