@extends('layouts.footer')
    
    @include('layouts.navbar')

    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Profil Saya</h4>
                </div>
                <div class="card-body">

                    @if ($pelanggan)
                        <div class="text-center mb-4">
                            <img src="{{ $pelanggan->foto ? asset('storage/'.$pelanggan->foto) : asset('frontend/images/default-profile.png') }}" 
                                class="rounded-circle shadow" 
                                width="150" height="150"
                                style="object-fit: cover;">
                            <h3 class="mt-3">{{ $pelanggan->nama_lengkap }}</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nama Lengkap</label>
                                    <p class="form-control-plaintext">{{ $pelanggan->nama_lengkap }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Email</label>
                                    <p class="form-control-plaintext">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nomor HP</label>
                                    <p class="form-control-plaintext">{{ $pelanggan->no_hp }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Alamat</label>
                                    <p class="form-control-plaintext">{{ $pelanggan->alamat }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary px-4">
                                <i class="ti-pencil me-2"></i> Edit Profil
                            </a>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            Data profil belum tersedia.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
