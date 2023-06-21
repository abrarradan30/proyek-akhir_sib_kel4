<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $ar_pembayaran = Pembayaran::select('pembayaran.durasi_sewa', 'pembayaran.jumlah_kamar', 'pembayaran.tanggal', 'pembayaran.total', 'pembayaran.bukti')
        ->get();
        return Pembayaran::all();
    }
    public function headings(): array
    {
        return ["Durasi Sewa", "Jumlah Kamar", "Tanggal Bayar", "Total", "Bukti"];
    }
}