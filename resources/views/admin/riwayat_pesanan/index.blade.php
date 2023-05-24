@extends('admin.layout.appadmin')

@section('content')
    <h1 class="mt-4">Tables Riwayat Pesanan</h1>
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

            <a href="#" class="btn btn-primary  btn-sm">Tambah</a>

        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Durasi Sewa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Kamar</th>
                        <th>Total</th>
                        <th>Data Kos</th>
                        <th>Pembayaran</th>
                        <th>Pelanggan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>No</th>
                        <th>Durasi Sewa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Kamar</th>
                        <th>Total</th>
                        <th>Data Kos</th>
                        <th>Pembayaran</th>
                        <th>Pelanggan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($riwayat_pesanan as $rs)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{$rs->durasi_sewa}}</td>
                            <td>{{$rs->tanggal}}</td>
                            <td>{{$rs->jumlah_kamar}}</td>
                            <td>{{$rs->total}}</td>
                            <td>{{$rs->nama_kos}}</td>
                            <td>{{$rs->status_pembayaran}}</td>
                            <td>{{$rs->nama_pelanggan}}</td>
                            <td>
                                <form action="#" method="POST">
                                    <a href="#" class="btn btn-info btn-sm">Detail</a>

                                    <a href="#" class="btn btn-warning btn-sm">Ubah</a>

                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda yakin akan dihapus?')">Hapus</button>

                                    <input type="hidden" name="idx" value="">
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
