<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Scaffold Bootstrap Template - Index</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url(mix('css/site.css')) }}" rel="stylesheet">

</head>

<body>
    <script>
        window.Laravel = {!! json_encode([
            'tenantId' => auth()->check() ? auth()->user()->tenant_id : ''
        ]) !!}
    </script>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.html"><span>Scaffold</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li class="drop-down"><a href="">Sobre</a>
                        <ul>
                            <li><a href="#about">A empresa</a></li>
                        </ul>
                    </li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#pricing">Planos</a></li>

                    <li><a href="#contact">Contato</a></li>

                    @if (auth()->check())
                        <li><a href="/admin">Painel</a></li>
                    @else
                        <li><a href="/login">Entre</a></li>
                    @endif
                    

                </ul>
            </nav><!-- .nav-menu -->

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h1>We design digital products that help grow businesses</h1>
                        <h2>We are team of talanted designers making websites with Bootstrap</h2>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <div id="app">
    <main id="main">
        @yield('content')
    </main><!-- End #main -->
    </div>
   
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <script src="{{ url(mix('js/site.js')) }}"></script>
   
    @stack('scripts')
</body>

</html>
