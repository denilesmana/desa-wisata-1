@extends('layouts.master')

@section('content')
      <div class="row">
          <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                  <div>
                      <h4 class="font-weight-bold mb-0">Welcome Back, {{ auth()->user()->name }}</h4>
                  </div>
                  <div>
                      <a href="{{ route('dashboard.report') }}" class="btn btn-primary btn-icon-text btn-rounded" target="_blank">
                          <i class="ti-clipboard btn-icon-prepend"></i> Report
                      </a>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title text-md-center text-xl-left">Total Reservasi</p>
              <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $totalReservasi }}</h3>
                <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
              </div>
              <p class="mb-0 mt-2 {{ $percentageChange >= 0 ? 'text-success' : 'text-danger' }}">
                {{ number_format($percentageChange, 2) }}% 
                <span class="text-black ml-1"><small>(30 days)</small></span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title text-md-center text-xl-left">Total Users</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $totalUsers }}</h3>
                <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
            <p class="mb-0 mt-2 {{ $percentageChangeUsers >= 0 ? 'text-success' : 'text-danger' }}">
                {{ number_format($percentageChangeUsers, 2) }}% 
                <span class="text-black ml-1"><small>(30 days)</small></span>
            </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title text-md-center text-xl-left">Total Paket Wisata</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $totalPaketWisata }}</h3>
                <i class="ti-map-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
            <p class="mb-0 mt-2 {{ $percentageChangePaket >= 0 ? 'text-success' : 'text-danger' }}">
                {{ number_format($percentageChangePaket, 2) }}% 
                <span class="text-black ml-1"><small>(30 days)</small></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title text-md-center text-xl-left">Total Pendapatan</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </h3>
                <i class="material-icons text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
            <p class="mb-0 mt-2 {{ $percentageChangePendapatan >= 0 ? 'text-success' : 'text-danger' }}">
                {{ number_format($percentageChangePendapatan, 2) }}% 
                <span class="text-black ml-1"><small>(30 days)</small></span>
            </p>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Sales details</p>
              <p class="text-muted font-weight-light">Received overcame oh sensible so at an. Formed do change merely to county it. Am separate contempt domestic to to oh. On relation my so addition branched.</p>
              <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
              <canvas id="sales-chart"></canvas>
            </div>
            <div class="card border-right-0 border-left-0 border-bottom-0">
              <div class="d-flex justify-content-center justify-content-md-end">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-lg btn-outline-light dropdown-toggle rounded-0 border-top-0 border-bottom-0" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Today
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="#">January - March</a>
                    <a class="dropdown-item" href="#">March - June</a>
                    <a class="dropdown-item" href="#">June - August</a>
                    <a class="dropdown-item" href="#">August - November</a>
                  </div>
                </div>
                <button class="btn btn-lg btn-outline-light text-primary rounded-0 border-0 d-none d-md-block" type="button"> View all </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card border-bottom-0">
            <div class="card-body pb-0">
              <p class="card-title">Purchases</p>
              <p class="text-muted font-weight-light">The argument in favor of using filler text goes something like this: If you use real content in the design process, anytime you reach a review</p>
              <div class="d-flex flex-wrap mb-5">
                <div class="mr-5 mt-3">
                  <p class="text-muted">Status</p>
                  <h3>362</h3>
                </div>
                <div class="mr-5 mt-3">
                  <p class="text-muted">New users</p>
                  <h3>187</h3>
                </div>
                <div class="mr-5 mt-3">
                  <p class="text-muted">Chats</p>
                  <h3>524</h3>
                </div>
                <div class="mt-3">
                  <p class="text-muted">Feedbacks</p>
                  <h3>509</h3>
                </div> 
              </div>
            </div>
            <canvas id="order-chart" class="w-100"></canvas>
          </div>
        </div>
      </div> --}}

      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Reservasi Wisata</h4>
              <p class="card-description">
                Tabel daftar reservasi wisata 
              </p>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Nama Pelanggan</th>
                      <th>Status</th>
                      <th>Total Bayar</th>
                      <th>Tanggal Reservasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($reservasis as $index => $reservasi)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ optional($reservasi->pelanggan->user)->name ?? '-' }}</td>

                      <td>
                        <div class="progress" style="height: 20px;">
                          <div class="progress-bar 
                            @if($reservasi->status_reservasi_wisata == 'pesan') bg-warning
                            @elseif($reservasi->status_reservasi_wisata == 'dibayar') bg-info
                            @elseif($reservasi->status_reservasi_wisata == 'selesai') bg-success
                            @else bg-secondary
                            @endif"
                            role="progressbar"
                            style="width: 
                              @if($reservasi->status_reservasi_wisata == 'pesan') 30%
                              @elseif($reservasi->status_reservasi_wisata == 'dibayar') 60%
                              @elseif($reservasi->status_reservasi_wisata == 'selesai') 100%
                              @else 10%
                              @endif"
                            aria-valuenow="70"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            {{ ucfirst($reservasi->status_reservasi_wisata) }}
                          </div>
                        </div>
                      </td>
                      <td>Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
                      <td>{{ $reservasi->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>

</html>

@endsection