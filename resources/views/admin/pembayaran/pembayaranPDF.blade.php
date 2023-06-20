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
                <th>Durasi sewa</th>
                <th>Jumlah Kamar</th>
                <th>Tanggal</th>
                <th>Nominal Dibayarkan</th>
                <th>Bukti</th>
            </tr>
</thead>
<tbody>
    @php $no = 1; @endphp
    @foreach ($pembayaran as $py)
    <tr>

        <td>{{$no++}}</td>
        <td>{{$py->durasi_sewa}}</td>
        <td>{{$py->jumlah_kamar}}</td>
        <td>{{$py->tanggal}}</td>
        <td>{{$py->total}}</td>
        <!-- <td>
                @empty($py->bukti)
                <img src="{{url('admin/image/nofoto.png')}}" width="50%">
                @else
                <img src="{{url('admin/image')}}/{{$u->bukti}}" width="50%">
                @endempty
            </td> -->
</tr>
@endforeach
</tbody>
</table>
</body>
</html>