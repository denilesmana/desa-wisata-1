@extends('layouts.master-fe')
    
    @section('content')

      <div class="site-blocks-cover inner-page-cover" style="background-image: url(frontend/images/desa2.png);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-bold">Tentang Kami</h1>
              <div><a href="home">Home</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Tentang Kami</span></div>
              
            </div>
          </div>
        </div>
      </div>  


    
      <div class="site-section" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 mb-5 mb-md-0">
              <img src="{{ asset('frontend/images/destinasi_1.jpg') }}" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6 pl-md-5">
              <h2 class="font-weight-light text-black mb-4">Tentang Kami</h2>
              <p>StayDesa adalah platform desa wisata yang hadir untuk memperkenalkan keindahan alam, budaya lokal, serta kehidupan masyarakat pedesaan kepada wisatawan dengan cara yang autentik dan berkesan. Kami percaya bahwa setiap desa memiliki cerita, tradisi, dan pesona yang unik untuk dibagikan kepada dunia.</p>

              <ul class="list-unstyled">
                <li class="mb-3">
                  <div class="d-flex align-items-start">
                    <div>
                      <ul style="list-style-type: disc; padding-left: 20px;">
                        <li><strong>Pengalaman Wisata yang Autentik</strong></li>
                        <li><strong>Pemberdayaan Masyarakat Lokal</strong></li>
                        <li><strong>Wisata Berkelanjutan & Edukatif</strong></li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>


    <div class="site-section block-13 bg-light">
      <div class="container" data-aos="fade">
          <div class="row justify-content-center mb-7">
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
                    <p class="text-black lead">&ldquo;Menginap di desa wisata bersama Staydesa benar-benar membuka wawasan saya tentang kehidupan lokal. Interaksi dengan warga dan kegiatan sehari-hari seperti menanam padi hingga belajar membatik membuat pengalaman ini terasa sangat berharga.&rdquo;</p>
                    <p class="">&mdash; <em>Andini Rahma</em>, <a href="#">Traveler</a></p>
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
                    <p class="text-black lead">&ldquo;Saya sangat terkesan dengan komitmen Staydesa dalam memberdayakan masyarakat lokal. Setiap kegiatan wisata terasa hangat dan bermakna karena langsung melibatkan warga sekitar, bukan sekadar hiburan biasa.&rdquo;</p>
                    <p class="">&mdash; <em>Michael Santoso</em>, <a href="#">Traveler</a></p>
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
                    <p class="text-black lead">&ldquo;Staydesa memberikan pengalaman wisata yang berbeda dan sangat edukatif. Anak-anak saya belajar banyak tentang alam, budaya, dan pentingnya menjaga lingkungan melalui kegiatan yang menyenangkan dan interaktif.&rdquo;</p>
                    <p class="">&mdash; <em>Laras Wulandari</em>, <a href="#">Traveler</a></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  @endsection
  </body>
</html>