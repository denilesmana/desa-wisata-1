@extends('layouts.master')

@section('content')
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="font-bold">{{ $title }} Staydesa</h4>
            <div class="table-responsive pt-3">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5>Daftar Berita</h5>
                <a href="{{ route('obyek_wisata.create') }}" class="btn btn-primary">
                  Tambah
                </a>                      
              </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Deskripsi</th>
                    <th>Kategori Wisata</th>
                    <th>Fasilitas</th>
                    <th>Foto 1</th>
                    <th>Foto 2</th>
                    <th>Foto 3</th>
                    <th>Foto 4</th>
                    <th>Foto 5</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($obyek_wisata as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td> 
                      <td>{{ $item->nama_wisata }}</td>
                      <td>{{ $item->deskripsi_wisata }}</td>
                      <td>
                          @if($item->kategori_wisata)
                            {{ ucwords(str_replace('_', ' ', $item->kategori_wisata->kategori_wisata)) }}
                          @else
                            <span class="text-muted">-</span>
                          @endif
                      </td>
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
                        <a href="{{ route('obyek_wisata.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('obyek_wisata.destroy', $item->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
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
