@extends('frontend.index')
@section('front')

    <section id="intro" class="section-intro">
  
      <div class="search-container">
        <div class="container">
          <div class="row">
            <img src="{{asset('frontend/img/background/bg-intro2.jpg')}}" alt="">
            <div class="col-md-12">
              <!-- <h4 class="intro-sub-heading">You are using Fre Lite Version!</h4> -->
              <h3 class="intro-title">Temukan Kost Yang Sesuai Dengan Keinginanmu Di Ngalamkos</h3>
              <!-- <a href="https://rebrand.ly/estatebit-purchase-ud" rel="nofollow" class="btn btn-danger btn-lg">PURCHASE NOW</a> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Property Section Start -->
    <section class="property section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h2 class="section-title">Rekomendasi Kos</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="property-main">
              <div class="property-wrap">
                <div class="property-item">
                  <div class="item-thumb">
                    <a class="hover-effect" href="detail_kos.html">
                      <img class="img-fluid" src="{{asset('frontend/img/property/house-1.jpg')}}" alt="">
                    </a>
                  </div>
                  <div class="item-body">
                    <h3 class="property-title"><a href="property.html">Amazing oceanfront apartment</a></h3>
                    <div class="adderess"><i class="lni-map-marker"></i> Drive Street, Los Angeles, US</div>
                    <div class="pricin-list">
                      <div class="property-price">
                        <span>$1,500</span>
                      </div>
                     <p><span>4 bds</span> . <span>4 ba</span> . <span>2500 Sqft</span></p>
                    </div>
                  </div>               
                </div>              
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="property-main">
              <div class="property-wrap">
                <div class="property-item">
                  <div class="item-thumb">
                    <a class="hover-effect" href="property.html">
                      <img class="img-fluid" src="{{asset('frontend/img/property/house-2.jpg')}}" alt="">
                    </a>
                  </div>
                  <div class="item-body">
                    <h3 class="property-title"><a href="property.html">Family Condo</a></h3>
                    <div class="adderess"><i class="lni-map-marker"></i> Louis, Missouri, US</div>
                    <div class="pricin-list">
                      <div class="property-price">
                        <span>$27,00</span>
                      </div>
                     <p><span>6 bds</span> . <span>8 ba</span> . <span>2600 Sqft</span></p>
                    </div>
                  </div>               
                </div>              
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="property-main">
              <div class="property-wrap">
                <div class="property-item">
                  <div class="item-thumb">
                    <a class="hover-effect" href="property.html">
                      <img class="img-fluid" src="{{asset('frontend/img/property/house-3.jpg')}}" alt="">
                    </a>
                  </div>
                  <div class="item-body">
                    <h3 class="property-title"><a href="property.html">Guaranteed modern home</a></h3>
                    <div class="adderess"><i class="lni-map-marker"></i> Avenue C, New York, US</div>
                    <div class="pricin-list">
                      <div class="property-price">
                        <span>$1,750</span>
                      </div>
                     <p><span>8 bds</span> . <span>8 ba</span> . <span>3000 Sqft</span></p>
                    </div>
                  </div>               
                </div>              
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="property-main">
              <div class="property-wrap">
                <div class="property-item">
                  <div class="item-thumb">
                    <a class="hover-effect" href="property.html">
                      <img class="img-fluid" src="{{asset('frontend/img/property/house-4.jpg')}}" alt="">
                    </a>
                  </div>
                  <div class="item-body">
                    <h3 class="property-title"><a href="property.html">Family home for sale</a></h3>
                    <div class="adderess"><i class="lni-map-marker"></i> Sacramento, Chicago, US</div>
                    <div class="pricin-list">
                      <div class="property-price">
                        <span>$1,400</span>
                      </div>
                     <p><span>2 bds</span> . <span>2 ba</span> . <span>2200 Sqft</span></p>
                    </div>
                  </div>               
                </div>              
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="property-main">
              <div class="property-wrap">
                <div class="property-item">
                  <div class="item-thumb">
                    <a class="hover-effect" href="property.html">
                      <img class="img-fluid" src="{{asset('frontend/img/property/house-5.jpg')}}" alt="">
                    </a>
                  </div>
                  <div class="item-body">
                    <h3 class="property-title"><a href="property.html">Amazing oceanfront apartment</a></h3>
                    <div class="adderess"><i class="lni-map-marker"></i> 53 W 88th St, Dallas, US</div>
                    <div class="pricin-list">
                      <div class="property-price">
                        <span>$1,750</span>
                      </div>
                     <p><span>6 bds</span> . <span>6 ba</span> . <span>2700 Sqft</span></p>
                    </div>
                  </div>               
                </div>              
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="property-main">
              <div class="property-wrap">
                <div class="property-item">
                  <div class="item-thumb">
                    <a class="hover-effect" href="property.html">
                      <img class="img-fluid" src="{{asset('frontend/img/property/house-6.jpg')}}" alt="">
                    </a>
                  </div>
                  <div class="item-body">
                    <h3 class="property-title"><a href="property.html">Luxury home for sale</a></h3>
                    <div class="adderess"><i class="lni-map-marker"></i> 365 Webber Street, Washington</div>
                    <div class="pricin-list">
                      <div class="property-price">
                        <span>$1,800</span>
                      </div>
                     <p><span>5 bds</span> . <span>7 ba</span> . <span>2800 Sqft</span></p>
                    </div>
                  </div>               
                </div>              
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-title-header text-center">
                  <a href="daftar_kos.html" rel="nofollow" class="btn btn-danger btn-lg">Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
    </section>
    <!-- Property Section End -->   

    <!-- Featured Section Start -->
    <section class="featured-bg section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h2 class="section-title">About Us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-6 col-xs-12">
            <img class="img-fluid" src="{{asset('frontend/img/about/img-3.png')}}" alt="">
          </div>
          <div class="col-md-12 col-lg-6 col-xs-12">
            <h2 class="intro-title">Ngalamkos</h2>
            <h3 class="title-sub">Website Sewa Kamar Kos terbaik</h3>
            <p align="justify">Website sewa kos "Ngalamkos" dirancang pada tahun 2023, 
              dibuat dengan memanfaatkan teknologi yang berkembang pesat pada saat ini yaitu berbasis web. 
              <br align="justify">
              Di "Ngalamkos" Anda akan menemukan berbagai penawaran kamar kos yang memiliki fasilitas serta
              harga yang berbeda-beda sesuai dengan kebutuhan anda.
            </p><br>
            <div class="row">
              <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="featured-item">
                  <div class="icon">
                    <i class="lni-medall"></i>
                  </div>
                  <h3><a href="#">Peduli</a></h3>
                  <div class="featured-content">
                    <p align="justify">Kami sangat memperhatikan para pelanggan yang ingin menyewa kamar kos-kosan di website kami.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="featured-item">
                  <div class="icon">
                    <i class="lni-thumbs-up"></i>
                  </div>
                  <h3><a href="#">Tanggung Jawab</a></h3>
                  <div class="featured-content">
                    <p align="justify">Kami memberi informasi sesuai dengan kenyataan yang ada di lapangan. Jadi jangan ragu untuk berkunjung di website kami.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Section End -->

    <!-- Testimonial Section Start -->
    <section class="testimonial section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="testimonials" class="owl-carousel">
              <div class="item">
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quidem, excepturi facere magnam illum, at accusantium doloremque odio.</p>
                  </div>
                </div>
                <div class="client-info">
                  <div class="img-thumb">
                    <img src="assets/img/testimonial/img1.png" alt="">
                  </div>
                  <div class="info-text">
                    <h2><a href="#">Michael Papirov</a></h2>
                    <h4><a href="#">Customer</a></h4>
                  </div>
                </div>
              </div>
             <div class="item">
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quidem, excepturi facere magnam illum, at accusantium doloremque odio.</p>
                  </div>
                </div>
                <div class="client-info">
                  <div class="img-thumb">
                    <img src="assets/img/testimonial/img2.png" alt="">
                  </div>
                  <div class="info-text">
                    <h2><a href="#">Josh Rossi</a></h2>
                    <h4><a href="#">Manager</a></h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quidem, excepturi facere magnam illum, at accusantium doloremque odio.</p>
                  </div>
                </div>
                <div class="client-info">
                  <div class="img-thumb">
                    <img src="assets/img/testimonial/img3.png" alt="">
                  </div>
                  <div class="info-text">
                    <h2><a href="#">Daniel Greem</a></h2>
                    <h4><a href="#">Customer</a></h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quidem, excepturi facere magnam illum, at accusantium doloremque odio.</p>
                  </div>
                </div>
                <div class="client-info">
                  <div class="img-thumb">
                    <img src="assets/img/testimonial/img4.png" alt="">
                  </div>
                  <div class="info-text">
                    <h2><a href="#">John Doe</a></h2>
                    <h4><a href="#">Manager</a></h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quidem, excepturi facere magnam illum, at accusantium doloremque odio.</p>
                  </div>
                </div>
                <div class="client-info">
                  <div class="img-thumb">
                    <img src="assets/img/testimonial/img5.png" alt="">
                  </div>
                  <div class="info-text">
                    <h2><a href="#">Michael Papirov</a></h2>
                    <h4><a href="#">Customer</a></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial Section End -->

@endsection