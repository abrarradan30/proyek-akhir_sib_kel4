@extends('admin.layout.appadmin')

@section('content')
    @include('sweetalert::alert')
    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/data_kos/importexcel') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="file" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    {{-- end Modal --}}
    <h1 class="mt-4">Tables Data Kos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        {{-- <div class="card-body">
                                    DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                    <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                    .
                                </div> --}}
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i>
                                        DataTable Example -->
            <!-- Membuat tombol yang mengarahkan ke file produk._form.php -->
            <a href="{{ url('admin/data_kos/create') }}" class="btn btn-primary btn-sm">Tambah</a>
        </div>
        <div class="card-header">
            <a href="{{ url('admin/data_kos/data_kosPDF') }}" class="btn btn-danger btn-sm" target="_blank"> Export To PDF</a>
            <a href="{{ url('admin/data_kos/exportexcel') }}" class="btn btn-success btn-sm"> Export To EXCEL</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal"> Import To EXCEL </button>
        </div>
        <div class="card-body">
            <table class="table-hover text-nowrap mb-0 align-middle" id="datatablesSimple">
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
                                    <img src="{{ url('admin/image/nofoto.png') }}" width="15%" style="width: 50px;">
                                @else
                                    <img src="{{ url('admin/image') }}/{{ $dk->gambar }}" width="15%" style="width: 50px;">
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
                                    {{-- Detail --}}
                                    <a href="{{ url('admin/data_kos/show/' . $dk->id) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    {{-- Ubah --}}
                                    <a href="{{ url('admin/data_kos/edit/' . $dk->id) }}"
                                        class="btn btn-warning btn-sm">Ubah</a>
                                    {{-- Hapus --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $dk->id }}">
                                        Hapus
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $dk->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin akan menghapus data?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ url('admin/data_kos/delete/' . $dk->id) }}"
                                                        class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
