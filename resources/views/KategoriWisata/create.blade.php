@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Kategori Wisata</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Menambahkan Kategori Wisata
              </p>
              <form action="{{ route('kategori_wisata.store') }}" method="POST">
                @csrf            

                <div class="form-group">
                    <label for="exampleSelectGender">Kategori Wisata</label>
                    <select class="form-control" name="kategori_wisata" id="kategori_iwsata" required>
                      <option value="">-- Pilih Kategori --</option>
                      <option value="wisata_alam">Wisata Alam</option>
                      <option value="wisata_budaya">Wisata Budaya</option>
                      <option value="wisata_kuliner">Wisata Kuliner</option>
                  </select>
                </div>
            
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="button" class="btn btn-light" onclick="window.history.back()">Cancel</button>
            </form>            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
      </div>
    </footer>
    <!-- partial -->
  </div>

  <script src="{{ asset('backend/ vendors/base/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('backend/js/template.js') }}"></script>
  <script src="{{ asset('backend/js/todolist.js') }}"></script>
  <script src="{{ asset('backend/js/file-upload.js') }}"></script>

