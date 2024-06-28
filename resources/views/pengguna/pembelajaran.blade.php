@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
{{-- MASTERHEAD --}}
<header class="masterheadBelajar">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="headline fw-bolder" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>{{ strtoupper($airport->name) }} <br> TOWER</strong></h1>
    </div>
</header>

<br class="mt-5 mb-5">
<div class="container">
    <section class="mt-5 mb-5">
        <div class="justify-content-center">
            <div class="col-sm-12">
                <h1 class="text-center headline"><strong>Standard Operating Procedure</strong></h1>
            </div>
            <div class="row mt-5">
                <div class="col-sm-6">
                    <img class="img-fluid" src="{{ asset('src/img/sopimg.png') }}" alt="SOP">
                </div>
                <div class="col-sm-6">
                    <p>Standar Prosedur Operasi (SOP) Air Traffic Services (ATS) ini merupakan bagian dari
                        Manual Operasi Kantor Cabang Pembantu Batam dalam bentuk dokumen yang terpisah.
                        Penyusunan SOP ini berdasarkan Manual Airnav Indonesia - Petunjuk
                    </p>
                    <p>Pembuatan SOP Air
                        Traffic Services (ATS) edisi ke-2 nomor : 01/SOPATS-1 /OPS/01/2018
                    </p>
                    <p><a class="btn btn-danger btn-sop"><i class="fa fa-file-pdf"></i> <b>SOP</b></a></p>
                </div>
            </div>
        </div>
    </section>
</div>

<br class="mt-5 mb-5">

<div class="container text-center">
    <div class="mt-5 mb-5">
        <h1 class="headline fw-bolder text-center" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>LOCA</strong></h1>
    </div>
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        <i class="fa fa-exclamation-circle"></i> Daftar LOCA yang dapat diakses user!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row g-2 loca">
        @if (isset($airport->LOCA))
            @foreach (json_decode($airport->LOCA) as $item)
                <div class="col-12 col-sm-12 col-md-3">
                    <div class="">
                        <a href="#" class="btn-loca" data-loca="{{ $item }}"><img class="img-fluid" src="{{ asset("src/img/loca/1.png") }}" class="rounded mx-auto d-block" alt="..."></a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                <i class="fa fa-exclamation-circle"></i> Sepertinya tidak ada daftar LOCA!
            </div>
        @endif
        {{-- <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="flybest.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/2.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="basarnas.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/3.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="teknikairnav.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/4.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="piamedan.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/5.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="lanud.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/6.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="tanjungpinang.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/7.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="meteo.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/8.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="amhs.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/9.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
            <div class="">
                <a class="btn-loca" href="#" data-loca="ptbib.pdf"><img class="img-fluid" src="{{ asset("src/img/loca/10.png") }}" class="rounded mx-auto d-block" alt="..."></a>
            </div>
        </div> --}}

    </div>
</div>
{{-- BACKGROUND III --}}
<div class="endbackground container"></div>
<div class="container mb-5 ">
    <h1 class="headline fw-bolder text-center" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;"><strong>REVIEW</strong></h1>
    <div id="carouselExampleCaptions" class="carousel slide w-100">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner p-3">
            <div class="carousel-item active">
                <iframe width="100%" height="500vh" src="https://www.youtube.com/embed/tshZFBlVV10?si=svJlepvC510J4Wyz" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> -->
            </div>
            <div class="carousel-item">
                <iframe width="100%" height="500vh" src="https://www.youtube.com/embed/tshZFBlVV10?si=svJlepvC510J4Wyz" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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

<!-- Modal Lihat Berkas -->
<div class="modal fade" id="modal-berkas" tabindex="-1" role="dialog" aria-labelledby="modalBerkas" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body text-center">
                <embed src="" frameborder="0" width="100%" height="500px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var data = {!! json_encode($airport) !!};
        $('.btn-sop').on('click', function() {
            var file_url = "{{ asset('storage/airport/sop') }}/" + data.SOP;
            $('#modal-berkas').find('.modal-title').text($(this).data('name'));
            $('#modal-berkas').find('embed').attr('src', file_url);
            $('#modal-berkas').modal('show');
        });

        $(document).ready(function() {
            $('.btn-loca').on('click', function(event) {
                event.preventDefault(); // Mencegah aksi default link
                var fileName = $(this).data('loca'); // Ambil nilai data-loca

                var fileUrl = "{{ asset('storage/airport/loca') }}/" + fileName; // Buat URL file

                // Update konten modal
                $('#modal-berkas').find('.modal-title').text($(this).data('name'));
                $('#modal-berkas').find('embed').attr('src', fileUrl);
                $('#modal-berkas').modal('show');
            });
        });
    </script>
@endpush