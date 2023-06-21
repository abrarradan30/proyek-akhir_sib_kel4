<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Riwayat Pesanan</title>
</head>
<body>
    <h1 align="center">Data Riwayat Pesanan</h1>

    <table border="1" cellpadding="10" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>No Kwitansi</th>
            <th>Tanggal</th>
            <th>Status Pembayaran</th>
            <th>Nama Pelanggan</th>
            <th>Nama Kos</th>
            <th>Durasi Sewa</th>
            <th>Jumlah Kamar</th>
            <th>Tanggal Pembayaran</th>
            <th>Total Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp;
        @foreach ($riwayat_pesanan as $rp)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$rp->no_kwitansi}}</td>
            <td>{{$rp->tanggal}}</td>
            <td>{{$rp->status}}</td>
            <td>{{$rp->pelanggan->nama}}</td>
            <td>{{$rp->data_kos->nama_kos}}</td>
            <td>{{$rp->pembayaran->durasi_sewa}}</td>
            <td>{{$rp->pembayaran->jumlah_kamar}}</td>
            <td>{{$rp->pembayaran->tanggal}}</td>
            <td>{{$rp->pembayaran->total}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>