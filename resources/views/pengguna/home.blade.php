@extends('pengguna.app')
@section('tab', 'Airnav Assist')

@section( 'content' )
{{-- MASTERHEAD --}}
<header class="masterhead">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="headline fw-bold" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;">Hi! Selamat Datang di <br> Airnav Assist</h1>
        <img src="{{asset('src/img/airplane_pic.png')}}" alt="airplane" width="400">
    </div>
</header>

<div class="container-fluid">
    <div class="row align-items-center border m-3">
        <div class="col-12 col-sm-12 col-md-4">
            <div class="text-center">
                <h3><strong>Artikel Edukasi</strong></h3>
                <p>Baca berbagai informasi terbaru bandara untuk meningkatkan pemahamanmu</p>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-8">
            <div class="">
                <div id="carousel-home" class="">
                    @foreach ($dataArtikel as $item)
                    <div class="">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 border p-3">
                                <h4 class="text-center fw-bold">{{ $item->judul }}</h4>
                                <div class="des fw-normal text-body-secondary">{{ $item->deskripsi }}</div>
                                <br>
                                <a href="{{ route('beranda.detailArtikel',['id'=>$item->id]) }}" class="btn btn-light fw-semibold">Selengkapnya...</a>
                                <!-- <div class="" style="background-image: linear-gradient(to bottom, #ffffff, transparent 150%), url('{{ Storage::url('artikel/' . $item->file) }}');  background-repeat: no-repeat; background-attachment: scroll; background-position: top; background-size: 300%;"></div> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="carousel-home-nav" class="m-3 text-center">
                    <button type="button" class="btn btn-dark px-3 mx-3"><i class="fa-solid fa-arrow-left"></i></button>
                    <button type="button" class="btn btn-dark px-3 mx-3"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BACKGROUND II -->
<header class="background transBg container-fluid">
    <div class="container">
    </div>
</header>

<!-- VISI MISI -->
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

<!-- BACKGROUND III -->
<div class="endbackground container-fluid"></div>

<div class="lastbackground">
    <div class="container text-center">
        <div class="row" style="padding-bottom: 3rem;">
            <div class="d-flex justify-content-center align-items-center" style="margin-top: 5rem;">
                <h1 class="headline fw-bold" style="margin-top: -20rem;">Struktur Organisasi Cabang<br>Tanjung Pinang<br>(Bagan Managerial)</h1>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 5rem;">
                <img src="{{ asset('src/img/bagan.png') }}" alt="Bagan" style="max-width: 100%;">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var slider = tns({
        container: "#carousel-home",
        items: 1,
        // swipeAngle: false,
        mouseDrag: true,
        center: true,
        nav: false,
        controlsContainer: document.getElementById('carousel-home-nav'),

        // controls: false,
        // responsive: {
        //     200: {
        //         items: 2,
        //         controls: true,
        //     },
        // },
    });
</script>
@endpush