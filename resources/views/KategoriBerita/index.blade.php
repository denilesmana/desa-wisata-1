@extends('layouts.master')

@section('content')
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="font-bold">{{ $title }} Staydesa</h4>
                  <div class="table-responsive pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <h5>Daftar Kategori Berita</h5>
                      <a href="{{ route('kategori_berita.create') }}" class="btn btn-primary">
                        Tambah
                      </a>                      
                    </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kategori Berita</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kategori_berita as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td> 
                          <td>{{ $item->kategori_berita }}</td>
                          <td>
                            <a href="{{ route('kategori_berita.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('kategori_berita.destroy', $item->id) }}" method="POST" style="display:inline;">
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
          @endsection
</body>

</html>
