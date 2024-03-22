<div class="position-relative top-0">
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
                        <a class="nav-link active text-light" aria-current="page" href="{{ route('akun.index') }}">Akun</a>
                    </li>
                </ul>
                @if (Auth::guard('web')->check())
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-light" type="button">Log Out</a>
                @endif
            </div>
        </div>
    </nav>
</div>