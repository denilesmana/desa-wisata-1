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
                          <td>
                              @if($item->kategori_berita)
                                  {{ ucwords(str_replace('_', ' ', $item->kategori_berita->kategori_berita)) }}
                              @else
                                  <span class="text-muted">-</span>
                              @endif
                          </td>
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
        @endsection
