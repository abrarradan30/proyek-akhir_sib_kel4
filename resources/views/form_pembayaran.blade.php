@extends('frontend.index')
@section('front')

  <div class="form_holder">
    <!-- <h2 class="fs-title" style="color:#fff;">steps jquery form with Icons</h2> -->
    <form id="msform">
      <fieldset>
        <h2 class="fs-title">Data Pembayaran</h2>
        <br>
        <label>Durasi Sewa</label>
        <div class="radio-button">
          <p>
            <input type="radio" name="durasi_sewa" value="per bulan">Per Bulan
          </p>
          &emsp;&emsp;
          <p>
            <input type="radio" name="durasi_sewa" value="per 3 bulan">Per 3 Bulan
          </p>
          &emsp;&emsp;
          <p>
            <input type="radio" name="durasi_sewa" value="per 6 bulan">Per 6 Bulan
          </p>
          &emsp;&emsp;
          <p>
            <input type="radio" name="durasi_sewa" value="per tahun">Pertahun
          </p>
         
        </div>
        <label>Jumlah Kamar</label>
        <input type="text" name="jumlah_kamar" placeholder="Masukkan Jumlah Kamar" /> 
        <label>Tanggal Pembayaran</label>
        <p align="left">
        <input type="date" name="tanggal" />
        </p>
        <label>Total Pembayaran</label>
        <input type="text" name="total" placeholder="Masukkan Total Pembayaran" />
        <label>Bukti Pembayaran</label>
        <input type="file" name="total" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
      </fieldset>
    </form>
  </div>

  <!-- js form pemilik kos -->
  <!-- <script src="assets/js/form-data-kos.js"></script> -->



@endsection