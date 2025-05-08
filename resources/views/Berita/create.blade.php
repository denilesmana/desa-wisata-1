@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Berita</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Menambahkan Berita
              </p>
              <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">

                @csrf            
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul" required>
                </div>
            
                <div class="form-group">
                  <label for="berita">Berita</label>
                  <textarea name="berita" class="form-control" id="berita" placeholder="Berita" style="resize: both;" rows="5" required></textarea>
                </div>
                
                <div class="form-group">
                  <label for="tgl_post">Tanggal Post</label>
                  <input type="date" name="tgl_post" class="form-control" id="tgl_post" required>
                </div>

                <div class="form-group">
                  <label for="kategori_berita_id" class="form-label">Kategori Berita</label>
                  <select name="id_kategori_berita" id="kategori_berita_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori_berita as $item)
                      <option value="{{ $item->id }}">{{ ucfirst(str_replace('_', ' ', $item->kategori_berita)) }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="foto">Upload Foto</label>
                  <input type="file" name="foto" class="form-control" id="foto" accept="image/*" required>
                  <div class="mt-2">
                    <img id="preview" src="#" alt="Preview" style="max-width: 200px; display: none;">
                  </div>
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

  <script src="{{ asset('backend/ vendors/base/vendor.bundle.base.js') }}"></>
  <script src="{{ asset('backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('backend/js/template.js') }}"></script>
  <script src="{{ asset('backend/js/todolist.js') }}"></script>
  <script src="{{ asset('backend/js/file-upload.js') }}"></script>

