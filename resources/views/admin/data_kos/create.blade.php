@extends('admin.layout.appadmin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <br>
    <h1 align="center"> Form Tambah Data Kos </h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('admin/data_kos/store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">Nama Kos</label>
                <div class="col-8">
                    <input id="text" name="nama_kos" type="text"
                        class="form-control @error('nama_kos') is-invalid @enderror" placeholder="Masukkan Nama Kos">
                    @error('nama_kos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="text1" class="col-4 col-form-label">Nomor Kamar</label>
                <div class="col-8">
                    <input id="text1" name="no_kamar" type="text"
                        class="form-control @error('no_kamar') is-invalid @enderror" placeholder="Masukkan Nomor Kamar">
                    @error('no_kamar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Jenis Kos</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jenis_kos" id="radio_0" type="radio" class="custom-control-input"
                            value="laki-laki">
                        <label for="radio_0" class="custom-control-label">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jenis_kos" id="radio_1" type="radio" class="custom-control-input"
                            value="perempuan">
                        <label for="radio_1" class="custom-control-label">Perempuan</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jenis_kos" id="radio_2" type="radio" class="custom-control-input" value="campur">
                        <label for="radio_2" class="custom-control-label">Campur</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="textarea" class="col-4 col-form-label">Fasilitas</label>
                <div class="col-8">
                    <textarea id="textarea" name="fasilitas" cols="40" rows="5"
                        class="form-control @error('fasilitas') is-invalid @enderror" placeholder="Tambahkan Fasilitas Yang Ada di Kos"></textarea>
                    @error('fasilitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="text2" class="col-4 col-form-label">Luas Ruang</label>
                <div class="col-8">
                    <input id="text2" name="luas_ruang" type="text"
                        class="form-control @error('luas_ruang') is-invalid @enderror" placeholder="ex: 3x3m">
                    @error('luas_ruang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="text3" class="col-4 col-form-label">Gambar</label>
                <div class="col-8">
                    <input id="text3" name="gambar" type="file"
                        class="form-control @error('gambar') is-invalid @enderror">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="text4" class="col-4 col-form-label">Harga</label>
                <div class="col-8">
                    <input id="text4" name="harga" type="text"
                        class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga Kos">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="textarea1" class="col-4 col-form-label">Deskripsi</label>
                <div class="col-8">
                    <textarea id="textarea1" name="deskripsi" cols="40" rows="5"
                        class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Tambahkan Deskripsi Kos"></textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Kabupaten/Kota</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="kabupaten_kota" id="radio1_0" type="radio" class="custom-control-input"
                            value="Kabupaten Malang">
                        <label for="radio1_0" class="custom-control-label">Kabupaten Malang</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="kabupaten_kota" id="radio1_1" type="radio" class="custom-control-input"
                            value="Kota Malang">
                        <label for="radio1_1" class="custom-control-label">Kota Malang</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="text6" class="col-4 col-form-label">Kecamatan</label>
                <div class="col-8">
                    <input id="text6" name="kecamatan" type="text"
                        class="form-control @error('kecamatan') is-invalid @enderror" placeholder="ex: Sukun">
                    @error('kecamatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="textarea2" class="col-4 col-form-label">Jalan</label>
                <div class="col-8">
                    <textarea id="textarea2" name="jalan" cols="40" rows="5"
                        class="form-control @error('jalan') is-invalid @enderror" placeholder="Masukkan Nama Jalan Dengan Lengkap"></textarea>
                    @error('jalan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="text7" class="col-4 col-form-label">Kode Pos</label>
                <div class="col-8">
                    <input id="text7" name="kode_pos" type="text"
                        class="form-control @error('kode_pos') is-invalid @enderror" placeholder="Masukkan Kode Pos">
                    @error('kode_pos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="text8" class="col-4 col-form-label">Telepon</label>
                <div class="col-8">
                    <input id="text8" name="telepon" type="text"
                        class="form-control @error('telepon') is-invalid @enderror"
                        placeholder="Masukkan Nomor Telepon Aktif">
                    @error('telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="select" class="col-4 col-form-label">Pemilik Kos</label>
                <div class="col-8">
                    <select id="select" name="pemilik_kos_id" class="custom-select">
                        @foreach ($pemilik_kos as $pk)
                            <option value="{{ $pk->id }}">{{ $pk->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
@endsection
