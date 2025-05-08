@extends('layouts.footer')

    @include('layouts.navbar')

    <div class="site-blocks-cover inner-page-cover" style="background-image: url(frontend/images/desa2.png);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-bold">Blog</h1>
              <div><a href="home">Home</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Blog</span></div>
              
            </div>
          </div>
        </div>
      </div>   


    
    <div class="site-section" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0">
            <img src="{{ asset('frontend/images/hero_bg_2.jpg') }}" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-6 pl-md-5">
            <h2 class="font-weight-light text-black mb-4">About Company</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae cumque eius modi expedita accusamus alias error totam ab magnam a mollitia magni, distinctio temporibus optio illo sapiente, odio unde natus.</p>

            <ul class="list-unstyled">
              <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span>Vitae cumque eius modi expedita</span></li>
              <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span>Totam at maxime Accusantium</span></li>
              <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span>Distinctio temporibus</span></li>

            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section block-13 bg-light">
  

    <div class="container" data-aos="fade">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <h2 class="font-weight-light text-black text-center">What People Says</h2>
          </div>
        </div>

        <div class="nonloop-block-13 owl-carousel">

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="{{ asset('frontend/images/img_1.jpg') }}" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>James Martin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="{{ asset('frontend/images/img_2.jpg') }}" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>Clair Augustin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="{{ asset('frontend/images/img_4.jpg') }}" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>James Martin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section border-top">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="mb-5 text-black">Want To Travel With Us?</h2>
            <p class="mb-0"><a href="booking.html" class="btn btn-primary py-3 px-5 text-white">Book Now</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('frontend/js/aos.js') }}"></script>

  <script src="{{ asset('frontend/js/main.js') }}"></script>
    
  </body>
</html>