@extends('layouts.master')

@section('content')
      <div class="row">
        
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Paket Wisata</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Menambahkan Paket Wisata
              </p>
              <form action="{{ route('paket_wisata.update', $paket_wisata->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')           
                <div class="form-group">
                    <label for="nama_paket">Nama Penginapan</label>
                    <input type="text" name="nama_paket" class="form-control" id="nama_paket" value="{{ old('nama_paket', $paket_wisata->nama_paket) }}" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" required>{{ old('deskripsi', $paket_wisata->deskripsi) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <input type="text" name="fasilitas" class="form-control" id="fasilitas" value="{{ old('fasilitas', $paket_wisata->fasilitas) }}" required>
                </div>

                <div class="mb-3">
                    <label>Harga Paket</label>
                    <input type="text" id="harga_display" class="form-control" value="Rp {{ number_format($paket_wisata->harga_per_pack, 0, ',', '.') }}">
                    <input type="hidden" name="harga_per_pack" id="harga_per_pack" value="{{ $paket_wisata->harga_per_pack }}" required>
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
                    @if($paket_wisata->foto1)
                      <img src="{{ asset('storage/' . $paket_wisata->foto1) }}" width="100" class="mt-2">
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
                    @if($paket_wisata->foto2)
                      <img src="{{ asset('storage/' . $paket_wisata->foto2) }}" width="100" class="mt-2">
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
                    @if($paket_wisata->foto3)
                      <img src="{{ asset('storage/' . $paket_wisata->foto3) }}" width="100" class="mt-2">
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
                    @if($paket_wisata->foto4)
                      <img src="{{ asset('storage/' . $paket_wisata->foto4) }}" width="100" class="mt-2">
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
                    @if($paket_wisata->foto5)
                      <img src="{{ asset('storage/' . $paket_wisata->foto5) }}" width="100" class="mt-2">
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
    @endsection

  <script>
    const displayInput = document.getElementById('harga_display');
    const hiddenInput = document.getElementById('harga_per_pack');

    displayInput.addEventListener('input', function () {
        let raw = this.value.replace(/[^\d]/g, '');
        let formatted = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(raw);

        this.value = formatted;
        hiddenInput.value = raw;
    });
</script>
