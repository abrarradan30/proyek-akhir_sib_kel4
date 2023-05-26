@extends('admin/layout.appadmin')
@section('content')

<h1>Details</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="project-info-box mt-0">
                <h5>PROJECT DETAILS</h5>
                <p class="mb-0">Vivamus pellentesque, felis in aliquam ullamcorper, lorem tortor porttitor erat, hendrerit porta nunc tellus eu lectus. Ut vel imperdiet est. Pellentesque condimentum, dui et blandit laoreet, quam nisi tincidunt tortor.</p>
            </div>
            <input type="hidden" value="{{$d->id}}" />
            <div class="project-info-box">
                <p><b>Nama:</b>{{$d->nama}}</p>
                <p><b>username:</b> {{$d->username}}</p>
                <p><b>Password:</b>{{$d->password}}</p>
                <p><b>Email:</b> {{$d->email}}</p>
                <p><b>Jenis Kelamin:</b> {{$d->jk}}</p>
                <p><b>Alamat:</b> {{$d->alamat}}</p>
                <p><b>Telepon:</b> {{$d->telepon}}</p>
                <p class="mb-0"><b>Budget:</b> $500</p>
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
            <img src="https://www.bootdey.com/image/400x300/FFB6C1/000000" alt="project-image" class="rounded">
            <div class="project-info-box">
                <p><b>Pemilik Kos:</b>{{$pk->nama}}</p>
                <a href="{{url('admin/pemilik_kos')}}">
                    <button class="btn btn-primary btn-lg">BACK</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>



@endsection