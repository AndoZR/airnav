<div class="position-relative bottom-0" style="background-color: #49548C">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ route('beranda.index') }}">
                <img src="{{ asset('src/img/logoAirNav.png') }}" alt="Airnav Assist" height="40">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('beranda.index') }}">Home</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('beranda.artikel') }}">Artikel</a>
                    </li>
                    <li class="nav-item dropdown align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pembelajaran</a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.pembelajaran') }}"> Hang Nadim Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Tanjung Pinang Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> TMA North Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> TMA South Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Rajahaji Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Ranai Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Matak Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Letung Tower </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Test</a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('test.userIndex') }}"> Hang Nadim Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Tanjung Pinang Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> TMA North Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> TMA South Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Rajahaji Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Ranai Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Matak Tower </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Letung Tower </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Organisasi Cabang</a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            <li class="nav-item dropend align-self-center">
                                <a class="nav-link text-light fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cabang Pembantu Batam</a>
                                <ul class="dropdown-menu" style="background-color: #49548C;">
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.HangNadim_ATS') }}"> Team ATS </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.HangNadim_CNS') }}"> Team CNS </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.HangNadim_Penunjang') }}""> Team Penunjang </a></li>
                                    <li>
                                        <hr class=" dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.HangNadim_LOCA') }}""> Ketua Team LOCA </a></li>
                                    <li>
                                        <hr class=" dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.HangNadim_TeamChecker') }}"> Team Checker </a></li>
                                </ul>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="nav-item dropend align-self-center">
                                <a class="nav-link text-light fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cabang Tanjung Pinang</a>
                                <ul class="dropdown-menu" style="background-color: #49548C;">
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Team ATS </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Team CNS </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Team Penunjang </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Ketua Team LOCA </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="#"> Team Checker </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
<<<<<<< HEAD
                    <li class="nav-item dropdown align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">E-Logbook</a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            <li class="nav-item dropend align-self-center">
                                <a class="nav-link text-light fw-semibold" href="{{ route('beranda.elogbook') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cabang Pembantu Batam</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="nav-item dropend align-self-center">
                                <a class="nav-link text-light fw-semibold" aria-current="page" href="{{ route('beranda.elogbook') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cabang Tanjung Pinang</a>
=======
                    <li class="nav-item dropdown-center align-self-center">
                        <a class="nav-link active text-light fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">E-Logbook</a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.elogbook') }}"> Cabang Pembantu Batam </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.elogbook') }}"> Cabang Pembantu Pinang </a>
>>>>>>> 4d083e9 (update navbar, home, elogbook & pembelajaran)
                            </li>
                        </ul>
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