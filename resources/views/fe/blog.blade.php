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


    
    @foreach ($berita as $item)
    <div class="site-section" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="img-fluid rounded">
                </div>
                <div class="col-md-6 pl-md-5">
                    <h3 class="font-weight-light text-black mb-3">{{ $item->judul }}</h3>
                    <p class="mb-4">{{ Str::limit(strip_tags($item->berita), 250) }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <a href="#" class="text-black">{{ $item->kategori_berita->kategori_berita ?? 'Tanpa Kategori' }}</a>, 
                            <a href="#" class="text-black">{{ $item->created_at->format('d M Y') }}</a>
                        </p>
                        <a href="{{ route('berita.show', $item->id) }}" class="text-primary font-weight">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach



    

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