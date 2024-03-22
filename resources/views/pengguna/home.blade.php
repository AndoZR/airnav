@extends('pengguna.app')
@section('tab', 'Airnav Assist')

@section( 'content' )
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
                            <div class="slide-item">
                                <div class="slide card" style="background-image: url('{{ asset('src/img/artikel1.jpeg') }}'); background-size: cover;">
                                    <h4 class="text-center">Test 1</h4>
                                    <div class="des">Teks deskripsi sederhana untuk card div dan memeriksa lebar width sudah sesuai apa belum</div>
                                    <hr>
                                    <button class="btn btn-light">See More</button>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="position-relative">
                                    <div class="slide card" style="background-image: url('{{ asset('src/img/artikel1.jpeg') }}'); background-size: cover;">
                                        <h4 class="text-center" >Test 2</h4>
                                        <div class="des">Teks deskripsi sederhana untuk card div dan memeriksa lebar width sudah sesuai apa belum</div>
                                        <hr>
                                        <button class="btn btn-light">See More</button>
                                    </div>
                                </div>
                            </div>
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
@endsection
