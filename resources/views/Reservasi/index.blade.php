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
                {{-- <tbody>
                    @foreach ($penginapan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td> 
                        <td>{{ $item->nama_penginapan }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->fasilitas }}</td>
                        <td>
                            @if ($item->foto1)
                                <img src="{{ asset('storage/' . $item->foto1) }}" alt="Foto" width="100">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            @if ($item->foto2)
                                <img src="{{ asset('storage/' . $item->foto2) }}" alt="Foto" width="100">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            @if ($item->foto3)
                                <img src="{{ asset('storage/' . $item->foto3) }}" alt="Foto" width="100">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            @if ($item->foto4)
                                <img src="{{ asset('storage/' . $item->foto4) }}" alt="Foto" width="100">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            @if ($item->foto5)
                                <img src="{{ asset('storage/' . $item->foto5) }}" alt="Foto" width="100">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                        <a href="{{ route('penginapan.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('penginapan.destroy', $item->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
                              <i class="fas fa-trash"></i> Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                        
                    @endforeach
                </tbody> --}}
                
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