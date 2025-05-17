@extends('layouts.master')

@section('content')
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
    @endsection