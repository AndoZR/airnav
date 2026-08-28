@extends('pengguna.app')
@section('tab', 'AirNav Assist — Home')

@section('content')
{{-- HERO: premium, eyecatching, tidak nabrak header --}}
<div style="background: linear-gradient(135deg, #1e2540 0%, #2c365e 18%, #49548C 42%, #5d6ab0 68%, #8a9ad6 100%); background-size:200% 200%; animation: heroGradient 12s ease infinite; padding: 3rem 0 3.2rem; overflow:hidden; position:relative;">
    <div style="position:absolute; top:-50px; right:-40px; width:260px; height:260px; background:rgba(255,255,255,0.07); border-radius:50%; animation: pulse 6s ease-in-out infinite;"></div>
    <div style="position:absolute; bottom:-40px; left:8%; width:180px; height:180px; background:rgba(255,255,255,0.05); border-radius:50%; animation: pulse 7s ease-in-out infinite reverse;"></div>
    <div style="position:absolute; top:18%; left:42%; width:90px; height:90px; background:rgba(255,255,255,0.04); border-radius:50%; animation: floatSlow 8s ease-in-out infinite;"></div>
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at 28% 18%, rgba(255,255,255,0.08) 0%, transparent 50%), radial-gradient(ellipse at 78% 78%, rgba(0,0,0,0.10) 0%, transparent 55%); pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="row align-items-center g-4">
            <div class="col-lg-6 order-2 order-lg-1">
                <div style="animation: fadeInLeft 0.9s cubic-bezier(0.22,1,0.36,1) forwards;">
                    <span class="badge bg-white mb-3 px-3 py-2 eyecatch-badge" style="color:#49548C !important; border-radius:2rem; font-weight:700; letter-spacing:0.04em; font-size:0.72rem; box-shadow:0 4px 16px rgba(0,0,0,0.12); animation: fadeInDown 0.7s ease 0.15s forwards; opacity:0; border:1px solid rgba(73,84,140,0.08);"><i class="fa-solid fa-plane me-1" style="color:#49548C;"></i> Professional Aviation Portal • Tanjung Pinang & Batam</span>
                    <h1 class="text-white mb-2" style="font-family:'Outfit',sans-serif; font-weight:900; letter-spacing:-0.03em; line-height:1.08; font-size:clamp(2rem, 4.5vw, 2.85rem); text-shadow:0 3px 18px rgba(0,0,0,0.18); animation: titleReveal 0.9s cubic-bezier(0.22,1,0.36,1) 0.22s forwards; opacity:0;">Hi! Selamat Datang di<br><span style="background: linear-gradient(90deg, #ffd166 0%, #ffb703 50%, #ff8fab 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">AirNav Assist</span></h1>
                    <p class="text-white mb-3" style="opacity:0.93; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.98rem; line-height:1.85; max-width:560px; text-shadow:0 1px 6px rgba(0,0,0,0.1); animation: fadeInUp 0.7s ease 0.38s forwards; opacity:0; text-align:justify !important; text-align-last:left; hyphens:auto; text-justify:inter-word; display:block; width:100%;">
                        Sistem informasi terintegrasi AirNav Indonesia untuk pengelolaan pengetahuan, pengembangan kompetensi, dan diseminasi informasi penerbangan yang akurat, berstandar, dan berorientasi keselamatan.
                    </p>
                    <div class="d-flex flex-wrap gap-2" style="animation: fadeInUp 0.7s ease 0.52s forwards; opacity:0;">
                        <a href="{{ route('beranda.artikel') }}" class="btn px-4 py-2 fw-bold" style="background:white; color:#49548C; border-radius:2rem; box-shadow:0 8px 20px rgba(0,0,0,0.14); font-family:'Outfit',sans-serif; letter-spacing:0.02em; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px) scale(1.02)'; this.style.boxShadow='0 12px 28px rgba(0,0,0,0.18)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.14)'"><i class="fa-solid fa-newspaper me-2"></i>Jelajahi Artikel</a>
                        <a href="{{ route('beranda.artikel') }}#pembelajaran" class="btn px-4 py-2 fw-semibold" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.28); backdrop-filter:blur(8px); border-radius:2rem; font-family:'Outfit',sans-serif; transition: all 0.3s;" onmouseover="this.style.background='white'; this.style.color='#49548C'" onmouseout="this.style.background='rgba(255,255,255,0.14)'; this.style.color='white'"><i class="fa-solid fa-graduation-cap me-2"></i>Mulai Belajar</a>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-3" style="animation: fadeInUp 0.7s ease 0.62s forwards; opacity:0;">
                        <span class="badge rounded-pill px-3 py-2" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); backdrop-filter:blur(6px); font-family:'Instrument Sans',sans-serif; font-size:0.72rem;"><i class="fa-solid fa-shield-halved me-1"></i> Safety First</span>
                        <span class="badge rounded-pill px-3 py-2" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); backdrop-filter:blur(6px); font-family:'Instrument Sans',sans-serif; font-size:0.72rem;"><i class="fa-solid fa-microchip me-1"></i> CNS/ATM</span>
                        <span class="badge rounded-pill px-3 py-2" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); backdrop-filter:blur(6px); font-family:'Instrument Sans',sans-serif; font-size:0.72rem;"><i class="fa-solid fa-leaf me-1"></i> Green Aviation</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 d-flex justify-content-center">
                <div style="position:relative; width:100%; max-width:420px; display:flex; flex-direction:column; align-items:center; animation: fadeInRight 0.9s cubic-bezier(0.22,1,0.36,1) forwards;">
                    <div style="position:relative; width:100%; display:flex; justify-content:center; align-items:flex-end; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.22)); padding-top:1.2rem; padding-bottom:0.6rem;">
                        <img src="{{ asset('src/img/airplane_pic.png') }}" alt="Pesawat AirNav" style="width:100%; max-width:360px; height:auto; object-fit:contain; display:block; animation: floatPlaneAir 4.5s ease-in-out infinite;">
                        <div style="position:absolute; bottom:2px; left:50%; transform:translateX(-50%); width:60%; height:14px; background: radial-gradient(ellipse at center, rgba(0,0,0,0.22) 0%, transparent 70%); border-radius:50%; animation: shadowPulse 4.5s ease-in-out infinite;"></div>
                    </div>
                    <div style="margin-top:1rem; background: rgba(255,255,255,0.96); backdrop-filter: blur(14px); border-radius:1.1rem; padding:0.8rem 1rem; display:flex; align-items:center; gap:0.8rem; box-shadow: 0 12px 32px rgba(0,0,0,0.14), 0 0 0 1px rgba(255,255,255,0.6) inset; animation: fadeInUp 0.9s ease 0.35s forwards; opacity:0; width:100%; max-width:380px; border:1px solid rgba(255,255,255,0.5); overflow:visible;">
                        <div style="min-width:46px; height:46px; padding:0 10px; background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); border-radius:0.8rem; display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 12px rgba(73,84,140,0.25);">
                            <img src="{{ asset('src/img/logoAirNav.png') }}" alt="AirNav" style="height:22px; width:auto; max-width:74px; object-fit:contain; filter: brightness(0) invert(1); display:block;">
                        </div>
                        <div style="flex:1; min-width:0;">
                            <div style="color:#1a1f3d; font-family:'Outfit',sans-serif; font-weight:800; font-size:1rem; letter-spacing:-0.02em; line-height:1;">AirNav Indonesia</div>
                            <small style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.70rem; letter-spacing:0.05em; font-weight:500;">Tanjung Pinang • Batam • Trusted Partner</small>
                        </div>
                        <span class="badge" style="background: linear-gradient(135deg, #198754 0%, #4ade80 100%); color:white; font-size:0.62rem; border-radius:2rem; padding:0.4rem 0.6rem; white-space:nowrap;"><i class="fa-solid fa-circle-check me-1"></i> Live</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- FITUR UTAMA: 4 card eyecatching — background warna tema AirNav (tidak putih, tidak nabrak) --}}
