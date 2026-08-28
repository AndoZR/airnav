@extends('dashboard.dashboard')
@section('tab', 'Dashboard - AirNav Assist')
@section('title', 'Dashboard')

@section('content')
<div class="page-content">
    {{-- Welcome --}}
    <div class="card mb-4" style="background: linear-gradient(135deg,#0d47a1 0%,#1976d2 50%,#42a5f5 100%); color:white; border:none;">
        <div class="card-body p-4 d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <h4 class="text-white mb-1">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }} 👋</h4>
                <p class="text-white-50 mb-0">AirNav Assist — Dashboard ringkas untuk kelola Airport, Pembelajaran, Artikel & Pengguna</p>
                <small class="badge bg-white text-primary mt-2">Role: 
                    @if(Auth::user()->status == 1) Pembelajaran (Airport & Test)
                    @elseif(Auth::user()->status == 2) Artikel & Organisasi
                    @elseif(Auth::user()->status == 3) E-Logbook
                    @else Pengguna @endif
                    • {{ Auth::user()->username }}
                </small>
            </div>
            <div class="text-end mt-3 mt-md-0">
                <div class="bg-white rounded-3 p-2 d-inline-block">
                    <i class="bi bi-airplane-fill text-primary fs-2"></i>
                </div>
                <div class="small text-white-50 mt-1">{{ now()->format('d M Y, H:i') }}</div>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <section class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2"><i class="bi bi-geo-alt-fill"></i></div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Airport</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['airport'] ?? 0 }}</h6>
                            <small class="text-muted">Data SOP & LOCA</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2"><i class="bi bi-journal-text"></i></div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Ujian / Test</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['test'] ?? 0 }}</h6>
                            <small class="text-success">{{ $stats['testAktif'] ?? 0 }} aktif</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2"><i class="bi bi-newspaper"></i></div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Artikel</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['artikel'] ?? 0 }}</h6>
                            <small class="text-muted">Publikasi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2"><i class="bi bi-people-fill"></i></div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Pengguna</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['pengguna'] ?? 0 }}</h6>
                            <small class="text-muted">{{ $stats['karyawan'] ?? 0 }} karyawan • {{ $stats['divisi'] ?? 0 }} divisi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Quick Actions --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Aksi Cepat</h4>
                    <small class="text-muted">Sesuai role kamu</small>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        @if(Auth::user()->status == 1)
                            <div class="col-6 col-md-3"><a href="{{ route('airport.index') }}" class="btn btn-outline-primary w-100"><i class="bi bi-geo-alt"></i> Kelola Airport</a></div>
                            <div class="col-6 col-md-3"><a href="{{ route('test.index') }}" class="btn btn-outline-success w-100"><i class="bi bi-pencil-square"></i> Kelola Test</a></div>
                            <div class="col-6 col-md-3"><a href="{{ route('adminAkun.index') }}" class="btn btn-outline-secondary w-100"><i class="bi bi-person"></i> Akun Saya</a></div>
                            <div class="col-6 col-md-3"><a href="{{ route('logout') }}" class="btn btn-outline-danger w-100"><i class="bi bi-box-arrow-right"></i> Logout</a></div>
                        @elseif(Auth::user()->status == 2)
                            <div class="col-6 col-md-3"><a href="{{ route('artikel.index') }}" class="btn btn-outline-primary w-100"><i class="bi bi-newspaper"></i> Kelola Artikel</a></div>
                            <div class="col-6 col-md-3"><a href="{{ route('organisasi.airport') }}" class="btn btn-outline-info w-100"><i class="bi bi-diagram-3"></i> Organisasi</a></div>
                            <div class="col-6 col-md-3"><a href="{{ route('pengguna.index') }}" class="btn btn-outline-warning w-100"><i class="bi bi-people"></i> Pengguna</a></div>
                            <div class="col-6 col-md-3"><a href="{{ route('adminAkun.index') }}" class="btn btn-outline-secondary w-100"><i class="bi bi-person"></i> Akun</a></div>
                        @elseif(Auth::user()->status == 3)
                            <div class="col-6 col-md-4"><a href="{{ route('admin.elogbook.rekap') }}" class="btn btn-outline-primary w-100"><i class="bi bi-journal-bookmark"></i> E-Logbook</a></div>
                            <div class="col-6 col-md-4"><a href="{{ route('adminAkun.index') }}" class="btn btn-outline-secondary w-100"><i class="bi bi-person"></i> Akun</a></div>
                            <div class="col-6 col-md-4"><a href="{{ route('logout') }}" class="btn btn-outline-danger w-100"><i class="bi bi-box-arrow-right"></i> Logout</a></div>
                        @else
                            <div class="col-12"><span class="text-muted">Login sebagai user biasa — buka <a href="{{ route('beranda.index') }}">Beranda</a></span></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Data --}}
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Airport Terbaru</h4>
                    @if(Auth::user()->status == 1)<a href="{{ route('airport.index') }}" class="btn btn-sm btn-primary">Lihat semua</a>@endif
                </div>
                <div class="card-body">
                    @forelse($recentAirport ?? [] as $a)
                        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                            <div>
                                <strong>{{ $a->name }}</strong>
                                <div class="small text-muted">{{ Str::limit($a->url ?? '-', 40) }}</div>
                            </div>
                            <span class="badge bg-light-primary">{{ $a->id }}</span>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Belum ada data airport.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Test / Ujian Terbaru</h4>
                    @if(Auth::user()->status == 1)<a href="{{ route('test.index') }}" class="btn btn-sm btn-primary">Lihat semua</a>@endif
                </div>
                <div class="card-body">
                    @forelse($recentTest ?? [] as $t)
                        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                            <div>
                                <strong>{{ $t->subjek }}</strong>
                                <div class="small text-muted">Durasi: {{ $t->durasi }} menit • Status: {!! $t->status==1?'<span class="badge bg-success">Aktif</span>':'<span class="badge bg-secondary">Nonaktif</span>' !!}</div>
                            </div>
                            <span class="badge bg-light-secondary">{{ $t->id }}</span>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Belum ada test. <small>Buat di menu Test.</small></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Artikel Terbaru</h4>
                    @if(Auth::user()->status == 2)<a href="{{ route('artikel.index') }}" class="btn btn-sm btn-primary">Lihat semua</a>@endif
                </div>
                <div class="card-body">
                    @forelse($recentArtikel ?? [] as $art)
                        <div class="border-bottom py-2">
                            <strong>{{ $art->judul }}</strong>
                            <div class="small text-muted">{{ Str::limit(strip_tags($art->deskripsi ?? $art->artikel ?? ''), 80) }}</div>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Belum ada artikel.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Pengguna Terbaru</h4>
                </div>
                <div class="card-body">
                    @forelse($recentUsers ?? [] as $u)
                        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                            <div><strong>{{ $u->name }}</strong> <small class="text-muted">@{{ $u->username }}</small></div>
                            <span class="badge bg-light-success">user</span>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Belum ada pengguna.</p>
                    @endforelse
                    <div class="mt-3">
                        <small class="text-muted">Total pengguna terdaftar: <strong>{{ $stats['pengguna'] ?? 0 }}</strong></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-info mt-3">
        <strong>Tips:</strong> Menu sidebar menyesuaikan <code>status</code> akun. 
        <code>admin1</code>=Pembelajaran, <code>admin2</code>=Artikel/Organisasi, <code>admin3</code>=E-Logbook, <code>user0-5</code>=Pengguna biasa (ke <code>/beranda</code>).
        Kalau mau lihat semua menu sekaligus, login bergantian atau kita buat akun super-admin.
    </div>
</div>
@endsection
