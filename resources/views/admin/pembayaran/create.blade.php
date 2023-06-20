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
  <label class="col-4">Durasi Sewa</label>
  <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
          <input name="durasi_sewa" id="radio_0" type="radio" class="custom-control-input" value="per bulan">
          <label for="radio_0" class="custom-control-label">Per Bulan</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
          <input name="durasi_sewa" id="radio_1" type="radio" class="custom-control-input" value="per 3 bulan">
          <label for="radio_1" class="custom-control-label">Per 3 Bulan</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
          <input name="durasi_sewa" id="radio_2" type="radio" class="custom-control-input" value="per 6 bulan">
          <label for="radio_2" class="custom-control-label">Per 6 Bulan</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
          <input name="durasi_sewa" id="radio_3" type="radio" class="custom-control-input" value="per tahun">
          <label for="radio_3" class="custom-control-label">Per Tahun</label>
      </div>
  </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Jumlah Kamar</label> 
    <div class="col-8">
      <input id="text2" name="jumlah_kamar" type="text" class="form-control @error('jumlah_kamar') is-invalid @enderror" placeholder="ex : 5">
      @error('jumlah_kamar')
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
    <label for="text2" class="col-4 col-form-label">Total</label> 
    <div class="col-8">
      <input id="text2" name="total" type="text" class="form-control @error('total') is-invalid @enderror" placeholder="ex : 1000000">
      @error('total')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Bukti</label>
      <div class="col-8">
        <input id="text3" name="bukti" type="file"
        class="form-control @error('bukti') is-invalid @enderror">
        @error('bukti')
          <div class="invalid-feedback">
            {{ $message }}
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