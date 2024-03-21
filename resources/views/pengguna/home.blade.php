<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AirNav</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
</head>

<body>
    <div class="position-relative top-0">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg" style="background-color: #49548C">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('src/img/logoAirNav.png') }}" alt="Airnav Assist" height="40">
                </a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Pembelajaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Organisasi Cabang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Akun</a>
                        </li>
                    </ul>
                    @if (!Auth::guard('web')->check())
                        <a href="{{ route('signIn') }}" class="btn btn-sm btn-outline-light" type="button">Log In</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>

    {{-- MASTERHEAD --}}
    <header class="masthead transBg">
        <div class="container d-flex justify-content-start">
            <h1 class="text-primary fw-bold">Hi! Selamat Datang di <br>Airnav Assist</h1>
        </div>
    </header>
    
    <!-- SLIDER -->
    <div class="container">
        <section class="mt-5 pt-3 pb-3 slider-nav">
            <div class=" d-flex flex-row justify-content-between">
                <div class="display-slider">
                    <h3><b>Artikel Edukasi</b></h3>
                    <p>Baca berbagai informasi terbaru bandara untuk meningkatkan pemahamanmu</p>
                </div>
                <div class="slider-wrapper w-100">
                    <div class="d-flex flex-column">
                        <div id="owl-carousel" class="">
                            @foreach ($dataArtikel as $item)
                                <div class="slide-item">
                                    <div class="slide card" style="background-image: url('{{ asset('src/img/artikel1.jpeg') }}')">
                                        <h4 class="text-center">{{ $item->judul }}</h4>
                                        <div class="des">{{ $item->deskripsi }}</div>
                                        <hr>
                                        <button class="btn btn-light">See More</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="owl-nav" class="align-self-center mt-3">
                            <button type="button" class="owl-prev mx-5 btn btn-light"><i class="fa-solid fa-arrow-left"></i></button>
                            <button type="button" class="owl-next mx-5 btn btn-light"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- BACKGROUND II --}}
    <header class="background transBg">
        <div class="container d-flex justify-content-start">
            
        </div>
    </header>

    {{-- VISI MISI --}}
    <div class="row">
        <div class="col-sm-4">
          <div class="card h-100 w-100 shadow ms-5">
            <div class="card-body">
              <h5 class="card-title">Visi</h5>
              <p class="card-text">Menjadi penyedia jasa navigasi penerbangan bertaraf internasional</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card h-100 w-100 shadow cardVisiMisi">
            <div class="card-body">
              <h5 class="card-title">Misi</h5>
              <p class="card-text">Menyediakan layanan navigasi penerbangan yang mengutamakan keselamatan,
                efisiensi penerbangan dan ramah lingkungan demi memenuhi ekspetasi pengguna jasa</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
            <img class="img-fluid logoVisiMisi" src="{{ asset('src/img/logo.png') }}" alt="Logo">
        </div>
    </div>

    {{-- BACKGROUND III --}}
    <header class="background transBg position-relative">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="text-primary fw-bold" style="margin-top: -30rem;">Struktur Organisasi Cabang<br>Tanjung Pinang<br>Bagang Manajerial</h1>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('src/img/bagan.png') }}" alt="Bagan" style="max-width: 100%;">
                </div>
            </div>
        </div>
    </header>
    
    {{-- FOOTER --}}
    <footer class="text-center text-lg-start text-white" style="background-color: #3e4551">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column I-->
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">KONTAK</h5>
                        <p style="width: 80%">
                            Jl. Adi Sucipto No.KM.12, Pinang Kencana, Kec. Tanjungpinang Tim., Kota Tanjung Pinang, Kepulauan Riau 29125<br>
                            Telp: 0771-7335581<br>
                            Email: airnavtnj@gmail.com
                        </p>
                    </div>
                    <!--Grid column-->
        
                    <!--Grid column II-->
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">LAYANAN</h5>
            
                        <ul class="list-unstyled mb-0">
                            <li>
                            <a href="#!" class="text-white">Beranda</a>
                            </li>
                            <li>
                            <a href="#!" class="text-white">Artikel</a>
                            </li>
                            <li>
                            <a href="#!" class="text-white">Pembelajaran</a>
                            </li>
                            <li>
                            <a href="#!" class="text-white">Organisasi Cabang</a>
                            </li>
                            <li>
                            <a href="#!" class="text-white">Akun</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column III-->
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0 d-flex justify-content-center align-items-center">
                        <img class="w-100" src="{{ asset('src/img/logoairnav.png') }}" alt="logo">
                    </div>                    
                    <!--Grid column-->
                    
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
    
            <hr class="mb-4"/>
    
            <!-- Section: Social media -->
            <section class="mb-4 text-center">
            <!-- Facebook -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                href="#!"
                role="button"
                ><i class="fab fa-facebook-f"></i
                ></a>
    
            <!-- Twitter -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                href="#!"
                role="button"
                ><i class="fab fa-twitter"></i
                ></a>
    
            <!-- Google -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                href="#!"
                role="button"
                ><i class="fab fa-google"></i
                ></a>
    
            <!-- Instagram -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                href="#!"
                role="button"
                ><i class="fab fa-instagram"></i
                ></a>
    
            <!-- Linkedin -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                href="#!"
                role="button"
                ><i class="fab fa-linkedin-in"></i
                ></a>
    
            <!-- Github -->
            <a
                class="btn btn-outline-light btn-floating m-1"
                href="#!"
                role="button"
                ><i class="fab fa-github"></i
                ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
  
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            <a class="text-white" href="https://airnavassist.com/">Airnav Assist</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>
<script src="{{ asset('src/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('src/jquery/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script>
    var slider = tns({
        container: '#owl-carousel',
        mode: 'carousel',
        mouseDrag: true,
        nav: false,
        axis: "horizontal",
        // gutter: 50,
        autoWidth: true,
        center: true,
        controlsContainer: document.getElementById('owl-nav'),
        viewportMax: 'fixedWidth',
    });
</script>

</html>