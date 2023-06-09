<?php

namespace App\Exports;

use App\Models\RiwayatPesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RiwayatPesananExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return RiwayatPesanan::all();
        $ar_riwayat_pesanan = RiwayatPesanan::join('data_kos', 'riwayat_pesanan.data_kos_id', '=', 'data_kos.id')
        ->join('pembayaran', 'riwayat_pesanan.pembayaran_id', '=', 'pembayaran.id')
        ->join('pelanggan', 'riwayat_pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->select('riwayat_pesanan.durasi_sewa', 'riwayat_pesanan.tanggal', 'riwayat_pesanan.jumlah_kamar', 
        'riwayat_pesanan.total', 'data_kos.nama_kos', 'pembayaran.status as status_pembayaran', 'pelanggan.nama as nama_pelanggan')
        ->get();
        return $ar_riwayat_pesanan;
    }

    public function headings(): array
    {
        return ["Durasi Sewa", "Tanggal", "Jumlah Kamar", "Total", "Nama Kos", "Status Pembayaran", "Nama Pelanggan"];
    }
}
