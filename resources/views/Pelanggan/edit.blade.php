@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">        
    <div class="content-wrapper">
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
                                <input type="text" name="nama_lengkap" class="form-control"
                                    value="{{ old('nama_lengkap', $user->pelanggan->nama_lengkap ?? $user->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Password (Kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" name="no_hp" class="form-control"
                                    value="{{ old('no_hp', $user->pelanggan->no_hp ?? '') }}" required>
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
            </div>
        </div>
        </div>

<!-- content-wrapper ends -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 
      <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
      Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i>
    </span>
  </div>
</footer>

<!-- JS Scripts -->
<script src="{{ asset('backend/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('backend/js/off-canvas.js') }}"></script>
<script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('backend/js/template.js') }}"></script>
<script src="{{ asset('backend/js/todolist.js') }}"></script>
<script src="{{ asset('backend/js/file-upload.js') }}"></script>
