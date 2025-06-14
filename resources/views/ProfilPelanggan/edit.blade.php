@extends('layouts.master-fe')

@php
    $hideFooter = true;
@endphp

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="ti-user me-2"></i> Edit Profil</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="text-center mb-4">
                            <img id="previewFoto" 
                                src="{{ $pelanggan->foto ? asset('storage/'.$pelanggan->foto) : asset('frontend/images/default-profile.jpg') }}" 
                                class="rounded-circle shadow"
                                width="150" height="150"
                                style="object-fit: cover;">
                            <div class="mt-3">
                                <input type="file" name="foto" id="foto" class="d-none" accept="image/*">
                                <label for="foto" class="btn btn-sm btn-outline-primary">
                                    <i class="ti-camera me-1"></i> Ganti Foto
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Username</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nomor HP</label>
                                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $pelanggan->nama_lengkap ?? '') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                        </div>

                        <div class="text-center mt-4">
                            <div class="d-flex justify-content-center flex-wrap" style="gap: 15px;">
                                <a href="{{ route('profile.index') }}" class="btn btn-outline-secondary px-4 mb-3">
                                    <i class="ti-arrow-left me-2"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary px-4 mb-3">
                                    <i class="ti-save me-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview foto sebelum upload
    document.getElementById('foto').addEventListener('change', function(e) {
        const preview = document.getElementById('previewFoto');
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
