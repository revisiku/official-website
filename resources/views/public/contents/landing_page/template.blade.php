<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="revisiku">
    <meta name="description" content="revisiku adalah penyedia jasa pembuatan website, desain grafis, digital marketing, perawatan dan optimasi website yang bertempat di Kota Palangkaraya.">
    <meta name="keyword" content="revisiku, website, website development, desain grafis, graphic design, digital marketing, maintenance, optimation, Kami siap melayani Anda dengan senang hati.search engine optimization, seo, seo marketing, marketing, trafik website, meningkatakan traffic website, company profile, pesonal branding, landing page, web aplication, website sekolah, sistem informasi, sistem informasi managemen, sim, si, palagkaraya, kalimantan tengah, indonesia">
    <title>{{ $site_name }} - {{ $tag }}</title>
    <x-favicon />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('style')
    <!--
    TemplateMo 568 DigiMedia
    https://templatemo.com/tm-568-digimedia
    -->
</head>
<body>

    <!-- ***** Preloader Start ***** -->
    @include('public.partials.preloader')
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        @include('public.partials.nav-logo')
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#home" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#contact">Contact</a></li>
                            @include('public.partials.nav-whatsapp-btn')
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Content Start ***** -->
    @yield('content')
    <!-- ***** Content End ***** -->

    <!-- ***** Footer Start ***** -->
    @include('public.partials.footer')
    <!-- ***** Footer End ***** -->

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    @include('public.partials.js-nav-animation')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @stack('script')
  </body>
</html>
