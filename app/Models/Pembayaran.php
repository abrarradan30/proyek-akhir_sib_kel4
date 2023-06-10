<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pembayaran'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['no_kwitansi']; // pemanggilan kolom

    public function riwayat_pesanan(){
        return $this->hasMany(RiwayatPesanan::class); // memanggil relasi antara tabel riwayat pesanan dan pembayaran
    }
}
