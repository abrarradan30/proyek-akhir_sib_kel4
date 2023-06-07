@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<h1 align="center"> Form Tambah User </h2>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="{{url('admin/user/store')}}" enctype="multipart/form-data">
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
    <label for="text2" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input id="text2" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username">
      @error('username')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="text1" name="password" type="text" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
      @error('password')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="text3" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
      @error('email')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Role</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="role" id="radio_0" type="radio" class="custom-control-input" value="admin"> 
        <label for="radio_0" class="custom-control-label">Admin</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="role" id="radio_1" type="radio" class="custom-control-input" value="pemilik kos"> 
        <label for="radio_1" class="custom-control-label">Pemilik Kos</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="role" id="radio_2" type="radio" class="custom-control-input" value="pelanggan"> 
        <label for="radio_2" class="custom-control-label">Pelanggan</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Foto</label>
      <div class="col-8">
        <input id="text3" name="foto" type="file" class="form-control">
      </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection