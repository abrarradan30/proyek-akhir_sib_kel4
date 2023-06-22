@extends('frontend.index')
@section('front')
    <div class="form_holder">
        <form id="msform">
            <fieldset>
                <h2 class="fs-title">Data Pemilik Kos</h2>
                <br>
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Masukkan Nama" />
                <label>Jenis Kelamin</label>
                <div class="radio-button">
                    <p>
                        <input type="radio" name="jk" value="l">Laki-laki
                    </p>
                    &emsp;&emsp;
                    <p>
                        <input type="radio" name="jk" value="p">Perempuan
                    </p>
                </div>
                <label>Alamat</label>
                <textarea name="alamat" placeholder="Masukkan Alamat"></textarea>
                <label>Nomor Telepon</label>
                <input type="text" name="telepon" placeholder="Masukkan Nomor Telepon Aktif" />
                <input type="submit" name="submit" class="submit action-button" value="Submit" />
            </fieldset>
        </form>
@endsection
