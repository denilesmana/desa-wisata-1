@extends('layouts.be-navbar')

@include('layouts.sidebar')

      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="font-bold">{{ $title }} Staydesa</h4>
                  {{-- <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p> --}}
                  <div class="table-responsive pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <h5>Daftar Berita</h5>
                      <a href="{{ route('berita.create') }}" class="btn btn-primary">
                        Tambah
                      </a>                      
                    </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Berita</th>
                          <th>Tanggal Post</th>
                          <th>Kategori Berita</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($berita as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td> 
                          <td>{{ $item->judul}}</td>
                          <td>{{ $item->berita}}</td>
                          <td>{{ date('d-m-Y', strtotime($item->tgl_post))}}</td>
                          <td>{{ ucfirst(str_replace('_', ' ', $item->kategori_berita->kategori_berita )) }}</td>
                          <td>
                            @if ($item->foto)
                              <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="100">
                            @else
                              Tidak ada foto
                            @endif
                          </td>                          
                          <td>
                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('berita.destroy', $item->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus user ini?')">
                                  <i class="fas fa-trash"></i> Hapus
                              </button>
                          </form>
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
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>

</html>
