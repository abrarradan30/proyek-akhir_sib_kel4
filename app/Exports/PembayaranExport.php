<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithHeadings

        $ar_pembayaran = Pembayaran::select('pembayaran.no_kwitansi', 'pembayaran.tanggal', 'pembayaran.jumlah', 'pembayaran.status')
        ->get();
        return Pembayaran::all();
    }
    public function headings(): array
    {
        return ["Nomor Kwitansi", "Tanggal Pembayaran", "Jumlah Pembayaran", "Status Pembayaran"];
    }
}