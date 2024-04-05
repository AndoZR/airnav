<div class="position-relative bottom-0" style="background-color: #49548C">
    <div class="container" >
        <nav class="navbar navbar-expand-lg" >
            <a class="navbar-brand" href="{{ route('beranda.index') }}">
                <img src="{{ asset('src/img/logoAirNav.png') }}" alt="Airnav Assist" height="40">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('beranda.index') }}">Home</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('beranda.artikel') }}">Artikel</a>
                    </li>
                    <li class="nav-item dropdown-center align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">Pembelajaran</a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.pembelajaran') }}"> Hang Nadim Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Link 2 </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Link 3 </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Link 4 </a></li>
                        </ul>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="#">Test</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="#">Organisasi Cabang</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="#">E-Logbook</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="#">Performance Check</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('akun.index') }}">Akun</a>
                    </li>
                    <li class="nav-item align-self-center">
                        @if (Auth::guard('web')->check())
                        <a href="{{ route('logout') }}" class=" nav-link active link-underlinel ink-underline-opacity-0"><button class=" btn btn-outline-light rounded-pil fw-medium" style="text-decoration: none;">Log Out</button></a>
                        @endif
                    </li>
                </ul>

            </div>

        </nav>
    </div>
</div>