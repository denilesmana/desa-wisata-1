@extends('layouts.master-fe')

    @section('content')

<div class="site-section bg-light">
    <div class="container">
        <a href="{{ route('home') }}" class="mb-3 d-inline-block"> &lt; Kembali</a>
        <div class="row">
            {{-- @if(isset($reservasi) && $reservasi)
                <div class="mb-3">
                    <a href="{{ route('reservasi.struk', $reservasi->id) }}" class="btn btn-primary btn-sm">
                        <i class="ti-printer"></i> Cetak Struk
                    </a>
                </div>
            @endif --}}
            <div class="col-md-6">
                <img id="mainImage" 
                    src="{{ asset('storage/' . $paket->foto1) }}" 
                    alt="Foto utama" 
                    class="img-fluid mb-4 rounded main-image" 
                    style="height: 350px; object-fit: cover; width: 100%;">

            <div class="gallery mb-5 d-flex flex-wrap" style="gap: 10px;">
                @php
                $fotoFields = ['foto1', 'foto2', 'foto3', 'foto4', 'foto5'];
                @endphp
                @foreach($fotoFields as $foto)
                @if($paket->$foto)
                <img src="{{ asset('storage/' . $paket->$foto) }}" 
                    alt="Thumbnail" 
                    onclick="changeMainImage(this)" 
                    class="thumb-image rounded" 
                    style="height: 60px; width: 100px; object-fit: cover; cursor: pointer;">
                @endif
                @endforeach
            </div>
        </div>

        <div class="col-md-5">
            <div class="p-4 mb-3 bg-white">
                <h3 class="text-primary mb-2">{{ $paket->nama_paket }}</h3>
                <strong class="mb-3 d-block">{{ $paket->lokasi }}</strong>
                <strong class="text-danger d-block mb-3">Rp {{ number_format($paket->harga_per_pack, 0, ',', '.') }}</strong>
                <div class="description-box mb-4">
                    <p class="text-justify" style="line-height: 1.6;">{{ $paket->deskripsi }}</p>
                </div>

                <div>
                    <strong class="d-block mb-2 mt-3">Fasilitas</strong>
                    <ul style="padding-left: 20px; margin-top: 5px;">
                    @foreach (explode(',', $paket->fasilitas) as $item)
                        <li>{{ trim($item) }}</li>
                    @endforeach
                    </ul>
                </div>

                {{-- <div class="mt-4">
                <div class="d-flex gap-10"> <!-- Meningkatkan gap dari 2 ke 3 untuk jarak lebih longgar -->
                    <a href="#" class="btn btn-primary text-white px-4 py-2" data-bs-toggle="modal" data-bs-target="#reservasiModal">
                        Reservasi Sekarang
                    </a>
                </div>

                <div class="mt-4">
                <div class="d-flex gap-10"> <!-- Meningkatkan gap dari 2 ke 3 untuk jarak lebih longgar -->
                    @if(isset($reservasi) && $reservasi)
                        <a href="{{ route('reservasi.struk', $reservasi->id) }}" class="btn btn-primary text-white px-4 py-2">
                            <i class="ti-printer me-2"></i>Cetak Struk
                        </a>
                    @endif
                </div> --}}

                <div class="mt-4">
                    <div class="d-flex justify-content-center flex-wrap" style="gap: 15px;">
                        @auth
                            <a href="#" class="btn btn-primary text-white px-4 py-2" data-bs-toggle="modal" data-bs-target="#reservasiModal">
                                Reservasi Sekarang
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary text-white px-4 py-2">
                                Reservasi Sekarang
                            </a>
                        @endauth
                                
                        @if(isset($reservasi) && $reservasi)
                            <a href="{{ route('reservasi.struk', $reservasi->id) }}" class="btn btn-primary text-white px-4 py-2">
                                <i class="ti-printer me-2"></i>Cetak Struk
                            </a>
                        @endif
                    </div>
                </div>
            </div>

                         

                <!-- Modal -->
                <div class="modal fade" id="reservasiModal" tabindex="-1" aria-labelledby="reservasiModalLabel" aria-hidden="true" style="z-index: 1060;">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reservasiModalLabel">Form Reservasi</h5>
                                <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal" aria-label="Tutup">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('reservasi.store') }}" method="POST" enctype="multipart/form-data" id="formReservasi">
                                    @csrf
                                    <input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="{{ $paket->id ?? 1 }}">

                                    <div class="mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tgl_reservasi_wisata" class="form-label">Tanggal Mulai</label>
                                                        <input type="date" name="tgl_reservasi_wisata" id="tgl_reservasi_wisata" 
                                                            class="form-control" required
                                                            min="{{ date('Y-m-d') }}"
                                                            value="{{ old('tgl_reservasi_wisata', $request->tgl_reservasi_wisata ?? '') }}">
                                                        <small class="text-muted">Pilih tanggal mulai reservasi</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tgl_selesai_reservasi" class="form-label">Tanggal Selesai</label>
                                                        <input type="date" name="tgl_selesai_reservasi" id="tgl_selesai_reservasi" 
                                                            class="form-control" required
                                                            min="{{ date('Y-m-d') }}"
                                                            value="{{ old('tgl_selesai_reservasi', $request->tgl_selesai_reservasi ?? '') }}">
                                                        <small class="text-muted">Pilih tanggal selesai reservasi</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                                        <input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control" min="1" required>
                                    </div>

                                    <!-- Informasi Harga dan Diskon -->
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Harga per Orang</label>
                                                        <div class="fw-bold" id="harga_display">Rp 0</div>
                                                        <input type="hidden" name="harga" id="harga">
                                                    </div>
                                                    
                                                    <div class="mb-2">
                                                        <label class="form-label">Subtotal</label>
                                                        <div class="fw-bold" id="subtotal_display">Rp 0</div>
                                                        <input type="hidden" name="subtotal" id="subtotal">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Diskon</label>
                                                        <div class="fw-bold">
                                                            <span id="diskon_persen_display">0%</span>
                                                            (<span id="nilai_diskon_display">Rp 0</span>)
                                                        </div>
                                                        <input type="hidden" name="diskon" id="diskon">
                                                        <input type="hidden" name="nilai_diskon" id="nilai_diskon">
                                                    </div>
                                                    
                                                    <div class="mb-2">
                                                        <label class="form-label">Total Bayar</label>
                                                        <div class="fw-bold fs-5 text-primary" id="total_bayar_display">Rp 0</div>
                                                        <input type="hidden" name="total_bayar" id="total_bayar">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="file_bukti_tf" class="form-label">Upload Bukti Transfer</label>
                                        <input type="file" name="file_bukti_tf" class="form-control" accept="image/*,application/pdf" required>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Kirim Reservasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
  </div>
