@extends('pengguna.app')
@section('tab', 'Airnav Assist')

@section( 'content' )
    {{-- MASTERHEAD --}}
    <header class="masterhead">
        <div class="container d-flex justify-content-start">
            <h1 class="text-primary fw-bold" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;">Hi! Selamat Datang di <br> Airnav Assist</h1>
        </div>
    </header>

    <!-- SLIDER -->
    <div class="container-fluid">
        <section class="mt-5 pt-3 pb-3 slider-nav">
            <div class=" d-flex flex-row justify-content-between">
                <div id="display-slider">
                    <h3><strong>Artikel Edukasi</strong></h3>
                    <p>Baca berbagai informasi terbaru bandara untuk meningkatkan pemahamanmu</p>
                </div>
                <div class="slider-wrapper w-100">
                    <div class="d-flex flex-column">
                        <div id="owl-carousel" class="">
                            @foreach ($dataArtikel as $item)
                            <div class="slide-item">
                                <div class="slide" style="background-image: linear-gradient(to bottom, #ffffff, transparent 150%), url('{{ asset('src/img/artikel1.jpeg') }}');  background-repeat: no-repeat; background-attachment: scroll; background-position: top; background-size: 300%;">
                                    <h4 class="text-center fw-bold">{{ $item->judul }}</h4>
                                    <div class="des fw-normal text-body-secondary">{{ $item->deskripsi }}</div>
                                    <br>
                                    <button class="btn btn-light fw-semibold">Selengkapnya...</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="owl-nav" class="align-self-center mt-3 slider-button flex-fill">
                            <button type="button" class="owl-prev btn mx-5 btn-light px-4"><i class="fa-solid fa-arrow-left"></i></button>
                            <button type="button" class="owl-next btn mx-5 btn-light px-4"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- BACKGROUND II --}}
    <header class="background transBg container-fluid">
        <div class="container">
        </div>
    </header>

    {{-- VISI MISI --}}
    <div class="container">
        <div class="row">
            <div class="col-6 position-relative">
                <div id="visi" class="card position-absolute shadow">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Visi</h5>
                        <p class="card-text ">Menjadi penyedia jasa navigasi penerbangan bertaraf internasional</p>
                    </div>
                </div>

                <div id="misi" class="card position-absolute shadow">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Misi</h5>
                        <p class="card-text">Menyediakan layanan navigasi penerbangan yang mengutamakan keselamatan,
                            efisiensi penerbangan dan ramah lingkungan demi memenuhi ekspetasi pengguna jasa</p>
                    </div>
                </div>
            </div>
            <div class="col-6 position-relative logo">
                <div class="d-flex flex-column justify-content-end align-items-center">
                    <h2 class="text-end fw-bold" style=" color:#49548C;">Airnav Indonesia</h2>
                    <img class="logoVisiMisi" src="{{ asset('src/img/logo.png') }}" alt="Logo">
                    <h2 class="text-end fw-bold" style=" color:#49548C;">Cabang Tanjung Pinang</h2>

                </div>
            </div>
        </div>
    </div>

    {{-- BACKGROUND III --}}
    <div class="endbackground container-fluid">
    </div>

    <div class="lastbackground">
        <div class="container text-center">
            <div class="row" style="padding-bottom: 10rem;">
                <div class="d-flex justify-content-center align-items-center" style="margin-top: 5rem;">
                    <h1 class="text-primary fw-bold" style="margin-top: -20rem;">Struktur Organisasi Cabang<br>Tanjung Pinang<br>(Bagan Managerial)</h1>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 5rem;">
                    <img src="{{ asset('src/img/bagan.png') }}" alt="Bagan" style="max-width: 100%;">
                </div>
            </div>
        </div>

    </div>
@endsection