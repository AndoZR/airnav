@extends('pengguna.app')
@section('tab', 'Pembelajaran — ' . $airport->name . ' Tower')

@section('content')
@php
// Tema per tower — pergantian tower ada warna + siluet beda, tidak putih polos
$towerThemes = [
  1 => ['grad' => 'linear-gradient(135deg, #1e2540 0%, #2c365e 22%, #49548C 48%, #5d6ab0 72%, #8a9ad6 100%)', 'accent' => 'linear-gradient(90deg, #ffd166 0%, #ffb703 50%, #ff8fab 100%)', 'icon' => 'fa-plane', 'label' => 'Hang Nadim • Batam', 'locaBg' => 'linear-gradient(135deg, #eef2ff 0%, #e0e7ff 55%, #dbe4ff 100%)'],
  2 => ['grad' => 'linear-gradient(135deg, #0f2740 0%, #1e3a5e 22%, #2e4a7a 48%, #4a6a9c 72%, #7a9ac6 100%)', 'accent' => 'linear-gradient(90deg, #7ee8fa 0%, #80ff72 100%)', 'icon' => 'fa-tower-broadcast', 'label' => 'Tanjung Pinang • Kepri', 'locaBg' => 'linear-gradient(135deg, #e0f2f7 0%, #d0eaf5 55%, #c8e8f0 100%)'],
  3 => ['grad' => 'linear-gradient(135deg, #1a1e40 0%, #252a5e 22%, #3a3a7a 48%, #5a4a9a 72%, #8a6ab8 100%)', 'accent' => 'linear-gradient(90deg, #f6d365 0%, #fda085 100%)', 'icon' => 'fa-satellite-dish', 'label' => 'TMA North • Controlled', 'locaBg' => 'linear-gradient(135deg, #f0eaff 0%, #e8ddff 55%, #ddd4ff 100%)'],
  4 => ['grad' => 'linear-gradient(135deg, #142040 0%, #1e2e5e 22%, #2e3e7a 48%, #4a5a9a 72%, #7a8ab8 100%)', 'accent' => 'linear-gradient(90deg, #a8edea 0%, #fed6e3 100%)', 'icon' => 'fa-compass', 'label' => 'TMA South • Controlled', 'locaBg' => 'linear-gradient(135deg, #e8f0ff 0%, #dbe6ff 55%, #d0dfff 100%)'],
  5 => ['grad' => 'linear-gradient(135deg, #0f2a3a 0%, #143a4e 22%, #1e5a6a 48%, #3a7a8a 72%, #6ab0b8 100%)', 'accent' => 'linear-gradient(90deg, #ffecd2 0%, #fcb69f 100%)', 'icon' => 'fa-water', 'label' => 'Rajahaji • Bintan', 'locaBg' => 'linear-gradient(135deg, #e0f7f0 0%, #d0f0e6 55%, #c8ece0 100%)'],
  6 => ['grad' => 'linear-gradient(135deg, #1a2040 0%, #252a5e 22%, #3a3a6e 48%, #5a5a8e 72%, #8a7ab0 100%)', 'accent' => 'linear-gradient(90deg, #ff9a9e 0%, #fecfef 100%)', 'icon' => 'fa-anchor', 'label' => 'Ranai • Natuna', 'locaBg' => 'linear-gradient(135deg, #f0e8ff 0%, #e8ddff 55%, #ddd0ff 100%)'],
  7 => ['grad' => 'linear-gradient(135deg, #2a1a3a 0%, #3e204e 22%, #5a2a6a 48%, #7a3a8a 72%, #a86ab8 100%)', 'accent' => 'linear-gradient(90deg, #f093fb 0%, #f5576c 100%)', 'icon' => 'fa-mountain', 'label' => 'Matak • Anambas', 'locaBg' => 'linear-gradient(135deg, #fce8f0 0%, #fbe0ea 55%, #f8d0e0 100%)'],
  8 => ['grad' => 'linear-gradient(135deg, #1a2a3a 0%, #1e3a4e 22%, #2a4a6a 48%, #4a6a8a 72%, #7a9ab8 100%)', 'accent' => 'linear-gradient(90deg, #4facfe 0%, #00f2fe 100%)', 'icon' => 'fa-island-tropical', 'label' => 'Letung • Anambas', 'locaBg' => 'linear-gradient(135deg, #e0f0ff 0%, #d8e8ff 55%, #c8e0ff 100%)'],
];
$theme = $towerThemes[$airport->id] ?? $towerThemes[1];
$sopDrive = 'https://drive.google.com/drive/folders/1fPzx5ivD7obIpAZpmkQMbQkMqw67groi?usp=sharing';
$locaDrive = 'https://drive.google.com/drive/folders/14oGKAVVUi9sRSYBzthARc8WkZ8nHHTMi?usp=sharing';
// LOCA list robust — jangan tampil merah error kalau kosong
$locaList = [];
if (!empty($airport->LOCA)) {
    $decoded = json_decode($airport->LOCA, true);
    if (is_array($decoded)) { $locaList = array_values(array_filter($decoded, fn($v) => is_string($v) && trim($v) !== '')); }
}
$hasLoca = count($locaList) > 0;
@endphp
{{-- HERO: premium eyecatching — warna per tower + siluet --}}
<div style="background: {{ $theme['grad'] }}; background-size:200% 200%; animation: heroGradient 12s ease infinite; padding: 2.8rem 0 2.6rem; overflow:hidden; position:relative;">
    {{-- siluet dekor per tower --}}
    <div style="position:absolute; top:-30px; right:-10px; opacity:0.07; font-size:280px; line-height:1; pointer-events:none; transform: rotate(-8deg);"><i class="fa-solid {{ $theme['icon'] }} text-white"></i></div>
    <div style="position:absolute; bottom:-20px; left:4%; opacity:0.06; font-size:160px; line-height:1; pointer-events:none; transform: rotate(6deg);"><i class="fa-solid fa-tower-broadcast text-white"></i></div>
    <div style="position:absolute; top:-40px; right:-40px; width:220px; height:220px; background:rgba(255,255,255,0.07); border-radius:50%; animation: pulse 6s ease-in-out infinite;"></div>
    <div style="position:absolute; bottom:-30px; left:8%; width:160px; height:160px; background:rgba(255,255,255,0.05); border-radius:50%; animation: pulse 7s ease-in-out infinite reverse;"></div>
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at 30% 20%, rgba(255,255,255,0.07) 0%, transparent 50%), radial-gradient(ellipse at 75% 75%, rgba(0,0,0,0.08) 0%, transparent 50%); pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="d-flex flex-wrap gap-2 mb-3" style="animation: fadeInDown 0.6s ease forwards;">
            <a href="{{ route('beranda.index') }}" class="btn btn-sm bg-white fw-semibold" style="color:#49548C; border-radius:2rem; box-shadow:0 4px 12px rgba(0,0,0,0.12); font-family:'Outfit',sans-serif; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'"><i class="fa-solid fa-arrow-left me-1"></i> Beranda</a>
            <span class="badge bg-white px-3 py-2" style="color:#49548C !important; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:0.03em;"><i class="fa-solid fa-tower-broadcast me-1"></i> Pembelajaran</span>
            <span class="badge px-3 py-2" style="background:rgba(255,255,255,0.16); color:white; border:1px solid rgba(255,255,255,0.28); backdrop-filter:blur(6px); border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:600;"><i class="fa-solid {{ $theme['icon'] }} me-1"></i> {{ $airport->name }} Tower</span>
        </div>
        <div class="row align-items-center g-4">
            <div class="col-lg-7" style="animation: fadeInLeft 0.85s cubic-bezier(0.22,1,0.36,1) forwards;">
                <h1 class="pemb-hero-title text-white mb-2" style="font-size:clamp(1.9rem, 4vw, 2.6rem); text-shadow:0 3px 18px rgba(0,0,0,0.18); animation: titleReveal 0.9s cubic-bezier(0.22,1,0.36,1) 0.2s forwards; opacity:0;">{{ strtoupper($airport->name) }}<br><span style="background: {{ $theme['accent'] }}; -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">TOWER</span></h1>
                <p class="pemb-hero-desc text-white mb-0" style="opacity:0.92; max-width:560px; animation: fadeInUp 0.7s ease 0.38s forwards; opacity:0;">
                    Program pembelajaran terstruktur untuk pengembangan kompetensi personel ATS, CNS, dan pendukung yang mengintegrasikan pendalaman SOP, LOCA, dan review operasional sesuai standar ICAO dan pedoman AirNav Indonesia.
                </p>
                <div class="d-flex flex-wrap gap-2 mt-3" style="animation: fadeInUp 0.7s ease 0.52s forwards; opacity:0;">
                    <a href="#section-sop" class="badge rounded-pill px-3 py-2 text-decoration-none" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); backdrop-filter:blur(6px); font-family:'Instrument Sans',sans-serif; font-size:0.72rem; transition: all 0.25s; cursor:pointer;" onmouseover="this.style.background='rgba(255,255,255,0.22)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(255,255,255,0.14)'; this.style.transform='none'"><i class="fa-solid fa-file-lines me-1"></i> SOP</a>
                    <a href="#section-loca" class="badge rounded-pill px-3 py-2 text-decoration-none" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); backdrop-filter:blur(6px); font-family:'Instrument Sans',sans-serif; font-size:0.72rem; transition: all 0.25s; cursor:pointer;" onmouseover="this.style.background='rgba(255,255,255,0.22)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(255,255,255,0.14)'; this.style.transform='none'"><i class="fa-solid fa-handshake me-1"></i> LOCA</a>
                    <a href="#section-review" class="badge rounded-pill px-3 py-2 text-decoration-none" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); backdrop-filter:blur(6px); font-family:'Instrument Sans',sans-serif; font-size:0.72rem; transition: all 0.25s; cursor:pointer;" onmouseover="this.style.background='rgba(255,255,255,0.22)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(255,255,255,0.14)'; this.style.transform='none'"><i class="fa-solid fa-video me-1"></i> Review</a>
                </div>
            </div>
            <div class="col-lg-5 d-flex justify-content-center" style="animation: fadeInRight 0.9s cubic-bezier(0.22,1,0.36,1) forwards;">
                <div style="background: rgba(255,255,255,0.96); backdrop-filter:blur(14px); border-radius:1.2rem; padding:1rem 1.2rem; box-shadow:0 12px 32px rgba(0,0,0,0.14); border:1px solid rgba(255,255,255,0.5); width:100%; max-width:360px; animation: fadeInUp 0.9s ease 0.35s forwards; opacity:0;">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:52px; height:52px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.9rem; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(73,84,140,0.22);"><i class="fa-solid {{ $theme['icon'] }} text-white" style="font-size:1.2rem;"></i></div>
                        <div>
                            <div style="font-family:'Outfit',sans-serif; font-weight:800; color:#1a1f3d; font-size:1.05rem; letter-spacing:-0.02em;">{{ $airport->name }} Tower</div>
                            <small style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.72rem;">{{ $theme['label'] }}</small>
                        </div>
                    </div>
                    <div style="height:1px; background: linear-gradient(90deg, #e8ecff, transparent); margin:0.9rem 0;"></div>
                    <div class="d-flex gap-2">
                        <a href="{{ $sopDrive }}" target="_blank" rel="noopener" class="badge text-decoration-none" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-size:0.65rem; border:1px solid #dbe0ff; transition: all 0.25s; cursor:pointer;" onmouseover="this.style.background='#dbe0ff'; this.style.transform='translateY(-1px)'" onmouseout="this.style.background='#e8ecff'; this.style.transform='none'"><i class="fa-solid fa-circle-check me-1"></i> SOP Ready <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size:0.55rem;"></i></a>
                        <a href="{{ $locaDrive }}" target="_blank" rel="noopener" class="badge text-decoration-none" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-size:0.65rem; border:1px solid #dbe0ff; transition: all 0.25s; cursor:pointer;" onmouseover="this.style.background='#dbe0ff'; this.style.transform='translateY(-1px)'" onmouseout="this.style.background='#e8ecff'; this.style.transform='none'"><i class="fa-solid fa-handshake me-1"></i> LOCA Drive <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size:0.55rem;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SOP: PREMIUM EYECATCHING — background berwarna per tower (tidak putih polos) --}}
