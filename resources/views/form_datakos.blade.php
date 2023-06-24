@extends('frontend.index')
@section('front')
    <div mclass="form_holder">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('form_datakos/store') }}" enctype="multipart/form-data" id="msform">
            {{ csrf_field() }}
            <fieldset>
                <h2 class="fs-title">Data Kos</h2>
                <br>
                <label>Nama Kos</label>
                <input type="text" name="nama_kos" placeholder="Masukkan Nama Kos" />
                <label>Nomor Kamar</label>
                <input type="text" name="no_kamar" placeholder="Masukkan Nomor Kamar" />
                <label>Jenis Kos</label>
                <div class="radio-button">
                    <p>
                        <input type="radio" name="jenis_kos" value="laki-laki">Putra
                    </p>
                    &emsp;&emsp;
                    <p>
                        <input type="radio" name="jenis_kos" value="perempuan">Putri
                    </p>
                    &emsp;&emsp;
                    <p>
                        <input type="radio" name="jenis_kos" value="campur">Campur
                    </p>
                </div>
                <label>Fasilitas</label>
                <textarea name="fasilitas" placeholder="Masukkan Fasilitas Kos"></textarea>
                <label>Luas Ruang</label>
                <input type="text" name="luas_ruang" placeholder="Ex:3x3m" />
                <label>Foto</label>
                <input type="file" name="gambar" />
                <label>Harga</label>
                <input type="text" name="harga" placeholder="Ex:1000000" />
                <label>Deskripsi</label>
                <textarea name="deskripsi" placeholder="Masukkan Deskripsi Kos"></textarea>
                <label>Kabupaten/Kota</label>
                <div class="radio-button">
                    <p>
                        <input type="radio" name="kabupaten_kota" value="Kabupaten Malang">Kabupaten Malang
                    </p>
                    &emsp;&emsp;
                    <p>
                        <input type="radio" name="kabupaten_kota" value="Kota Malang">Kota Malang
                    </p>
                </div>
                <label>Kecamatan</label>
                <input type="text" name="kecamatan" placeholder="Masukkan Kecamatan" />
                <label>Jalan</label>
                <textarea name="jalan" placeholder="Masukkan Nama Jalan Secara Detail"></textarea>
                <label>Kode Pos</label>
                <input type="text" name="kode_pos" placeholder="Masukkan Kode Pos" />
                <label>Nomor Telepon</label>
                <input type="text" name="telepon" placeholder="Masukkan Nomor Telepon Aktif" />
                {{-- <select name="pemilik_kos_id" id="pemilik_kos_id"></select>
                @foreach ($pemilik_kos as $pk)
                <option value="{{ $pk->id }}">{{ $pk->nama }}</option>
                @endforeach
            </select> --}}
                <div class="form-group from-floating mb-3">
                    <label>Nama Pemilik Kos</label>
                    <select id="pemilik_kos_id" name="pemilik_kos_id" class="form-control">
                        <option value="">--Pilih Nama--</option>
                        @foreach ($pemilik_kos as $pk)
                            <option value="{{ $pk->id }}"> {{ $pk->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" name="submit" value="Submit" />
            </fieldset>
        </form>
    </div>
@endsection