<div style="background: linear-gradient(135deg, #e8ecff 0%, #dde3ff 30%, #dbe4ff 55%, #e0e7ff 78%, #eef0ff 100%); padding: 2.2rem 0 2rem; position:relative; overflow:hidden; border-top:1px solid #dbe0ff; border-bottom:1px solid #e8ecff;">
    <div style="position:absolute; top:-60px; right:-40px; width:380px; height:380px; background: radial-gradient(circle, rgba(73,84,140,0.08) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:-50px; left:-30px; width:300px; height:300px; background: radial-gradient(circle, rgba(138,154,214,0.10) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; inset:0; opacity:0.18; background-image: radial-gradient(circle, rgba(73,84,140,0.07) 1px, transparent 1px); background-size:22px 22px; pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="text-center mb-4 reveal">
            <span class="badge px-3 py-2 mb-2" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:0.04em; font-size:0.70rem; border:1px solid #dbe0ff;"><i class="fa-solid fa-sparkles me-1" style="color:#ffb703;"></i> FITUR UNGGULAN</span>
            <h3 class="fw-bold mb-2" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.02em; font-size:1.65rem;">Satu Portal, Semua Kebutuhan</h3>
            <p class="mx-auto" style="color:#6c757d; font-family:'Plus Jakarta Sans',sans-serif; max-width:560px; font-size:0.92rem; line-height:1.7;">Akses pengetahuan, uji kompetensi, dan dokumentasi operasional dalam satu sistem yang terintegrasi dan berstandar ICAO.</p>
        </div>
        <div class="row g-3 g-md-4">
            <div class="col-12 col-md-6 col-lg-3 reveal">
                <a href="{{ route('beranda.artikel') }}" class="text-decoration-none">
                <div class="card h-100 border-0 home-feat" style="border-radius:1.2rem; background:white; border:1px solid #eef0ff !important; overflow:hidden; transition: all 0.4s cubic-bezier(0.22,1,0.36,1);">
                    <div style="height:4px; background: linear-gradient(90deg, #49548C, #8a9ad6);"></div>
                    <div class="card-body p-4">
                        <div style="width:48px; height:48px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.9rem; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(73,84,140,0.18); margin-bottom:1rem;">
                            <i class="fa-solid fa-newspaper text-white" style="font-size:1.1rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.015em;">Artikel Edukasi</h6>
                        <p class="small mb-3" style="color:#6c757d; font-family:'Plus Jakarta Sans',sans-serif; line-height:1.7; font-size:0.84rem; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word;">Informasi terkurasi tentang kebijakan, teknologi CNS/ATM, dan keselamatan penerbangan.</p>
                        <span class="small fw-bold" style="color:#49548C; font-family:'Outfit',sans-serif;">Jelajahi <i class="fa-solid fa-arrow-right ms-1"></i></span>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 reveal reveal-delay-1">
                <div class="card h-100 border-0 home-feat home-pembelajaran-card" onclick="togglePembelajaran(event)" style="border-radius:1.2rem; background:white; border:1px solid #eef0ff !important; overflow:hidden; transition: all 0.4s cubic-bezier(0.22,1,0.36,1); cursor:pointer; position:relative;">
                    <div style="height:4px; background: linear-gradient(90deg, #0d6efd, #5ab0ff);"></div>
                    <div class="card-body p-4">
                        <div style="width:48px; height:48px; background: linear-gradient(135deg, #0d6efd 0%, #5ab0ff 100%); border-radius:0.9rem; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(13,110,253,0.18); margin-bottom:1rem; transition: all 0.35s;" class="pemb-icon">
                            <i class="fa-solid fa-graduation-cap text-white" style="font-size:1.1rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.015em;">Pembelajaran</h6>
                        <p class="small mb-2" style="color:#6c757d; font-family:'Plus Jakarta Sans',sans-serif; line-height:1.7; font-size:0.84rem; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word;">Materi terstruktur untuk peningkatan kompetensi ATS, CNS, dan pendukung.</p>
                        <span class="small fw-bold d-flex align-items-center gap-1" style="color:#0d6efd; font-family:'Outfit',sans-serif;"><span class="pemb-label">Pilih Airport</span> <i class="fa-solid fa-chevron-down pemb-chevron" style="font-size:0.65rem; transition: transform 0.35s cubic-bezier(0.22,1,0.36,1);"></i></span>
                        <div class="pemb-options" style="max-height:0; overflow:hidden; opacity:0; transform: translateY(-8px); transition: all 0.45s cubic-bezier(0.22,1,0.36,1); margin-top:0;">
                            @if(isset($dataAirport) && $dataAirport->count())
                                @foreach($dataAirport as $ap)
                                <a href="{{ route('beranda.pembelajaran',['id'=>$ap->id]) }}" onclick="return animatePembClick(event, this)" class="btn btn-sm w-100 text-start mt-2 d-flex align-items-center gap-2 pemb-opt" style="background:#f0f4ff; border:1px solid #dbe0ff; color:#1a1f3d; border-radius:0.7rem; font-family:'Outfit',sans-serif; font-weight:600; font-size:0.82rem; padding:0.55rem 0.8rem; transform: translateY(6px); opacity:0; transition: all 0.35s cubic-bezier(0.22,1,0.36,1); transition-delay: {{ $loop->index * 0.06 }}s;" onmouseover="this.style.background='#0d6efd'; this.style.color='white'; this.style.transform='translateX(4px)'" onmouseout="this.style.background='#f0f4ff'; this.style.color='#1a1f3d'; this.style.transform='translateX(0)'">
                                    <span style="width:26px; height:26px; background: linear-gradient(135deg, #0d6efd 0%, #5ab0ff 100%); border-radius:0.5rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-plane text-white" style="font-size:0.6rem;"></i></span>
                                    {{ $ap->name }} Tower
                                    <i class="fa-solid fa-arrow-right ms-auto pemb-arrow" style="font-size:0.6rem; opacity:0.6; transition: all 0.3s;"></i>
                                    <span class="pemb-spinner" style="display:none; width:14px; height:14px; border:2px solid rgba(255,255,255,0.3); border-top-color:white; border-radius:50%; animation: pembSpin 0.6s linear infinite; margin-left:auto;"></span>
                                </a>
                                @endforeach
                            @else
                                <small class="text-muted d-block mt-2" style="font-family:'Instrument Sans',sans-serif;">Belum ada data airport</small>
                            @endif
                        </div>
                    </div>
                    <div class="pemb-glow" style="position:absolute; inset:0; background: radial-gradient(circle at 50% 0%, rgba(13,110,253,0.06) 0%, transparent 60%); opacity:0; transition: opacity 0.4s; pointer-events:none; border-radius:1.2rem;"></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 reveal reveal-delay-2">
                <div class="card h-100 border-0 home-feat home-test-card" onclick="toggleTest(event)" style="border-radius:1.2rem; background:white; border:1px solid #eef0ff !important; overflow:hidden; transition: all 0.4s cubic-bezier(0.22,1,0.36,1); cursor:pointer; position:relative;">
                    <div style="height:4px; background: linear-gradient(90deg, #198754, #4ade80);"></div>
                    <div class="card-body p-4">
                        <div style="width:48px; height:48px; background: linear-gradient(135deg, #198754 0%, #4ade80 100%); border-radius:0.9rem; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(25,135,84,0.18); margin-bottom:1rem; transition: all 0.35s;" class="test-icon">
                            <i class="fa-solid fa-clipboard-check text-white" style="font-size:1.1rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.015em;">Test Kompetensi</h6>
                        <p class="small mb-2" style="color:#6c757d; font-family:'Plus Jakarta Sans',sans-serif; line-height:1.7; font-size:0.84rem; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word;">Uji pemahaman dengan bank soal terstandar dan evaluasi instan.</p>
                        <span class="small fw-bold d-flex align-items-center gap-1" style="color:#198754; font-family:'Outfit',sans-serif;"><span class="test-label">Pilih Tower</span> <i class="fa-solid fa-chevron-down test-chevron" style="font-size:0.65rem; transition: transform 0.35s cubic-bezier(0.22,1,0.36,1);"></i></span>
                        <div class="test-options" style="max-height:0; overflow:hidden; opacity:0; transform: translateY(-8px); transition: all 0.45s cubic-bezier(0.22,1,0.36,1); margin-top:0;">
                            @if(isset($dataAirport) && $dataAirport->count())
                                @foreach($dataAirport as $ap)
                                <a href="{{ route('test.tower',['id'=>$ap->id]) }}" data-tower="{{ $ap->name }} Tower" onclick="return animateTestClick(event, this)" class="btn btn-sm w-100 text-start mt-2 d-flex align-items-center gap-2 test-opt" style="background:#f0faf4; border:1px solid #c8e6c9; color:#1a1f3d; border-radius:0.7rem; font-family:'Outfit',sans-serif; font-weight:600; font-size:0.82rem; padding:0.55rem 0.8rem; transform: translateY(6px); opacity:0; transition: all 0.35s cubic-bezier(0.22,1,0.36,1); transition-delay: {{ $loop->index * 0.06 }}s;" onmouseover="this.style.background='#198754'; this.style.color='white'; this.style.transform='translateX(4px)'" onmouseout="this.style.background='#f0faf4'; this.style.color='#1a1f3d'; this.style.transform='translateX(0)'">
                                    <span style="width:26px; height:26px; background: linear-gradient(135deg, #198754 0%, #4ade80 100%); border-radius:0.5rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-tower-broadcast text-white" style="font-size:0.6rem;"></i></span>
                                    {{ $ap->name }} Tower
                                    <i class="fa-solid fa-arrow-right ms-auto test-arrow" style="font-size:0.6rem; opacity:0.6; transition: all 0.3s;"></i>
                                    <span class="test-spinner" style="display:none; width:14px; height:14px; border:2px solid rgba(255,255,255,0.3); border-top-color:white; border-radius:50%; animation: pembSpin 0.6s linear infinite; margin-left:auto;"></span>
                                </a>
                                @endforeach
                            @else
                                <small class="text-muted d-block mt-2" style="font-family:'Instrument Sans',sans-serif;">Belum ada data airport</small>
                            @endif
                        </div>
                    </div>
                    <div class="test-glow" style="position:absolute; inset:0; background: radial-gradient(circle at 50% 0%, rgba(25,135,84,0.06) 0%, transparent 60%); opacity:0; transition: opacity 0.4s; pointer-events:none; border-radius:1.2rem;"></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 reveal reveal-delay-3">
                <a href="{{ route('logbook.rekap') }}" class="text-decoration-none">
                <div class="card h-100 border-0 home-feat" style="border-radius:1.2rem; background:white; border:1px solid #eef0ff !important; overflow:hidden; transition: all 0.4s cubic-bezier(0.22,1,0.36,1);">
                    <div style="height:4px; background: linear-gradient(90deg, #fd7e14, #ffb86b);"></div>
                    <div class="card-body p-4">
                        <div style="width:48px; height:48px; background: linear-gradient(135deg, #fd7e14 0%, #ffb86b 100%); border-radius:0.9rem; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(253,126,20,0.18); margin-bottom:1rem;">
                            <i class="fa-solid fa-book-open text-white" style="font-size:1.1rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.015em;">E-Logbook</h6>
                        <p class="small mb-3" style="color:#6c757d; font-family:'Plus Jakarta Sans',sans-serif; line-height:1.7; font-size:0.84rem; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word;">Dokumentasi shift digital, searchable, dan terintegrasi pelaporan keselamatan.</p>
                        <span class="small fw-bold" style="color:#fd7e14; font-family:'Outfit',sans-serif;">Buka Logbook <i class="fa-solid fa-arrow-right ms-1"></i></span>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- ARTIKEL TERBARU: carousel eyecatching — background warna tema AirNav (tidak putih polos, tidak nabrak FITUR) --}}
