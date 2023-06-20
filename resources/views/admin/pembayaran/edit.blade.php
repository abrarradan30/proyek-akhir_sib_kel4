@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
@foreach ($pembayaran as $py)
<h1 align="center"> Form Edit Pembayaran </h1>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
  <li> {{$error}}</li>
    @endforeach
</ul>
</div>
@endif
<form method="POST" action="{{url('admin/pembayaran/update')}}" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="form-group row">
  <input type="hidden" name="id" value="{{$py->id}}"/>
  <label class="col-4">Durasi Sewa</label>
  <div class="col-8">
      @foreach ($ar_durasi_sewa as $durasi_sewa)
          @php $cek = ($durasi_sewa == $py->durasi_sewa) ? "checked" : ""; @endphp
          <div class="custom-control custom-radio custom-control-inline">
              <input name="durasi_sewa" id="radio_0" type="radio" class="custome-control-input"
                value="{{ $durasi_sewa }}" {{ $cek }}>
              <label for="radio_0" class="custom-check-label">{{ $durasi_sewa }}</label>
          </div>
      @endforeach
  </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Jumlah Kamar</label> 
    <div class="col-8">
      <input id="text2" name="jumlah_kamar" type="text" class="form-control" value="{{$py->jumlah_kamar}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Tanggal</label> 
    <div class="col-8">
      <input id="text" name="tanggal" type="date" class="form-control" value="{{$py->tanggal}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Total</label> 
    <div class="col-8">
      <input id="text2" name="total" type="text" class="form-control" value="{{$py->total}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Bukti</label>
      <div class="col-8">
       <input id="text3" name="bukti" type="file" class="form-control">
          @if (!empty($py->bukti))
            <img src="{{ url('admin/image') }}/{{ $py->bukti }}" width="50%">
            <br>{{ $py->bukti }}
        @endempty
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