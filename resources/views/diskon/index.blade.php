@extends('layouts.master')

@section('content')


    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="font-bold">{{ $title }} Staydesa</h4>
            <div class="table-responsive pt-3">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5>Daftar Diskon Paket Wisata</h5>
              </div>
              <form method="POST" action="{{ route('diskon.updateAll') }}">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Diskon</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paket as $p)
                            @php
                                $d = $diskon[$p->id] ?? null;
                            @endphp
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                    <input type="hidden" name="id_paket[]" value="{{ $p->id }}">
                                </td>
                                <td>
                                    {{ $p->nama_paket }}
                                </td>
                                <td>
                                    <input type="number" name="diskon[{{ $p->id }}]" class="form-control" min="0" max="100" step="0.01"
                                        value="{{ $d ? $d->diskon : 0 }}">
                                </td>
                                <td>
                                    <input type="date" name="tgl_mulai[{{ $p->id }}]" class="form-control"
                                        value="{{ $d && $d->tgl_mulai ? (is_object($d->tgl_mulai) ? $d->tgl_mulai->format('Y-m-d') : $d->tgl_mulai) : '' }}">
                                </td>
                                <td>
                                    <input type="date" name="tgl_akhir[{{ $p->id }}]" class="form-control"
                                        value="{{ $d && $d->tgl_akhir ? (is_object($d->tgl_akhir) ? $d->tgl_akhir->format('Y-m-d') : $d->tgl_akhir) : '' }}">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="aktif[]" value="{{ $p->id }}" {{ $d && $d->aktif ? 'checked' : '' }}>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-3">Simpan Semua Diskon</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endsection
</body>
</html>