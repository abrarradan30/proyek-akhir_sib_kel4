@extends('admin.layout.appadmin')

@section('content')
    <h1 class="mt-4">Tables Pelanggan</h1>
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
        <form method="POST" action="{{ route('pelanggan.store') }}" class="card-body">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" required name="name">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" required name="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" required name="password">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" required name="email">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jk" class="form-control">
                    <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                    <option value="l">Laki Laki</option>
                    <option value="p">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" class="form-control" required name="telepon">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
@endsection
