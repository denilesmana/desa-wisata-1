@extends('layouts.master')

@section('content')
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
                    <input type="text" name="kategori_wisata" class="form-control" id="kategori_wisata" placeholder="Kategori Wisata" required>
                </div>
            
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="button" class="btn btn-light" onclick="window.history.back()">Cancel</button>
            </form>            
            </div>
          </div>
        </div>
      </div>

    @endsection
