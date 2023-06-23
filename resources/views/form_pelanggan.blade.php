@extends('frontend.index')
@section('front')

<div class="form_holder">
    <!-- <h2 class="fs-title" style="color:#fff;">steps jquery form with Icons</h2> -->
    <form id="msform" action="form-pembayaran.html">
      <fieldset>
        <h2 class="fs-title">Data Pelanggan</h2>
        <br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama" />
        <label>Jenis Kelamin</label>
        <div class="radio-button">
          <p>
            <input type="radio" name="jk" value="l">Laki-Laki
          </p>
          &emsp;&emsp;
          <p>
            <input type="radio" name="jk" value="p">Perempuan
          </p>
         
        </div>
        <label>Nomor Telepon</label>
        <input type="text" name="telepon" placeholder="Masukkan Nomor Telepon Aktif" /> 
        <label>Alamat</label>
        <textarea name="alamat" placeholder="Masukkan Alamat Lengkap"></textarea>
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
      </fieldset>
    </form>
  </div>

  <!-- js form pemilik kos -->
  <script src="assets/js/form-data-kos.js"></script>

@endsection