@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Penginapan</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Menambahkan Penginapan
              </p>
              <form action="{{ route('penginapan.update', $penginapan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')           
                <div class="form-group">
                    <label for="nama_penginapan">Nama Penginapan</label>
                    <input type="text" name="nama_penginapan" class="form-control" id="nama_penginapan" value="{{ old('nama_penginapan', $penginapan->nama_penginapan) }}" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" required>{{ old('deskripsi', $penginapan->deskripsi) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <input type="text" name="fasilitas" class="form-control" id="fasilitas" value="{{ old('fasilitas', $penginapan->fasilitas) }}" required>
                </div>

                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="foto1" class="file-upload-default" id="foto1">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    @if($penginapan->foto1)
                      <img src="{{ asset('storage/' . $penginapan->foto1) }}" width="100" class="mt-2">
                    @endif
                    @error('foto1')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="foto2" class="file-upload-default" id="foto2">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    @if($penginapan->foto2)
                      <img src="{{ asset('storage/' . $penginapan->foto2) }}" width="100" class="mt-2">
                    @endif
                    @error('foto2')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="foto3" class="file-upload-default" id="foto3">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    @if($penginapan->foto3)
                      <img src="{{ asset('storage/' . $penginapan->foto3) }}" width="100" class="mt-2">
                    @endif
                    @error('foto3')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="foto4" class="file-upload-default" id="foto4">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    @if($penginapan->foto4)
                      <img src="{{ asset('storage/' . $penginapan->foto4) }}" width="100" class="mt-2">
                    @endif
                    @error('foto4')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="foto5" class="file-upload-default" id="foto5">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    @if($penginapan->foto5)
                      <img src="{{ asset('storage/' . $penginapan->foto5) }}" width="100" class="mt-2">
                    @endif
                    @error('foto5')
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
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
      </div>
    </footer>
    <!-- partial -->
  </div>
