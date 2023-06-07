@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<h1 align="center">Form Edit Pelanggan</h1>
@foreach ($pelanggan as $p)
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li> {{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="{{url('admin/pelanggan/update')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="form-group row">
    <input type="hidden" name="id" value="{{$p->id}}"/>
    <label for="text" class="col-4 col-form-label">Nama</label>
    <div class="col-8">
      <input id="text" name="nama" type="text" class="form-control" value="{{$p->nama}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Username</label>
    <div class="col-8">
      <input id="text1" name="username" type="text" class="form-control" value="{{$p->username}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Password</label>
    <div class="col-8">
      <input id="text2" name="password" type="text" class="form-control" value="{{$p->password}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Email</label>
    <div class="col-8">
      <input id="text3" name="email" type="email" class="form-control" value="{{$p->email}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label>
    <div class="col-8">
      @foreach($ar_jk as $jk)
      @php $cek = ($jk == $p->jk) ? 'checked' : ''; @endphp
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jk" id="radio_0" type="radio" class="custome-control-input" value="{{$jk}}" {{$cek}}>
        <label for="radio_0" class="form-check-label">{{$jk}}</label>
      </div>
      <!-- <div class="custom-control custom-radio custom-control-inline">
        <input name="jk" id="radio_0" type="radio" class="custom-control-input" value="l"> 
        <label for="radio_0" class="custom-control-label">Laki-Laki</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jk" id="radio_1" type="radio" class="custom-control-input" value="p"> 
        <label for="radio_1" class="custom-control-label">Perempuan</label>
      </div>-->
      @endforeach
    </div>
  </div>
  <div class="form-group row">
    <label for="textarea" class="col-4 col-form-label">Alamat</label>
    <div class="col-8">
      <textarea id="textarea" name="alamat" cols="40" rows="5" class="form-control">{{$p->alamat}}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Telepon</label>
    <div class="col-8">
      <input id="text4" name="telepon" type="text" class="form-control" value="{{$p->telepon}}">
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