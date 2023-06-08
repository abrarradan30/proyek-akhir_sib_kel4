<?php

namespace App\Exports;

use App\Models\UserKos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserKosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return UserKos::all();
        $ar_user = UserKos::select('user.nama', 'user.username', 'user.password', 'user.email', 'user.role', 'user.foto')
        ->get();
        return $ar_user;
    }

    public function headings(): array
    {
        return ["Nama", "Username", "Password", "Email", "Role", "Foto"];
    }
}