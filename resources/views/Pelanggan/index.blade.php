@extends('layouts.master')

@section('content')
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="font-bold">{{ $title }} Staydesa</h4>
                  <div class="table-responsive pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <h5>Daftar Pelanggan</h5>                     
                    </div>
                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    {{-- <th>Email</th> --}}
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach ($pelanggans as $user)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $user->pelanggan->nama_lengkap ?? $user->name }}</td>
                                      {{-- <td>{{ $user->email }}</td> --}}
                                      <td>{{ $user->pelanggan->no_hp ?? '-' }}</td>
                                      <td>{{ Str::limit($user->pelanggan->alamat ?? '-', 30) }}</td>
                                      <td>
                                          @if($user->pelanggan && $user->pelanggan->foto)
                                              <img src="{{ asset('storage/'.$user->pelanggan->foto) }}" width="50" class="img-thumbnail">
                                          @else
                                              <span class="text-muted">No photo</span>
                                          @endif
                                      </td>
                                      <td>
                                          <a href="{{ route('pelanggan.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                              <i class="fas fa-edit"></i> Edit
                                          </a>
                                          
                                          @if($user->pelanggan)
                                            <form action="{{ route('pelanggan.destroy', $user->id) }}" method="POST" style="display:inline;">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-sm btn-danger" 
                                                      onclick="return confirm('Yakin hapus data pelanggan ini? User tidak akan terhapus.')">
                                                  <i class="fas fa-trash"></i> Hapus
                                              </button>
                                            </form>
                                          @endif
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
