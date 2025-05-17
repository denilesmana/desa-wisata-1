@extends('layouts.master')

@section('content')
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="font-bold">{{ $title }} Staydesa</h4>
                  <div class="table-responsive pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <h5>Daftar Karyawan</h5>                     
                    </div>
                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Level User</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->karyawan->alamat ?? 'Belum diisi' }}</td>
                                    <td>{{ $user->karyawan->no_hp ?? 'Belum diisi' }}</td>
                                    <td>{{ ucfirst($user->karyawan->jabatan ?? 'Belum diisi') }}</td>
                                    <td>{{ ucfirst($user->level) }}</td>
                                    <td>
                                        <a href="{{ route('karyawan.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        
                                        @if($user->karyawan)
                                            <form action="{{ route('karyawan.destroy', $user->karyawan->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Yakin hapus data karyawan ini? User tidak akan terhapus.')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </tbody>
                     </table>
                  </div>         
                </div>
              </div>
            </div> 
          </div>
        @endsection