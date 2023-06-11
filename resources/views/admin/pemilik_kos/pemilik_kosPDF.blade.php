<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemilik Kos</title>
</head>

<body>
    <h3 align="center">Data Pemilik Kos</h3>

    <table border="1" cellpadding="10" align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($pemilik_kos as $pk)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$pk->nama}}</td>
                <td>{{$pk->jk}}</td>
                <td>{{$pk->alamat}}</td>
                <td>{{$pk->telepon}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
</body>

</html>