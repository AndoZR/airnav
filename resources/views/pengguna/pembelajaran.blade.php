@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
{{-- MASTERHEAD --}}
<header class="masterhead">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="text-primary fw-bolder" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>HANG NADIM <br> TOWER</strong></h1>
    </div>
</header>


<div class="container text-center">
    <div class="mt-5 mb-5">
    <h1 class="text-primary fw-bolder text-center" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>LOCA</strong></h1>
        <hr>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <img src="" alt="" width="200vw" height="200vh">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <img src="" alt="" width="200vw" height="200vh">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <img src="" alt="" width="200vw" height="200vh">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <img src="" alt="" width="200vw" height="200vh">
            </div>
        </div>
    </div>

</div>

{{-- BACKGROUND III --}}
<div class="endbackground container-fluid"></div>
<div class="container mb-5">
    <h1 class="text-primary fw-bolder text-center" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>REVIEW</strong></h1>
    <div id="carouselExampleCaptions" class="carousel slide w-100">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="" alt="" height="500vh" style="background-color: black;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="" alt="" height="500vh" style="background-color: black;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="" alt="" height="500vh" style="background-color: black;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<br>

<script>

</script>
@endsection