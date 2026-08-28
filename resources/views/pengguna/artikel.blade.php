@extends('pengguna.app')
@section('tab', 'Artikel - AirNav Assist')

@section('content')
{{-- Hero: pesawat posisi pas, tidak nabrak header — font premium + eyecatching --}}
<div style="background: linear-gradient(135deg, #2c365e 0%, #49548C 30%, #5d6ab0 60%, #8a9ad6 100%); background-size:200% 200%; animation: heroGradient 10s ease infinite; padding: 2.8rem 0 2.8rem; overflow:hidden; position:relative; margin-top:0;">
    <div style="position:absolute; top:-40px; right:-40px; width:220px; height:220px; background:rgba(255,255,255,0.08); border-radius:50%; animation: pulse 6s ease-in-out infinite;"></div>
    <div style="position:absolute; bottom:-30px; left:10%; width:140px; height:140px; background:rgba(255,255,255,0.06); border-radius:50%; animation: pulse 7s ease-in-out infinite reverse;"></div>
    <div style="position:absolute; top:20%; left:45%; width:80px; height:80px; background:rgba(255,255,255,0.04); border-radius:50%; animation: floatSlow 8s ease-in-out infinite;"></div>
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at 30% 20%, rgba(255,255,255,0.07) 0%, transparent 50%), radial-gradient(ellipse at 80% 80%, rgba(0,0,0,0.08) 0%, transparent 50%); pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="row align-items-center g-4">
            <div class="col-lg-5 order-2 order-lg-1 d-flex justify-content-center justify-content-lg-start" style="padding-top:0.4rem;">
                <div style="position:relative; width:100%; max-width:380px; display:flex; flex-direction:column; align-items:center; animation: fadeInLeft 0.9s cubic-bezier(0.22,1,0.36,1) forwards;">
                    <div style="position:relative; width:100%; display:flex; justify-content:center; align-items:flex-end; filter: drop-shadow(0 18px 26px rgba(0,0,0,0.22)); padding-top:1.4rem; padding-bottom:0.6rem;">
                        <img src="{{ asset('src/img/airplane_pic.png') }}" alt="Pesawat AirNav" style="width:100%; max-width:320px; height:auto; object-fit:contain; display:block; animation: floatPlaneAir 4.5s ease-in-out infinite;">
                        <div style="position:absolute; bottom:2px; left:50%; transform:translateX(-50%); width:58%; height:14px; background: radial-gradient(ellipse at center, rgba(0,0,0,0.22) 0%, transparent 70%); border-radius:50%; animation: shadowPulse 4.5s ease-in-out infinite;"></div>
                    </div>
                    <div style="margin-top:0.9rem; background: rgba(255,255,255,0.96); backdrop-filter: blur(14px); border-radius:1rem; padding:0.75rem 1rem; display:flex; align-items:center; gap:0.75rem; box-shadow: 0 10px 28px rgba(0,0,0,0.14), 0 0 0 1px rgba(255,255,255,0.6) inset; animation: fadeInUp 0.9s ease 0.3s forwards; opacity:0; width:100%; max-width:340px; border:1px solid rgba(255,255,255,0.5);">
                        <div style="width:42px; height:42px; background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); border-radius:0.7rem; display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 12px rgba(73,84,140,0.25);">
                            <img src="{{ asset('src/img/logoAirNav.png') }}" alt="AirNav" style="height:22px; width:auto; object-fit:contain; filter: brightness(0) invert(1);">
                        </div>
                        <div style="flex:1; min-width:0;">
                            <div style="color:#1a1f3d; font-family:'Outfit',sans-serif; font-weight:800; font-size:0.98rem; letter-spacing:-0.02em; line-height:1;">AirNav Assist</div>
                            <small style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.70rem; letter-spacing:0.05em; font-weight:500;">Tanjung Pinang • Batam • Professional Portal</small>
                        </div>
                        <span class="badge eyecatch-badge" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; font-size:0.62rem; border-radius:0.6rem; padding:0.45rem 0.65rem; white-space:nowrap; animation: shimmer 3s ease-in-out infinite; box-shadow:0 2px 8px rgba(73,84,140,0.25);"><i class="fa-solid fa-layer-group me-1"></i> {{ $artikel->total() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 order-1 order-lg-2 text-start text-lg-end">
                <div style="display:flex; flex-direction:column; align-items:flex-start; align-items-lg-end; animation: fadeInRight 0.9s cubic-bezier(0.22,1,0.36,1) forwards; text-align:left;">
                    <span class="badge bg-white mb-3 px-3 py-2 eyecatch-badge" style="color:#49548C !important; border-radius:2rem; font-weight:700; letter-spacing:0.04em; font-size:0.72rem; box-shadow:0 4px 16px rgba(0,0,0,0.12); animation: fadeInDown 0.7s ease 0.15s forwards; opacity:0; border:1px solid rgba(73,84,140,0.08);"><i class="fa-solid fa-sparkles me-1" style="color:#ffb703;"></i> AirNav Insight • Update {{ now()->format('d M Y') }}</span>
                    <h1 class="artikel-hero-title text-white mb-2" style="text-shadow: 0 3px 18px rgba(0,0,0,0.18), 0 1px 0 rgba(255,255,255,0.15); animation: titleReveal 0.9s cubic-bezier(0.22,1,0.36,1) 0.25s forwards; opacity:0; text-align:left;">Selamat Datang!</h1>
                    <h4 class="artikel-hero-sub text-white mb-3" style="opacity:0.97; text-shadow:0 2px 10px rgba(0,0,0,0.12); animation: fadeInUp 0.7s ease 0.38s forwards; opacity:0; text-align:left; max-width:560px;">Temukan Artikel dan Berita Terbaru Di Sini!</h4>
                    <p class="artikel-hero-desc text-white mb-0" style="opacity:0.93; max-width:560px; text-align: justify; animation: fadeInUp 0.7s ease 0.5s forwards; opacity:0; text-shadow:0 1px 6px rgba(0,0,0,0.1);">
                        Media publikasi resmi AirNav Indonesia yang menyajikan informasi terkurasi mengenai kebijakan, teknologi CNS/ATM, keselamatan penerbangan, dan inovasi layanan navigasi untuk mendukung profesionalisme dan keselamatan operasional penerbangan nasional.
                    </p>
                    <div class="d-flex flex-wrap gap-2 mt-3 justify-content-start justify-content-lg-end" style="animation: fadeInUp 0.7s ease 0.62s forwards; opacity:0;">
                        <span class="badge rounded-pill px-3 py-2 eyecatch-badge" style="background:rgba(255,255,255,0.16); color:white; border:1px solid rgba(255,255,255,0.28); backdrop-filter:blur(8px); font-size:0.72rem; transition: all 0.3s; cursor:default;" onmouseover="this.style.background='rgba(255,255,255,0.24)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(255,255,255,0.16)'; this.style.transform='none'"><i class="fa-solid fa-microchip me-1"></i> Teknologi</span>
                        <span class="badge rounded-pill px-3 py-2 eyecatch-badge" style="background:rgba(255,255,255,0.16); color:white; border:1px solid rgba(255,255,255,0.28); backdrop-filter:blur(8px); font-size:0.72rem; transition: all 0.3s; cursor:default;" onmouseover="this.style.background='rgba(255,255,255,0.24)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(255,255,255,0.16)'; this.style.transform='none'"><i class="fa-solid fa-shield-halved me-1"></i> Safety</span>
                        <span class="badge rounded-pill px-3 py-2 eyecatch-badge" style="background:rgba(255,255,255,0.16); color:white; border:1px solid rgba(255,255,255,0.28); backdrop-filter:blur(8px); font-size:0.72rem; transition: all 0.3s; cursor:default;" onmouseover="this.style.background='rgba(255,255,255,0.24)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(255,255,255,0.16)'; this.style.transform='none'"><i class="fa-solid fa-leaf me-1"></i> Green Aviation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Content area: soft AirNav themed background, tidak nabrak — tetap elegan --}}