<div style="background: linear-gradient(180deg, #ffffff 0%, #f8f9ff 35%, #eef2ff 100%); padding: 2.2rem 0 2rem; position:relative; overflow:hidden; border-top:1px solid #e8ecff; border-bottom:1px solid #eef0ff;">
    <div style="position:absolute; top:-40px; right:-30px; width:300px; height:300px; background: radial-gradient(circle, rgba(73,84,140,0.05) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:-30px; left:-20px; width:240px; height:240px; background: radial-gradient(circle, rgba(138,154,214,0.06) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-3 reveal">
            <div>
                <span class="badge px-3 py-2 mb-2" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:0.04em; font-size:0.68rem; border:1px solid #dbe0ff;"><i class="fa-solid fa-wand-magic-sparkles me-1" style="color:#ffb703;"></i> UPDATE TERBARU</span>
                <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.02em; font-size:1.5rem;">Artikel Edukasi Terbaru</h3>
                <p class="small mb-0" style="color:#6c757d; font-family:'Plus Jakarta Sans',sans-serif;">Rangkuman terkurasi — lengkap di sumber asli</p>
            </div>
            <a href="{{ route('beranda.artikel') }}" class="btn btn-sm px-4 fw-bold" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; border:none; box-shadow:0 4px 14px rgba(73,84,140,0.22); font-family:'Outfit',sans-serif; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
        <div class="reveal reveal-delay-1" style="position:relative;">
            <div id="carousel-home" style="margin: 0 -6px;">
                @foreach ($dataArtikel as $item)
                <div class="px-2" style="box-sizing:border-box;">
                    <div class="card h-100 border-0 overflow-hidden" style="border-radius:1.2rem; border:1px solid #eef0ff !important; background:white; transition: all 0.35s;">
                        <div style="height:4px; background: linear-gradient(90deg, #49548C, #8a9ad6);"></div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="width:28px; height:28px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.6rem; display:flex; align-items:center; justify-content:center;"><i class="fa-solid fa-newspaper text-white" style="font-size:0.65rem;"></i></span>
                                <small class="artikel-meta" style="color:#49548C; text-transform:none; letter-spacing:0.02em;">Rangkuman</small>
                                <small class="text-muted ms-auto" style="font-family:'Instrument Sans',sans-serif; font-size:0.72rem;"><i class="fa-regular fa-clock me-1"></i> 3 min</small>
                            </div>
                            <h6 class="artikel-title mb-2" style="color:#1a1f3d; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; min-height:2.6em;">{{ $item->judul }}</h6>
                            <p class="artikel-desc flex-grow-1" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word; line-height:1.7;">{{ $item->deskripsi }}</p>
                            <a href="{{ route('beranda.detailArtikel',['id'=>$item->id]) }}" class="btn btn-sm w-100 fw-bold mt-3" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; border:none; font-family:'Outfit',sans-serif; transition: all 0.3s; box-shadow:0 4px 12px rgba(73,84,140,0.18);" onmouseover="this.style.transform='translateY(-1px)'" onmouseout="this.style.transform='none'">Baca Rangkuman <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div id="carousel-home-nav" class="d-flex justify-content-center gap-2 mt-3">
                <button type="button" class="btn btn-sm d-flex align-items-center justify-content-center" style="width:42px; height:42px; background:white; border:1px solid #dbe0ff; color:#49548C; border-radius:50%; box-shadow:0 4px 12px rgba(73,84,140,0.08); transition: all 0.3s;" onmouseover="this.style.background='#49548C'; this.style.color='white'" onmouseout="this.style.background='white'; this.style.color='#49548C'"><i class="fa-solid fa-arrow-left" style="font-size:0.8rem;"></i></button>
                <button type="button" class="btn btn-sm d-flex align-items-center justify-content-center" style="width:42px; height:42px; background:white; border:1px solid #dbe0ff; color:#49548C; border-radius:50%; box-shadow:0 4px 12px rgba(73,84,140,0.08); transition: all 0.3s;" onmouseover="this.style.background='#49548C'; this.style.color='white'" onmouseout="this.style.background='white'; this.style.color='#49548C'"><i class="fa-solid fa-arrow-right" style="font-size:0.8rem;"></i></button>
            </div>
        </div>
    </div>
