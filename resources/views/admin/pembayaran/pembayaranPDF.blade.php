<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran Kost</title>
</head>
<body>
    <h3 align="center">Data Pembayaran Kost</h3>

    <table border="1" cellpadding="10" align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Kwitansi</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Status</th>
</tr>
</thead>
<tbody>
    @php $no = 1; @endphp
    @foreach ($pembayaran as $py)
    <tr>

        <td>{{$no++}}</td>
        <td>{{$py->no_kwitansi}}</td>
        <td>{{$py->tanggal}}</td>
        <td>{{$py->jumlah}}</td>
        <td>{{$py->status}}</td>

</tr>
@endforeach
</tbody>
</table>
</body>
</html>