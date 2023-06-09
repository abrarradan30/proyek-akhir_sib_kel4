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

            <a href="{{url('admin/pelanggan/create')}}" class="btn btn-primary  btn-sm">Tambah</a>
        </div>
        <div class="card-header">

        <a href="{{url('admin/pelanggan/pelangganPDF')}}" class="btn btn-success btn-sm" target="_blank"> Export To PDF </a>   
        <a href="{{url('admin/pelanggan/pelangganEXCEL')}}" class="btn btn-info btn-sm" target="_blank"> Export To Excel </a>
        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                             Import To Excel
        </button>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Action</th>
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
                                <form action="#" method="POST">
                                    <a href="{{url('admin/pelanggan/show/'.$p->id)}}" class="btn btn-info btn-sm">Detail</a>

                                    <a href="{{url('admin/pelanggan/edit/'.$p->id)}}" class="btn btn-warning btn-sm">Ubah</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $p->id }}">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $p->id }}" tabindex="-1"
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
                                                    <a href="{{ url('admin/pelanggan/delete/' . $p->id) }}"
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
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('admin/pelanggan/pelangganIMPORT')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
            {{csrf_field()}}
            <input type="file" name="file">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
