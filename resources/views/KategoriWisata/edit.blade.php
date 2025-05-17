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
    @endsection