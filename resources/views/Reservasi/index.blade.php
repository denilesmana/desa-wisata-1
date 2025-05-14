@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">
  <div class="content-wrapper">
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
                    <th>Tanggal Reservasi</th>
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
                    <td>
                        <span class="badge bg-info text-dark">{{ ucfirst($item->status_reservasi_wisata) }}</span>
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
    <!-- content-wrapper ends -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
          Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.
        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
          Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i>
        </span>
      </div>
    </footer>
  </div>
</div>
</body>
</html>