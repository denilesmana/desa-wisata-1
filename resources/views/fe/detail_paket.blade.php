@extends('layouts.footer')

    @include('layouts.navbar')

<div class="site-section bg-light">
  <div class="container">
        <div class="row">
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

      <!-- Kanan: Detail Paket -->
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

                <div class="mt-4">
                    <a href="#" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#reservasiModal">
                        Reservasi Sekarang
                    </a>
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
                                    <input type="hidden" name="id_paket_wisata" value="{{ $paket->id ?? 1 }}">

                                    <div class="mb-3">
                                        <label for="tgl_reservasi_wisata" class="form-label">Tanggal Reservasi</label>
                                        <input type="date" name="tgl_reservasi_wisata" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                                        <input type="number" name="jumlah_peserta" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga per Orang</label>
                                        <input type="text" class="form-control" id="harga_display" readonly>
                                        <input type="hidden"  name="harga"> 
                                    </div>

                                    <div class="mb-3">
                                        <label for="diskon" class="form-label">Diskon (%)</label>
                                        <input type="number" id="diskon" name="diskon" class="form-control" value="0" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nilai_diskon" class="form-label">Nilai Diskon</label>
                                        <input type="text" id="nilai_diskon_display" class="form-control" readonly>
                                        <input type="hidden" id="nilai_diskon">
                                    </div>

                                    <div class="mb-3">
                                        <label for="total_bayar" class="form-label">Total Bayar</label>
                                        <input type="text" id="total_bayar_display" class="form-control" readonly>
                                        <input type="hidden"  id="total_bayar">
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
document.addEventListener('DOMContentLoaded', function () {
    const jumlahPesertaInput = document.querySelector('input[name="jumlah_peserta"]');
    const diskonInput = document.querySelector('input[name="diskon"]');
    const hargaInput = document.querySelector('input[name="harga"]');
    const hargaDisplay = document.getElementById('harga_display');
    const nilaiDiskonInput = document.querySelector('input[name="nilai_diskon"]');
    const nilaiDiskonDisplay = document.getElementById('nilai_diskon_display');
    const totalBayarInput = document.querySelector('input[name="total_bayar"]');
    const totalBayarDisplay = document.getElementById('total_bayar_display');
    const idPaket = document.querySelector('input[name="id_paket_wisata"]').value;

    // Ambil harga saat modal dibuka
    const paketHarga = {{ $paket->harga_per_pack ?? 0 }};
    hargaInput.value = paketHarga;
    hargaDisplay.value = `Rp ${paketHarga.toLocaleString('id-ID')}`;

    function hitungReservasi() {
        const jumlah = parseInt(jumlahPesertaInput.value) || 0;
        const diskon = parseFloat(diskonInput.value) || 0;

        if (jumlah > 0) {
            fetch('{{ route("reservasi.calculate") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_paket_wisata: idPaket,
                    jumlah_peserta: jumlah,
                    diskon: diskon
                })
            })
            .then(res => res.json())
            .then(data => {
                hargaInput.value = data.harga;
                hargaDisplay.value = data.formatted.harga;
                nilaiDiskonInput.value = data.nilai_diskon;
                nilaiDiskonDisplay.value = data.formatted.nilai_diskon;
                totalBayarInput.value = data.total_bayar;
                totalBayarDisplay.value = data.formatted.total_bayar;
            })
            .catch(err => {
                console.error('Error saat menghitung reservasi:', err);
            });
        } else {
            nilaiDiskonInput.value = 0;
            nilaiDiskonDisplay.value = 'Rp 0';
            totalBayarInput.value = 0;
            totalBayarDisplay.value = 'Rp 0';
        }
    }

    jumlahPesertaInput.addEventListener('input', hitungReservasi);
});


document.getElementById('formReservasi').addEventListener('input', function (e) {
    if (e.target.name === 'jumlah_peserta' || e.target.name === 'diskon') {
        let form = new FormData(this);
        fetch('{{ route('reservasi.calculate') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: form
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('harga_display').value = data.formatted.harga;
            document.getElementById('nilai_diskon_display').value = data.formatted.nilai_diskon;
            document.getElementById('total_bayar_display').value = data.formatted.total_bayar;

            // Update hidden fields for submission
            document.querySelector('input[name="harga"]').value = data.harga;
            document.getElementById('nilai_diskon').value = data.nilai_diskon;
            document.getElementById('total_bayar').value = data.total_bayar;
        });
    }
});

</script>
