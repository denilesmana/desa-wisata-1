@extends('layouts.master-fe')
  @section('content')

<div class="container mt-5">
  <a href="{{ route('home') }}" class="mb-3 d-inline-block"> &lt; Kembali</a>
  <div class="row">
    
    <div class="col-md-6">
      <img id="mainImage" 
           src="{{ asset('storage/' . $penginapan->foto1) }}" 
           alt="Foto utama" 
           class="img-fluid mb-4 rounded main-image" 
           style="height: 350px; object-fit: cover; width: 100%;">

      <div class="gallery mb-5 d-flex flex-wrap" style="gap: 10px;">
        @php
          $fotoFields = ['foto1', 'foto2', 'foto3', 'foto4', 'foto5'];
        @endphp
        @foreach($fotoFields as $foto)
          @if($penginapan->$foto)
          <img src="{{ asset('storage/' . $penginapan->$foto) }}" 
              alt="Thumbnail" 
              onclick="changeMainImage(this)" 
              class="thumb-image rounded" 
              style="height: 60px; width: 100px; object-fit: cover; cursor: pointer;">
          @endif
        @endforeach
      </div>
    </div>
    <div class="col-md-6">
      <h3 class="text-primary mb-3">{{ $penginapan->nama_penginapan }}</h3>
      <div class="description-box mb-4">
        <p class="text-justify" style="line-height: 1.6;">{{ $penginapan->deskripsi }}</p>
      </div>
      <div class="facilities-box">
          <h5>Fasilitas:</h5>
          <ul class="ps-4">
              @foreach(explode(',', $penginapan->fasilitas) as $fasilitas)
              <li class="mb-2">{{ trim($fasilitas) }}</li>
              @endforeach
          </ul>
      </div>
    </div>
  </div>
</div>

<script>
    function changeMainImage(thumbnail) {
        const mainImg = document.getElementById("mainImage");
        mainImg.src = thumbnail.src;
    }
</script>



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