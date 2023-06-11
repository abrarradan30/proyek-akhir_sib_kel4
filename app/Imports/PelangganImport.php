<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;

class PelangganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pelanggan([
            'nama' => $row[1],
            'username' => $row[2],
            'password' => $row[3],
            'email' => $row[4],
            'jk' => $row[5],
            'alamat' => $row[6],
            'telepon' => $row[7],
        ]);
    }
}
