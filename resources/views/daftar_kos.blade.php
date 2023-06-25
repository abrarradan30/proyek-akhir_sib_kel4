@extends('frontend.index')
@section('front')

<div class="container my-5">
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
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                            <a href="{{url('front_riwayat_pesanan')}}">Riwayat Pesanan</a>
                        </button>
                        </span>
                    </div>
                </div>
                <br>
                <section class="search-result-item">
                @foreach($ar_datakos as $dk)
                        @empty($dk->gambar)
                            <img src="{{ url('admin/image/nofoto.png') }}" width="20%">
                        @else
                            <img src="{{ url('admin/image') }}/{{ $dk->gambar }}" width="20%">
                        @endempty
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <p class="description">Nama Kos : {{$dk->nama_kos}}</p>
                                <p class="description">Jenis Kos : {{$dk->jenis_kos}}</p>
                                <p class="description">Fasilitas : {{$dk->fasilitas}}</p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <p class="value3 mt-sm">Rp. {{$dk->harga}} / bln</p>
                                <p class="fs-mini text-muted"></p><a class="btn btn-primary btn-sm" href="{{url('detail_kos/show/'.$dk->id) }}">Sewa</a>
                            </div>
                        </div>
                    </div>
                    <hr style="height:3px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">
                @endforeach
                </section>
            </div>
        </div>
    </div>

@endsection