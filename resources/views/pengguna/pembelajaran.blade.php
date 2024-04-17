@extends('pengguna.app')
@section('tab', 'Pembelajaran')

<<<<<<< HEAD
@section('content')
{{-- MASTERHEAD --}}
<header class="masterheadBelajar">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="text-primary fw-bold" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;">HANG NADIM TOWER</h1>
    </div>
</header>

<!-- SOP -->
<div class="container-fluid">
    <section class="mt-5">
        <div class="justify-content-center">
            <div class="col-sm-12">
                <h3 class="text-center text-primary"><strong>Standart Operating Procedure</strong></h3>
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

<!-- LOCA -->
<header class="backgroundLOCA transBg container-fluid" id="myHeader">
    <div id="imageContainer" class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h3 class="text-center text-primary"><strong>Local Operator Command Authority</strong></h3>
            </div>
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                <i class="fa fa-exclamation-circle"></i> Daftar LOCA yang dapat diakses user!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1IzzDy2qEQ1OVAb2wkNslBMVH1Wuaq8sX?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/1.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1kvgXXamGeh-zUS2vDFHwx41RBEFtyGSP?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/2.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1NwnTd7b0cPvRb34XSsuihA5W41xd4Wr_?usp=sharing"><img class="img-fluid" src="{{ asset("src/img/loca/3.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1Xp1rKXEK9kl9N6il48Oipl2jiwk2zSj0?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/4.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1MP_kohRCEuEZKoPWM0ltw6r5KfHHqgeB?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/5.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1HxcT6gCpk6JOZ-gib82F510Zm74Xw33W?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/6.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/14oGKAVVUi9sRSYBzthARc8WkZ8nHHTMi?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/7.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1jCzKkynLT4kcyOo5hyhxJ6Ddcn0pPhzU?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/8.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1PkdNxkmadyg3gfI9DeeLzvEC8h0Q-D7M?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/9.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
            <div class="col-sm-3 overflow-hidden mt-3">
                <a href="https://drive.google.com/drive/folders/1mfU2nzscIWIa4FFPq93X1kPYQjzXLkoX?usp=drive_link"><img class="img-fluid" src="{{ asset("src/img/loca/10.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
    </div>
</header>

{{-- Video --}}
<header class="backgroundVIDEO transBg container-fluid mb-5">
    <div class="container">
        <div class="col-sm-12">
            <h3 class="text-center text-primary"><strong>REVIEW</strong></h3>
        </div>
		<div class="mt-5" style="height: 100%; overflow-x: hidden; text-align: center">
			<div class="csslider infinity" id="slider1">
                <input type="radio" name="slides" checked="checked" id="slides_1"/>
                <input type="radio" name="slides" id="slides_2"/>
                <input type="radio" name="slides" id="slides_3"/>
                <input type="radio" name="slides" id="slides_4"/>
                <input type="radio" name="slides" id="slides_5"/>
                <input type="radio" name="slides" id="slides_6"/>
                <input type="radio" name="slides" id="slides_7"/>
                <input type="radio" name="slides" id="slides_8"/>
                <input type="radio" name="slides" id="slides_9"/>
                <input type="radio" name="slides" id="slides_10"/>
                <ul>
                    <li>
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/WrRB-8eLfsA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>

                            <iframe width="100%" height="400px" src="https://www.youtube.com/embed/WrRB-8eLfsA?si=fFfeu6SxttwycmXV" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    </li>
                    <li>

                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/WrRB-8eLfsA?si=fFfeu6SxttwycmXV" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    </li>
                    <li>
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/WrRB-8eLfsA?si=fFfeu6SxttwycmXV" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/WrRB-8eLfsA?si=fFfeu6SxttwycmXV" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/WrRB-8eLfsA?si=fFfeu6SxttwycmXV" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/saBwsz-YvOk?si=2FkSMAxiV0f1RWFG" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/saBwsz-YvOk?si=2FkSMAxiV0f1RWFG" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/saBwsz-YvOk?si=2FkSMAxiV0f1RWFG" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/saBwsz-YvOk?si=2FkSMAxiV0f1RWFG" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>
                        <p>
                        <video controls preload>
                        <source src="" />
                        </video> 
                        </p>
                    </li>
                    <li>
                        <p>
                        <video controls preload>
                        <source src="" />
                        </video> 
                        </p>
                    </li>
                </ul>
                <div class="arrows">
                    <label for="slides_1"></label>
                    <label for="slides_2"></label>
                    <label for="slides_3"></label>
                    <label for="slides_4"></label>
                    <label for="slides_5"></label>
                    <label for="slides_6"></label>
                    <label for="slides_7"></label>
                    <label for="slides_8"></label>
                    <label for="slides_9"></label>
                    <label for="slides_10"></label>
                    <label class="goto-first" for="slides_1"></label>
                    <label class="goto-last" for="slides_10"></label>
                </div>
                <div class="navigation"> 
                    <div>
                        <label for="slides_1"></label>
                        <label for="slides_2"></label>
                        <label for="slides_3"></label>
                        <label for="slides_4"></label>
                        <label for="slides_5"></label>
                        <label for="slides_6"></label>
                        <label for="slides_7"></label>
                        <label for="slides_8"></label>
                        <label for="slides_9"></label>
                        <label for="slides_10"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Ambil elemen header dan kontainer gambar
    const header = document.getElementById('myHeader');
    const imageContainer = document.getElementById('imageContainer');
    
    // Hitung tinggi total gambar dalam container
    let totalImageHeight = 0;
    imageContainer.querySelectorAll('img').forEach(img => {
        totalImageHeight += img.clientHeight;
    });

    // Atur tinggi header sesuai dengan tinggi total gambar
    header.style.height = `${totalImageHeight-1500}px`;
});    
</script> 
@endpush
=======
@section( 'content' )
    {{-- MASTERHEAD --}}
    <header class="masterhead">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="text-primary fw-bolder" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>HANG NADIM <br> TOWER</strong></h1>
        </div>
    </header>
   

    {{-- BACKGROUND III --}}
    <div class="endbackground container-fluid"></div>

    <div class="lastbackground">
        <div class="container text-center">
            <div class="row" style="padding-bottom: 3rem;">
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
>>>>>>> parent of cee8fdf (add slider for video pembelajaran)
