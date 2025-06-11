@extends('layouts.master-fe')
    

    @section('content')

    <div class="slide-one-item home-slider owl-carousel">
      <div class="site-blocks-cover overlay" style="background-image: url(/frontend/images/desa2.png);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-bold">Pesona Desa Wisata</h1>
              <p class="mb-5">Nikmati pengalaman wisata yang otentik, mulai dari kearifan lokal hingga pemandangan yang memukau.</p>
              <<p><a href="destination" class="btn btn-primary py-3 px-5 text-white">Reservasi Sekarang!</a></p>
            </div>
            
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover overlay" style="background-image: url(/frontend/images/desa2.png);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-bold">Pesona Desa Wisata</h1>
              <p class="mb-5">Rasakan ketenangan alam, kehangatan budaya lokal, dan pengalaman tak terlupakan di setiap sudut desa wisata kami.</p>
              <a href="destination" class="btn btn-primary py-3 px-5 text-white">Reservasi Sekarang!</a>
            </div>
          </div>
        </div>
      </div>  
    </div>


    <div class="site-section">
      <div class="container overlap-section">
        <div class="row">
          @foreach ($berita as $item)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <a href="{{ route('berita.show', $item->id) }}" class="unit-1 text-center">
                <img src="{{ asset('storage/' . $item->foto) }}" alt="Image" class="img-fluid">
                <div class="unit-1-text">
                  <h3 class="unit-1-heading">{{ $item->judul }}</h3>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Kategori Wisata</h2>
            <p class="color-black-opacity-5">Temukan Tempat Wisata Sesuai Kategori Favoritmu</p>
          </div>
        </div>
        <div class="row">
          @php
            $icons = ['bi-tree', 'bi-house-door', 'bi-egg-fried', 'bi-geo-alt', 'bi-geo-alt'];
            $iconIndex = 0; // Initialize counter
          @endphp

          @foreach($kategori_wisata as $kategori)
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="unit-4 text-center p-5 border h-100 d-flex flex-column justify-content-center align-items-center shadow-sm">
                <div class="unit-4-icon mb-4">
                  <i class="{{ $icons[$iconIndex % count($icons)] }} text-danger" style="font-size: 2.5rem; font-weight: 400; opacity: 0.85;"></i>
                </div>
                <h3 class="h3 font-weight-bold mb-2">{{ $kategori->kategori_wisata }}</h3>
                <p><a href="{{ route('kategori.obyek_wisata', $kategori->id) }}" class="text-danger">Lihat Wisata</a></p>
              </div>
            </div>
            @php $iconIndex++; @endphp
          @endforeach
        </div>
      </div>
    </div>





    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Paket Wisata Kami</h2>
            <p class="color-black-opacity-5">Temukan Liburan Terbaik Anda</p>
          </div>
        </div>
        <div class="row">
          @foreach ($paket_wisata as $paket)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="{{ route('paket_wisata.show', $paket->id) }}" class="unit-1 text-center">
              <img src="{{ asset('storage/' . $paket->foto1) }}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <strong class="text-primary mb-2 d-block">Rp {{ number_format($paket->harga_per_pack, 0, ',', '.') }}</strong>
                <h3 class="unit-1-heading">{{ $paket->nama_paket }}</h3>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>


    <!-- <div class="site-section bg-light">
      
    </div> -->


    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <h2 class="font-weight-light text-black">Penginapan Kami</h2>
        <p class="color-black-opacity-5">Temukan Kenyaman Terbaik Anda</p>
      </div>
    </div>
    <div class="container mt-5">
      @if($penginapan->count() > 0)
          <div class="row">
              @foreach($penginapan as $item)
                  <div class="col-md-4 mb-4">
                      <div class="card h-100 d-flex flex-column border rounded shadow-sm">
                          @if($item->foto1)
                              <img src="{{ asset('storage/'.$item->foto1) }}" 
                                  class="card-img-top img-fluid" 
                                  alt="{{ $item->nama_penginapan }}" 
                                  style="height: 200px; object-fit: cover;">
                          @else
                              <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                                  style="height: 200px;">
                                  No Image
                              </div>
                          @endif
                          
                          <div class="card-body d-flex flex-column">
                              <h5 class="card-title">{{ $item->nama_penginapan }}</h5>
                              <p class="card-text flex-grow-1">{{ Str::limit($item->deskripsi, 100) }}</p>
                              <a href="{{ route('penginapan.show', $item->id) }}" class="btn btn-sm btn-primary mt-auto w-100">Lihat Detail</a>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      {{-- @else
          <div class="alert alert-warning text-center">Tidak ada data penginapan tersedia</div> --}}
      @endif
    </div>


    
    <div class="site-section border-top">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="mb-5 text-black">Yuk, Jelajahi Dunia Bersama Kami!</h2>
            <p class="mb-0"><a href="destination" class="btn btn-primary py-3 px-5 text-white">Reservasi Sekarang!</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  <script>
    document.querySelectorAll('.scroll-to-paket').forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if(targetElement) {
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
          
          // Update URL tanpa reload
          history.pushState(null, null, targetId);
        }
      });
    });
  </script>
    
  </body>
</html>