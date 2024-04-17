@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
{{-- MASTERHEAD --}}
<header class="masterheadBelajar">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="text-primary fw-bolder" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>HANG NADIM <br> TOWER</strong></h1>
    </div>
</header>

<br class="mt-5 mb-5">
<div class="container">
    <section class="mt-5 mb-5">
        <div class="justify-content-center">
            <div class="col-sm-12">
                <h1 class="text-center text-primary"><strong>Standard Operating Procedure</strong></h1>
            </div>
            <div class="row mt-5">
                <div class="col-sm-6">
                    <img class="img-fluid" src="{{ asset('src/img/sopimg.png') }}" alt="SOP">
                </div>
                <div class="col-sm-6 text-primary">
                    <p>Standar Prosedur Operasi (SOP) Air Traffic Services (ATS) ini merupakan bagian dari
                        Manual Operasi Kantor Cabang Pembantu Batam dalam bentuk dokumen yang terpisah.
                        Penyusunan SOP ini berdasarkan Manual Airnav Indonesia - Petunjuk
                    </p>
                    <p>Pembuatan SOP Air
                        Traffic Services (ATS) edisi ke-2 nomor : 01/SOPATS-1 /OPS/01/2018
                    </p>
                    <p><a href="https://drive.google.com/drive/folders/1fPzx5ivD7obIpAZpmkQMbQkMqw67groi?usp=sharing" class="btn btn-danger"><i class="fa fa-file-pdf"></i> <b>SOP</b></a></p>
                </div>
            </div>
        </div>
    </section>
</div>

<br class="mt-5 mb-5">

<div class="container text-center">
    <div class="mt-5 mb-5">
        <h1 class="text-primary fw-bolder text-center" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>LOCA</strong></h1>
    </div>
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        <i class="fa fa-exclamation-circle"></i> Daftar LOCA yang dapat diakses user!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row g-2">
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1IzzDy2qEQ1OVAb2wkNslBMVH1Wuaq8sX?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/1.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1kvgXXamGeh-zUS2vDFHwx41RBEFtyGSP?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/2.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1NwnTd7b0cPvRb34XSsuihA5W41xd4Wr_?usp=sharing"><img class="img-fluid" src="{{ asset("src/img/loca/3.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1Xp1rKXEK9kl9N6il48Oipl2jiwk2zSj0?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/4.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1MP_kohRCEuEZKoPWM0ltw6r5KfHHqgeB?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/5.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1HxcT6gCpk6JOZ-gib82F510Zm74Xw33W?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/6.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/14oGKAVVUi9sRSYBzthARc8WkZ8nHHTMi?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/7.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1jCzKkynLT4kcyOo5hyhxJ6Ddcn0pPhzU?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/8.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1PkdNxkmadyg3gfI9DeeLzvEC8h0Q-D7M?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/9.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a href="https://drive.google.com/drive/folders/1mfU2nzscIWIa4FFPq93X1kPYQjzXLkoX?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/10.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>

    </div>
</div>
{{-- BACKGROUND III --}}
<div class="endbackground container"></div>
<div class="container mb-5 ">
    <h1 class="text-primary fw-bolder text-center" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>REVIEW</strong></h1>
    <div id="carouselExampleCaptions" class="carousel slide w-100">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner p-3">
            <div class="carousel-item active">
                <iframe width="100%" height="500vh" src="https://www.youtube.com/embed/WrRB-8eLfsA?si=fFfeu6SxttwycmXV" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> -->
            </div>
            <div class="carousel-item">
                <iframe width="100%" height="500vh" src="https://www.youtube.com/embed/saBwsz-YvOk?si=2FkSMAxiV0f1RWFG" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div> -->
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