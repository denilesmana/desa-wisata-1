@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit pelanggan</h4>
            <form action="{{ route('pelanggan.update', $user->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label>Nama pelanggan</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $user->pelanggan->nama_lengkap ?? $user->name) }}" required>
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
              </div>

              <div class="form-group">
                <label>Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="form-control">
              </div>

              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $user->pelanggan->no_hp ?? '') }}" required>
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $user->pelanggan->alamat ?? '') }}</textarea>
              </div>

              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
                @if (!empty($user->pelanggan->foto))
                  <div class="mt-2">
                      <img src="{{ asset('storage/' . $user->pelanggan->foto) }}" alt="Foto Pelanggan" width="100">
                  </div>
                @endif
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('pelanggan.index') }}" class="btn btn-light">Batal</a>
          </form> 
      </div>
    </div>  
  </div>
</div>
   @endsection