@extends('admin.layout.appadmin')

@section('content')
@include('sweetalert::alert')
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
      <form action="{{url('admin/riwayat_pesanan/importexcel')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
            {{csrf_field()}}
            <input type="file" name="file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- Modal -->
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

            <a href="{{url('admin/riwayat_pesanan/create')}}" class="btn btn-primary  btn-sm">Tambah</a>

        </div>
        <div class="card-header">
            <a href="{{url('admin/riwayat_pesanan/riwayat_pesananPDF')}}" class="btn btn-danger btn-sm" target="_blank"> Export To PDF </a>   
            <a href="{{url('admin/riwayat_pesanan/exportexcel')}}" class="btn btn-success btn-sm"> Export To Excel </a>   
            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal"> Import To Excel </button>
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
                    @foreach ($riwayat_pesanan as $rp)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{$rp->durasi_sewa}}</td>
                            <td>{{$rp->tanggal}}</td>
                            <td>{{$rp->jumlah_kamar}}</td>
                            <td>{{$rp->total}}</td>
                            <td>{{$rp->nama_kos}}</td>
                            <td>{{$rp->status_pembayaran}}</td>
                            <td>{{$rp->nama_pelanggan}}</td>
                            <td>
                                <form action="#" method="POST">
                                    <a href="{{url('admin/riwayat_pesanan/show/'.$rp->id)}}" class="btn btn-info btn-sm">Detail</a>

                                    <a href="{{url('admin/riwayat_pesanan/edit/'.$rp->id)}}" class="btn btn-warning btn-sm">Ubah</a>

                                    <!-- Modal -->
                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$rp->id}}">
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$rp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin menghapus data ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="{{url('admin/riwayat_pesanan/delete/'.$rp->id)}}">Hapus</a>
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
