@extends('layouts.master')

@section('content')
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kategori Berita</h4>
                <p class="card-description">
                Ubah data kategori berita di bawah ini
                </p>
                <form action="{{ route('kategori_berita.update', $kategori_berita->id) }}" method="POST">
                @csrf            
                @method('PUT')
                <div class="form-group">
                    <label for="kategori_berita">Kategori Berita</label>
                    <input type="text" name="kategori_berita" class="form-control" id="kategori_berita" value="{{ old('kategori_berita', $kategori_berita->kategori_berita) }}" placeholder="Kategori Berita" required>
                    @error('kategori_berita')
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