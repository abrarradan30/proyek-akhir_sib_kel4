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
                    <div class="row justify-content-center">
                        <div class="card mb-12" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="https://www.bootdey.com/image/400x200/7B68EE/000000"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Riwayat Pesanan</h5>
                                        <p class="card-text">No Kwitansi : </p>
                                        <p class="card-text">Nama Pelanggan :</p>
                                        <p class="card-text">Nama Kos :</p>
                                        <p class="card-text">Tanggal Sewa :</p>
                                        <p class="card-text">Status Pembayaran :</p>
                                        <p class="card-text">Harga :</p>
                                        <p class="card-text">Durasi Sewa :</p>
                                        <p class="card-text">Jumlah Kamar :</p>
                                        <p class="card-text">Tanggal Pembayaran :</p>
                                        <p class="card-text">Total Harga :</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
