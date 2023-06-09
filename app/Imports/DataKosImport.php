<?php

namespace App\Imports;

use App\Models\DataKos;
use Maatwebsite\Excel\Concerns\ToModel;

class DataKosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataKos([
            //
            'nama_kos'       => $row[1],
            'no_kamar'       => $row[2],
            'jenis_kos'      => $row[3],
            'fasilitas'      => $row[4],
            'luas_ruang'     => $row[5],
            // 'gambar' => $row[6],
            'harga'          => $row[7],
            'deskripsi'      => $row[8],
            'kabupaten_kota' => $row[9],
            'kecamatan'      => $row[10],
            'jalan'          => $row[11],
            'kode_pos'       => $row[12],
            'telepon'        => $row[13],
            'pemilik_kos_id' => $row[14],
        ]);
    }
}
