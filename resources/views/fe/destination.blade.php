@extends('layouts.master-fe')

    @section('content')


    <div class="site-blocks-cover inner-page-cover" style="background-image: url(frontend/images/desa2.png);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-bold">Destinasi</h1>
              <div><a href="home">Beranda</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Destinasi</span></div>
              
            </div>
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
  </div>
  @endsection
    
  </body>
</html>

