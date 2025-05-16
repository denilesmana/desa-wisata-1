@extends('layouts.footer')

    @include('layouts.navbar')
  
    
    <div class="site-section" data-aos="fade-up">
        <div class="container">
            <a href="{{ route('home') }}" class="mb-3 d-inline-block"> &lt; Kembali</a>
            <div class="mb-5">
                <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="img-fluid rounded h-100">
            </div>
            <h2 class="text-black mb-4">{{ $berita->judul }}</h2>
             <p class="text-muted mb-3">
            <span>{{ $berita->kategori_berita->kategori_berita ?? 'Tanpa Kategori' }}</span> &bullet;
            <span>{{ $berita->created_at->format('d M Y') }}</span>
            </p>
            <div>{!! $berita->berita !!}</div>
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