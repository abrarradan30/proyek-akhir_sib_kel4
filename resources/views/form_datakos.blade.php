@extends('frontend.index')
@section('front')
    <div class="form_holder">
        <form id="msform">
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
                        <input type="radio" name="Kabupaten_kota" value="Kabupaten Malang">Kabupaten Malang
                    </p>
                    &emsp;&emsp;
                    <p>
                        <input type="radio" name="Kabupaten_kota" value="perempuan">Kota Malang
                    </p>
                </div>
                <label>Kecamatan</label>
                <input type="text" name="kecamatan" placeholder="Masukkan Kecamatan" />
                <label>Jalan</label>
                <textarea name="deskripsi" placeholder="Masukkan Nama Jalan Secara Detail"></textarea>
                <label>Kode Pos</label>
                <input type="text" name="kode_pos" placeholder="Masukkan Kode Pos" />
                <label>Nomor Telepon</label>
                <input type="text" name="telepon" placeholder="Masukkan Nomor Telepon Aktif" />
                <label>Nama Pemilik Kos</label>
                <input type="text" name="pemilik_kos_id" placeholder="Masukkan Nama Pemilik Kos" />
                <input type="submit" name="submit" class="submit action-button" value="Submit" />
            </fieldset>
        </form>
    </div>
@endsection
