@extends('layouts.footer')
   
    @include('layouts.navbar')

    <div class="site-blocks-cover inner-page-cover" style="background-image: url(frontend/images/desa2.png);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-bold">Book A Tour</h1>
              <div><a href="home">Home</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Booking</span></div>
              
            </div>
          </div>
        </div>
      </div>  


    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">

            

            <form action="#" class="p-5 bg-white">
              <div class="row form-group">
                <div class="col-md-6 mb-4">
                  <label class="text-black" for="fname">Nama Lengkap</label>
                  <input type="text" id="fname" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="col-md-6 mb-4">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Email">
                </div>
              </div>
            
              <div class="row form-group">
                <div class="col-md-6 mb-4">
                  <label class="text-black" for="checkin">Tanggal Check-in</label> 
                  <input type="text" id="checkin" class="form-control datepicker px-2" placeholder="Tanggal Check-in">
                </div>
                <div class="col-md-6 mb-4">
                  <label class="text-black" for="checkout">Tanggal Check-out</label> 
                  <input type="text" id="checkout" class="form-control datepicker px-2" placeholder="Tanggal Check-out">
                </div>
              </div>
            
              <div class="form-group mb-4">
                <label for="jumlah" class="text-black">Jumlah Orang</label>
                <input type="number" class="form-control" id="jumlah" min="1" placeholder="Jumlah orang">
              </div>
            
              <div class="form-group mb-4">
                <label class="text-black" for="destination">Destinasi</label> 
                <select name="destination" id="destination" class="form-control" style="background-position: right 1rem center;">
                  <option value="">Pilih Desa</option>
                  <option value="desa1">Desa Wisata 1</option>
                  <option value="desa2">Desa Wisata 2</option>
                  <option value="desa3">Desa Wisata 3</option>
                  <option value="desa4">Desa Wisata 4</option>
                </select>                
              </div>
            
              <div class="form-group mb-4">
                <label for="discount" class="text-black">Diskon</label>
                <input type="text" id="discount" name="discount" class="form-control" placeholder="Masukkan kode diskon (jika ada)">
              </div>
            
              <div class="form-group mb-4">
                <label for="total" class="text-black">Total Bayar</label>
                <input type="text" id="total" name="total" class="form-control" placeholder="Rp 0.000" readonly>
              </div>
            
              <div class="form-group mb-4">
                <label for="bukti" class="text-black">Upload Bukti Transfrontendr</label>
                <input type="file" id="bukti" name="bukti" class="form-control">
              </div>
            
              <div class="form-group mb-5">
                <label class="text-black" for="note">Notes</label> 
                <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="Tulis catatan atau pertanyaan di sini..."></textarea>
              </div>
            
              <div class="form-group">
                <input type="submit" value="Kirim Reservasi" class="btn btn-primary py-2 px-4 text-white">
              </div>
            </form>
            
            
          </div>
          <div class="col-md-5">
            <div class="p-4 mb-3 bg-white">
              <img id="mainImage" src="frontend/images/desa_1.jpg" alt="Image" class="img-fluid mb-3 rounded main-image">
          
              <!-- Gallery - jarak ke atas dikecilin -->
              <div class="gallery mb-3" style="margin-top: 10px;">
                <img src="frontend/images/desa_1.jpg" alt="Foto 1" onclick="changeMainImage(this)" class="thumb-image">
                <img src="frontend/images/desa_2.JPG" alt="Foto 2" onclick="changeMainImage(this)" class="thumb-image">
                <img src="frontend/images/desa_3.jpg" alt="Foto 3" onclick="changeMainImage(this)" class="thumb-image">
              </div>
          
              <!-- Jarak teks tetap enak dibaca -->
              <h3 class="text-primary mb-2 d-block" style="margin-top: 20px;">Desa Wisata Wae Robo</h3>
              <strong class="mb-3 d-block">Nusa Tenggara Timur</strong>
          
              <div>
                <strong class="d-block mb-2 mt-3">Fasilitas</strong>
                <ul style="padding-left: 20px; margin-top: 5px;">
                  <li>Toilet</li>
                  <li>Homestay tradisional</li>
                  <li>Glamping / camping ground</li>
                  <li>Kuliner khas desa</li>
                  <li>Pertunjukan budaya</li>
                  <li>Jalur tracking alam</li>
                  <li>Kolam alam / sungai</li>
                  <li>Wi-Fi gratis</li>
                </ul>
              </div>
            </div>
          
            <script>
              function changeMainImage(thumbnail) {
                const mainImg = document.getElementById("mainImage");
                mainImg.src = thumbnail.src;
              }
            </script>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="frontend/js/jquery-3.3.1.min.js"></script>
  <script src="frontend/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="frontend/js/jquery-ui.js"></script>
  <script src="frontend/js/popper.min.js"></script>
  <script src="frontend/js/bootstrap.min.js"></script>
  <script src="frontend/js/owl.carousel.min.js"></script>
  <script src="frontend/js/jquery.stellar.min.js"></script>
  <script src="frontend/js/jquery.countdown.min.js"></script>
  <script src="frontend/js/jquery.magnific-popup.min.js"></script>
  <script src="frontend/js/bootstrap-datepicker.min.js"></script>
  <script src="frontend/js/aos.js"></script>

  <script src="frontend/js/main.js"></script>
    
  </body>
</html>