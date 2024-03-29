@extends('admin.layout.appadmin')
@section('content')


<h2> Details Pembayaran</h2>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="project-info-box mt-0">
                @foreach ($pembayaran as $py)
                <h5>Deskripsi Pembayaran</h5>
                <p class="mb-0">Berikut adalah detail pembayaran kos :</p>
            </div>
            <input type="hidden" value="{{$py->id}}" />
            <div class="project-info-box">
                <p><b>Durasi Sewa:</b> {{$py->durasi_sewa}}</p>
                <p><b>Jumlah Kamar:</b> {{$py->jumlah_kamar}}</p>
                <p><b>Tanggal:</b> {{$py->tanggal}}</p>
                <p><b>Total:</b> {{$py->total}}</p>
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
            @empty($py->bukti)
                <img src="{{ url('admin/image/nofoto.png') }}" alt="project-image" class="rounded">
            @else
                <img src="{{ url('admin/image') }}/{{ $py->bukti }}" alt="project-image" class="rounded">
            @endempty
            <div class="project-info-box">
                <a href="{{ url('admin/pembayaran') }}">
                    <button class="btn btn-primary btn-lg">Back</button>
                </a>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>
@endforeach

@endsection