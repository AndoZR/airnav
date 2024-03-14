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
</head>
<body>
    {{-- NAVBAR --}}
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

    {{-- MASTERHEAD --}}
    <header class="masthead transBg">
        <div class="container">
            <h1>Hi! Selamat Datang di</h1> <br>
            <h1>Airnav Assist</h1>
        </div>
    </header>

    {{-- Slider --}}
    <section class="page-section" id="services">
        <div class="container">
            <div class="slide">
                <div class="item" style="background-image: url('{{ asset('src/img/sld0.png') }}')">
                    <div class="content">
                        <div class="name">Air One</div>
                        <div class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, amet? Voluptas similique temporibus cumque ab! Culpa nesciunt nemo saepe ducimus unde hic eveniet nulla provident aut quibusdam! Aspernatur, fuga molestias?</div>
                        <button>See More</button>
                    </div>
                </div>
                <div class="item" style="background-image: url('{{ asset('src/img/sld1.png') }}')">
                    <div class="content">
                        <div class="name">Air Two</div>
                        <div class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est minima natus placeat, vero voluptates expedita laudantium quos beatae quam modi deserunt provident. Amet qui tenetur incidunt architecto optio repellendus maiores.</div>
                        <button>See More</button>
                    </div>
                </div>
                <div class="item" style="background-image: url('{{ asset('src/img/sld2.png') }}')">
                    <div class="content">
                        <div class="name">Air Third</div>
                        <div class="des">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat fugit inventore in dignissimos aperiam quis, quas ipsum, amet enim illum necessitatibus. Cupiditate commodi, ullam tempore alias nobis dignissimos vitae architecto.</div>
                        <button>See More</button>
                    </div>
                </div>
                <div class="item" style="background-image: url('{{ asset('src/img/sld3.png') }}')">
                    <div class="content">
                        <div class="name">Air Four</div>
                        <div class="des">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat fugit inventore in dignissimos aperiam quis, quas ipsum, amet enim illum necessitatibus. Cupiditate commodi, ullam tempore alias nobis dignissimos vitae architecto.</div>
                        <button>See More</button>
                    </div>
                </div>
                <div class="item" style="background-image: url('{{ asset('src/img/sld2.png') }}')">
                    <div class="content">
                        <div class="name">Air Five</div>
                        <div class="des">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat fugit inventore in dignissimos aperiam quis, quas ipsum, amet enim illum necessitatibus. Cupiditate commodi, ullam tempore alias nobis dignissimos vitae architecto.</div>
                        <button>See More</button>
                    </div>
                </div>
            </div>
            <div class="button">
                <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
                <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </section>
</body>
<script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</html>