<div id="section-sop" style="background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 28%, #dbe4ff 58%, #e6e9ff 82%, #f0f2ff 100%); padding: 2.6rem 0 2.4rem; position:relative; overflow:hidden; border-top:1px solid #dbe0ff; border-bottom:1px solid #e8ecff; scroll-margin-top: 84px;">
    {{-- tint warna per tower agar tiap tower terasa beda --}}
    <div style="position:absolute; inset:0; background: {{ $theme['grad'] }}; opacity:0.06; pointer-events:none; mix-blend-mode: overlay;"></div>
    {{-- dekor animasi halus --}}
    <div style="position:absolute; top:-60px; right:-60px; width:420px; height:420px; background: radial-gradient(circle, rgba(73,84,140,0.08) 0%, transparent 68%); border-radius:50%; pointer-events:none; animation: sopBlob 9s ease-in-out infinite;"></div>
    <div style="position:absolute; bottom:-80px; left:-80px; width:520px; height:520px; background: radial-gradient(circle, rgba(138,154,214,0.10) 0%, transparent 70%); border-radius:50%; pointer-events:none; animation: sopBlob 11s ease-in-out infinite reverse;"></div>
    <div style="position:absolute; inset:0; opacity:0.14; background-image: radial-gradient(circle, rgba(73,84,140,0.06) 1px, transparent 1px); background-size:24px 24px; pointer-events:none;"></div>
    {{-- garis shimmer halus di atas --}}
    <div style="position:absolute; top:0; left:0; right:0; height:1px; background: linear-gradient(90deg, transparent, rgba(73,84,140,0.18), transparent); background-size:200% 100%; animation: sopShimmer 3.5s ease infinite;"></div>
    <div class="container" style="position:relative;">
        {{-- HEADER eyecatching --}}
        <div class="text-center mb-4 reveal">
            <span class="badge px-3 py-2 mb-2" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%); color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:800; letter-spacing:0.06em; font-size:0.66rem; border:1px solid #dbe0ff; box-shadow:0 4px 14px rgba(73,84,140,0.08); animation: sopBadgeFloat 3s ease-in-out infinite;"><i class="fa-solid fa-file-shield me-1" style="color:#ffb703;"></i> DOKUMEN RESMI • AIRNAV INDONESIA</span>
            <h3 class="mb-2" style="font-family:'Outfit',sans-serif; font-weight:900; letter-spacing:-0.03em; font-size:clamp(1.45rem, 3.2vw, 1.9rem); line-height:1.15;">
                <span style="background: linear-gradient(135deg, #1a1f3d 0%, #49548C 55%, #6a7ab8 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Standard Operating</span>
                <span style="background: linear-gradient(90deg, #49548C, #8a9ad6, #ffb703); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> Procedure</span>
            </h3>
            <p class="mx-auto pemb-justify" style="max-width:680px; color:#5a6478; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.88rem; line-height:1.8; text-align-last:center !important; font-weight:400;">SOP ATS merupakan dokumen turunan dari <span style="color:#49548C; font-weight:700;">Manual Operasi Kantor Cabang Pembantu Batam</span> yang disusun mengacu pada <span style="color:#49548C; font-weight:600;">Manual AirNav Indonesia</span> sebagai pedoman operasional terstandar untuk menjamin <em style="color:#1a1f3d; font-weight:600;">keselamatan, keteraturan, dan efisiensi</em> layanan navigasi penerbangan.</p>
        </div>
        {{-- CARD premium dengan animasi — background berwarna (tidak putih polos) --}}
        <div class="card border-0 shadow-sm reveal reveal-delay-1 sop-card" style="border-radius:1.6rem; overflow:hidden; background: linear-gradient(135deg, #ffffff 0%, #f5f7ff 45%, #e8ecff 100%); border:1px solid #dbe0ff !important; box-shadow: 0 14px 40px rgba(73,84,140,0.12), 0 4px 12px rgba(73,84,140,0.06); position:relative;">
            {{-- watermark siluet tower per tower di dalam card --}}
            <div style="position:absolute; right:-10px; bottom:-10px; opacity:0.04; font-size:180px; line-height:1; pointer-events:none; transform: rotate(-8deg);"><i class="fa-solid {{ $theme['icon'] }}" style="color:#49548C;"></i></div>
            <div style="position:absolute; inset:0; opacity:0.18; background: radial-gradient(circle, rgba(73,84,140,0.06) 1px, transparent 1px); background-size:20px 20px; pointer-events:none;"></div>
            <div style="height:4px; background: linear-gradient(90deg, #49548C 0%, #6a7ab8 25%, #8a9ad6 50%, #ffd166 75%, #49548C 100%); background-size:300% 100%; animation: sopGradientShift 4s ease infinite;"></div>
            <div class="card-body p-3 p-md-4 p-lg-5">
                <div class="row g-4 g-lg-5 align-items-center">
                    {{-- VISUAL KIRI — gambar hidup dengan background warna per tower --}}
                    <div class="col-md-5">
                        <div class="sop-visual" style="position:relative; background: linear-gradient(135deg, #ffffff 0%, {{ $theme['locaBg'] }} 70%); border:1px solid #dbe0ff; border-radius:1.4rem; padding:1.1rem; box-shadow:0 12px 32px rgba(73,84,140,0.14); overflow:hidden; transition: all 0.4s cubic-bezier(0.22,1,0.36,1);">
                            {{-- dekor halo belakang --}}
                            <div style="position:absolute; top:-18px; right:-18px; width:120px; height:120px; background: radial-gradient(circle, rgba(255,209,102,0.18) 0%, transparent 70%); border-radius:50%; pointer-events:none; animation: sopPulse 3s ease-in-out infinite;"></div>
                            <div style="position:absolute; bottom:-20px; left:-10px; width:140px; height:140px; background: radial-gradient(circle, rgba(73,84,140,0.07) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
                            {{-- badge mengambang --}}
                            <div class="sop-float-badge" style="position:absolute; top:0.7rem; right:0.7rem; z-index:2; background: white; border:1px solid #e8ecff; border-radius:2rem; padding:0.28rem 0.6rem; display:flex; align-items:center; gap:0.35rem; box-shadow:0 4px 12px rgba(73,84,140,0.12); animation: sopFloat 3.2s ease-in-out infinite;">
                                <span style="width:8px; height:8px; background:#22c55e; border-radius:50%; display:inline-block; box-shadow:0 0 0 4px rgba(34,197,94,0.15); animation: sopDotPulse 1.8s ease infinite;"></span>
                                <span style="font-family:'Instrument Sans',sans-serif; font-size:0.62rem; font-weight:700; color:#1a1f3d; letter-spacing:0.04em;">PDF • SIAP AKSES</span>
                            </div>
                            <div class="sop-float-badge" style="position:absolute; bottom:0.8rem; left:0.8rem; z-index:2; background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); border-radius:0.8rem; padding:0.4rem 0.6rem; display:flex; align-items:center; gap:0.4rem; box-shadow:0 6px 16px rgba(73,84,140,0.18); animation: sopFloat 3.8s ease-in-out infinite reverse;">
                                <i class="fa-solid fa-award text-white" style="font-size:0.7rem;"></i>
                                <span style="font-family:'Outfit',sans-serif; font-size:0.62rem; font-weight:700; color:white; letter-spacing:0.03em;">Edisi 2 • 2018</span>
                            </div>
                            <img class="img-fluid sop-img" src="{{ asset('src/img/sopimg.png') }}" alt="SOP" style="border-radius:1rem; display:block; width:100%; position:relative; z-index:1; transition: all 0.5s cubic-bezier(0.22,1,0.36,1); box-shadow:0 8px 20px rgba(0,0,0,0.06);">
                            {{-- shimmer sweep --}}
                            <div class="sop-shimmer" style="position:absolute; inset:0; background: linear-gradient(110deg, transparent 30%, rgba(255,255,255,0.55) 50%, transparent 70%); transform: translateX(-100%); pointer-events:none; border-radius:1.4rem;"></div>
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <span class="badge" style="background:white; color:#49548C; border:1px solid #e8ecff; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.65rem; font-weight:600;"><i class="fa-solid fa-shield-halved me-1"></i> ICAO Aligned</span>
                            <span class="badge" style="background:#e8ecff; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.65rem; font-weight:600;"><i class="fa-solid fa-circle-check me-1"></i> Terverifikasi</span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex align-items-center gap-2 mb-2 reveal">
                            <div style="width:38px; height:38px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.8rem; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(73,84,140,0.18); animation: sopIconFloat 3s ease-in-out infinite;"><i class="fa-solid fa-book-open text-white" style="font-size:0.85rem;"></i></div>
                            <span class="pemb-label" style="color:#49548C; letter-spacing:0.07em;">SOP ATS • EDISI 2 • 01/SOPATS-1/OPS/01/2018</span>
                            <span class="ms-auto badge" style="background: linear-gradient(135deg, #fff7e6 0%, #ffecd2 100%); color:#92400e; border:1px solid #fde68a; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.60rem; font-weight:700;"><i class="fa-solid fa-star me-1" style="color:#ffb703;"></i> WAJIB BACA</span>
                        </div>
                        <h5 class="mb-3" style="font-family:'Outfit',sans-serif; font-weight:800; font-size:1.18rem; letter-spacing:-0.02em; line-height:1.3; color:#1a1f3d;">SOP Air Traffic Services <span style="background: linear-gradient(135deg, #49548C, #8a9ad6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">(ATS)</span></h5>
                        <p class="pemb-body pemb-justify" style="font-size:0.92rem;">
                            Standar Prosedur Operasi (SOP) Air Traffic Services (ATS) ini merupakan dokumen turunan dari Manual Operasi Kantor Cabang Pembantu Batam yang disusun secara terpisah dengan mengacu pada Manual AirNav Indonesia Petunjuk Pembuatan SOP ATS Edisi ke-2 Nomor 01/SOPATS-1/OPS/01/2018.
                        </p>
                        <p class="pemb-body-sm pemb-justify" style="font-size:0.88rem; color:#5a6478;">
                            Dokumen ini menjadi acuan utama bagi <span style="color:#1a1f3d; font-weight:600;">controller</span> dalam pelaksanaan tugas operasional harian untuk memastikan keseragaman prosedur, kepatuhan terhadap regulasi, dan terjaganya keselamatan penerbangan.
                        </p>
                        {{-- fitur 3 poin dengan ikon animasi --}}
                        <div class="row g-2 mt-3 mb-1">
                            <div class="col-12 col-sm-4 d-flex align-items-center gap-2">
                                <span style="width:28px; height:28px; background: linear-gradient(135deg, #eef2ff 0%, #dbe4ff 100%); border:1px solid #dbe0ff; border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-list-check" style="font-size:0.65rem; color:#49548C;"></i></span>
                                <small style="font-family:'Instrument Sans',sans-serif; font-size:0.72rem; font-weight:600; color:#1a1f3d; line-height:1.2;">Keseragaman Prosedur</small>
                            </div>
                            <div class="col-12 col-sm-4 d-flex align-items-center gap-2">
                                <span style="width:28px; height:28px; background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border:1px solid #bbf7d0; border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-scale-balanced" style="font-size:0.65rem; color:#15803d;"></i></span>
                                <small style="font-family:'Instrument Sans',sans-serif; font-size:0.72rem; font-weight:600; color:#1a1f3d; line-height:1.2;">Kepatuhan Regulasi</small>
                            </div>
                            <div class="col-12 col-sm-4 d-flex align-items-center gap-2">
                                <span style="width:28px; height:28px; background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%); border:1px solid #fed7aa; border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-shield-halved" style="font-size:0.65rem; color:#c2410c;"></i></span>
                                <small style="font-family:'Instrument Sans',sans-serif; font-size:0.72rem; font-weight:600; color:#1a1f3d; line-height:1.2;">Keselamatan Penerbangan</small>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="{{ $sopDrive }}" target="_blank" rel="noopener" class="btn px-4 py-2 fw-bold sop-cta" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border:none; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 6px 18px rgba(73,84,140,0.24); transition: all 0.32s cubic-bezier(0.22,1,0.36,1); position:relative; overflow:hidden;"><span style="position:relative; z-index:1;"><i class="fa-brands fa-google-drive me-2"></i> Buka SOP di Drive</span><span class="sop-cta-shine" style="position:absolute; inset:0; background: linear-gradient(110deg, transparent 35%, rgba(255,255,255,0.22) 50%, transparent 65%); transform: translateX(-100%); transition: transform 0.6s;"></span></a>
                            <a href="{{ $sopDrive }}" target="_blank" rel="noopener" class="btn px-3 py-2 fw-semibold" style="background:white; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; font-family:'Outfit',sans-serif; font-size:0.85rem; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(73,84,140,0.10)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'"><i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Folder Drive</a>
                        </div>
                        <small class="d-flex align-items-center gap-1 mt-3" style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.71rem;"><i class="fa-solid fa-circle-info" style="color:#8a9ad6;"></i> Dokumen SOP tersimpan di Google Drive — klik untuk akses instan.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- LOCA: template persis gambar — background runway + kartu seperti screenshot --}}
