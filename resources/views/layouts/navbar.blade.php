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
                  </ul>
                </nav>
              </div>
              <div class="col-6 col-xl-2 text-right d-none d-xl-block">
              <div class="col-6 col-xl-2 text-right d-none d-xl-block">
                @guest
                  <a href="{{ route('login') }}" class="btn btn-primary text-white px-5 py-2">Login</a>
                @endguest
                
              @auth
              <div class="dropdown">
                  <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      @php
                          $user = Auth::user();
                          $pelanggan = optional($user->pelanggan);
                          $foto = $pelanggan->foto;
                          $fotoUrl = !empty($foto) ? asset('storage/' . $foto) : asset('frontend/images/default-profile.jpg');
                      @endphp

                      <img src="{{ $fotoUrl }}"
                          alt="Profile"
                          class="rounded-circle shadow-sm me-2"
                          width="40" height="40"
                          style="object-fit: cover; aspect-ratio: 1 / 1;">
                  </a>

                  <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3 mt-2" aria-labelledby="userDropdown">
                      <li>
                          <a class="dropdown-item py-2" href="{{ route('profile.index') }}">
                              Profil Saya
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item py-2" href="{{ route('riwayat.index') }}">
                              Riwayat Pemesanan
                          </a>
                      </li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                          <form action="{{ route('logout') }}" method="POST" class="px-1">
                              @csrf
                              <button type="submit" class="btn btn-link dropdown-item py-1 text-danger">
                                  Logout
                              </button>
                          </form>
                      </li>
                  </ul>
              </div>
              @endauth
              </div>
            </div>


          </div>
      </header>