<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        @php
  $userLevel = Auth::user()->level;
@endphp

<ul class="nav">
  <!-- Dashboard untuk admin, pemilik, dan bendahara -->
  @if(in_array($userLevel, ['admin', 'pemilik', 'bendahara']))
  <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard">
      <i class="ti-dashboard menu-icon"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  @endif

  <!-- Reservasi untuk admin, pemilik, dan bendahara -->
  @if(in_array($userLevel, ['admin', 'pemilik', 'bendahara']))
  <li class="nav-item {{ Request::is('reservasi') ? 'active' : '' }}">
    <a class="nav-link" href="/reservasi">
      <i class="ti-bookmark-alt menu-icon"></i>
      <span class="menu-title">Reservasi</span>
    </a>
  </li>
  @endif

  <!-- Diskon untuk admin dan bendahara -->
  @if(in_array($userLevel, ['admin', 'bendahara']))
  <li class="nav-item {{ Request::is('diskon') ? 'active' : '' }}">
    <a class="nav-link" href="/diskon">
      <i class="ti-tag menu-icon"></i>
      <span class="menu-title">Diskon</span>
    </a>
  </li>
  @endif

  <!-- Menu khusus admin -->
  @if($userLevel == 'admin')
    <!-- Penginapan -->
    <li class="nav-item {{ Request::is('penginapan') ? 'active' : '' }}">
      <a class="nav-link" href="/penginapan">
        <i class="ti-home menu-icon"></i>
        <span class="menu-title">Penginapan</span>
      </a>
    </li>

    <!-- Paket Wisata -->
    <li class="nav-item {{ Request::is('paket_wisata') ? 'active' : '' }}">
      <a class="nav-link" href="/paket_wisata">
        <i class="ti-briefcase menu-icon"></i>
        <span class="menu-title">Paket Wisata</span>
      </a>
    </li>

    <!-- Wisata Dropdown -->
    <li class="nav-item {{ Request::is('obyek_wisata*') || Request::is('kategori_wisata*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#wisata-dropdown" aria-expanded="{{ Request::is('obyek_wisata*') || Request::is('kategori_wisata*') ? 'true' : 'false' }}" aria-controls="wisata-dropdown">
        <i class="ti-map menu-icon"></i>
        <span class="menu-title">Wisata</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ Request::is('obyek_wisata*') || Request::is('kategori_wisata*') ? 'show' : '' }}" id="wisata-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('kategori_wisata*') ? 'active' : '' }}" href="/kategori_wisata">Kategori Wisata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('obyek_wisata*') ? 'active' : '' }}" href="/obyek_wisata">Obyek Wisata</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Berita Dropdown -->
    <li class="nav-item {{ Request::is('berita*') || Request::is('kategori-berita*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#berita-dropdown" aria-expanded="{{ Request::is('berita*') || Request::is('kategori-berita*') ? 'true' : 'false' }}" aria-controls="berita-dropdown">
        <i class="ti-announcement menu-icon"></i>
        <span class="menu-title">Berita</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ Request::is('berita*') || Request::is('kategori-berita*') ? 'show' : '' }}" id="berita-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('kategori_berita*') ? 'active' : '' }}" href="/kategori_berita">Kategori Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('berita*') ? 'active' : '' }}" href="/berita">Berita</a>
          </li>
        </ul>
      </div>
    </li>
  @endif

  <!-- Users Dropdown untuk admin dan pemilik -->
  @if(in_array($userLevel, ['admin', 'pemilik']))
  <li class="nav-item {{ Request::is('users*') || Request::is('karyawan*') || Request::is('pelanggan*') ? 'active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#users-dropdown" 
       aria-expanded="{{ Request::is('users*') || Request::is('karyawan*') || Request::is('pelanggan*') ? 'true' : 'false' }}" 
       aria-controls="users-dropdown">
      <i class="ti-user menu-icon"></i>
      <span class="menu-title">Users</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse {{ Request::is('users*') || Request::is('karyawan*') || Request::is('pelanggan*') ? 'show' : '' }}" id="users-dropdown">
      <ul class="nav flex-column sub-menu">
        @if($userLevel == 'admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="/users">
            Users
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ Request::is('karyawan*') ? 'active' : '' }}" href="/karyawan">
            Karyawan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('pelanggan*') ? 'active' : '' }}" href="/pelanggan">
            Pelanggan
          </a>
        </li>
      </ul>
    </div>
  </li>
  @endif
</ul>

      </nav>
  