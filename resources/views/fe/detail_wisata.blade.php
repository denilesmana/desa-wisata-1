@extends('layouts.footer')

    @include('layouts.navbar')

   <div class="site-section py-5">
  <div class="container">
    <h2 class="text-center mb-5">Kategori: {{ $kategori->kategori_wisata }}</h2>
    <div class="row justify-content-center">
      @foreach($wisata as $item)
      <div class="col-md-10 col-lg-6 mb-5">
        <div class="card bg-dark text-white border-0 shadow-sm h-100">
          <div class="position-relative" style="height: 360px; overflow: hidden;">
            <img src="{{ asset('storage/' . $item->foto1) }}"
              class="card-img object-fit-cover h-100 w-100"
              alt="{{ $item->nama_wisata }}"
              style="object-fit: cover; filter: brightness(0.75);">
              
            <div class="card-img-overlay d-flex flex-column justify-content-end p-3"
              style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
              
              <h4 class="card-title mb-2">{{ $item->nama_wisata }}</h4>

              <p class="card-text mb-2" style="font-size: 0.9rem;">
                <strong>Deskripsi:</strong> {{ Str::limit(strip_tags($item->deskripsi_wisata), 35) }}
              </p>

              <p class="card-text mb-2" style="font-size: 0.9rem;">
                <strong>Fasilitas:</strong> {{ $item->fasilitas }}
              </p>

            <div class="d-flex flex-wrap mb-2" style="gap: 10px;">
                @for($i = 1; $i <= 5; $i++)
                    @php $foto = 'foto' . $i; @endphp
                    @if($item->$foto)
                    <img src="{{ asset('storage/' . $item->$foto) }}"
                        width="50" height="50"
                        class="rounded border"
                        style="object-fit: cover;">
                    @endif
                @endfor
            </div>

              <p class="card-text mt-1"><small class="text-muted">Terakhir diperbarui {{ $item->updated_at->diffForHumans() }}</small></p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
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