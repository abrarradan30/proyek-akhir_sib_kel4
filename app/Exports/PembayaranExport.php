<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\withHeadings;

class PembayaranExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_pembayaran = Pembayaran::select('pembayaran.no_kwitansi', 'pembayaran.tanggal', 'pembayaran.jumlah', 'pembayaran.status')
        ->get();
        return Pembayaran::all();
    }
    public function headings(): array
    {
        return ["Nomor Kwitansi", "Tanggal Pembayaran", "Jumlah Pembayaran", "Status Pembayaran"];
    }
}