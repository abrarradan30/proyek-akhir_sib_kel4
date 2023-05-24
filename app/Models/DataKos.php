<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKos extends Model
{
    use HasFactory;
    protected $table = 'data_kos'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = [
        'nama_kos','no_kamar','jenis_kos','fasilitas','luas_ruang','gambar','harga',
        'deskripsi','kabupaten_kota','kecamatan','jalan','kode_pos','telepon','pemilik_kos_id'
    ]; // pemanggilan kolom

    public function pemilik_kos(){
        return $this->belongsTo(PemilikKos::class); // memanggil relasi antara tabel data kos dan pemilik kos
    }
    public function riwayat_pesanan(){
        return $this->belongsTo(RiwayatPesanan::class); // memanggil relasi antara tabel data kos dan riwayat
    } 
}
