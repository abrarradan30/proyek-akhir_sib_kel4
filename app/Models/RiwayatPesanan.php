<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPesanan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pesanan'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['no_kwitansi','tanggal','status','data_kos_id','pembayaran_id','pelanggan_id']; // pemanggilan kolom

    public function data_kos(){
        return $this->belongsTo(DataKos::class); // memanggil relasi antara tabel data kos dan riwayat pesanan
    }
    public function pembayaran(){
        return $this->belongsTo(Pembayaran::class); // memanggil relasi antara tabel pembayaran dan riwayat pesanan
    }
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class); // memanggil relasi antara tabel pelanggan dan riwayat pesanan
    }
}
