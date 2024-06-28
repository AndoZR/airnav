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
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('beranda.index') }}"> <small>Home</small></a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('beranda.artikel') }}"><small>Artikel</small></a>
                    </li>
                    <li class="nav-item dropdown align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><small>Pembelajaran</small></a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            @if (session('dataAirport'))
                                @foreach (session('dataAirport') as $item)
                                    <li>
                                        <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('beranda.pembelajaran') }}"> {{ $item->name }} Tower </a></li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><small>Test</small></a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            @if (session('dataAirport'))
                                @foreach (session('dataAirport') as $item)
                                    <li>
                                        <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('test.userIndex') }}"> {{ $item->name }} Tower </a></li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><small>Organisasi Cabang</small></a>
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
                    <li class="nav-item dropdown align-self-center">
                        <a class="nav-link text-light fw-semibold dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><small>E-Logbook</small></a>
                        <ul class="dropdown-menu" style="background-color: #49548C;">
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('logbook.rekap') }}"> Cabang Pembantu Batam </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-light fw-semibold" aria-current="page" href="{{ route('logbook.rekap') }}"> Cabang Tanjung Pinang </a></li>
                        </ul>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="#"><small>Performance Check</small></a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link active text-light fw-semibold" aria-current="page" href="{{ route('akun.index') }}"><small>Akun</small></a>
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