@php
$locaDefaults = [
  ['title'=>'AIRLINES & GH','img'=>'template_loca/airlines.png'],
  ['title'=>'FLYBEST','img'=>'template_loca/flybest.png'],
  ['title'=>'BASARNAS','img'=>'template_loca/basarnas.png'],
  ['title'=>'LOCA TEKNIK AIRNAV','img'=>'template_loca/airnav.png'],
  ['title'=>'LOCA PIA MEDAN','img'=>'template_loca/airnav.png'],
  ['title'=>'LANUD HANG NADIM','img'=>'template_loca/lanud.png'],
  ['title'=>'TANJUNG PINANG','img'=>'template_loca/tanjung.png'],
  ['title'=>'METEO','img'=>'template_loca/airlines.png'],
  ['title'=>'LOCA AMHS','img'=>'template_loca/amhs.png'],
  ['title'=>'PT.BIB','img'=>'template_loca/ptbib.png'],
];
function locaIconFor($name){
  $n = strtolower($name);
  if(str_contains($n,'flybest')) return 'template_loca/flybest.png';
  if(str_contains($n,'basarnas')||str_contains($n,'sar')) return 'template_loca/basarnas.png';
  if(str_contains($n,'lanud')) return 'template_loca/lanud.png';
  if(str_contains($n,'tanjung')) return 'template_loca/tanjung.png';
  if(str_contains($n,'meteo')) return 'template_loca/airlines.png';
  if(str_contains($n,'amhs')) return 'template_loca/amhs.png';
  if(str_contains($n,'bib')) return 'template_loca/ptbib.png';
  if(str_contains($n,'airnav')||str_contains($n,'pia')||str_contains($n,'teknik')) return 'template_loca/airnav.png';
  if(str_contains($n,'airline')||str_contains($n,'gh')) return 'template_loca/airlines.png';
  return 'template_loca/airnav.png';
}
@endphp
<div id="section-loca" style="position:relative; overflow:hidden; padding: 2.2rem 0 2.4rem; scroll-margin-top: 84px; background: url('{{ asset('src/img/bgLOCA.png') }}') center/cover no-repeat;">
    {{-- overlay gelap biar kartu kontras seperti screenshot --}}
    <div style="position:absolute; inset:0; background: linear-gradient(180deg, rgba(26,31,61,0.55) 0%, rgba(26,31,61,0.35) 45%, rgba(26,31,61,0.45) 100%); pointer-events:none;"></div>
    {{-- tint per tower tipis biar pergantian tower tidak putih & ada warna --}}
    <div style="position:absolute; inset:0; background: {{ $theme['grad'] }}; opacity:0.18; pointer-events:none; mix-blend-mode: overlay;"></div>
    <div class="container" style="position:relative;">
        {{-- header LOCA seperti gambar --}}
        <div class="text-center mb-3 reveal">
            <h3 style="font-family:'Outfit',sans-serif; font-weight:800; color:white; letter-spacing:0.08em; font-size:1.55rem; text-shadow:0 2px 12px rgba(0,0,0,0.35); margin-bottom:0.35rem;">LOCA</h3>
            <div style="width:42px; height:3px; background: linear-gradient(90deg,#dc3545 0%, #ffd166 100%); margin:0 auto; border-radius:2px;"></div>
        </div>
        {{-- alert beige seperti gambar --}}
        <div class="reveal" style="background: #fdf6d8; border:1px solid #f5e6a8; border-left:3px solid #e8c24a; border-radius:6px; padding:0.55rem 0.9rem; display:flex; align-items:center; gap:0.6rem; margin-bottom:1.1rem; font-family:'Instrument Sans',sans-serif; font-size:0.78rem; color:#5a4a00; box-shadow:0 2px 8px rgba(0,0,0,0.08);">
            <span style="width:18px; height:18px; background:#e8c24a; color:white; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:0.65rem; font-weight:800;"><i class="fa-solid fa-info" style="font-size:0.60rem;"></i></span>
            <span style="font-weight:500;">Daftar LOCA yang bisa diakses user</span>
            <a href="{{ $locaDrive }}" target="_blank" rel="noopener" class="ms-auto btn btn-sm px-3 py-1 fw-bold" style="background:white; color:#49548C; border:1px solid #e8ecff; border-radius:2rem; font-family:'Outfit',sans-serif; font-size:0.72rem; white-space:nowrap; box-shadow:0 2px 6px rgba(0,0,0,0.08);"><i class="fa-brands fa-google-drive me-1"></i> Buka Drive</a>
        </div>
        <div class="row g-3 g-md-3 loca-template">
            @if ($hasLoca)
                {{-- Jika ada data dari DB, tampilkan dengan style template --}}
                @foreach ($locaList as $item)
                    @php $icon = locaIconFor($item); @endphp
                    <div class="col-6 col-md-3 reveal" style="transition-delay: {{ $loop->index * 0.05 }}s;">
                        <a href="#" class="btn-loca text-decoration-none d-block h-100" data-loca="{{ $item }}" style="height:100%;">
                            <div class="loca-tpl-card h-100">
                                <div class="loca-tpl-title">{{ $item }}</div>
                                <div class="loca-tpl-icon"><img src="{{ asset('src/img/'.$icon) }}" alt="{{ $item }}"></div>
                                <span class="loca-tpl-badge">Click for More PDF</span>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-6 col-md-3 reveal" style="transition-delay: {{ count($locaList) * 0.05 }}s;">
                    <a href="{{ $locaDrive }}" target="_blank" rel="noopener" class="text-decoration-none d-block h-100">
                        <div class="loca-tpl-card h-100" style="border:1.5px dashed rgba(255,255,255,0.9); background: linear-gradient(135deg, #ffffff 0%, #f0f4ff 100%);">
                            <div class="loca-tpl-title" style="color:#49548C;">BUKA FOLDER DRIVE</div>
                            <div class="loca-tpl-icon" style="background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:50%; width:72px; height:72px; display:flex; align-items:center; justify-content:center; margin:0 auto;"><i class="fa-brands fa-google-drive text-white" style="font-size:1.6rem;"></i></div>
                            <span class="loca-tpl-badge" style="background:#49548C; color:white; border-color:#49548C;">Buka di Drive</span>
                        </div>
                    </a>
                </div>
            @else
                {{-- Default 10 kartu persis seperti gambar screenshot --}}
                @foreach ($locaDefaults as $idx => $card)
                    <div class="col-6 col-md-3 reveal" style="transition-delay: {{ $idx * 0.05 }}s;">
                        <a href="{{ $locaDrive }}" target="_blank" rel="noopener" class="text-decoration-none d-block h-100">
                            <div class="loca-tpl-card h-100">
                                <div class="loca-tpl-title">{{ $card['title'] }}</div>
                                <div class="loca-tpl-icon"><img src="{{ asset('src/img/'.$card['img']) }}" alt="{{ $card['title'] }}"></div>
                                <span class="loca-tpl-badge">Click for More PDF</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="text-center mt-3 reveal reveal-delay-1">
            <small style="color:rgba(255,255,255,0.82); font-family:'Instrument Sans',sans-serif; font-size:0.72rem; text-shadow:0 1px 6px rgba(0,0,0,0.35);"><i class="fa-solid fa-shield-halved me-1"></i> Dokumen tersimpan di Google Drive • Klik kartu untuk akses • {{ $airport->name }} Tower</small>
        </div>
    </div>
