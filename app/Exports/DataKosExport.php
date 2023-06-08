<?php

namespace App\Exports;

use App\Models\DataKos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataKosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return DataKos::all();
        $data_kos = DataKos::join('pemilik_kos', 'data_kos.pemilik_kos_id', '=', 'pemilik_kos.id')
            ->select(
                'data_kos.nama_kos',
                'data_kos.no_kamar',
                'data_kos.jenis_kos',
                'data_kos.fasilitas',
                'data_kos.luas_ruang',
                'data_kos.harga',
                'data_kos.deskripsi',
                'data_kos.kabupaten_kota',
                'data_kos.kecamatan',
                'data_kos.jalan',
                'data_kos.kode_pos',
                'data_kos.telepon',
                'pemilik_kos.nama as nama_pemilik_kos'
            )
            ->get();

        return $data_kos;
    }
    public function headings(): array
    {
        return [
            "Nama Kos", "Nomor Kamar", "Jenis Kos", "Fasilitas", "Luas Ruang", "Harga", "Deskripsi", "Kabupaten/Kota",
            "Kecamatan", "Jalan", "Kode Pos", "Telepon", "Nama Pemilik Kos"
        ];
    }
}
