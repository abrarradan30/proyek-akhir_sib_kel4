@extends('admin.layout.appadmin')

@section('content')
    <h1 class="mt-4">Tables Data Kos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <!-- <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                        .
                    </div> -->
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i>
                    DataTable Example -->
            <!-- Membuat tombol yang mengarahkan ke file produk._form.php -->

            <a href="{{ url('admin/data_kos/create') }}" class="btn btn-primary  btn-sm">Tambah</a>

        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kos</th>
                        <th>Nomor Kamar</th>
                        <th>Jenis Kos</th>
                        <th>Fasilitas</th>
                        <th>Luas Ruang</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Kabupaten/Kota</th>
                        <th>Kecamatan</th>
                        <th>Jalan</th>
                        <th>Kode Pos</th>
                        <th>Telepon</th>
                        <th>Nama Pemilik Kos</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kos</th>
                        <th>Nomor Kamar</th>
                        <th>Jenis Kos</th>
                        <th>Fasilitas</th>
                        <th>Luas Ruang</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Kabupaten/Kota</th>
                        <th>Kecamatan</th>
                        <th>Jalan</th>
                        <th>Kode Pos</th>
                        <th>Telepon</th>
                        <th>Nama Pemilik Kos</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data_kos as $dk)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $dk->nama_kos }}</td>
                            <td>{{ $dk->no_kamar }}</td>
                            <td>{{ $dk->jenis_kos }}</td>
                            <td>{{ $dk->fasilitas }}</td>
                            <td>{{ $dk->luas_ruang }}</td>
                            <td>
                                @empty($dk->gambar)
                                    <img src="{{ url('admin/image/nofoto.png') }}" width="50%">
                                @else
                                    <img src="{{ url('admin/image') }}/{{ $dk->gambar }}" width="50%">
                                @endempty
                            </td>
                            <td>{{ $dk->harga }}</td>
                            <td>{{ $dk->deskripsi }}</td>
                            <td>{{ $dk->kabupaten_kota }}</td>
                            <td>{{ $dk->kecamatan }}</td>
                            <td>{{ $dk->jalan }}</td>
                            <td>{{ $dk->kode_pos }}</td>
                            <td>{{ $dk->telepon }}</td>
                            <td>{{ $dk->nama_pemilik_kos }}</td>
                            <td>
                                <form action="#" method="POST">
                                    <a href="#" class="btn btn-info btn-sm">Detail</a>

                                    <a href="{{url('admin/data_kos/edit/'.$dk->id)}}"
                                        class="btn btn-warning btn-sm">Ubah</a>

                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda yakin akan dihapus?')">Hapus</button>

                                </form>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
