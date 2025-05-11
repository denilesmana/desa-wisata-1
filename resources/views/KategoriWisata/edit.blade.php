@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kategori Wisata</h4>
                <p class="card-description">
                Ubah data kategori wisata di bawah ini
                </p>
                <form action="{{ route('kategori_wisata.update', $kategori_wisata->id) }}" method="POST">
                @csrf            
                @method('PUT')
               <div class="form-group">
                    <label for="kategori_wisata">Kategori Wisata</label>
                    <input type="text" name="kategori_wisata" class="form-control" id="kategori_wisata" value="{{ old('kategori_wisata', $kategori_wisata->kategori_wisata) }}" placeholder="Kategori Berita" required>
                    @error('kategori_wisata')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Update</button>
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
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 
      <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
      Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i>
    </span>
  </div>
</footer>

<!-- JS Scripts -->
<script src="{{ asset('backend/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('backend/js/off-canvas.js') }}"></script>
<script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('backend/js/template.js') }}"></script>
<script src="{{ asset('backend/js/todolist.js') }}"></script>
<script src="{{ asset('backend/js/file-upload.js') }}"></script>
