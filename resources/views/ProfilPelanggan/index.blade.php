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
                    <h4 class="mb-0">Profil Saya</h4>
                </div>
                <div class="card-body">
                    @if ($pelanggan)
                        @php
                            $user = Auth::user();
                            $pelanggan = optional($user->pelanggan);
                            $foto = $pelanggan->foto;
                            $fotoUrl = !empty($foto) ? asset('storage/' . $foto) : asset('frontend/images/default-profile.jpg');
                        @endphp

                        <div class="text-center mb-4">
                            <img src="{{ $fotoUrl }}" 
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
                            <div class="d-flex justify-content-center flex-wrap" style="gap: 15px;">
                                <a href="{{ route('home') }}" class="btn btn-outline-primary px-4 mb-3">
                                    &lt; Kembali
                                </a>
                                
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary px-4 mb-3">
                                    <i class="ti-pencil me-2"></i> Edit Profil
                                </a>
                            </div>
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
@endsection
