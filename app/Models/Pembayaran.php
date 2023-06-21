<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['durasi_sewa','jumlah_kamar','tanggal', 'total','bukti', 'create_at','update_at']; // pemanggilan kolom

    Public $timestamps= false;
    
    public function riwayat_pesanan(){
        return $this->hasMany(RiwayatPesanan::class); // memanggil relasi antara tabel riwayat pesanan dan pembayaran
    }
}
