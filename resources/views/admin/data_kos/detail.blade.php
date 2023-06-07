@extends('admin.layout.appadmin')

@section('content')
<h1 align="center">Detail Data Kos</h1> 
<br>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="project-info-box mt-0">
                @foreach ($data_kos as $dk)
                    <h5>Deskripsi Kos</h5>
                    <p class="mb-0">{{ $dk->deskripsi }}</p>
            </div>
            <input type="hidden" value="{{ $dk->id }}">
            <div class="project-info-box">
                <p><b>Nama Kos:</b> {{ $dk->nama_kos }}</p>
                <p><b>No Kamar:</b> {{ $dk->no_kamar }}</p>
                <p><b>Jenis Kos:</b> {{ $dk->jenis_kos }}</p>
                <p><b>Luas Ruang:</b> {{ $dk->luas_ruang }}</p>
                <p><b>Fasilitas:</b> {{ $dk->fasilitas }}</p>
                <p><b>Harga:</b> {{ $dk->harga }}</p>
            </div>
            <div class="project-info-box mt-0 mb-0">
                <p class="mb-0">
                    <span class="fw-bold mr-10 va-middle hide-mobile">Share:</span>
                    <a href="#x" class="btn btn-xs btn-facebook btn-circle btn-icon mr-5 mb-0"><i class="fab fa-facebook-f"></i></a>
                    <a href="#x" class="btn btn-xs btn-twitter btn-circle btn-icon mr-5 mb-0"><i class="fab fa-twitter"></i></a>
                    <a href="#x" class="btn btn-xs btn-pinterest btn-circle btn-icon mr-5 mb-0"><i class="fab fa-pinterest"></i></a>
                    <a href="#x" class="btn btn-xs btn-linkedin btn-circle btn-icon mr-5 mb-0"><i class="fab fa-linkedin-in"></i></a>
                </p>
            </div>
        </div>
        <div class="col-md-7">
            @empty($dk->gambar)
                <img src="{{ url('admin/image/nofoto.png') }}" alt="project-image" class="rounded">
            @else
                <img src="{{ url('admin/image') }}/{{ $dk->gambar }}" alt="project-image" class="rounded">
            @endempty
            <div class="project-info-box">
                <p><b>Kabupaten/Kota:</b> {{ $dk->kabupaten_kota }}</p>
                <p><b>Kecamatan:</b> {{ $dk->kecamatan }}</p>
                <p><b>Jalan:</b> {{ $dk->jalan }}</p>
                <p><b>Kode Pos:</b> {{ $dk->kode_pos }}</p>
                <p><b>Telepon:</b> {{ $dk->telepon }}</p>
                <p><b>Pemilik Kos:</b> {{ $dk->nama_pemilik_kos }}</p>
                <a href="{{ url('admin/data_kos') }}">
                    <button class="btn btn-primary btn-lg">Back</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>
@endforeach

@endsection
