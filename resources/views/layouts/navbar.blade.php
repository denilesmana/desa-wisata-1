<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Staydesa | {{ $title }}</title>
    <link rel="icon" href="frontend/images/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="{{ asset('') }}/frontend/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>


    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('') }}https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-1" role="banner">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-6 col-xl-2">
              <h1 class="mb-0"><a href="home" class="text-black h2 mb-0">Staydesa</a></h1>
            </div>
            <div class="col-10 col-md-8 d-none d-xl-block">
              <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                  <li><a class="{{ Request::is('home') ? 'active' : '' }}" href="{{ url('/home') }}">Beranda</a></li>
                  <li><a class="{{ Request::is('destination') ? 'active' : '' }}" href="{{ url('/destination') }}">Destinasi</a></li>
                  <li><a class="{{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">Tentang</a></li>
                  <li><a class="{{ Request::is('blog') ? 'active' : '' }}" href="{{ url('/blog') }}">Berita</a></li>
                  <li><a class="{{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Kontak</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-6 col-xl-2 text-right d-none d-xl-block">
              <a href="login" class="btn btn-primary text-white px-5 py-2">Login</a>
            </div>
        </div>
      </header>