</div>

{{-- REVIEW: video premium --}}
<div id="section-review" style="background: linear-gradient(135deg, #1a1f3d 0%, #2c365e 35%, #49548C 70%, #5d6ab0 100%); padding: 2.4rem 0 2.6rem; position:relative; overflow:hidden; scroll-margin-top: 84px;">
    <div style="position:absolute; top:-40px; right:-40px; width:220px; height:220px; background:rgba(255,255,255,0.06); border-radius:50%;"></div>
    <div class="container" style="position:relative;">
        <div class="text-center mb-4 reveal">
            <span class="badge bg-white px-3 py-2 mb-2" style="color:#49548C !important; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:0.04em; font-size:0.68rem;"><i class="fa-solid fa-video me-1"></i> VIDEO REVIEW</span>
            <h3 class="pemb-section-title text-white mb-2" style="text-shadow:0 2px 12px rgba(0,0,0,0.15);">Review Operasional</h3>
            <p class="pemb-section-sub text-white mx-auto" style="opacity:0.85; max-width:560px; color:rgba(255,255,255,0.85) !important; text-align-last:center !important;">Tinjauan video untuk pembelajaran dan evaluasi prosedur.</p>
        </div>
        <div class="card border-0 shadow-lg reveal reveal-delay-1" style="border-radius:1.4rem; overflow:hidden; background: rgba(255,255,255,0.96); backdrop-filter:blur(12px);">
            <div style="height:4px; background: linear-gradient(90deg, #ffd166, #ff8fab, #8a9ad6);"></div>
            <div class="card-body p-2 p-md-3">
                <div id="carouselExampleCaptions" class="carousel slide w-100" style="border-radius:1rem; overflow:hidden;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden; border-radius:0.8rem; background:#000;">
                                <iframe style="position:absolute; inset:0; width:100%; height:100%; border:none;" src="https://www.youtube.com/embed/tshZFBlVV10?si=svJlepvC510J4Wyz" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden; border-radius:0.8rem; background:#000;">
                                <iframe style="position:absolute; inset:0; width:100%; height:100%; border:none;" src="https://www.youtube.com/embed/tshZFBlVV10?si=svJlepvC510J4Wyz" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lihat Berkas — premium (untuk file lokal jika ada) -->
