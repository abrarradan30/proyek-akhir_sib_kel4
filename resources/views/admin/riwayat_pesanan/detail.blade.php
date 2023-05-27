@extends('admin.layout.appadmin')
@section('content')

<h1 align="center"> Details  Riwayat Pesanan </h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<div class="container">
<div class="row">
<div class="col-md-5">
<div class="project-info-box mt-0">
    @foreach($riwayat_pesanan as $rp)
<h5>RIWAYAT PESANAN DETAILS</h5>
<p class="mb-0">Vivamus pellentesque, felis in aliquam ullamcorper, lorem tortor porttitor erat, hendrerit porta nunc tellus eu lectus. Ut vel imperdiet est. Pellentesque condimentum, dui et blandit laoreet, quam nisi tincidunt tortor.</p>
</div>
<input type="hidden" value="{{$rp->id}}"/>
<div class="project-info-box">
<p><b>Durasi Sewa:</b> {{$rp->durasi_sewa}}</p>
<p><b>Tanggal:</b> {{$rp->tanggal}}</p>
<p><b>Jumlah Kamar:</b> {{$rp->jumlah_kamar}}</p>
<p><b>Total:</b> {{$rp->total}}</p>
<p><b>Nama Kos:</b> {{$rp->nama_kos}}</p>
<p><b>Status Pembayaran:</b> {{$rp->status_pembayaran}}</p>
<p><b>Nama Pelanggan:</b> {{$rp->nama_pelanggan}}</p>
</div>
<div class="project-info-box mt-0 mb-0">
<p class="mb-0">
<span class="fw-bold mr-10 va-middle hide-mobile">Share:</span>
<a href="#x" class="btn btn-xs btn-facebook btn-circle btn-icon mr-5 mb-0"><i class="fab fa-facebook-f"></i></a>
<a href="#x" class="btn btn-xs btn-twitter btn-circle btn-icon mr-5 mb-0"><i class="fab fa-twitter"></i></a>
<a href="#x" class="btn btn-xs btn-pinterest btn-circle btn-icon mr-5 mb-0"><i class="fab fa-pinterest"></i></a>
<a href="#x" class="btn btn-xs btn-linkedin btn-circle btn-icon mr-5 mb-0"><i class="fab fa-linkedin-in"></i></a>
</p>
</div>
</div>
<div class="col-md-7">
<div class="project-info-box">
<a href="{{url('admin/riwayat_pesanan')}}">
    <button class="btn btn-primary btn-lg"> Back </button>
</a>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
@endforeach

@endsection