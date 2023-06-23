@extends('frontend.index')
@section('front')

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
              <p>Jika Anda tertarik untuk menyewakan kos dengan website kami, <br> hubungi kami.</p>
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
          <form method="POST" action="{{url('contact/store')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="col-lg-7 col-md-6 form-line">
            <h2>FeedBack</h2>
              <div class="form-group">
                 <label>Name </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required data-error="Please enter your name">
                
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

    
@endsection