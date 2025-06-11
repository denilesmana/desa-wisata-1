<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staydesa | {{ $title ?? 'Home' }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @stack('styles')
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

        <!-- Header -->
        @include('layouts.navbar')


        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        @include('sweetalert::alert')

        <!-- Footer -->
        @if (empty($hideFooter))
            @include('layouts.footer')
        @endif
        
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/aos.js') }}"></script>
    <script src="{{ asset('/frontend/js/main.js') }}"></script>
    
</body>
</html>