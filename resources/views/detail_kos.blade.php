@extends('frontend.index')
@section('front')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="container my-5">
        <div class="card">
            @foreach ($data_kos as $dk)
            <div class="card-body">
                    
                <input type="hidden" value="{{ $dk->id }}">
                <h3 class="card-title">{{ $dk->nama_kos }}</h3>
                <h6 class="card-subtitle">{{ $dk->jenis_kos }}</h6>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center">
                            @empty($dk->gambar)
                            <img src="{{ url('admin/image/nofoto.png') }}" alt="project-image" class="rounded">
                        @else
                            <img src="{{ url('admin/image') }}/{{ $dk->gambar }}" alt="project-image" class="rounded">
                        @endempty
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Deskripsi Kos</h4>
                        <p>{{ $dk->deskripsi }}</p>
                        <h2 class="mt-5">
                             
                            Rp. {{ $dk->harga }}
                            <!-- <small class="text-success">(5%off)</small> -->
                        </h2>
                        <br>
                        <!-- <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title=""
                                    data-original-title="Add to cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button> -->
                        <button class="btn btn-primary btn-rounded">
                            <a href="{{url('form_pelanggan')}}">Ajukan Sewa</a>
                        </button>
                        <!-- <h3 class="box-title mt-5">Key Highlights</h3>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                                    <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                                    <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful
                                        collectibles</li>
                                </ul> -->
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">Detail Info Kamar Kos</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    <tr>
                                        <td width="390">Nama Kos</td>
                                        <td>{{ $dk->nama_kos }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Kamar</td>
                                        <td>{{ $dk->no_kamar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kos</td>
                                        <td>{{ $dk->jenis_kos }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fasilitas</td>
                                        <td>{{ $dk->fasilitas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Luas Ruang</td>
                                        <td>{{ $dk->luas_ruang }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten/Kota</td>
                                        <td>{{ $dk->kabupaten_kota }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>{{ $dk->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jalan</td>
                                        <td>{{ $dk->jalan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td>{{ $dk->kode_pos }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>{{ $dk->telepon }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemilik Kos</td>
                                        <td>{{ $dk->nama_pemilik_kos }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
