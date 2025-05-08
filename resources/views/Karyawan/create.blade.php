@extends('layouts.be-navbar')

@include('layouts.sidebar')

<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        
        
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Karyawan</h4>
              <p class="card-description">
                Isi Form Dibawah ini Untuk Menambahkan Karyawan
              </p>
              <form action="" method="POST">
                @csrf            
                <div class="form-group">
                  <label for="nama_karyawan">Nama</label>
                  <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" style="resize: both;" rows="5" required></textarea>
                </div>

                <div class="form-group">
                    <label for="no_hp">No Telepon</label>
                    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No Telepon">
                  </div>

                <div class="form-group">
                  <label for="exampleSelectGender">Jabatan</label>
                    <select class="form-control" name="jabatan" id="exampleSelectGender">
                      <option>Administrasi</option>
                      <option>Bendaharaa</option>
                      <option>Pemilik</option>
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
