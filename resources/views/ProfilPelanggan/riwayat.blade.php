@extends('layouts.master-fe')

@php
    $hideFooter = true;
@endphp


@section('content')
<div class="container py-5">
    <h2 class="mb-4">Riwayat Reservasi</h2>

    @if ($reservasi->isEmpty())
        <div class="alert alert-info">
            Belum ada reservasi yang dilakukan.
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Tanggal Reservasi</th>
                    <th>Jumlah Peserta</th>
                    <th>Total Bayar</th>
                    <th>Bukti Transfer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->paketWisata->nama_paket ?? 'Paket Dihapus' }}</td>
                        <td>{{ date('d M Y', strtotime($item->tgl_reservasi_wisata)) }} - {{ date('d M Y', strtotime($item->tgl_selesai_reservasi)) }}</td>
                        <td>{{ $item->jumlah_peserta }}</td>
                        <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                        <td>
                            @if($item->file_bukti_tf)
                                <a href="{{ asset('storage/' . $item->file_bukti_tf) }}" target="_blank" class="btn btn-sm btn-primary">
                                    Lihat Bukti
                                </a>
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('reservasi.struk', $item->id) }}" class="btn btn-sm btn-primary">
                                Cetak Struk
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endif

</div>
@endsection
