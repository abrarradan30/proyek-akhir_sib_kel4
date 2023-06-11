@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<h1 align="center"> Form Tambah Pelanggan </h1>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li> {{$error}}</li>
    @endforeach
  </ul>

</div>
@endif
<form method="POST" action="{{url('admin/pelanggan/store')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama</label>
    <div class="col-8">
      <input id="text" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
      @error('nama')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label>
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jk" id="radio_0" type="radio" class="custom-control-input" value="L">
        <label for="radio_0" class="custom-control-label">Laki-Laki</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jk" id="radio_1" type="radio" class="custom-control-input" value="P">
        <label for="radio_1" class="custom-control-label">Perempuan</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Telepon</label>
    <div class="col-8">
      <input id="text4" name="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" placeholder="ex : 082xxxxxxxxx">
      @error('telepon')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="textarea" class="col-4 col-form-label">Alamat</label>
    <div class="col-8">
      <textarea id="textarea" name="alamat" cols="40" rows="5" class="form-control @error('alamat') is-invalid @enderror"></textarea>
      @error('alamat')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection