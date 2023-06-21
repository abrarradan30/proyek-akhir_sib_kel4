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
        ->select('riwayat_pesanan.no_kwitansi', 'riwayat_pesanan.tanggal','riwayat_pesanan.status',
        'pelanggan.nama as nama_pelanggan', 'data_kos.nama_kos', 'pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 
        'pembayaran.tanggal as tanggal_pembayaran', 'pembayaran.total as total_bayar')
        ->get();
        return $ar_riwayat_pesanan;
    }

    public function headings(): array
    {
        return ["No Kwitansi", "Tanggal", "Status", "Nama Pelanggan", "Nama Kos", "Durasi Sewa", "Jumlah Kamar", "Tanggal Pembayaran", "Tota Bayar"];
    }
}
