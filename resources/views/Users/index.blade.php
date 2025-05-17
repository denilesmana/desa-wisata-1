@extends('layouts.master')

@section('content')
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
                      <h5>Daftar Pengguna</h5>
                      <a href="{{ route('users.create') }}" class="btn btn-primary">
                        Tambah
                      </a>                      
                    </div>
                  
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td> 
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>••••••••</td> 
                                <td>{{ ucfirst($item->level) }}</td> 
                                <td>
                                  <a href="{{ route('users.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                      <i class="fas fa-edit"></i> Edit
                                  </a>
                                  <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display:inline;">
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