@extends('layouts.master')

@section('content')
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Kategori Berita</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Menambahkan Kategori Berita
              </p>
              <form action="{{ route('kategori_berita.store') }}" method="POST">
                @csrf            

                <div class="form-group">
                    <label for="exampleSelectGender">Kategori Berita</label>
                    <input type="text" name="kategori_berita" class="form-control" id="kategori_berita" placeholder="Kategori Berita" required>
                </div>
            
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="button" class="btn btn-light" onclick="window.history.back()">Cancel</button>
            </form>            
            </div>
          </div>
        </div>
      </div>
    @endsection