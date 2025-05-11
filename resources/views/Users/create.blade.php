@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah User</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Menambahkan User
              </p>
              <form action="{{ route('users.store') }}" method="POST">
                @csrf            
                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Level</label>
                    <select class="form-control" name="level" id="exampleSelectGender">
                      <option>Admin</option>
                      <option>Bendahara</option>
                      <option>Pelanggan</option>
                      <option>Pemilik</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Status Aktif</label>
                    <select class="form-control" name="aktif" id="exampleSelectGender">
                      <option value="1">Aktif</option>
                      <option value="0">Tidak Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="button" class="btn btn-light" onclick="window.history.back()">Cancel</button>
              </form>
            </div>
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
