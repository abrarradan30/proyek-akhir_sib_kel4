@extends('frontend.index')
@section('front')
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <div class="container my-5">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well search-result">
                <div>
                    <h2> Cari Riwayat Pesanan </h2>
                </div>
                <br>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="button">
                                <i class="glyphicon glyphicon-search"></i>
                                Search
                            </button>
                        </span>
                    </div>
                </div>
                <div class="well search-result">
                @foreach ($ar_riwayat_pesanan as $rp)
                    <div class="row justify-content-center">
                        <div class="card mb-12" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-6" style="margin-top: 20px;">
                                @empty($rp->bukti)
                                    <img src="{{ url('admin/image/nofoto.png') }}" width="60%" height="50%">
                                @else
                                    <img src="{{ url('admin/image') }}/{{ $rp->bukti }}" width="60%" height="50%">
                                @endempty
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Pesanan = {{$rp->no_kwitansi}}</h5>
                                        <p class="card-text">Tanggal Terbit = {{$rp->tanggal}}</p>
                                        <p class="card-text">Status Pembayaran = {{$rp->status}}</p>
                                        <p class="card-text">Nama Pelanggan = {{$rp->nama_pelanggan}}</</p>
                                        <p class="card-text">Nama Kos = {{$rp->nama_kos}}</p>
                                        <p class="card-text">Durasi Sewa = {{$rp->durasi_sewa}}</p>
                                        <p class="card-text">Jumlah Kamar = {{$rp->jumlah_kamar}}</p>
                                        <p class="card-text">Tanggal Pembayaran = {{$rp->tanggal_pembayaran}}</p>
                                        <p class="card-text">Total Bayar Kos = {{$rp->total_bayar}}</p>
                                        <br>
                                        <a href="{{url('form_pembayaran')}}" rel="nofollow" class="btn btn-warning btn-sm">Bayar</a>                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