<div style="background: linear-gradient(180deg, #eef0ff 0%, #f0f2ff 22%, #f5f7ff 48%, #fcfdff 85%, #ffffff 100%); padding: 1.9rem 0 2.6rem; position:relative; overflow:hidden; margin-top:0;">
    {{-- Dekor halus tema AirNav — tidak nabrak --}}
    <div style="position:absolute; top:-80px; right:-60px; width:420px; height:420px; background: radial-gradient(circle, rgba(73,84,140,0.07) 0%, rgba(138,154,214,0.05) 35%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:10%; left:-80px; width:360px; height:360px; background: radial-gradient(circle, rgba(138,154,214,0.06) 0%, transparent 65%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; inset:0; opacity:0.28; background-image: radial-gradient(circle, rgba(73,84,140,0.06) 1px, transparent 1px); background-size: 26px 26px; pointer-events:none;"></div>
    <div class="container" style="position:relative;">
    {{-- Featured: eyecatching — font premium --}}
    @if($featured && !request()->filled('q') && !request()->filled('kategori'))
    @php $featMap = ['Kerja Sama'=>['#49548C','#8a9ad6'],'Operasional'=>['#0d6efd','#5ab0ff'],'Cuaca & Safety'=>['#dc3545','#ff8a8a'],'Teknologi'=>['#6f42c1','#b18cff'],'Green Aviation'=>['#198754','#4ade80'],'Safety Global'=>['#fd7e14','#ffb86b'],'SDM & Budaya'=>['#d63384','#ff8fab'],'Digital'=>['#20c997','#6ee7b7']]; $fc=$featMap[$featured->kategori]??['#49548C','#8a9ad6']; @endphp
    <div class="card border-0 shadow mb-4 overflow-hidden reveal" style="border-radius:1.4rem; border:1px solid rgba(73,84,140,0.08) !important; background:white;">
        <div class="row g-0">
            <div class="col-md-5" style="background: linear-gradient(135deg, {{ $fc[0] }} 0%, {{ $fc[1] }} 100%); min-height:260px; display:flex; align-items:center; justify-content:center; position:relative; overflow:hidden;">
                <div style="position:absolute; inset:0; background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.18) 0%, transparent 55%), radial-gradient(circle at 80% 80%, rgba(0,0,0,0.08) 0%, transparent 50%);"></div>
                <div style="position:absolute; top:-20px; right:-20px; width:120px; height:120px; background:rgba(255,255,255,0.08); border-radius:50%; animation: floatSlow 6s ease-in-out infinite;"></div>
                <i class="fa-solid fa-crown" style="font-size:4.8rem; color:white; opacity:0.16; animation: crownFloat 3.5s ease-in-out infinite; position:relative; filter: drop-shadow(0 6px 16px rgba(0,0,0,0.15));"></i>
                <span class="badge bg-white position-absolute top-0 start-0 m-3 shadow-sm eyecatch-badge" style="color:{{ $fc[0] }} !important; animation: shimmer 2.5s ease-in-out infinite; border-radius:2rem; padding:0.55rem 0.9rem; font-size:0.68rem; letter-spacing:0.04em;"><i class="fa-solid fa-star me-1" style="color:#ffb703;"></i> Featured</span>
                <span class="badge position-absolute bottom-0 start-0 m-3 eyecatch-badge" style="background:rgba(255,255,255,0.22); color:white; border:1px solid rgba(255,255,255,0.35); backdrop-filter:blur(6px); border-radius:2rem; padding:0.45rem 0.85rem; font-size:0.68rem;">{{ $featured->kategori }}</span>
            </div>
            <div class="col-md-7" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9ff 100%);">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span style="width:30px; height:30px; background: linear-gradient(135deg, {{ $fc[0] }} 0%, {{ $fc[1] }} 100%); border-radius:0.6rem; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 10px rgba(0,0,0,0.12);"><i class="fa-solid fa-wand-magic-sparkles text-white" style="font-size:0.72rem;"></i></span>
                        <small class="artikel-meta" style="color:{{ $fc[0] }};">EDITOR'S PICK • RANGKUMAN</small>
                        <small class="text-muted ms-auto" style="font-family:'Instrument Sans',sans-serif; font-size:0.76rem;"><i class="fa-regular fa-calendar me-1"></i> {{ $featured->created_at->format('d M Y') }}</small>
                    </div>
                    <h5 class="mt-1" style="color:#1a1f3d; font-family:'Outfit',sans-serif; font-weight:800; letter-spacing:-0.025em; line-height:1.28; font-size:1.22rem;">{{ $featured->judul }}</h5>
                    <p class="artikel-desc mt-2 mb-2" style="text-align:left;">{{ $featured->deskripsi }}</p>
                    <small class="d-block mb-3 artikel-meta" style="color:{{ $fc[0] }}; text-transform:none; letter-spacing:0.02em; font-weight:600;"><i class="fa-solid fa-link me-1"></i> {{ $featured->sumber }}</small>
                    <a href="{{ route('beranda.detailArtikel',['id'=>$featured->id]) }}" class="btn btn-sm px-4 fw-semibold" style="background: linear-gradient(135deg, {{ $fc[0] }} 0%, {{ $fc[1] }} 100%); color:white; border-radius:2rem; border:none; transition: all 0.3s; box-shadow:0 4px 14px rgba(73,84,140,0.22); font-family:'Outfit',sans-serif; letter-spacing:0.02em;" onmouseover="this.style.transform='translateY(-2px) scale(1.02)'; this.style.boxShadow='0 10px 24px rgba(73,84,140,0.32)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 14px rgba(73,84,140,0.22)'">Baca Rangkuman <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    @if($featured->sumber_url)<a href="{{ $featured->sumber_url }}" target="_blank" class="btn btn-sm btn-outline-secondary ms-2" style="border-radius:2rem; border-color:#dbe0ff; font-family:'Instrument Sans',sans-serif; font-weight:600;"><i class="fa-solid fa-external-link me-1"></i> Sumber Asli</a>@endif
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Search & Filter: eyecatching — font premium --}}
    <div class="card border-0 shadow-sm mb-4 reveal reveal-delay-1" style="border-radius:1.2rem; background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%); border:1px solid #e8ecff; position:relative; overflow:hidden;">
        <div style="position:absolute; top:0; left:0; width:100%; height:3px; background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166, #06d6a0, #49548C); background-size:300% 100%; animation: footerGradientShift 4s ease infinite;"></div>
        <div class="card-body p-3 pt-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <div style="width:34px; height:34px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.7rem; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 12px rgba(73,84,140,0.18);"><i class="fa-solid fa-sliders text-white" style="font-size:0.78rem;"></i></div>
                <span style="color:#1a1f3d; font-family:'Outfit',sans-serif; font-weight:800; letter-spacing:-0.02em; font-size:1rem;">Cari & Filter Artikel</span>
                <span class="badge ms-auto eyecatch-badge" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-size:0.66rem; padding:0.45rem 0.7rem; border:1px solid #dbe0ff;">{{ $artikel->total() }} artikel</span>
            </div>
            <form method="GET" action="{{ route('beranda.artikel') }}" class="row g-2 align-items-end">
                <div class="col-md-5">
                    <label class="small mb-1" style="color:#49548C; font-family:'Instrument Sans',sans-serif; font-weight:700; letter-spacing:0.02em; font-size:0.78rem;"><i class="fa-solid fa-magnifying-glass me-1"></i> Cari Artikel</label>
                    <div style="position:relative;">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul, deskripsi, kategori..." class="form-control" style="border-radius:0.8rem; border-color:#dbe0ff; padding-left:2.2rem; transition: all 0.3s; background:#f8f9ff; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.88rem;" onfocus="this.style.borderColor='#49548C'; this.style.background='white'; this.style.boxShadow='0 0 0 3px rgba(73,84,140,0.10)'" onblur="this.style.borderColor='#dbe0ff'; this.style.background='#f8f9ff'; this.style.boxShadow='none'">
                        <i class="fa-solid fa-search" style="position:absolute; left:0.8rem; top:50%; transform:translateY(-50%); color:#8a9ad6; font-size:0.8rem;"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="small mb-1" style="color:#49548C; font-family:'Instrument Sans',sans-serif; font-weight:700; letter-spacing:0.02em; font-size:0.78rem;"><i class="fa-solid fa-filter me-1"></i> Kategori</label>
                    <select name="kategori" class="form-select" style="border-radius:0.8rem; border-color:#dbe0ff; background:#f8f9ff; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.88rem;">
                        <option value="Semua" {{ request('kategori')=='Semua' || !request('kategori') ? 'selected':'' }}>Semua Kategori</option>
                        @foreach($kategoris as $kat)
                            <option value="{{ $kat }}" {{ request('kategori')==$kat ? 'selected':'' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn flex-grow-1 fw-semibold" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:0.8rem; border:none; transition: all 0.3s; box-shadow:0 4px 12px rgba(73,84,140,0.2); font-family:'Outfit',sans-serif; letter-spacing:0.02em;" onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(73,84,140,0.3)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 12px rgba(73,84,140,0.2)'"><i class="fa-solid fa-search me-1"></i> Cari</button>
                    <a href="{{ route('beranda.artikel') }}" class="btn btn-outline-secondary" style="border-radius:0.8rem; border-color:#49548C; color:#49548C; transition: all 0.3s; background:white; font-family:'Outfit',sans-serif; font-weight:600;" onmouseover="this.style.background='#49548C'; this.style.color='white'" onmouseout="this.style.background='white'; this.style.color='#49548C'">Reset</a>
                </div>
            </form>
            @if(request()->filled('q') || request()->filled('kategori'))
                <div class="mt-3 p-2 rounded-3" style="background:#e8ecff; border:1px solid #dbe0ff;">
                    <small style="color:#49548C; font-family:'Instrument Sans',sans-serif;"><i class="fa-solid fa-circle-info me-1"></i> Menampilkan {{ $artikel->total() }} hasil
                    @if(request('q')) untuk "<strong>{{ request('q') }}</strong>" @endif
                    @if(request('kategori') && request('kategori')!='Semua') kategori "<strong>{{ request('kategori') }}</strong>" @endif
                    </small>
                </div>
            @endif
        </div>
    </div>

    {{-- Header Artikel Terbaru: eyecatching — font premium --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-3 reveal reveal-delay-2" style="background: linear-gradient(135deg, #1a1f3d 0%, #2c365e 40%, #49548C 75%, #6a7ab8 100%); border-radius:1.2rem; color:white; position:relative; overflow:hidden; box-shadow:0 10px 28px rgba(26,31,61,0.22);">
        <div style="position:absolute; top:0; left:-100%; width:100%; height:100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.08), transparent); animation: shimmerLine 3s ease-in-out infinite;"></div>
        <div style="position:absolute; top:-20px; right:10%; width:80px; height:80px; background:rgba(255,255,255,0.04); border-radius:50%;"></div>
        <div class="d-flex align-items-center gap-3" style="position:relative;">
            <div style="width:46px; height:46px; background: linear-gradient(135deg, #ffd166 0%, #ffb703 100%); border-radius:0.9rem; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 14px rgba(255,209,102,0.35); animation: pulse 2s ease-in-out infinite;">
                <i class="fa-solid fa-wand-magic-sparkles" style="color:#1a1f3d; font-size:1.05rem;"></i>
            </div>
            <div>
                <h5 class="fw-bold mb-0 text-white" style="font-family:'Space Grotesk',sans-serif; letter-spacing:-0.02em; font-size:1.05rem;">Artikel Terbaru</h5>
                <small style="opacity:0.85; font-family:'Instrument Sans',sans-serif; font-size:0.78rem; letter-spacing:0.02em;">{{ $artikel->total() }} artikel • {{ $kategoris->count() }} kategori • Update {{ now()->format('d M Y') }}</small>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2 mt-2 mt-md-0" style="position:relative;">
            <small class="d-none d-md-inline" style="opacity:0.72; font-family:'Instrument Sans',sans-serif; font-size:0.74rem;">Klik untuk rangkuman</small>
        </div>
    </div>

    {{-- Category pills: tema AirNav — font premium --}}
    <div class="d-flex flex-wrap gap-2 mb-3 reveal reveal-delay-2">
        <a href="{{ route('beranda.artikel', array_filter(['q'=>request('q')])) }}" class="badge rounded-pill px-3 py-2 text-decoration-none {{ !request('kategori') || request('kategori')=='Semua' ? 'text-white' : 'bg-white border' }}" style="{{ !request('kategori') || request('kategori')=='Semua' ? 'background:#49548C; border:1px solid #49548C;' : 'color:#49548C !important; border-color:#dbe0ff !important;' }} transition: all 0.3s; font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:0.02em; font-size:0.78rem;">Semua</a>
        @foreach($kategoris as $kat)
            <a href="{{ route('beranda.artikel', array_filter(['kategori'=>$kat, 'q'=>request('q')])) }}" class="badge rounded-pill px-3 py-2 text-decoration-none {{ request('kategori')==$kat ? 'text-white' : 'bg-white border' }}" style="{{ request('kategori')==$kat ? 'background:#49548C; border:1px solid #49548C;' : 'color:#49548C !important; border-color:#dbe0ff !important;' }} transition: all 0.3s; font-family:'Outfit',sans-serif; font-weight:600; letter-spacing:0.02em; font-size:0.78rem;">{{ $kat }}</a>
        @endforeach
    </div>

    {{-- Grid eyecatching dengan icon menarik --}}
    @if($artikel->count() === 0)
        <div class="alert alert-info" style="border-radius:1rem;"><i class="fa-solid fa-inbox me-2"></i> Tidak ada artikel ditemukan. Coba kata kunci lain atau reset filter.</div>
    @else
    <div class="row g-4">
        @foreach ($artikel as $item)
        @php
            $map = [
                'Kerja Sama'=>['fa-handshake-angle','#49548C','#8a9ad6','Dalam Negeri'],
                'Operasional'=>['fa-plane-circle-check','#0d6efd','#5ab0ff','Dalam Negeri'],
                'Cuaca & Safety'=>['fa-cloud-bolt','#e63946','#ff8a8a','Dalam Negeri'],
                'Teknologi'=>['fa-satellite-dish','#6f42c1','#b18cff','Dalam Negeri'],
                'Green Aviation'=>['fa-leaf','#198754','#4ade80','Global'],
                'Safety Global'=>['fa-shield-halved','#fd7e14','#ffb86b','Global'],
                'SDM & Budaya'=>['fa-users-viewfinder','#d63384','#ff8fab','Global'],
                'Digital'=>['fa-book-open-reader','#20c997','#6ee7b7','Dalam Negeri'],
            ];
            $icon = $map[$item->kategori][0] ?? 'fa-newspaper';
            $color = $map[$item->kategori][1] ?? '#49548C';
            $color2 = $map[$item->kategori][2] ?? '#8a9ad6';
            $isLuar = str_contains($item->sumber, 'ICAO') || $item->kategori==='Safety Global' || $item->kategori==='SDM & Budaya';
        @endphp
        <div class="col-12 col-md-6 col-lg-4 reveal" style="transition-delay: {{ 0.06 * $loop->index }}s;">
            <div class="card h-100 border-0 overflow-hidden artikel-card" style="border-radius:1.2rem; border:1px solid #eef0ff !important; transition: all 0.45s cubic-bezier(0.22,1,0.36,1); position:relative; background:white;">
                {{-- Top accent line eyecatching --}}
                <div style="height:4px; background: linear-gradient(90deg, {{ $color }}, {{ $color2 }}, {{ $color }}); background-size:200% 100%; animation: navGradientShift 4s ease infinite;"></div>
                {{-- Header gradient eyecatching --}}
                <div style="height:176px; background: linear-gradient(135deg, {{ $color }} 0%, {{ $color2 }} 100%); position:relative; overflow:hidden;">
                    {{-- Pattern dots --}}
                    <div style="position:absolute; inset:0; opacity:0.08; background-image: radial-gradient(circle, white 1.5px, transparent 1.5px); background-size:18px 18px;"></div>
                    <div style="position:absolute; top:-30px; right:-30px; width:100px; height:100px; background:rgba(255,255,255,0.12); border-radius:50%;"></div>
                    <div style="position:absolute; bottom:-20px; left:-10px; width:80px; height:80px; background:rgba(0,0,0,0.06); border-radius:50%;"></div>
                    {{-- Icon circle eyecatching --}}
                    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); width:84px; height:84px; background:rgba(255,255,255,0.18); backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.3); border-radius:50%; display:flex; align-items:center; justify-content:center; box-shadow:0 8px 24px rgba(0,0,0,0.12); animation: cardIconFloat 4.5s ease-in-out infinite;">
                        <i class="fa-solid {{ $icon }}" style="font-size:2rem; color:white; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.15));"></i>
                    </div>
                    {{-- Badges: kiri-kanan imbang — kategori kiri, Dalam/Luar Negeri kanan --}}
                    <div class="position-absolute top-0 start-0 end-0 m-3 d-flex justify-content-between align-items-start gap-2">
                        <span class="badge bg-white px-2 py-2 small shadow-sm" style="color:{{ $color }} !important; border-radius:2rem; font-weight:700;"><i class="fa-solid {{ $icon }} me-1"></i> {{ $item->kategori }}</span>
                        @if($isLuar)
                            <span class="badge px-2 py-2 small" style="background:rgba(0,0,0,0.22); color:white; border:1px solid rgba(255,255,255,0.3); backdrop-filter:blur(6px); border-radius:2rem;"><i class="fa-solid fa-globe me-1"></i> Luar Negeri</span>
                        @else
                            <span class="badge px-2 py-2 small" style="background:rgba(255,255,255,0.2); color:white; border:1px solid rgba(255,255,255,0.3); backdrop-filter:blur(6px); border-radius:2rem;"><i class="fa-solid fa-flag me-1"></i> Dalam Negeri</span>
                        @endif
                    </div>
                    <div class="position-absolute bottom-0 start-0 end-0 p-3 d-flex justify-content-between align-items-end">
                        <small class="text-white px-2 py-1 rounded-pill" style="background:rgba(0,0,0,0.18); backdrop-filter:blur(6px); border:1px solid rgba(255,255,255,0.2); font-size:0.7rem;"><i class="fa-regular fa-calendar me-1"></i> {{ $item->created_at->format('d M Y') }}</small>
                        <small class="text-white px-2 py-1 rounded-pill" style="background:rgba(255,255,255,0.2); backdrop-filter:blur(6px); border:1px solid rgba(255,255,255,0.25); font-size:0.7rem;"><i class="fa-regular fa-clock me-1"></i> {{ $item->menitBaca ?? 3 }} min • Rangkuman</small>
                    </div>
                </div>
                <div class="card-body d-flex flex-column p-3">
                    <h6 class="card-title artikel-title mb-2" style="color:#1a1f3d; min-height:2.6em; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ $item->judul }}</h6>
                    <p class="card-text artikel-desc flex-grow-1" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; text-align:left;">{{ $item->deskripsi }}</p>
                    <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded-3" style="background:#f8f9ff; border:1px solid #eef0ff;">
                        <div style="width:28px; height:28px; background: linear-gradient(135deg, {{ $color }}, {{ $color2 }}); border-radius:0.5rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-link text-white" style="font-size:0.65rem;"></i></div>
                        <div style="flex:1; min-width:0;">
                            <small class="d-block fw-semibold" style="color:#1a1f3d; font-size:0.7rem; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $item->sumber }}</small>
                            <small class="text-muted" style="font-size:0.65rem;">Rangkuman • Lengkap di sumber asli</small>
                        </div>
                        <i class="fa-solid fa-arrow-up-right-from-square" style="color:{{ $color }}; font-size:0.7rem; opacity:0.7;"></i>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('beranda.detailArtikel', ['id' => $item->id]) }}" class="btn btn-sm flex-grow-1 fw-semibold" style="background: linear-gradient(135deg, {{ $color }} 0%, {{ $color2 }} 100%); color:white; border-radius:2rem; border:none; transition: all 0.3s; box-shadow:0 4px 12px rgba(0,0,0,0.1); font-size:0.82rem;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">Baca Rangkuman <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        @if($item->sumber_url)<a href="{{ $item->sumber_url }}" target="_blank" class="btn btn-sm" style="background:white; border:1px solid #dbe0ff; color:{{ $color }}; border-radius:2rem; width:38px; height:32px; display:flex; align-items:center; justify-content:center; transition: all 0.3s; flex-shrink:0;" title="Buka sumber asli" onmouseover="this.style.background='{{ $color }}'; this.style.color='white'; this.style.borderColor='{{ $color }}'" onmouseout="this.style.background='white'; this.style.color='{{ $color }}'; this.style.borderColor='#dbe0ff'"><i class="fa-solid fa-external-link" style="font-size:0.75rem;"></i></a>@endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination: tema AirNav --}}
    <div class="d-flex justify-content-center mt-4 reveal">
        {{ $artikel->links('pagination::bootstrap-5') }}
    </div>
    <div class="text-center reveal" style="color:#49548C; font-family:'Instrument Sans',sans-serif; font-size:0.82rem; letter-spacing:0.02em;">Menampilkan {{ $artikel->firstItem() }}–{{ $artikel->lastItem() }} dari {{ $artikel->total() }} artikel • Rangkuman, lengkap di sumber asli</div>
    @endif
    </div>
</div>

@push('scripts')
<style>
.artikel-card { will-change: transform; }
.artikel-card:hover { transform: translateY(-10px) scale(1.015); box-shadow: 0 18px 44px rgba(73,84,140,0.20) !important; }
.artikel-card:hover .cardIconFloat { transform: scale(1.06); }
.pagination .page-link { color:#49548C; border-color:#dbe0ff; transition: all 0.2s; font-family:'Instrument Sans',sans-serif; font-weight:600; }
.pagination .page-item.active .page-link { background:#49548C; border-color:#49548C; }
.pagination .page-link:hover { background:#e8ecff; color:#49548C; transform: translateY(-1px); }
@keyframes heroGradient { 0%{background-position:0% 50%} 50%{background-position:100% 50%} 100%{background-position:0% 50%} }
@keyframes titleReveal { from{opacity:0; transform: translateY(16px) scale(0.98); filter: blur(4px);} to{opacity:1; transform: translateY(0) scale(1); filter: blur(0);} }
@keyframes crownFloat { 0%,100%{transform: translateY(0px) rotate(-1deg);} 50%{transform: translateY(-8px) rotate(1deg);} }
@keyframes cardIconFloat { 0%,100%{transform: translate(-50%,-50%) translateY(0px);} 50%{transform: translate(-50%,-50%) translateY(-7px);} }
@keyframes floatPlane { 0%,100% { transform: translate(-50%, -50%) translateY(0px); } 50% { transform: translate(-50%, -50%) translateY(-8px); } }
@keyframes floatPlaneAir { 0%,100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
@keyframes floatSlow { 0%,100% { transform: translateY(0px) translateX(0px); } 50% { transform: translateY(-15px) translateX(5px); } }
@keyframes shadowPulse { 0%,100% { transform: translateX(-50%) scale(1); opacity:0.25; } 50% { transform: translateX(-50%) scale(0.85); opacity:0.15; } }
@keyframes fadeInLeft { from { opacity:0; transform: translateX(-30px); } to { opacity:1; transform: translateX(0); } }
@keyframes fadeInRight { from { opacity:0; transform: translateX(30px); } to { opacity:1; transform: translateX(0); } }
@keyframes fadeInUp { from { opacity:0; transform: translateY(20px); } to { opacity:1; transform: translateY(0); } }
@keyframes fadeInDown { from { opacity:0; transform: translateY(-15px); } to { opacity:1; transform: translateY(0); } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes pulse { 0%,100% { transform: scale(1); opacity:1; } 50% { transform: scale(1.05); opacity:0.9; } }
@keyframes shimmer { 0%,100% { opacity:1; } 50% { opacity:0.85; } }
@keyframes shimmerLine { 0% { left:-100%; } 100% { left:100%; } }
@media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration:0.01ms !important; transition-duration:0.01ms !important; } .reveal{opacity:1; transform:none;} }
</style>
@endpush
@endsection
