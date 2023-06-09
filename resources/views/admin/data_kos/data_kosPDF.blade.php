<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kos</title>
</head>

<body>
    <h1 align="center">Data Kos</h1>

    <table border="1" cellpadding="0" align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kos</th>
                <th>Nomor Kamar</th>
                <th>Jenis Kos</th>
                <th>Fasilitas</th>
                <th>Luas Ruang</th>
                {{-- <th>Gambar</th> --}}
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Kabupaten/Kota</th>
                <th>Kecamatan</th>
                <th>Jalan</th>
                <th>Kode Pos</th>
                <th>Telepon</th>
                <th>Nama Pemilik Kos</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($data_kos as $dk)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $dk->nama_kos }}</td>
                    <td>{{ $dk->no_kamar }}</td>
                    <td>{{ $dk->jenis_kos }}</td>
                    <td>{{ $dk->fasilitas }}</td>
                    <td>{{ $dk->luas_ruang }}</td>
                    {{-- <td>
                        @empty($dk->gambar)
                            <img src="{{ url('admin/image/nofoto.png') }}" width="50%">
                        @else
                            <img src="{{ url('admin/image') }}/{{ $dk->gambar }}" width="50%">
                        @endempty
                    </td> --}}
                    <td>{{ $dk->harga }}</td>
                    <td>{{ $dk->deskripsi }}</td>
                    <td>{{ $dk->kabupaten_kota }}</td>
                    <td>{{ $dk->kecamatan }}</td>
                    <td>{{ $dk->jalan }}</td>
                    <td>{{ $dk->kode_pos }}</td>
                    <td>{{ $dk->telepon }}</td>
                    <td>{{ $dk->pemilik_kos->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
