@extends('admin.layout.appadmin')

@section('content')
<h1 class="mt-4">Tables Pemilik Kos</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Tables</li>
</ol>
<div class="card mb-4">
</div>
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary  btn-sm">Kembali</a>
    </div>
    <form method="POST" action="{{ route('pelanggan.update') }}" class="card-body">
        @csrf

        @method('put')

        <input type="hidden" value="{{ $pemilik_kos->id }}" name="idx">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" required name="name" value="{{ $pemilik_kos->nama }}">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" required name="username" value="{{ $pemilik_kos->username }}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" required name="password" value="{{ $pemilik_kos->password }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required name="email" value="{{ $pemilik_kos->email }}">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                <option value="l" @if($pelanggan->jk == "l") selected @endif>Laki Laki</option>
                <option value="p" @if($pelanggan->jk == "p") selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" required name="alamat" value="{{ $pemilik_kos->telepon }}">
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" class="form-control" required name="telepon" value="{{ $pemilik_kos->telepon }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>
@endsection