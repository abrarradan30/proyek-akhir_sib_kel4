<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['nama']; // pemanggilan kolom

    public function riwayat_pesanan(){
        return $this->hasMany(RiwayatPesanan::class); // memanggil relasi antara tabel riwayat pesanan dan pelanggan
    }
}
