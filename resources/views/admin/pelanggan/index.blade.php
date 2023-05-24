@extends('admin.layout.appadmin')

@section('content')
    <h1 class="mt-4">Tables Pelanggan</h1>
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

            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary  btn-sm">Tambah</a>

        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pelanggan as $p)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{$p->nama}}</td>
                            <td>{{$p->username}}</td>
                            <td>{{$p->password}}</td>
                            <td>{{$p->email}}</td>
                            <td>{{$p->jk}}</td>
                            <td>{{$p->telepon}}</td>
                            <td>{{$p->alamat}}</td>
                            <td>
                                <form action="{{ route('pelanggan.destroy') }}" method="POST">
                                    @csrf
                                    
                                    @method('delete')

                                    <a href="{{ route('pelanggan.edit',$p->id) }}" class="btn btn-warning btn-sm">Ubah</a>

                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda yakin akan dihapus?')">Hapus</button>

                                    <input type="hidden" name="idx" value="{{ $p->id }}">
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