</div>

<script>
    function changeMainImage(thumbnail) {
        const mainImg = document.getElementById("mainImage");
        mainImg.src = thumbnail.src;
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Format angka ke Rupiah
    function formatRupiah(angka) {
        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Elemen DOM
    const form = document.getElementById('formReservasi');
    const jumlahPesertaInput = document.getElementById('jumlah_peserta');
    const tglReservasiInput = document.getElementById('tgl_reservasi_wisata');
    const tglSelesaiInput = document.getElementById('tgl_selesai_reservasi');
    const hargaDisplay = document.getElementById('harga_display');
    const hargaInput = document.querySelector('input[name="harga"]');
    const diskonPersenDisplay = document.getElementById('diskon_persen_display');
    const diskonInput = document.querySelector('input[name="diskon"]');
    const nilaiDiskonDisplay = document.getElementById('nilai_diskon_display');
    const nilaiDiskonInput = document.getElementById('nilai_diskon');
    const totalBayarDisplay = document.getElementById('total_bayar_display');
    const totalBayarInput = document.getElementById('total_bayar');
    const subtotalDisplay = document.getElementById('subtotal_display');
    const subtotalInput = document.getElementById('subtotal');
    const idPaket = document.getElementById('id_paket_wisata').value;

    // Set harga awal saat modal dibuka
    const paketHarga = {{ $paket->harga_per_pack ?? 0 }};
    hargaInput.value = paketHarga;
    hargaDisplay.textContent = formatRupiah(paketHarga);

    // Fungsi untuk men-set tanggal selesai minimal berdasarkan tanggal mulai
    function setMinTanggalSelesai() {
        const tglMulai = tglReservasiInput.value;
        
        if (tglMulai) {
            // Set minimal tanggal selesai sama dengan tanggal mulai
            tglSelesaiInput.min = tglMulai;
            
            // Jika tanggal selesai sebelumnya lebih awal dari tanggal mulai
            if (tglSelesaiInput.value && tglSelesaiInput.value < tglMulai) {
                tglSelesaiInput.value = tglMulai;
            }
        }
    }

    // Fungsi utama untuk menghitung harga
    function hitungHarga() {
        const jumlahPeserta = parseInt(jumlahPesertaInput.value) || 0;
        const tglReservasi = tglReservasiInput.value;
        const tglSelesai = tglSelesaiInput.value;

        if (!tglReservasi || !tglSelesai || jumlahPeserta < 1) {
            return;
        }

        fetch('{{ route("reservasi.calculate") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                id_paket_wisata: idPaket,
                jumlah_peserta: jumlahPeserta,
                tgl_reservasi_wisata: tglReservasi,
                tgl_selesai_reservasi: tglSelesai
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Update semua tampilan harga
            hargaDisplay.textContent = data.formatted.harga;
            hargaInput.value = data.harga;
            
            subtotalDisplay.textContent = data.formatted.subtotal;
            subtotalInput.value = data.subtotal;
            
            diskonPersenDisplay.textContent = data.formatted.diskon_persen;
            diskonInput.value = data.diskon_persen;
            
            nilaiDiskonDisplay.textContent = data.formatted.nilai_diskon;
            nilaiDiskonInput.value = data.nilai_diskon;
            
            totalBayarDisplay.textContent = data.formatted.total_bayar;
            totalBayarInput.value = data.total_bayar;

            console.log('Data response:', data);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghitung harga. Silakan coba lagi.');
        });
    }

    // Event listeners
    jumlahPesertaInput.addEventListener('input', hitungHarga);
    tglReservasiInput.addEventListener('change', function() {
        setMinTanggalSelesai();
        hitungHarga();
    });
    tglSelesaiInput.addEventListener('change', hitungHarga);

    // Set tanggal minimal (hari ini) saat modal dibuka
    const today = new Date().toISOString().split('T')[0];
    tglReservasiInput.min = today;
    tglSelesaiInput.min = today;

    // Inisialisasi awal
    setMinTanggalSelesai();
    hitungHarga();
});

</script>
