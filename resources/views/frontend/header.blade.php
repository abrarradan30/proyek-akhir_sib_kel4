<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ngalamkos</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/line-icons.css')}}">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slicknav.css')}}">

    <!-- Range Slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/ion.rangeSlider.css')}}">
    <!-- Range Slider  -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/ion.rangeSlider.skinFlat.css')}}">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/nivo-lightbox.css')}}" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/animate.css')}}">
    <!-- Owl carousel -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.carousel.css')}}">
    <!-- Rav Slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/extras/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/extras/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/extras/navigation.css')}}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
    {{-- form kos --}}
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/daftar-kos.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/form-pelanggan.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/form-data-kos.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/form-pemilik-kos.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/detail-kos.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/riwayat-pesanan.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/info_syarat.css')}}">

  </head>
  <body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Start Top Bar -->
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-xs-12">
              <!-- Start Contact Info -->
              <ul class="links clearfix">
                <li><i class="lni-phone-handset"></i>1-800-555-1234</li>
                <li><i class="lni-envelope"></i> ngalamkos@example.com</li>
                <li><a href="#"><i class="lni-map-marker"></i> Malang, Indonesia</a></li>
              </ul>
              <!-- End Contact Info -->
            </div>
            <div class="col-lg-5 col-md-4 col-xs-12">
              <div class="roof-social float-right">
                <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
                <a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a>
              </div>
              <div class="header-top-right float-right">
              @guest
              @if (Route::has('login'))
                <a href="{{ route('login') }}" class="header-top-button"><i class="lni-lock"></i> Log In</a> |
              @endif
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="header-top-button"><i class="lni-pencil"></i> Register</a> |
              @endif
							@else 
                <a href="#" class="header-top-button"><i class="lni-user"></i> 
                {{ Auth::user()->name }} </a> |
                <a href="{{ route('logout') }}" class="header-top-button"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="lni-exit"> Logout</i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
              @endguest
            </div>
          </div>
        </div>
      </div>
      <!-- End Top Bar -->

      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white"  data-toggle="sticky-onscroll">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="lin-menu"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('frontend/img/logo.png')}}" alt="" width="20%"></a>
          </div>

          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-center">
              <li class="">
                <a class="nav-link" href="{{url('/')}}">
                  Home 
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pusat Bantuan <i class="fa fa-angle-down"></i>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{url('info')}}">Info Umum</a>
                  <a class="dropdown-item" href="{{url('syarat')}}">Syarat & Ketentuan</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('contact')}}">
                  Contact Us
                </a>
              </li>
            </ul>
            <div class="search-add float-right">
              <form method="post">
                <div class="form-group">
                    <input type="search" name="field-name" value="" placeholder="Search" required="">
                    <button type="submit" class="search-btn"><span class="lni-search"></span></button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
          <li>
            <a class="active" href="index.html">
            Home
            </a>
          </li>
          <li>
            <a href="#">Pusat Bantuan</a>
            <ul class="dropdown">
              <li><a href="about.html">Info Umum</a></li>
              <li><a href="agents.html">Syarat & Ketentuan</a></li>
            </ul>
          </li>
          <li>
            <a href="{{url('contact')}}">
            Contact Us
            </a>
          </li>
        </ul>
        <!-- Mobile Menu End -->
      </nav>
      <!-- Navbar End -->
      <div class="clearfix"></div>
    </header>
    <!-- Header Area wrapper End -->
    