</div>

{{-- VISI MISI: modern, tidak absolute --}}
<div style="background: linear-gradient(135deg, #1a1f3d 0%, #2c365e 35%, #49548C 70%, #5d6ab0 100%); padding: 2.6rem 0; position:relative; overflow:hidden;">
    <div style="position:absolute; top:-40px; right:-40px; width:220px; height:220px; background:rgba(255,255,255,0.06); border-radius:50%;"></div>
    <div style="position:absolute; bottom:-30px; left:10%; width:160px; height:160px; background:rgba(255,255,255,0.04); border-radius:50%;"></div>
    <div class="container" style="position:relative;">
        <div class="text-center mb-4 reveal">
            <span class="badge bg-white px-3 py-2 mb-2" style="color:#49548C !important; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:0.04em; font-size:0.68rem;"><i class="fa-solid fa-bullseye me-1"></i> VISI & MISI</span>
            <h3 class="text-white fw-bold mb-2" style="font-family:'Outfit',sans-serif; letter-spacing:-0.02em; font-size:1.6rem; text-shadow:0 2px 12px rgba(0,0,0,0.15);">Menuju Navigasi Penerbangan Kelas Dunia</h3>
            <p class="text-white mx-auto" style="opacity:0.85; font-family:'Plus Jakarta Sans',sans-serif; max-width:600px; font-size:0.92rem; line-height:1.7;">Komitmen AirNav Indonesia dalam menyediakan layanan navigasi yang selamat, efisien, dan berwawasan lingkungan.</p>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-md-6 reveal">
                <div class="card h-100 border-0" style="border-radius:1.2rem; background: rgba(255,255,255,0.96); backdrop-filter:blur(12px); box-shadow:0 12px 32px rgba(0,0,0,0.14); overflow:hidden; transition: all 0.4s;">
                    <div style="height:4px; background: linear-gradient(90deg, #49548C, #8a9ad6);"></div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width:48px; height:48px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.9rem; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(73,84,140,0.18);"><i class="fa-solid fa-eye text-white" style="font-size:1rem;"></i></div>
                            <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.02em;">Visi</h5>
                        </div>
                        <p class="mb-0" style="color:#3d4a5c; font-family:'Plus Jakarta Sans',sans-serif; font-size:1rem; line-height:1.75; font-weight:500; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word;">Menjadi penyedia jasa navigasi penerbangan bertaraf internasional yang terpercaya, inovatif, dan berkelanjutan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 reveal reveal-delay-1">
                <div class="card h-100 border-0" style="border-radius:1.2rem; background: rgba(255,255,255,0.96); backdrop-filter:blur(12px); box-shadow:0 12px 32px rgba(0,0,0,0.14); overflow:hidden; transition: all 0.4s;">
                    <div style="height:4px; background: linear-gradient(90deg, #198754, #4ade80);"></div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width:48px; height:48px; background: linear-gradient(135deg, #198754 0%, #4ade80 100%); border-radius:0.9rem; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(25,135,84,0.18);"><i class="fa-solid fa-rocket text-white" style="font-size:1rem;"></i></div>
                            <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.02em;">Misi</h5>
                        </div>
                        <p class="mb-0" style="color:#3d4a5c; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.95rem; line-height:1.75; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word;">Menyediakan layanan navigasi penerbangan yang mengutamakan keselamatan, efisiensi penerbangan, dan ramah lingkungan demi memenuhi ekspektasi pengguna jasa serta mendukung konektivitas nasional.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center text-center mt-4 reveal reveal-delay-2">
            <div style="background: rgba(255,255,255,0.10); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.18); border-radius:1.2rem; padding:1.2rem 1.8rem; box-shadow:0 12px 32px rgba(0,0,0,0.14);">
                <img src="{{ asset('src/img/logoAirNav.png') }}" alt="AirNav Indonesia" style="height:42px; width:auto; object-fit:contain; display:block; margin:0 auto; filter: brightness(0) invert(1) drop-shadow(0 2px 8px rgba(0,0,0,0.2));">
                <div class="fw-bold mt-2 text-white" style="font-family:'Space Grotesk',sans-serif; font-size:1rem; letter-spacing:0.03em;">AirNav Indonesia</div>
                <small class="text-white" style="opacity:0.85; font-family:'Instrument Sans',sans-serif; font-size:0.72rem; letter-spacing:0.06em; font-weight:600;">CABANG TANJUNG PINANG • BATAM</small>
            </div>
        </div>
    </div>
</div>

{{-- STRUKTUR ORGANISASI: Bagan Batam & Tanjung Pinang — sama --}}
<div style="background: linear-gradient(180deg, #f5f7ff 0%, #ffffff 100%); padding: 2.4rem 0 2.6rem; position:relative; overflow:hidden;">
    <div style="position:absolute; top:-40px; left:-40px; width:320px; height:320px; background: radial-gradient(circle, rgba(73,84,140,0.05) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:-60px; right:-40px; width:280px; height:280px; background: radial-gradient(circle, rgba(138,154,214,0.04) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="text-center mb-4 reveal">
            <span class="badge px-3 py-2 mb-2" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:0.04em; font-size:0.68rem; border:1px solid #dbe0ff;"><i class="fa-solid fa-sitemap me-1"></i> ORGANISASI</span>
            <h3 class="fw-bold mb-2" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.02em; font-size:1.55rem;">Struktur Organisasi Cabang<br><span class="grad-text">Cabang Pembantu Batam & Tanjung Pinang — Bagan Managerial</span></h3>
            <p class="small mx-auto" style="color:#6c757d; font-family:'Plus Jakarta Sans',sans-serif; max-width:620px; line-height:1.7;">Kedua cabang menggunakan bagan managerial yang sama — transparansi struktur untuk koordinasi yang efektif dan akuntabel. Klik gambar untuk perbesar — bisa zoom & fullscreen.</p>
            <div class="d-inline-flex p-1 mt-2" style="background:#eef0ff; border-radius:2rem; border:1px solid #dbe0ff;">
                <button id="btnBaganBatam" onclick="switchBagan('batam')" class="btn btn-sm fw-bold px-4" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif;">Cabang Pembantu Batam</button>
                <button id="btnBaganTanjung" onclick="switchBagan('tanjung')" class="btn btn-sm fw-semibold px-4" style="background:white; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif;">Tanjung Pinang</button>
            </div>
            <div class="mt-2">
                <small class="badge" style="background:#fff7e6; color:#92400e; border:1px solid #fde68a; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.65rem;"><i class="fa-solid fa-circle-info me-1"></i> Bagan Batam & Tanjung Pinang identik</small>
            </div>
        </div>
        <div class="card border-0 shadow-sm reveal reveal-delay-1" style="border-radius:1.4rem; overflow:hidden; background:white; border:1px solid #eef0ff !important;">
            <div style="height:4px; background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166, #06d6a0); background-size:300% 100%; animation: footerGradientShift 4s ease infinite;"></div>
            <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center gap-2 py-3" style="border-bottom:1px solid #eef0ff;">
                <div class="d-flex align-items-center gap-2">
                    <div style="width:36px; height:36px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.7rem; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 12px rgba(73,84,140,0.18);"><i class="fa-solid fa-diagram-project text-white" style="font-size:0.85rem;"></i></div>
                    <div>
                        <div id="baganTitle" class="fw-bold" style="font-family:'Outfit',sans-serif; color:#1a1f3d; font-size:0.95rem; letter-spacing:-0.01em;">Bagan Managerial — Cabang Pembantu Batam</div>
                        <small id="baganSub" style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.72rem;">AirNav Cabang Tanjung Pinang • Berlaku untuk kedua cabang</small>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button onclick="document.getElementById('baganImg').scrollIntoView({behavior:'smooth', block:'center'})" class="btn btn-sm" style="background:#f8f9ff; border:1px solid #dbe0ff; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:600; font-size:0.78rem;"><i class="fa-solid fa-magnifying-glass me-1"></i> Zoom</button>
                    <button onclick="openBaganModal()" class="btn btn-sm fw-bold" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border:none; border-radius:2rem; font-family:'Outfit',sans-serif; font-size:0.78rem; box-shadow:0 4px 12px rgba(73,84,140,0.18);"><i class="fa-solid fa-expand me-1"></i> Fullscreen</button>
                </div>
            </div>
            <div class="card-body p-2 p-md-3" style="background: linear-gradient(180deg, #fcfdff 0%, #f8f9ff 100%);">
                <div style="background:white; border:1px solid #eef0ff; border-radius:1rem; padding:0.6rem; box-shadow:0 8px 24px rgba(73,84,140,0.06); overflow:auto; max-height:72vh; cursor: zoom-in;" onclick="openBaganModal()" title="Klik untuk fullscreen">
                    <img id="baganImg" src="{{ asset('src/img/bagan.png') }}" alt="Bagan Organisasi" style="width:100%; height:auto; display:block; border-radius:0.7rem; transition: transform 0.4s cubic-bezier(0.22,1,0.36,1);" onmouseover="this.style.transform='scale(1.015)'" onmouseout="this.style.transform='scale(1)'">
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
                    <a href="{{ route('beranda.TanjungPinang_ATS') }}" class="badge text-decoration-none" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.70rem; border:1px solid #dbe0ff;"><i class="fa-solid fa-users me-1"></i> Lihat Team ATS</a>
                    <a href="{{ route('beranda.TanjungPinang_CNS') }}" class="badge text-decoration-none" style="background:white; color:#49548C; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.70rem; border:1px solid #dbe0ff;"><i class="fa-solid fa-tower-broadcast me-1"></i> Team CNS</a>
                    <span class="badge" style="background:white; color:#6c757d; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.70rem; border:1px solid #eef0ff;"><i class="fa-solid fa-circle-info me-1"></i> Klik gambar untuk perbesar</span>
                </div>
            </div>
            <div class="card-footer bg-white d-flex flex-wrap justify-content-between align-items-center gap-2" style="border-top:1px solid #eef0ff; font-family:'Instrument Sans',sans-serif; font-size:0.76rem; color:#6c757d;">
                <span><i class="fa-solid fa-shield-halved me-1" style="color:#49548C;"></i> Dokumen resmi • Update 2024 • Berlaku Batam & Tanjung Pinang</span>
                <a href="{{ asset('src/img/bagan.png') }}" target="_blank" class="text-decoration-none fw-semibold" style="color:#49548C;"><i class="fa-solid fa-download me-1"></i> Buka Gambar Asli</a>
            </div>
        </div>
    </div>
</div>
{{-- Modal fullscreen bagan --}}
<div id="baganModal" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(26,31,61,0.92); backdrop-filter:blur(8px); padding:1.5rem; overflow:auto;" onclick="if(event.target===this) closeBaganModal()">
    <div style="min-height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:1rem;">
        <div class="d-flex justify-content-between align-items-center w-100" style="max-width:1100px;">
            <span id="baganModalTitle" class="text-white fw-bold" style="font-family:'Outfit',sans-serif;"><i class="fa-solid fa-sitemap me-2"></i> Bagan Managerial — Cabang Pembantu Batam</span>
            <button onclick="closeBaganModal()" class="btn btn-sm bg-white" style="color:#1a1f3d; border-radius:2rem; font-weight:700;"><i class="fa-solid fa-xmark me-1"></i> Tutup</button>
        </div>
        <img src="{{ asset('src/img/bagan.png') }}" alt="Bagan Fullscreen" style="max-width:1100px; width:100%; height:auto; background:white; border-radius:1rem; box-shadow:0 20px 60px rgba(0,0,0,0.35);">
        <small class="text-white" style="opacity:0.7; font-family:'Instrument Sans',sans-serif;">Tekan ESC atau klik luar gambar untuk tutup • Sama untuk Batam & Tanjung Pinang</small>
    </div>
</div>
@endsection

@push('scripts')
<style>
.home-feat:hover { transform: translateY(-8px); box-shadow: 0 16px 36px rgba(73,84,140,0.14) !important; }
.home-feat:hover .pemb-icon { transform: scale(1.06) rotate(-3deg); }
.home-pembelajaran-card.pemb-open { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(13,110,253,0.14) !important; border-color:#dbe0ff !important; }
.home-pembelajaran-card.pemb-open .pemb-icon { transform: scale(1.08) rotate(3deg); }
.pemb-opt.pemb-clicked { background:#0d6efd !important; color:white !important; transform: scale(0.98) !important; pointer-events:none; }
.pemb-opt.pemb-clicked .pemb-arrow { opacity:0 !important; transform: translateX(8px) !important; }
.pemb-opt.pemb-clicked .pemb-spinner { display:inline-block !important; }
.home-test-card.test-open { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(25,135,84,0.14) !important; border-color:#c8e6c9 !important; }
.home-test-card.test-open .test-icon { transform: scale(1.08) rotate(3deg); }
.test-opt.test-clicked { background:#198754 !important; color:white !important; transform: scale(0.98) !important; pointer-events:none; }
.test-opt.test-clicked .test-arrow { opacity:0 !important; transform: translateX(8px) !important; }
.test-opt.test-clicked .test-spinner { display:inline-block !important; }
@keyframes pembSpin { to { transform: rotate(360deg); } }
@keyframes pembPulse { 0%,100%{ transform: scale(1); } 50%{ transform: scale(1.02); } }
@keyframes heroGradient { 0%{background-position:0% 50%} 50%{background-position:100% 50%} 100%{background-position:0% 50%} }
@keyframes titleReveal { from{opacity:0; transform: translateY(16px) scale(0.98); filter: blur(4px);} to{opacity:1; transform: translateY(0) scale(1); filter: blur(0);} }
@keyframes floatPlaneAir { 0%,100%{transform: translateY(0px);} 50%{transform: translateY(-10px);} }
@keyframes floatSlow { 0%,100%{transform: translateY(0px) translateX(0px);} 50%{transform: translateY(-15px) translateX(5px);} }
@keyframes shadowPulse { 0%,100%{transform: translateX(-50%) scale(1); opacity:0.25;} 50%{transform: translateX(-50%) scale(0.85); opacity:0.15;} }
@keyframes fadeInLeft { from{opacity:0; transform: translateX(-24px);} to{opacity:1; transform: translateX(0);} }
@keyframes fadeInRight { from{opacity:0; transform: translateX(24px);} to{opacity:1; transform: translateX(0);} }
@keyframes fadeInUp { from{opacity:0; transform: translateY(18px);} to{opacity:1; transform: translateY(0);} }
@keyframes fadeInDown { from{opacity:0; transform: translateY(-14px);} to{opacity:1; transform: translateY(0);} }
@keyframes pulse { 0%,100%{transform: scale(1);} 50%{transform: scale(1.04);} }
</style>
<script>
    var slider = tns({
        container: "#carousel-home",
        items: 1,
        gutter: 10,
        edgePadding: 0,
        loop: false,
        rewind: true,
        responsive: {
            700: { items: 2, gutter: 14, edgePadding: 0 },
            1024: { items: 3, gutter: 16, edgePadding: 0 },
        },
        swipeAngle: false,
        lazyload: true,
        mouseDrag: true,
        speed: 500,
        controlsContainer: document.getElementById('carousel-home-nav'),
        controls: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
    });
    function animatePembClick(e, el){
        e.preventDefault();
        if(el.classList.contains('pemb-clicked')) return false;
        el.classList.add('pemb-clicked');
        var href = el.getAttribute('href');
        el.style.animation='pembPulse 0.35s ease';
        var pt = document.getElementById('pageTransition');
        if(pt){
            var towerName = (el.textContent||'').trim().replace(/\s+/g,' ').slice(0,32) || 'Memuat...';
            if(towerName.indexOf('Tower') === -1) towerName += ' Tower';
            var ptTitle = document.getElementById('ptTitle');
            var ptSub = document.getElementById('ptSub');
            if(ptTitle) ptTitle.textContent = towerName;
            if(ptSub) ptSub.textContent = 'Menyiapkan pembelajaran \u2022 ' + towerName;
            pt.classList.add('active');
        }
        setTimeout(function(){ window.location.href = href; }, 700);
        return false;
    }
    function animateTestClick(e, el){
        e.preventDefault();
        if(el.classList.contains('test-clicked')) return false;
        el.classList.add('test-clicked');
        var href = el.getAttribute('href');
        var towerName = el.getAttribute('data-tower') || (el.textContent||'').trim().replace(/\s+/g,' ').slice(0,32) || 'Test';
        if(towerName.indexOf('Tower') === -1) towerName += ' Tower';
        el.style.animation='pembPulse 0.35s ease';
        var pt = document.getElementById('pageTransition');
        if(pt){
            var ptTitle = document.getElementById('ptTitle');
            var ptSub = document.getElementById('ptSub');
            if(ptTitle) ptTitle.textContent = towerName;
            if(ptSub) ptSub.textContent = 'Menyiapkan test \u2022 ' + towerName;
            pt.classList.add('active');
        }
        setTimeout(function(){ window.location.href = href; }, 700);
        return false;
    }
    function switchBagan(cabang){
        var title=document.getElementById('baganTitle');
        var sub=document.getElementById('baganSub');
        var modalTitle=document.getElementById('baganModalTitle');
        var btnBatam=document.getElementById('btnBaganBatam');
        var btnTanjung=document.getElementById('btnBaganTanjung');
        if(cabang==='batam'){
            if(title) title.textContent='Bagan Managerial — Cabang Pembantu Batam';
            if(sub) sub.textContent='AirNav Cabang Tanjung Pinang • Berlaku untuk kedua cabang';
            if(modalTitle) modalTitle.innerHTML='<i class="fa-solid fa-sitemap me-2"></i> Bagan Managerial — Cabang Pembantu Batam';
            if(btnBatam){ btnBatam.style.background='linear-gradient(135deg, #49548C 0%, #6a7ab8 100%)'; btnBatam.style.color='white'; }
            if(btnTanjung){ btnTanjung.style.background='white'; btnTanjung.style.color='#49548C'; }
        } else {
            if(title) title.textContent='Bagan Managerial — Tanjung Pinang';
            if(sub) sub.textContent='AirNav Cabang Tanjung Pinang • Berlaku untuk kedua cabang';
            if(modalTitle) modalTitle.innerHTML='<i class="fa-solid fa-sitemap me-2"></i> Bagan Managerial — Tanjung Pinang';
            if(btnTanjung){ btnTanjung.style.background='linear-gradient(135deg, #49548C 0%, #6a7ab8 100%)'; btnTanjung.style.color='white'; }
            if(btnBatam){ btnBatam.style.background='white'; btnBatam.style.color='#49548C'; }
        }
    }
    function openBaganModal(){ var m=document.getElementById('baganModal'); if(m){ m.style.display='block'; document.body.style.overflow='hidden'; } }
    function closeBaganModal(){ var m=document.getElementById('baganModal'); if(m){ m.style.display='none'; document.body.style.overflow=''; } }
    document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeBaganModal(); });
    // tutup test jika buka saat buka pembelajaran
    function togglePembelajaran(e){
        if(e.target.closest('a')) return;
        var tcard = document.querySelector('.home-test-card');
        if(tcard && tcard.classList.contains('test-open')){
            // jangan toggleTest rekursif, langsung tutup
            tcard.classList.remove('test-open');
            var topts = tcard.querySelector('.test-options'); if(topts){ topts.style.maxHeight='0'; topts.style.opacity='0'; topts.style.transform='translateY(-8px)'; topts.style.marginTop='0'; }
            var tchev = tcard.querySelector('.test-chevron'); if(tchev) tchev.style.transform='rotate(0deg)';
            var tlabel = tcard.querySelector('.test-label'); if(tlabel) tlabel.textContent='Pilih Tower';
            var tglow = tcard.querySelector('.test-glow'); if(tglow) tglow.style.opacity='0';
        }
        var card = document.querySelector('.home-pembelajaran-card');
        var opts = card.querySelector('.pemb-options');
        var chev = card.querySelector('.pemb-chevron');
        var label = card.querySelector('.pemb-label');
        var glow = card.querySelector('.pemb-glow');
        var isOpen = card.classList.contains('pemb-open');
        if(isOpen){
            card.classList.remove('pemb-open');
            opts.style.maxHeight='0'; opts.style.opacity='0'; opts.style.transform='translateY(-8px)'; opts.style.marginTop='0';
            chev.style.transform='rotate(0deg)';
            if(label) label.textContent='Pilih Airport';
            if(glow) glow.style.opacity='0';
            card.querySelectorAll('.pemb-opt').forEach(function(el){ el.style.transform='translateY(6px)'; el.style.opacity='0'; });
        } else {
            card.classList.add('pemb-open');
            opts.style.maxHeight= opts.scrollHeight + 20 + 'px'; opts.style.opacity='1'; opts.style.transform='translateY(0)'; opts.style.marginTop='0.75rem';
            chev.style.transform='rotate(180deg)';
            if(label) label.textContent='Tutup';
            if(glow) glow.style.opacity='1';
            setTimeout(function(){
                card.querySelectorAll('.pemb-opt').forEach(function(el){ el.style.transform='translateY(0)'; el.style.opacity='1'; });
            }, 60);
            card.scrollIntoView({behavior:'smooth', block:'nearest'});
        }
    }
    document.addEventListener('click', function(e){
        var card = document.querySelector('.home-pembelajaran-card');
        if(card && card.classList.contains('pemb-open') && !card.contains(e.target)){
            togglePembelajaran(e);
        }
        var tcard = document.querySelector('.home-test-card');
        if(tcard && tcard.classList.contains('test-open') && !tcard.contains(e.target)){
            toggleTest(e);
        }
    });
    function toggleTest(e){
        if(e.target.closest('a')) return;
        var card = document.querySelector('.home-test-card');
        var opts = card.querySelector('.test-options');
        var chev = card.querySelector('.test-chevron');
        var label = card.querySelector('.test-label');
        var glow = card.querySelector('.test-glow');
        var isOpen = card.classList.contains('test-open');
        if(isOpen){
            card.classList.remove('test-open');
            opts.style.maxHeight='0'; opts.style.opacity='0'; opts.style.transform='translateY(-8px)'; opts.style.marginTop='0';
            chev.style.transform='rotate(0deg)';
            if(label) label.textContent='Pilih Tower';
            if(glow) glow.style.opacity='0';
            card.querySelectorAll('.test-opt').forEach(function(el){ el.style.transform='translateY(6px)'; el.style.opacity='0'; });
        } else {
            // tutup pembelajaran jika buka
            var pcard = document.querySelector('.home-pembelajaran-card');
            if(pcard && pcard.classList.contains('pemb-open')) togglePembelajaran(e);
            card.classList.add('test-open');
            opts.style.maxHeight= opts.scrollHeight + 20 + 'px'; opts.style.opacity='1'; opts.style.transform='translateY(0)'; opts.style.marginTop='0.75rem';
            chev.style.transform='rotate(180deg)';
            if(label) label.textContent='Tutup';
            if(glow) glow.style.opacity='1';
            setTimeout(function(){
                card.querySelectorAll('.test-opt').forEach(function(el){ el.style.transform='translateY(0)'; el.style.opacity='1'; });
            }, 60);
            card.scrollIntoView({behavior:'smooth', block:'nearest'});
        }
    }
</script>
@endpush
