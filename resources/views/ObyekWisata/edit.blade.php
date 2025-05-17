@extends('layouts.master')

@section('content')
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kategori Wisata</h4>
                <p class="card-description">
                Ubah data kategori wisata di bawah ini
                </p>
                <form action="{{ route('obyek_wisata.update', $obyek_wisata->id) }}" method="POST" enctype="multipart/form-data">
                @csrf            
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputName1">Nama Wisata</label>
                    <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" value="{{ old('nama_wisata', $obyek_wisata->nama_wisata) }}" placeholder="Nama Wisata">
                    @error('nama_wisata')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Deskripsi</label>
                    <textarea name="deskripsi_wisata" class="form-control" id="deskripsi_wisata" placeholder="deskripsi_wisata">{{ old('deskripsi_wisata', $obyek_wisata->deskripsi_wisata) }}</textarea>
                    @error('deskripsi_wisata')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="id_kategori_wisata">Kategori Wisata</label>
                  <select name="id_kategori_wisata" class="form-control" required>
                      @foreach($kategori_wisata as $kategori)
                          <option value="{{ $kategori->id }}" 
                              {{ (old('id_kategori_wisata', $berita->id_kategori_wisata ?? '') == $kategori->id) ? 'selected' : '' }}>
                              {{ ucwords(str_replace('_', ' ', $kategori->kategori_wisata)) }}
                          </option>
                      @endforeach
                  </select>
                  @error('id_kategori_wisata')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Fasilitas</label>
                    <textarea name="fasilitas" class="form-control" id="fasilitas" placeholder="fasilitas">{{ old('fasilitas', $obyek_wisata->fasilitas) }}</textarea>
                    @error('fasilitas')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                    @if($obyek_wisata->foto1)
                      <img src="{{ asset('storage/' . $obyek_wisata->foto1) }}" width="100" class="mt-2">
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
                    @if($obyek_wisata->foto2)
                      <img src="{{ asset('storage/' . $obyek_wisata->foto2) }}" width="100" class="mt-2">
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
                    @if($obyek_wisata->foto3)
                      <img src="{{ asset('storage/' . $obyek_wisata->foto3) }}" width="100" class="mt-2">
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
                    @if($obyek_wisata->foto4)
                      <img src="{{ asset('storage/' . $obyek_wisata->foto4) }}" width="100" class="mt-2">
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
                    @if($obyek_wisata->foto5)
                      <img src="{{ asset('storage/' . $obyek_wisata->foto5) }}" width="100" class="mt-2">
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
    @endsection
