@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<h1 align="center"> Form Edit User </h2>
@foreach($user as $u)
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="{{url('admin/user/update')}}" enctype="multipart/form-data">
    {{csrf_field()}}
  <div class="form-group row">
  <input type="hidden" name="id" value="{{$u->id}}"/><br>
    <label for="text" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
        <input id="text" name="nama" type="text" class="form-control" value="{{$u->nama}}">
      </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input id="text2" name="username" type="text" class="form-control" value="{{$u->username}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="text1" name="password" type="text" class="form-control" value="{{$u->password}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="text3" name="email" type="email" class="form-control" value="{{$u->email}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Role</label> 
    <div class="col-8">
    @foreach($ar_role as $role)
      @php $cek = ($role == $u->role) ? 'checked' : ''; @endphp
      <div class="custom-control custom-radio custom-control-inline">
        <input name="role" id="radio_0" type="radio" class="custome-control-input" value="{{$role}}" {{$cek}}> 
        <label for="radio_0" class="form-check-label">{{$role}}</label>
      </div>
      <!-- <div class="custom-control custom-radio custom-control-inline">
        <input name="role" id="radio_1" type="radio" class="custom-control-input" value="pemilik kos"> 
        <label for="radio_1" class="custom-control-label">Pemilik Kos</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="role" id="radio_2" type="radio" class="custom-control-input" value="pelanggan"> 
        <label for="radio_2" class="custom-control-label">Pelanggan</label>
      </div> -->
    @endforeach  
    </div>
  </div> 
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="text4" name="foto" type="file" class="form-control">
      @if(!empty($u->foto))
        <img src="{{url('admin/image')}}/{{$u->foto}}" width="50%">
        <br> {{$u->foto}}
      @endif 
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