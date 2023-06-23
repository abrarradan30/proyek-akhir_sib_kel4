@extends('frontend.index')
@section('front')

<div class="container">
        <div class="row ng-scope">
            <div class="col-md-9 col-md-pull-3">
                <div class="well search-result">
                    <div>
                        <h2> Cari Kos </h2>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Kabupaten/Kota">
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-lg" type="button">
                                <i class="glyphicon glyphicon-search"></i>
                                Search
                            </button>
                        </span>
                    </div>
                </div>
                <br>
                <section class="search-result-item">
                    <a class="image-link" href="#"><img class="image" src="assets/img/kamarkos.jpg">
                    </a>
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <p class="description">Nama Kos :</p>
                                <p class="description">Jenis Kos :</p>
                                <p class="description">Fasilitas :</p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <p class="value3 mt-sm">Rp1000000 / bln</p>
                                <p class="fs-mini text-muted"></p><a class="btn btn-primary btn-sm" href="detail_kos.html">Sewa</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection