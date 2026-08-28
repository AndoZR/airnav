<div class="navbar-wrapper sticky-top" id="mainNavbar" style="z-index:1030;">
    {{-- Accent line animasi halus --}}
    <div style="height:3px; background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166, #49548C); background-size:300% 100%; animation: navGradientShift 5s ease infinite;"></div>
    <div id="navbarInner" style="background: #49548C; box-shadow: 0 4px 20px rgba(73,84,140,0.22); transition: all 0.35s ease;">
        <div class="container-fluid" style="padding-left:0.5rem !important; padding-right:0.75rem !important; max-width:100%;">
            <nav class="navbar navbar-expand-lg py-2" style="padding-left:0 !important; padding-right:0 !important;">
                {{-- Logo: manfaatkan space kiri yang masih banyak — geser agak ke kiri biar kanan (Akun/Logout) keliatan di 100% --}}
                <a class="navbar-brand d-flex align-items-center nav-logo" href="{{ route('beranda.index') }}" style="animation: navFadeIn 0.6s ease forwards; gap:0.7rem; padding:0.3rem 0; margin-right:0.75rem; margin-left:-0.35rem !important;">
                    <img src="{{ asset('src/img/logoAirNav.png') }}" alt="AirNav Assist" height="40" style="display:block; width:auto; height:40px; object-fit:contain; filter: brightness(0) invert(1) drop-shadow(0 2px 8px rgba(0,0,0,0.25)); image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges; transition: all 0.3s; flex-shrink:0;" class="logo-img">
                    <div style="line-height:1; display:flex; flex-direction:column; justify-content:center; border-left:1px solid rgba(255,255,255,0.22); padding-left:0.85rem;">
                        <div class="fw-bold text-white" style="font-family:'Outfit',sans-serif; font-size:1.05rem; letter-spacing:0.02em; line-height:1.1; text-shadow:0 1px 6px rgba(0,0,0,0.18); white-space:nowrap;">AirNav Assist</div>
                        <small class="text-white" style="opacity:0.9; font-size:0.58rem; letter-spacing:0.07em; font-weight:700; margin-top:2px; white-space:nowrap;">TANJUNG PINANG • BATAM</small>
                    </div>
                </a>
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background:rgba(255,255,255,0.14); border-radius:0.6rem; padding:0.5rem 0.7rem;">
                    <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-1 mb-2 mb-lg-0" style="flex-wrap:nowrap;">
                        <li class="nav-item" style="animation: navFadeInUp 0.5s ease 0.05s forwards; opacity:0;">
                            <a class="nav-link nav-anim text-white px-2 py-2 rounded-3 {{ request()->routeIs('beranda.index') ? 'active-nav' : '' }}" href="{{ route('beranda.index') }}" style="font-weight:500; font-size:0.84rem; white-space:nowrap;">Home</a>
                        </li>
                        <li class="nav-item" style="animation: navFadeInUp 0.5s ease 0.1s forwards; opacity:0;">
                            <a class="nav-link nav-anim text-white px-3 py-2 rounded-3 {{ request()->routeIs('beranda.artikel') || request()->routeIs('beranda.detailArtikel') ? 'active-nav' : '' }}" href="{{ route('beranda.artikel') }}" style="font-weight:500; font-size:0.88rem;">Artikel</a>
                        </li>
                        <li class="nav-item dropdown" style="animation: navFadeInUp 0.5s ease 0.14s forwards; opacity:0;">
                            <a class="nav-link nav-anim text-white dropdown-toggle px-3 py-2 rounded-3" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:500; font-size:0.88rem;">Pembelajaran</a>
                            <ul class="dropdown-menu dropdown-anim shadow-lg border-0 mt-2" style="background:#49548C; border-radius:0.9rem; padding:0.45rem; min-width:210px;">
                                @if (session('dataAirport'))
                                    @foreach (session('dataAirport') as $item)
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem; font-weight:500;" href="{{ route('beranda.pembelajaran',["id" => $item->id]) }}">{{ $item->name }} Tower</a></li>
                                        @if(!$loop->last)<li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>@endif
                                    @endforeach
                                @else
                                    <li><span class="dropdown-item text-white-50 small">Belum ada data airport</span></li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="animation: navFadeInUp 0.5s ease 0.18s forwards; opacity:0;">
                            <a class="nav-link nav-anim text-white dropdown-toggle px-3 py-2 rounded-3" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:500; font-size:0.88rem;">Test</a>
                            <ul class="dropdown-menu dropdown-anim shadow-lg border-0 mt-2" style="background:#49548C; border-radius:0.9rem; padding:0.45rem; min-width:210px;">
                                @if (session('dataAirport'))
                                    @foreach (session('dataAirport') as $item)
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem; font-weight:500;" href="{{ route('test.tower',['id'=>$item->id]) }}">{{ $item->name }} Tower</a></li>
                                        @if(!$loop->last)<li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>@endif
                                    @endforeach
                                @else
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('test.userIndex') }}">Daftar Ujian</a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="animation: navFadeInUp 0.5s ease 0.22s forwards; opacity:0;">
                            <a class="nav-link nav-anim text-white dropdown-toggle px-3 py-2 rounded-3" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:500; font-size:0.88rem;">Organisasi Cabang</a>
                            <ul class="dropdown-menu dropdown-anim shadow-lg border-0 mt-2" style="background:#49548C; border-radius:0.9rem; padding:0.45rem; min-width:250px;">
                                <li class="dropend">
                                    <a class="dropdown-item text-white dropdown-toggle rounded-3 py-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:0.85rem; font-weight:500;">Cabang Pembantu Batam</a>
                                    <ul class="dropdown-menu shadow-lg border-0" style="background:#3d4675; border-radius:0.9rem; padding:0.45rem;">
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.HangNadim_ATS') }}">Team ATS</a></li>
                                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.HangNadim_CNS') }}">Team CNS</a></li>
                                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.HangNadim_Penunjang') }}">Team Penunjang</a></li>
                                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.HangNadim_LOCA') }}">Ketua Team LOCA</a></li>
                                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.HangNadim_TeamChecker') }}">Team Checker</a></li>
                                    </ul>
                                </li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.18); margin:0.35rem 0;"></li>
                                <li class="dropend">
                                    <a class="dropdown-item text-white dropdown-toggle rounded-3 py-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:0.85rem; font-weight:500;">Cabang Tanjung Pinang</a>
                                    <ul class="dropdown-menu shadow-lg border-0" style="background:#3d4675; border-radius:0.9rem; padding:0.45rem;">
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.TanjungPinang_ATS') }}">Team ATS</a></li>
                                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.TanjungPinang_CNS') }}">Team CNS</a></li>
                                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.TanjungPinang_Penunjang') }}">Team Penunjang</a></li>
                                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.TanjungPinang_LOCA') }}">Ketua Team LOCA</a></li>
                                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('beranda.TanjungPinang_TeamChecker') }}">Team Checker</a></li>
                                    </ul>
                                </li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.18); margin:0.35rem 0;"></li>
                                <li><span class="dropdown-item text-white-50 rounded-3 py-2 d-flex justify-content-between align-items-center" style="font-size:0.82rem; opacity:0.6; cursor:not-allowed;" title="Bagan belum tersedia"><span><i class="fa-solid fa-lock me-2" style="font-size:0.7rem;"></i> Hang Nadim Tower</span> <span class="badge" style="background:rgba(255,255,255,0.14); color:white; border-radius:2rem; font-size:0.6rem; border:1px solid rgba(255,255,255,0.18);">Upcoming</span></span></li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                <li><span class="dropdown-item text-white-50 rounded-3 py-2 d-flex justify-content-between align-items-center" style="font-size:0.82rem; opacity:0.6; cursor:not-allowed;" title="Bagan belum tersedia"><span><i class="fa-solid fa-lock me-2" style="font-size:0.7rem;"></i> TMA North Tower</span> <span class="badge" style="background:rgba(255,255,255,0.14); color:white; border-radius:2rem; font-size:0.6rem; border:1px solid rgba(255,255,255,0.18);">Upcoming</span></span></li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                <li><span class="dropdown-item text-white-50 rounded-3 py-2 d-flex justify-content-between align-items-center" style="font-size:0.82rem; opacity:0.6; cursor:not-allowed;" title="Bagan belum tersedia"><span><i class="fa-solid fa-lock me-2" style="font-size:0.7rem;"></i> TMA South Tower</span> <span class="badge" style="background:rgba(255,255,255,0.14); color:white; border-radius:2rem; font-size:0.6rem; border:1px solid rgba(255,255,255,0.18);">Upcoming</span></span></li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                <li><span class="dropdown-item text-white-50 rounded-3 py-2 d-flex justify-content-between align-items-center" style="font-size:0.82rem; opacity:0.6; cursor:not-allowed;" title="Bagan belum tersedia"><span><i class="fa-solid fa-lock me-2" style="font-size:0.7rem;"></i> Rajahaji Tower</span> <span class="badge" style="background:rgba(255,255,255,0.14); color:white; border-radius:2rem; font-size:0.6rem; border:1px solid rgba(255,255,255,0.18);">Upcoming</span></span></li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                <li><span class="dropdown-item text-white-50 rounded-3 py-2 d-flex justify-content-between align-items-center" style="font-size:0.82rem; opacity:0.6; cursor:not-allowed;" title="Bagan belum tersedia"><span><i class="fa-solid fa-lock me-2" style="font-size:0.7rem;"></i> Ranai Tower</span> <span class="badge" style="background:rgba(255,255,255,0.14); color:white; border-radius:2rem; font-size:0.6rem; border:1px solid rgba(255,255,255,0.18);">Upcoming</span></span></li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                <li><span class="dropdown-item text-white-50 rounded-3 py-2 d-flex justify-content-between align-items-center" style="font-size:0.82rem; opacity:0.6; cursor:not-allowed;" title="Bagan belum tersedia"><span><i class="fa-solid fa-lock me-2" style="font-size:0.7rem;"></i> Matak Tower</span> <span class="badge" style="background:rgba(255,255,255,0.14); color:white; border-radius:2rem; font-size:0.6rem; border:1px solid rgba(255,255,255,0.18);">Upcoming</span></span></li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                <li><span class="dropdown-item text-white-50 rounded-3 py-2 d-flex justify-content-between align-items-center" style="font-size:0.82rem; opacity:0.6; cursor:not-allowed;" title="Bagan belum tersedia"><span><i class="fa-solid fa-lock me-2" style="font-size:0.7rem;"></i> Letung Tower</span> <span class="badge" style="background:rgba(255,255,255,0.14); color:white; border-radius:2rem; font-size:0.6rem; border:1px solid rgba(255,255,255,0.18);">Upcoming</span></span></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="animation: navFadeInUp 0.5s ease 0.26s forwards; opacity:0;">
                            <a class="nav-link nav-anim text-white dropdown-toggle px-3 py-2 rounded-3" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:500; font-size:0.88rem;">E-Logbook</a>
                            <ul class="dropdown-menu dropdown-anim shadow-lg border-0 mt-2" style="background:#49548C; border-radius:0.9rem; padding:0.45rem; min-width:210px;">
                                @if (session('dataAirport'))
                                    @foreach (session('dataAirport') as $item)
                                        <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem; font-weight:500;" href="{{ route('logbook.rekap') }}?cabang={{ strtolower(str_contains($item->name,'Tanjung') ? 'tanjung' : 'batam') }}&tower={{ urlencode($item->name.' Tower') }}"><i class="fa-solid fa-tower-broadcast me-2" style="font-size:0.7rem;"></i> {{ $item->name }} Tower</a></li>
                                        @if(!$loop->last)<li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>@endif
                                    @endforeach
                                    <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.18); margin:0.35rem 0;"></li>
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem; font-weight:600;" href="{{ route('logbook.rekap') }}"><i class="fa-solid fa-layer-group me-2" style="font-size:0.7rem;"></i> Semua Tower</a></li>
                                @else
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('logbook.rekap') }}?tower=Hang%20Nadim%20Tower">Hang Nadim Tower</a></li>
                                    <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('logbook.rekap') }}?tower=Tanjung%20Pinang%20Tower">Tanjung Pinang Tower</a></li>
                                    <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('logbook.rekap') }}?tower=TMA%20North%20Tower">TMA North Tower</a></li>
                                    <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('logbook.rekap') }}?tower=TMA%20South%20Tower">TMA South Tower</a></li>
                                    <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('logbook.rekap') }}?tower=Rajahaji%20Tower">Rajahaji Tower</a></li>
                                    <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('logbook.rekap') }}?tower=Ranai%20Tower">Ranai Tower</a></li>
                                    <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('logbook.rekap') }}?tower=Matak%20Tower">Matak Tower</a></li>
                                    <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,0.14); margin:0.25rem 0;"></li>
                                    <li><a class="dropdown-item text-white rounded-3 py-2" style="font-size:0.85rem;" href="{{ route('logbook.rekap') }}?tower=Letung%20Tower">Letung Tower</a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item" style="animation: navFadeInUp 0.5s ease 0.30s forwards; opacity:0;">
                            <span class="nav-link nav-anim text-white-50 px-3 py-2 rounded-3 d-flex align-items-center gap-2" style="font-weight:500; font-size:0.88rem; opacity:0.6; cursor:not-allowed;" title="Fitur segera hadir" onclick="if(typeof Swal!=='undefined'){Swal.fire({icon:'info', title:'Upcoming', text:'Performance Check segera hadir!'});} else {alert('Performance Check — Upcoming');}">
                                Performance Check <span class="badge" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.18); border-radius:2rem; font-size:0.6rem; font-weight:700;">Upcoming</span>
                            </span>
                        </li>
                        <li class="nav-item" style="animation: navFadeInUp 0.5s ease 0.34s forwards; opacity:0;">
                            <a class="nav-link nav-anim text-white px-3 py-2 rounded-3 {{ request()->routeIs('akun.*') ? 'active-nav' : '' }}" href="{{ route('akun.index') }}" style="font-weight:500; font-size:0.88rem;">Akun</a>
                        </li>
                        @if (Auth::guard('web')->check())
                        <li class="nav-item ms-lg-2" style="animation: navFadeInUp 0.5s ease 0.38s forwards; opacity:0;">
                            <a href="{{ route('logout') }}" class="btn btn-sm fw-semibold px-3 py-2" style="background: rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.28); backdrop-filter:blur(6px); border-radius:2rem; font-size:0.82rem; transition: all 0.3s;" onmouseover="this.style.background='white'; this.style.color='#49548C'; this.style.transform='translateY(-1px)'" onmouseout="this.style.background='rgba(255,255,255,0.14)'; this.style.color='white'; this.style.transform='none'">Log Out</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<style>
