@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<h1 align="center"> Form Edit Riwayat Pesanan </h2>
@foreach($riwayat_pesanan as $rp)
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="{{url('admin/riwayat_pesanan/update')}}" enctype="multipart/form-data">
    {{csrf_field()}}
  <div class="form-group row">
  <div class="form-group row">
  <input type="hidden" name="id" value="{{$rp->id}}"/><br>
    <label for="text1" class="col-4 col-form-label">No Kwitansi</label> 
    <div class="col-8">
      <input id="text1" name="no_kwitansi" type="text" class="form-control" value="{{$rp->no_kwitansi}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Tanggal</label> 
    <div class="col-8">
      <input id="text1" name="tanggal" type="date" class="form-control" value="{{$rp->tanggal}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Status Pembayaran</label> 
    <div class="col-8">
    @foreach($ar_status as $status)
      @php $cek = ($status == $rp->status) ? 'checked' : ''; @endphp
      <div class="custom-control custom-radio custom-control-inline">
        <input name="status" id="radio_0" type="radio" class="custome-control-input" value="{{$status}}" {{$cek}}> 
        <label for="radio_0" class="form-check-label">{{$status}}</label>
      </div>
      <!-- <div class="custom-control custom-radio custom-control-inline">
        <input name="status" id="radio_0" type="radio" class="custom-control-input" value="lunas"> 
        <label for="radio_0" class="custom-control-label">Lunas</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="status" id="radio_1" type="radio" class="custom-control-input" value="belum lunas"> 
        <label for="radio_1" class="custom-control-label">Belum Lunas</label>
      </div> -->
      @endforeach  
    </div>
  </div> 
  <div class="form-group row">
    <label for="select2" class="col-4 col-form-label">Nama Pelanggan</label> 
    <div class="col-8">
      <select id="select2" name="pelanggan_id" class="custom-select">
        @foreach($pelanggan as $p)
        @php $sel = ($p->id == $rp->pelanggan_id) ? 'selected' : ''; @endphp
        <option value="{{$p->id}}" {{$sel}}>{{$p->nama}}</option>
        @endforeach 
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Nama Kos</label> 
    <div class="col-8">
      <select id="select" name="data_kos_id" class="custom-select">
        @foreach($data_kos as $dk)
        @php $sel = ($dk->id == $rp->data_kos_id) ? 'selected' : ''; @endphp
        <option value="{{$dk->id}}" {{$sel}}>{{$dk->nama_kos}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Durasi Sewa</label> 
    <div class="col-8">
      <select id="select" name="pembayaran_id" class="custom-select">
        @foreach($pembayaran as $py)
        @php $sel = ($py->id == $rp->pembayaran_id) ? 'selected' : ''; @endphp
        <option value="{{$py->id}}" {{$sel}}>{{$py->durasi_sewa}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Jumlah Kamar</label> 
    <div class="col-8">
      <select id="select" name="pembayaran_id" class="custom-select">
        @foreach($pembayaran as $py)
        @php $sel = ($py->id == $rp->pembayaran_id) ? 'selected' : ''; @endphp
        <option value="{{$py->id}}" {{$sel}}>{{$py->jumlah_kamar}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Tanggal Pembayaran</label> 
    <div class="col-8">
      <select id="select" name="pembayaran_id" class="custom-select">
        @foreach($pembayaran as $py)
        @php $sel = ($py->id == $rp->pembayaran_id) ? 'selected' : ''; @endphp
        <option value="{{$py->id}}" {{$sel}}>{{$py->tanggal}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Total Bayar</label> 
    <div class="col-8">
      <select id="select" name="pembayaran_id" class="custom-select">
        @foreach($pembayaran as $py)
        @php $sel = ($py->id == $rp->pembayaran_id) ? 'selected' : ''; @endphp
        <option value="{{$py->id}}" {{$sel}}>{{$py->total}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
@endforeach
@endsection