<?php

use Illuminate\Support\Facades\Route;

// Frontend

Route::resource('/', App\Http\Controllers\HomeController::class);
Route::resource('/home', App\Http\Controllers\HomeController::class);
Route::resource('/destination', App\Http\Controllers\DestinationController::class);
Route::resource('/about', App\Http\Controllers\AboutController::class);
Route::resource('/contact', App\Http\Controllers\ContactController::class);
Route::resource('/blog', App\Http\Controllers\BlogController::class);
Route::resource('/booking', App\Http\Controllers\BookingController::class);

// Backend
Route::resource('/dashboard', App\Http\Controllers\DashboardController::class);
Route::resource('/paket_wisata', App\Http\Controllers\PaketWisataController::class);

//User
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit'); 
Route::put('/users/{user}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');  
Route::delete('/users/{user}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');

//Karyawan
Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/{karyawan}/edit', [App\Http\Controllers\KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{karyawan}', [App\Http\Controllers\KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{karyawan}', [App\Http\Controllers\KaryawanController::class, 'destroy'])->name('karyawan.destroy');

//Pelanggan
Route::get('/pelanggan', [App\Http\Controllers\PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create', [App\Http\Controllers\PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [App\Http\Controllers\PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{pelanggan}/edit', [App\Http\Controllers\PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{pelanggan}', [App\Http\Controllers\PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{pelanggan}', [App\Http\Controllers\PelangganController::class, 'destroy'])->name('pelanggan.destroy');

//Berita
Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{id}/edit', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{id}', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{id}', [App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');

//Kategori Berita
Route::get('/kategori_berita', [App\Http\Controllers\KategoriBeritaController::class, 'index'])->name('kategori_berita.index');
Route::get('/kategori_berita/create', [App\Http\Controllers\KategoriBeritaController::class, 'create'])->name('kategori_berita.create');
Route::post('/kategori_berita', [App\Http\Controllers\KategoriBeritaController::class, 'store'])->name('kategori_berita.store');
Route::get('/kategori_berita/{kategori_berita}/edit', [App\Http\Controllers\KategoriBeritaController::class, 'edit'])->name('kategori_berita.edit');
Route::put('/kategori_berita/{kategori_berita}', [App\Http\Controllers\KategoriBeritaController::class, 'update'])->name('kategori_berita.update');
Route::delete('/kategori_berita/{kategori_berita}', [App\Http\Controllers\KategoriBeritaController::class, 'destroy'])->name('kategori_berita.destroy');


//Kategori Wisata
Route::get('/kategori_wisata', [App\Http\Controllers\KategoriWisataController::class, 'index'])->name('kategori_wisata.index');
Route::get('/kategori_wisata/create', [App\Http\Controllers\KategoriWisataController::class, 'create'])->name('kategori_wisata.create');
Route::post('/kategori_wisata', [App\Http\Controllers\KategoriWisataController::class, 'store'])->name('kategori_wisata.store');
Route::get('/kategori_wisata/{kategori_wisata}/edit', [App\Http\Controllers\KategoriWisataController::class, 'edit'])->name('kategori_wisata.edit');
Route::put('/kategori_wisata/{kategori_wisata}', [App\Http\Controllers\KategoriWisataController::class, 'update'])->name('kategori_wisata.update');
Route::delete('/kategori_wisata/{kategori_wisata}', [App\Http\Controllers\KategoriWisataController::class, 'destroy'])->name('kategori_wisata.destroy');

//Obyek Wisata
Route::get('/obyek_wisata', [App\Http\Controllers\ObyekWisataController::class, 'index'])->name('obyek_wisata.index');
Route::get('/obyek_wisata/create', [App\Http\Controllers\ObyekWisataController::class, 'create'])->name('obyek_wisata.create');
Route::post('/obyek_wisata', [App\Http\Controllers\ObyekWisataController::class, 'store'])->name('obyek_wisata.store');
Route::get('/obyek_wisata/{obyek_wisata}/edit', [App\Http\Controllers\ObyekWisataController::class, 'edit'])->name('obyek_wisata.edit');
Route::put('/obyek_wisata/{obyek_wisata}', [App\Http\Controllers\ObyekWisataController::class, 'update'])->name('obyek_wisata.update');
Route::delete('/obyek_wisata/{obyek_wisata}', [App\Http\Controllers\ObyekWisataController::class, 'destroy'])->name('obyek_wisata.destroy');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']);
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
});
 

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/admin/bendahara', [App\Http\Controllers\DashboardController::class, 'bendahara'])->middleware('UserAccess:bendahara');
    Route::get('/admin/pemilik', [App\Http\Controllers\DashboardController::class, 'pemilik'])->middleware('UserAccess:pemilik');
    // Route::get('/karyawan', [App\Http\Controllers\DashboardController::class, 'karyawan'])->middleware('UserAccess:karyawan');
    // Route::get('/dashboard-karyawan', [App\Http\Controllers\DashboardController::class, 'karyawan'])->middleware('UserAccess:karyawan');

    
    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
});


Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);









