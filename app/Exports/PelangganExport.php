<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelangganExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pelanggan = Pelanggan::select('nama','jk', 'telepon','alamat')
        ->get();
        return $pelanggan;
    }
    public function headings(): array
    {
        return ["Nama", "Jenis Kelamin", "Telepon", "Alamat"];
    }
}
