<?php

namespace App\Exports;

use App\Models\PemilikKos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PegawaiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return PemilikKos::all();
        $ar_pemilik_kos = PemilikKos::select(
            'pemilik_kos.nama',
            'pemilik_kos.username',
            'pemilik_kos.password',
            'pemilik_kos.email',
            'pemilik_kos.alamat',
            'pemilik_kos.telepon'
        )
            ->get();
        return $ar_pemilik_kos;
    }
    public function headings(): array
    {
        return ["Nama", "Username", "Password", "Email", "Jenis Kelamin", "Alamat", "Telepon"];
    }
}