<div class="modal fade" id="modal-berkas" tabindex="-1" role="dialog" aria-labelledby="modalBerkas" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:1.2rem; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.25);">
            <div class="modal-header" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border:none; padding:1rem 1.2rem;">
                <h5 class="modal-title" style="font-family:'Outfit',sans-serif; font-weight:700; color:white;"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-2" style="background:#f8f9ff;">
                <embed src="" frameborder="0" width="100%" height="520px" style="border-radius:0.8rem; background:white; border:1px solid #eef0ff;">
            </div>
            <div class="modal-footer" style="background:white; border-top:1px solid #eef0ff;">
                <button type="button" class="btn px-4" data-bs-dismiss="modal" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:600; border:1px solid #dbe0ff;">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<style>
/* SOP animations — eyecatching premium */
.sop-card { transition: all 0.4s cubic-bezier(0.22,1,0.36,1); }
.sop-card:hover { transform: translateY(-4px); box-shadow: 0 18px 44px rgba(73,84,140,0.16) !important; }
.sop-visual:hover .sop-img { transform: scale(1.03) rotate(-0.5deg); }
.sop-visual:hover .sop-shimmer { animation: sopSweep 1.1s ease; }
.sop-cta:hover { transform: translateY(-2px); box-shadow:0 10px 24px rgba(73,84,140,0.30) !important; }
.sop-cta:hover .sop-cta-shine { transform: translateX(100%); }
@keyframes sopBlob { 0%,100%{ transform: scale(1) translateY(0); } 50%{ transform: scale(1.05) translateY(-8px); } }
@keyframes sopShimmer { 0%{ background-position: -200% 0; } 100%{ background-position: 200% 0; } }
@keyframes sopGradientShift { 0%{background-position:0% 50%} 50%{background-position:100% 50%} 100%{background-position:0% 50%} }
@keyframes sopFloat { 0%,100%{ transform: translateY(0); } 50%{ transform: translateY(-6px); } }
@keyframes sopDotPulse { 0%,100%{ box-shadow:0 0 0 4px rgba(34,197,94,0.15); } 50%{ box-shadow:0 0 0 7px rgba(34,197,94,0.0); } }
@keyframes sopPulse { 0%,100%{ transform: scale(1); opacity:1; } 50%{ transform: scale(1.08); opacity:0.85; } }
@keyframes sopBadgeFloat { 0%,100%{ transform: translateY(0); } 50%{ transform: translateY(-3px); } }
@keyframes sopIconFloat { 0%,100%{ transform: translateY(0); } 50%{ transform: translateY(-3px); } }
@keyframes sopSweep { 0%{ transform: translateX(-100%); } 100%{ transform: translateX(100%); } }
.loca-card:hover { transform: translateY(-6px) scale(1.01); box-shadow: 0 12px 32px rgba(73,84,140,0.14) !important; }
.loca-card:hover img { transform: scale(1.04); }
/* LOCA template — persis screenshot + animasi eye-catching */
.loca-tpl-card { background: linear-gradient(135deg, #e3e8f0 0%, #d1d8e8 100%); border-radius:8px; padding:0.7rem 0.6rem 0.6rem; text-align:center; position:relative; overflow:hidden; border:1px solid rgba(255,255,255,0.45); box-shadow:0 4px 16px rgba(0,0,0,0.18); transition: all 0.38s cubic-bezier(0.22,1,0.36,1); display:flex; flex-direction:column; align-items:center; justify-content:space-between; min-height:168px; animation: locaEntrance 0.6s cubic-bezier(0.22,1,0.36,1) backwards; }
.loca-tpl-card::before { content:""; position:absolute; top:0; left:-100%; width:100%; height:100%; background: linear-gradient(110deg, transparent 30%, rgba(255,255,255,0.45) 50%, transparent 70%); transform: translateX(0); transition: transform 0.6s; pointer-events:none; z-index:2; }
.loca-tpl-card:hover::before { transform: translateX(200%); }
.loca-tpl-card::after { content:""; position:absolute; right:0; bottom:0; width:58%; height:52%; background: linear-gradient(135deg, transparent 50%, rgba(0,0,0,0.14) 50%); pointer-events:none; border-radius:0 0 8px 0; transition: opacity 0.3s; }
.loca-tpl-card:hover { transform: translateY(-8px) scale(1.02); box-shadow:0 16px 32px rgba(0,0,0,0.22), 0 0 0 1px rgba(255,209,102,0.35) inset; border-color:#ffd166; }
.loca-tpl-card:hover .loca-tpl-icon img { transform: scale(1.10) rotate(-2deg); filter: drop-shadow(0 8px 16px rgba(0,0,0,0.18)); }
.loca-tpl-card:hover .loca-tpl-badge { background: #49548C; color:white; border-color:#49548C; transform: scale(1.05); }
.loca-tpl-card:active { transform: scale(0.97); }
.loca-tpl-title { font-family:'Outfit',sans-serif; font-weight:700; font-size:0.72rem; letter-spacing:0.03em; color:#1a1f3d; text-transform:uppercase; line-height:1.25; margin-bottom:0.5rem; min-height:1.8em; display:flex; align-items:center; justify-content:center; position:relative; z-index:1; }
.loca-tpl-icon { width:100%; display:flex; align-items:center; justify-content:center; flex:1; padding:0.3rem 0; position:relative; z-index:1; }
.loca-tpl-icon img { max-width:92px; max-height:72px; object-fit:contain; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.12)); transition: all 0.38s cubic-bezier(0.22,1,0.36,1); display:block; animation: locaIconFloat 3.5s ease-in-out infinite; }
.loca-tpl-badge { margin-top:0.55rem; background: rgba(255,255,255,0.92); border:1px solid rgba(0,0,0,0.06); color:#1a1f3d; font-family:'Instrument Sans',sans-serif; font-size:0.60rem; font-weight:600; padding:0.22rem 0.6rem; border-radius:2rem; box-shadow:0 2px 6px rgba(0,0,0,0.08); position:relative; z-index:1; letter-spacing:0.02em; transition: all 0.28s; }
@keyframes locaEntrance { from{ opacity:0; transform: translateY(18px) scale(0.96); } to{ opacity:1; transform: translateY(0) scale(1); } }
@keyframes locaIconFloat { 0%,100%{ transform: translateY(0); } 50%{ transform: translateY(-4px); } }
@keyframes heroGradient { 0%{background-position:0% 50%} 50%{background-position:100% 50%} 100%{background-position:0% 50%} }
@keyframes titleReveal { from{opacity:0; transform: translateY(16px) scale(0.98); filter: blur(4px);} to{opacity:1; transform: translateY(0) scale(1); filter: blur(0);} }
@keyframes pulse { 0%,100%{transform: scale(1);} 50%{transform: scale(1.04);} }
@keyframes fadeInLeft { from{opacity:0; transform: translateX(-24px);} to{opacity:1; transform: translateX(0);} }
@keyframes fadeInRight { from{opacity:0; transform: translateX(24px);} to{opacity:1; transform: translateX(0);} }
@keyframes fadeInUp { from{opacity:0; transform: translateY(18px);} to{opacity:1; transform: translateY(0);} }
@keyframes fadeInDown { from{opacity:0; transform: translateY(-14px);} to{opacity:1; transform: translateY(0);} }
</style>
<script>
    var data = {!! json_encode($airport) !!};
    // SOP sekarang ke Drive — fallback modal hanya jika file lokal ada
    // LOCA: jika ada file lokal, buka modal; jika kosong, sudah diarahkan ke Drive via card
    $(document).ready(function() {
        $('.btn-loca').on('click', function(event) {
            event.preventDefault();
            var fileName = $(this).data('loca');
            var fileUrl = "{{ asset('storage/airport/loca') }}/" + fileName;
            var card = $(this).find('.loca-card');
            card.css('transform','scale(0.97)');
            setTimeout(function(){ card.css('transform',''); }, 180);
            $('#modal-berkas').find('.modal-title').text($(this).data('name') || fileName);
            $('#modal-berkas').find('embed').attr('src', fileUrl);
            $('#modal-berkas').modal('show');
        });
    });
</script>
@endpush
