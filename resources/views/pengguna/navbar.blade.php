<div class="position-relative bottom-0">
    <nav class="navbar navbar-expand-lg" style="background-color: #49548C">
        <div class="container">
            <a class="navbar-brand" href="{{ route("beranda.index") }}">
                <img src="{{ asset('src/img/logoAirNav.png') }}" alt="Airnav Assist" height="40">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('beranda.index') }}">Home</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="#">Artikel</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="#">Pembelajaran</a>
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
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route("akun.index") }}">Akun</a>
                    </li>
                    <li class="nav-item align-self-center">
                        @if (Auth::guard('web')->check())
                        <a href="{{ route('logout') }}" class=" nav-link active link-underlinel ink-underline-opacity-0"><button class=" btn btn-outline-light rounded-pil fw-medium" style="text-decoration: none;">Log Out</button></a>
                        @endif
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</div>