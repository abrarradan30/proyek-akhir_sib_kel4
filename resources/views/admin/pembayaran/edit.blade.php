@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
@foreach ($pembayaran as $py)
<h1 align="center"> Form Edit Pembayaran </h1>
<form method="POST" action="{{url('admin/pembayaran/update/')}}" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="form-group row">
  <input type="hidden" name="id" value="{{$py->id}}"/><br>
    <label for="text1" class="col-4 col-form-label">No Kwitansi</label> 
    <div class="col-8">
      <input id="text1" name="no_kwitansi" type="text" class="form-control" value="{{$py->no_kwitansi}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Tanggal</label> 
    <div class="col-8">
      <input id="text" name="tanggal" type="date" class="form-control" value="{{$py->tanggal}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Jumlah</label> 
    <div class="col-8">
      <input id="text2" name="jumlah" type="text" class="form-control" value="{{$py->jumlah}}">
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
      <button name="submit" type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
@endforeach
@endsection