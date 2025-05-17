@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Karyawan</h4>
            <form action="{{ route('karyawan.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label>Nama Karyawan</label>
                  <input type="text" name="nama_karyawan" class="form-control" value="{{ old('nama_karyawan', $user->karyawan->nama_karyawan ?? $user->name) }}">
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control">{{ old('alamat', $user->karyawan->alamat ?? '') }}</textarea>
                </div>

                <div class="form-group">
                  <label>No Telepon</label>
                  <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $user->karyawan->no_hp ?? '') }}">
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <select name="jabatan" class="form-control">
                    <option value="administrasi" {{ ($user->karyawan->jabatan ?? '') == 'administrasi' ? 'selected' : '' }}>Administrasi</option>
                    <option value="bendahara" {{ ($user->karyawan->jabatan ?? '') == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                    <option value="pemilik" {{ ($user->karyawan->jabatan ?? '') == 'pemilik' ? 'selected' : '' }}>Pemilik</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('karyawan.index') }}" class="btn btn-light">Batal</a>
            </form>     
      </div>
    </div>
  </div>
</div>

@endsection