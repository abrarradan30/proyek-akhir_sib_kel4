@extends('frontend.index')
@section('front')


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
                <a href="login.html" class="header-top-button"><i class="lni-lock"></i> Log In</a> |
                <a href="register.html" class="header-top-button"><i class="lni-pencil"></i> Register</a> |
                <a href="#" class="header-top-button"><i class="lni-user"></i> Messi</a> |
                <a href="#" class="header-top-button"><i class="lni-exit"></i></a>
              </div>
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
            <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="" width="20%"></a>
          </div>

          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-center">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Home <i class="fa fa-angle-down"></i>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pusat Bantuan <i class="fa fa-angle-down"></i>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="about.html">Info Umum</a>
                  <a class="dropdown-item" href="single-blog.html">Syarat & Ketentuan</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">
                  Contact Us
                </a>
              </li>
            </ul>
            <div class="search-add float-right">
              <form method="post">
                <div class="form-group">
                    <input type="search" name="field-name" value="" placeholder="Cari Lokasi" required="">
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
            <a href="contact.html">
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

    <!-- Page Banner Start -->
    <div id="page-banner-area" class="page-banner">
      <div class="page-banner-title">
        <div class="text-center">
          <h2>Contact Us</h2>
          <a href="index.html"><i class="lni-home"></i> Home</a>
          <span class="crumbs-spacer"><i class="lni-chevron-right"></i></span>
          <span class="current">Contact Us</span>
        </div>
      </div>
    </div>
    <!-- Page Banner End -->

    <!-- Section Contact Start -->
    <section id="contact-section" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6">
            <div class="contact-right-area">
              <h2 class="title-">Get In Touch</h2>
              <p>If you are interested in working with us, <br> please get in touch.</p>
              <div class="contact-right">
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="lni-map-marker"></i>
                  </div>
                  <p>Malang, Indonesia</p>
                </div>
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="lni-envelope"></i>
                  </div>
                  <p><a href="#">ngalamkos@example.com</a></p>
                </div>
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="lni-phone-handset"></i>
                  </div>
                  <p><a href="#"> 1-800-555-1234</a></p>
                </div>
              </div>
              <div class="social-icon">
                <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
                <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
                <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
                <a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-6 form-line">
            <h2>FeedBack</h2>
              <div class="form-group">
                 <label>Name </label>
                <input type="text" class="form-control" id="name" name="email" placeholder="Your name" required data-error="Please enter your name">
                
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group"> 
                <p>Status</p>
                <input type="radio" name="status" value="Pelanggan"> Pelanggan
                <input type="radio" name="status" value="Pemilik Kos"> Pemilik Kos
                <div class="help-block with-errors"></div>
              </div>           
              <div class="form-group">
                <p>Message</p>
                <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message" required data-error="Write your message"></textarea>
              </div>
              <div class="form-submit">
                <button type="submit" class="btn btn-common" id="form-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
                <div id="msgSubmit" class="h3 text-center hidden"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Contact End -->

    <!-- Map Section Start -->
    <section id="google-map-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div id="conatiner-map"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Map Section End -->

    <!-- Footer Section Start -->
    <footer id="footer" class="footer-area section-padding">
      <div class="container">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel">About <span>Us</span></h3>
              <ul class="footer-link">
                <li><a href="#">Company</a></li>          
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel">Contact <span>Info</span></h3>
              <ul class="address">
                <li>
                  <a href="#"><i class="lni-map-marker"></i> Malang, Indonesia<br> </a>
                </li>
                <li>
                  <a href="#"><i class="lni-phone-handset"></i> 1-800-555-1234</a>
                </li>
                <li>
                  <a href="#"><i class="lni-envelope"></i> ngalamkos@example.com</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel">Subscribe <span>on Our News</span></h3>
              <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
                <div class="form-group is-empty">
                  <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Email address" required="">                  
                  <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i></button>
                  <div class="clearfix"></div>
                </div>
              </form>
              <div class="social-icon">
                <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
                <a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a>
              </div>
            </div>
          </div>
        </div>  
      </div>     
    </footer> 
    <!-- Footer Section End -->

    <section id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>Copyright © 2023 <a rel="nofollow" href="https://uideck.com">Ngalamkos</a> All Right Reserved</p>
          </div>
        </div>
      </div>
    </section> 



  
  

 

@endsection