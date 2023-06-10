<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikKos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pemilik_kos'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['nama', 'username', 'password', 'email', 'jk', 'alamat', 'telepon']; // pemanggilan kolom

    public function data_kos()
    {
        return $this->hasMany(DataKos::class); // memanggil relasi antara tabel data kos dan pemilik kos
    }
}
