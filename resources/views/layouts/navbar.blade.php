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
                            $foto = optional($user->pelanggan)->foto;
                        @endphp
                        
                        <img src="{{ $foto ? asset('storage/' . $foto) : asset('frontend/images/default-profile.jpg') }}"
                          alt="Profile"
                          class="rounded-circle shadow-sm"
                          width="50" height="50"
                          style="object-fit: cover; aspect-ratio: 1 / 1;">

                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                        <a class="dropdown-item d-flex align-items-center gap-3" href="{{ route('profile.index') }}">
                            <i class="ti-user text-primary"></i>
                            <span>Profil Saya</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center gap-3">
                                <i class="ti-power-off text-danger"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
              @endauth
          </div>
      </header>