.nav-anim { position:relative; transition: all 0.25s ease; }
.nav-anim::after { content:''; position:absolute; bottom:4px; left:50%; width:0; height:2px; background:white; border-radius:1px; transition: all 0.3s cubic-bezier(0.4,0,0.2,1); transform:translateX(-50%); opacity:0; }
.nav-anim:hover::after { width:58%; opacity:1; }
.nav-anim:hover { background: rgba(255,255,255,0.11) !important; }
.active-nav { background: rgba(255,255,255,0.16) !important; }
.active-nav::after { width:58%; opacity:1; }
.nav-logo:hover img { transform: scale(1.04); }
.nav-logo:hover div[style*="backdrop-filter"] { background:rgba(255,255,255,0.18) !important; }
.dropdown-anim { animation: dropdownIn 0.25s cubic-bezier(0.4,0,0.2,1) forwards; transform-origin: top center; }
.dropdown-item { transition: all 0.2s ease; }
.dropdown-item:hover { background: rgba(255,255,255,0.13) !important; }
.navbar-wrapper.scrolled #navbarInner { box-shadow: 0 8px 28px rgba(73,84,140,0.30) !important; }
@keyframes navGradientShift { 0% { background-position:0% 50%; } 50% { background-position:100% 50%; } 100% { background-position:0% 50%; } }
@keyframes navFadeIn { from { opacity:0; transform: translateX(-10px); } to { opacity:1; transform: translateX(0); } }
@keyframes navFadeInUp { from { opacity:0; transform: translateY(8px); } to { opacity:1; transform: translateY(0); } }
@keyframes dropdownIn { from { opacity:0; transform: translateY(-6px) scale(0.98); } to { opacity:1; transform: translateY(0) scale(1); } }
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const wrapper = document.getElementById('mainNavbar');
    const inner = document.getElementById('navbarInner');
    window.addEventListener('scroll', function(){
        if(window.scrollY > 8){ wrapper.classList.add('scrolled'); inner.style.background='#3f4a7a'; }
        else { wrapper.classList.remove('scrolled'); inner.style.background='#49548C'; }
    });
});
</script>
