@extends('layouts.master')

@section('content')
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit User</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Edit User
              </p>
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                  @csrf
                  @method('PUT')          
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Level</label>
                      <select class="form-control" name="level" id="exampleSelectGender">
                          <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                          <option value="bendahara" {{ $user->level == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                          <option value="pelanggan" {{ $user->level == 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                          <option value="pemilik" {{ $user->level == 'pemilik' ? 'selected' : '' }}>Pemilik</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Status Aktif</label>
                      <select class="form-control" name="aktif" id="exampleSelectGender">
                          <option value="1" {{ $user->aktif == 1 ? 'selected' : '' }}>Aktif</option>
                          <option value="0" {{ $user->aktif == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection