@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<h1 align="center"> Form Tambah Riwayat Pesanan </h2>
<form method="POST" action="{{url('admin/riwayat_pesanan/store')}}" enctype="multipart/form-data">
    {{csrf_field()}}
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Durasi Sewa</label> 
    <div class="col-8">
      <input id="text" name="durasi_sewa" type="text" class="form-control" placeholder="ex : 5 bulan">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Tanggal</label> 
    <div class="col-8">
      <input id="text1" name="tanggal" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Jumlah Kamar</label> 
    <div class="col-8">
      <input id="text2" name="jumlah_kamar" type="text" class="form-control"placeholder="ex : 1">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Total</label> 
    <div class="col-8">
      <input id="text3" name="total" type="text" class="form-control" placeholder="ex : 1000000">
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Nama Kos</label> 
    <div class="col-8">
      <select id="select" name="data_kos_id" class="custom-select">
        @foreach($data_kos as $dk)
        <option value="{{$dk->id}}">{{$dk->nama_kos}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Status Pembayaran</label> 
    <div class="col-8">
      <select id="select" name="pembayaran_id" class="custom-select">
        @foreach($pembayaran as $p)
        <option value="{{$p->id}}">{{$p->status}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select2" class="col-4 col-form-label">Nama Pelanggan</label> 
    <div class="col-8">
      <select id="select2" name="pelanggan_id" class="custom-select">
        @foreach($pelanggan as $p)
        <option value="{{$p->id}}">{{$p->nama}}</option>
        @endforeach 
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection