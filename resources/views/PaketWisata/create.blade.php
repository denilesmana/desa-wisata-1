@extends('layouts.master')

@section('content')
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Penginapan</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Menambahkan Penginapan
              </p>
              <form action="{{ route('paket_wisata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf            
                <div class="form-group">
                  <label for="nama_paket">Nama Paket </label>
                  <input type="text" name="nama_paket" class="form-control" id="nama_paket" placeholder="Nama Penginapan">
                </div>

                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi" style="resize: both;" rows="5" required></textarea>
                </div>

                <div class="form-group">
                  <label for="fasilitas">Fasilitas</label>
                  <input type="text" name="fasilitas" class="form-control" id="fasilitas" placeholder="Fasilitas">
                </div>

                <div class="mb-3">
                    <label>Harga Paket</label>
                    <input type="number" name="harga_per_pack" class="form-control" id="harga_per_pack" required placeholder="Contoh: 150000">
                </div>



                <div class="form-group">
                  <label for="foto1">Upload Foto</label>
                  <input type="file" name="foto1" class="form-control" id="foto1" accept="image/*" required>
                  <div class="mt-2">
                    <img id="preview" src="#" alt="Preview" style="max-width: 200px; display: none;">
                  </div>
                </div>

                <div class="form-group">
                    <label for="foto2">Upload Foto</label>
                    <input type="file" name="foto2" class="form-control" id="foto2" accept="image/*" required>
                    <div class="mt-2">
                      <img id="preview" src="#" alt="Preview" style="max-width: 200px; display: none;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto3">Upload Foto</label>
                    <input type="file" name="foto3" class="form-control" id="foto3" accept="image/*" required>
                    <div class="mt-2">
                      <img id="preview" src="#" alt="Preview" style="max-width: 200px; display: none;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto4">Upload Foto</label>
                    <input type="file" name="foto4" class="form-control" id="foto4" accept="image/*" required>
                    <div class="mt-2">
                      <img id="preview" src="#" alt="Preview" style="max-width: 200px; display: none;">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="foto5">Upload Foto</label>
                    <input type="file" name="foto5" class="form-control" id="foto5" accept="image/*" required>
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

  
