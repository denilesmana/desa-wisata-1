@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit Berita</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Mengedit Berita
              </p>
              <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleInputName1">Judul</label>
                  <input type="text" name="judul" class="form-control" id="judul" value="{{ old('judul', $berita->judul) }}" placeholder="Judul">
                  @error('judul')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
            
                <div class="form-group">
                  <label for="exampleInputName1">Berita</label>
                  <textarea name="berita" class="form-control" id="berita" placeholder="Berita">{{ old('berita', $berita->berita) }}</textarea>
                  @error('berita')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail3">Tanggal Post</label>
                  <input type="date" name="tgl_post" class="form-control" id="tgl_post" value="{{ old('tgl_post', $berita->tgl_post) }}">
                  @error('tgl_post')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
        
                <div class="form-group">
                  <label for="id_kategori_berita">Kategori Berita</label>
                  <select name="id_kategori_berita" class="form-control" required>
                    @foreach($kategori_berita as $kategori)
                      <option value="{{ $kategori->id }}" {{ (old('id_kategori_berita', $berita->id_kategori_berita) == $kategori->id) ? 'selected' : '' }}>
                        {{ $kategori->kategori_berita }}
                      </option>
                    @endforeach
                  </select>
                  @error('id_kategori_berita')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              
                <div class="form-group">
                  <label>Upload Image</label>
                  <input type="file" name="foto" class="file-upload-default" id="foto">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                  </div>
                  @if($berita->foto)
                    <img src="{{ asset('storage/' . $berita->foto) }}" width="100" class="mt-2">
                  @endif
                  @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('berita.index') }}" class="btn btn-light">Cancel</a>
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