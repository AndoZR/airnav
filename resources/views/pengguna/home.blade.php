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
    <link href="{{ asset('src/OwlCarousel2/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('src/OwlCarousel2/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="position-sticky top-0">
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
                    <a href="{{ route('signIn') }}" class="btn btn-sm btn-outline-light" type="button">Log In</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <!-- MASTERHEAD
        <header class="masthead transBg">
            <div class="container">
                <h1>Hi! Selamat Datang di</h1> <br>
                <h1>Airnav Assist</h1>
            </div>
        </header> -->

        <!-- SLIDER -->
        <!-- <span class="separator"></span> -->
        <!-- page-section -->
        <section class="mt-5 pt-5 pb-2 slider-nav" id="services">
            <div class="d-flex justify-content-center">
                <div class="display-slider">
                    <img src="" alt="image">
                </div>
                <div class="slider-wrapper ">
                    <div id="" class="owl-carousel d-flex flex-row">
                        <div class="slide item">
                            <div class="slide-item" style="background-image: url('{{ asset(`src/img/sld0.png`) }}')">
                                <div class="content">
                                    <div class="name">Air One</div>
                                    <div class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, amet? Voluptas similique temporibus cumque ab! Culpa nesciunt nemo saepe ducimus unde hic eveniet nulla provident aut quibusdam! Aspernatur, fuga molestias?</div>
                                    <button class="btn btn-light">See More</button>
                                </div>
                            </div>
                        </div>
                        <div class="slide item">
                            <div class="slide-item" style="background-image: url('{{ asset(`src/img/sld0.png`) }}')">
                                <div class="content">
                                    <div class="name">Air Two</div>
                                    <div class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, amet? Voluptas similique temporibus cumque ab! Culpa nesciunt nemo saepe ducimus unde hic eveniet nulla provident aut quibusdam! Aspernatur, fuga molestias?</div>
                                    <button class="btn btn-light">See More</button>
                                </div>
                            </div>
                        </div>
                        <div class="slide item">
                            <div class="slide-item" style="background-image: url('{{ asset(`src/img/sld0.png`) }}')">
                                <div class="content">
                                    <div class="name">Air Three</div>
                                    <div class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, amet? Voluptas similique temporibus cumque ab! Culpa nesciunt nemo saepe ducimus unde hic eveniet nulla provident aut quibusdam! Aspernatur, fuga molestias?</div>
                                    <button class="btn btn-light">See More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="slider-move" class="owl-nav d-flex justify-content-end">
                <button type="button" class="owl-prev mx-5 btn btn-light"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="owl-next mx-5 btn btn-light"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </section>
    </div>


</body>
<script src="{{ asset('src/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('src/jquery/jquery.js') }}"></script>
<script src="{{ asset('src/OwlCarousel2/dist/owl.carousel.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            margin: 10,
            center: true,
            navContainer:'owl-nav',
            autoWidth:true,
            items:1
        });
    });
</script>

</html>