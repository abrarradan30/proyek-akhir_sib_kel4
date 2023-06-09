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
            'nama' => $row[0],
            'username' => $row[1],
            'password' => $row[2],
            'email' => $row[3],
            'jk' => $row[4],
            'alamat' => $row[6],
            'telepon' => $row[5],
        ]);
    }
}
