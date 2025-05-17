@extends('layouts.master')

@section('content')
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="font-bold">{{ $title }} Staydesa</h4>
            <div class="table-responsive pt-3">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5>Daftar Reservasi</h5>                      
              </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Paket Wisata</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Diskon</th>
                    <th>Nilai Diskon</th>
                    <th>Total Bayar</th>
                    <th>Bukti TF</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($reservasi as $key => $item)
                  <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $item->pelanggan->user->name ?? '-' }}</td>
                      <td>{{ $item->paketWisata->nama_paket ?? '-' }}</td>
                      <td>{{ $item->tgl_reservasi_wisata }}</td>
                        <td>{{ $item->tgl_selesai_reservasi }}</td>
                      <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                      <td>{{ $item->jumlah_peserta }}</td>
                      <td>{{ $item->diskon }}%</td>
                      <td>Rp {{ number_format($item->nilai_diskon, 0, ',', '.') }}</td>
                      <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                      <td>
                          @if ($item->file_bukti_tf)
                              <a href="{{ asset('storage/' . $item->file_bukti_tf) }}" target="_blank">Lihat</a>
                          @else
                              Tidak ada
                          @endif
                      </td>
                        @php
                            $statusColors = [
                                'pesan' => 'bg-warning text-dark',
                                'dibayar' => 'bg-info text-white',
                                'selesai' => 'bg-success text-white',
                            ];
                            $statusOptions = ['pesan', 'dibayar', 'selesai'];
                            $currentStatus = $item->status_reservasi_wisata;
                            $badgeClass = $statusColors[$currentStatus] ?? 'bg-secondary text-white';
                        @endphp

                        <td>
                            <select class="form-select status-select {{ $badgeClass }}" data-id="{{ $item->id }}">
                                @foreach ($statusOptions as $status)
                                    <option value="{{ $status }}" {{ $currentStatus == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const statusColors = {
        pesan: 'bg-warning text-dark',
        dibayar: 'bg-info text-white',
        selesai: 'bg-success text-white'
    };

    function updateSelectColor(select) {
        // Reset semua class warna
        select.classList.remove('bg-warning', 'bg-info', 'bg-success', 'text-dark', 'text-white');

        // Tambahkan class berdasarkan status
        const status = select.value;
        const classList = statusColors[status];
        if (classList) {
            classList.split(' ').forEach(cls => select.classList.add(cls));
        }
    }

    document.querySelectorAll('.status-select').forEach(select => {
        updateSelectColor(select); // set awal

        select.addEventListener('change', function () {
            const reservasiId = this.dataset.id;
            const newStatus = this.value;

            updateSelectColor(this); // update warna UI

            // AJAX kirim ke server
            fetch(`/reservasi/${reservasiId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    status: newStatus
                })
            })
            .then(res => res.json())
            .then(data => {
                if (!data.success) {
                    alert('Gagal memperbarui status');
                }
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan.');
            });
        });
    });
});
</script>
