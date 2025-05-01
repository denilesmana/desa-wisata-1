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
Route::resource('/obyek_wisata', App\Http\Controllers\ObyekWisataController::class);
Route::resource('/berita', App\Http\Controllers\BeritaController::class);
Route::resource('/paket_wisata', App\Http\Controllers\PaketWisataController::class);
Route::resource('/users', App\Http\Controllers\UsersController::class);

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);









