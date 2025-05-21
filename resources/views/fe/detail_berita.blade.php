@extends('layouts.master-fe')

    @section('content')
  
    
    <div class="site-section" data-aos="fade-up">
        <div class="container">
            <a href="{{ route('home') }}" class="mb-3 d-inline-block"> &lt; Kembali</a>
            <div class="mb-5">
                <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="img-fluid rounded h-100">
            </div>
            <h2 class="text-black mb-4">{{ $berita->judul }}</h2>
             <p class="text-muted mb-3">
            <span>{{ $berita->kategori_berita->kategori_berita ?? 'Tanpa Kategori' }}</span> &bullet;
            <span>{{ $berita->created_at->format('d M Y') }}</span>
            </p>
            <div>{!! $berita->berita !!}</div>
        </div>
    </div>
    
  </body>
</html>