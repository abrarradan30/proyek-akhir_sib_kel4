@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<h1 align="center"> Form Tambah Pembayaran </h2>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
  </ul>
</div>
@endif

<form method="POST" action="{{url('admin/pembayaran/store')}}" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Nomor Kwitansi</label> 
    <div class="col-8">
      <input id="text1" name="no_kwitansi" type="text" class="form-control @error('no_kwitansi') is-invalid @enderror" placeholder="Masukkan Nomor Kwitansi">
      @error('no_kwitansi')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Tanggal</label> 
    <div class="col-8">
      <input id="text" name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror">
      @error('tanggal')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Jumlah</label> 
    <div class="col-8">
      <input id="text2" name="jumlah" type="text" class="form-control @error('jumlah') is-invalid @enderror" placeholder="ex : 1000000">
      @error('jumlah')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Status Pembayaran</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="status" id="radio_0" type="radio" class="custom-control-input" value="lunas"> 
        <label for="radio_0" class="custom-control-label">Lunas</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="status" id="radio_1" type="radio" class="custom-control-input" value="belum lunas"> 
        <label for="radio_1" class="custom-control-label">Belum Lunas</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection