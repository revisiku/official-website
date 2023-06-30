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
<!--
  TemplateMo 568 DigiMedia
  https://templatemo.com/tm-568-digimedia
-->
</head>
<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
        <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="./" class="logo">
                            <img id="nav-logo" src="{{ asset('assets/static/icon.png') }}">
                            <span id="nav-sitename">{{ $site_name }}</span>
                            <span class="separator">|</span>
                            <span class="word"></span>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#home" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#contact">Contact</a></li>
                            <li>
                                <div class="border-first-button">
                                    @php
                                        $link = url('redirect')."?stats=whatsapp&link=https://api.whatsapp.com/send?phone=62".str_replace('-','',substr($contact->phone_number,1,18));
                                    @endphp
                                    <button onclick="redirect('{{ $link }}')"><i class="fa fa-whatsapp"></i></button>
                                </div>
                            </li>
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

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @php
                        $link = url('redirect')."?stats=sosial-media&link=".$socialMedia->where('icon', 'instagram')->first()->link;
                    @endphp
                    <p><span class="footer-caption">{{ __($footer_copyright) }}</span> <span class="separator"> | </span> <a class="footer-instagram" href="javascript:;" onclick="redirect('{{ $link }}')"><i class="fa fa-instagram"></i> Instagram</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        const services = [
            "We're Digital Agency",
            "Website Development",
            "Digital Marketing",
            "Personal Branding",
            "Landing Page",
        ];
    </script>
    <script src="{{ asset('assets/js/nav-animation.js') }}"></script>

    <script>
        function redirect(link) {
            open(link, "_blank")
        }
    </script>

    @stack('js')
  </body>
</html>
