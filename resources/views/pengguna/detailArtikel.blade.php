@extends('pengguna.app')
@section('tab', $artikel->judul ?? 'Artikel')

@section('content')
@php
$map = [
    'Kerja Sama'=>['fa-handshake-angle','#49548C','#8a9ad6'],
    'Operasional'=>['fa-plane-circle-check','#0d6efd','#5ab0ff'],
    'Cuaca & Safety'=>['fa-cloud-bolt','#e63946','#ff8a8a'],
    'Teknologi'=>['fa-satellite-dish','#6f42c1','#b18cff'],
    'Green Aviation'=>['fa-leaf','#198754','#4ade80'],
    'Safety Global'=>['fa-shield-halved','#fd7e14','#ffb86b'],
    'SDM & Budaya'=>['fa-users-viewfinder','#d63384','#ff8fab'],
    'Digital'=>['fa-book-open-reader','#20c997','#6ee7b7'],
];
$icon = $map[$artikel->kategori][0] ?? 'fa-newspaper';
$color = $map[$artikel->kategori][1] ?? '#49548C';
$color2 = $map[$artikel->kategori][2] ?? '#8a9ad6';
$isLuar = str_contains($artikel->sumber, 'ICAO');
@endphp

{{-- Hero eyecatching — font premium --}}
<div style="background: linear-gradient(135deg, {{ $color }} 0%, {{ $color2 }} 100%); padding:2.8rem 0 2rem; position:relative; overflow:hidden;">
    <div style="position:absolute; top:-40px; right:-40px; width:200px; height:200px; background:rgba(255,255,255,0.08); border-radius:50%; animation: pulse 6s ease-in-out infinite;"></div>
    <div style="position:absolute; bottom:-30px; left:8%; width:140px; height:140px; background:rgba(255,255,255,0.06); border-radius:50%; animation: pulse 7s ease-in-out infinite reverse;"></div>
    <div style="position:absolute; inset:0; opacity:0.06; background-image: radial-gradient(circle, white 1.5px, transparent 1.5px); background-size:20px 20px;"></div>
    <div class="container" style="position:relative;">
        <div class="d-flex flex-wrap gap-2 mb-3" style="animation: fadeInDown 0.6s ease forwards;">
            <a href="{{ route('beranda.artikel') }}" class="btn btn-sm bg-white fw-semibold" style="color:{{ $color }}; border-radius:2rem; box-shadow:0 4px 12px rgba(0,0,0,0.12); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Artikel</a>
            <span class="badge bg-white px-3 py-2" style="color:{{ $color }} !important; border-radius:2rem; font-weight:700;"><i class="fa-solid {{ $icon }} me-1"></i> {{ $artikel->kategori }}</span>
            @if($isLuar)
                <span class="badge px-3 py-2" style="background:rgba(0,0,0,0.2); color:white; border:1px solid rgba(255,255,255,0.3); backdrop-filter:blur(6px); border-radius:2rem;"><i class="fa-solid fa-globe me-1"></i> Luar Negeri • ICAO</span>
            @else
                <span class="badge px-3 py-2" style="background:rgba(255,255,255,0.2); color:white; border:1px solid rgba(255,255,255,0.3); backdrop-filter:blur(6px); border-radius:2rem;"><i class="fa-solid fa-flag me-1"></i> Dalam Negeri • AirNav</span>
            @endif
        </div>
        <div style="display:flex; gap:1.2rem; align-items:flex-start; animation: fadeInUp 0.7s ease 0.15s forwards; opacity:0;">
            <div style="width:64px; height:64px; background:rgba(255,255,255,0.18); backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.3); border-radius:1rem; display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 8px 24px rgba(0,0,0,0.12); animation: floatPlane 5s ease-in-out infinite;">
                <i class="fa-solid {{ $icon }}" style="font-size:1.7rem; color:white;"></i>
            </div>
            <div style="flex:1; min-width:0;">
                <h2 class="text-white fw-bold mb-2" style="font-family:'Outfit',sans-serif; line-height:1.25; text-shadow:0 2px 12px rgba(0,0,0,0.15); font-size:1.65rem;">{{ $artikel->judul }}</h2>
                <div class="d-flex flex-wrap gap-2 align-items-center text-white" style="opacity:0.92;">
                    <small style="background:rgba(0,0,0,0.15); padding:0.25rem 0.6rem; border-radius:2rem; backdrop-filter:blur(4px);"><i class="fa-regular fa-calendar me-1"></i> {{ $artikel->created_at->format('d M Y') }}</small>
                    <small style="background:rgba(255,255,255,0.15); padding:0.25rem 0.6rem; border-radius:2rem; backdrop-filter:blur(4px);"><i class="fa-regular fa-clock me-1"></i> {{ $menitBaca ?? 4 }} min • Rangkuman</small>
                    <small style="background:rgba(255,255,255,0.15); padding:0.25rem 0.6rem; border-radius:2rem; backdrop-filter:blur(4px);"><i class="fa-solid fa-tag me-1"></i> {{ $artikel->sumber }}</small>
                </div>
            </div>
        </div>
        @if($artikel->sumber_url)
            <a href="{{ $artikel->sumber_url }}" target="_blank" class="btn btn-sm mt-3 fw-semibold" style="background:rgba(255,255,255,0.18); color:white; border:1px solid rgba(255,255,255,0.3); backdrop-filter:blur(6px); border-radius:2rem; animation: fadeInUp 0.6s ease 0.3s forwards; opacity:0; transition: all 0.3s;" onmouseover="this.style.background='white'; this.style.color='{{ $color }}'" onmouseout="this.style.background='rgba(255,255,255,0.18)'; this.style.color='white'"><i class="fa-solid fa-external-link me-1"></i> Lihat Sumber Asli — Lengkap</a>
        @endif
    </div>
</div>

{{-- Content area: soft AirNav themed — tidak nabrak, selaras dengan artikel list --}}
<div style="background: linear-gradient(180deg, #eef0ff 0%, #f0f2ff 22%, #f5f7ff 48%, #fcfdff 85%, #ffffff 100%); padding: 1.8rem 0 2.6rem; position:relative; overflow:hidden;">
    <div style="position:absolute; top:-60px; right:-40px; width:380px; height:380px; background: radial-gradient(circle, rgba(73,84,140,0.06) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:8%; left:-60px; width:320px; height:320px; background: radial-gradient(circle, rgba(138,154,214,0.05) 0%, transparent 65%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; inset:0; opacity:0.22; background-image: radial-gradient(circle, rgba(73,84,140,0.05) 1px, transparent 1px); background-size:26px 26px; pointer-events:none;"></div>
    <div class="container" style="position:relative;">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm reveal" style="border-radius:1.2rem; overflow:hidden; background:white;">
                {{-- Banner icon eyecatching --}}
                <div style="height:180px; background: linear-gradient(135deg, {{ $color }} 0%, {{ $color2 }} 100%); position:relative; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                    <div style="position:absolute; inset:0; opacity:0.07; background-image: radial-gradient(circle, white 1.5px, transparent 1.5px); background-size:18px 18px;"></div>
                    <div style="position:absolute; top:-20px; right:-20px; width:100px; height:100px; background:rgba(255,255,255,0.1); border-radius:50%;"></div>
                    <div style="width:88px; height:88px; background:rgba(255,255,255,0.18); backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.3); border-radius:50%; display:flex; align-items:center; justify-content:center; box-shadow:0 8px 24px rgba(0,0,0,0.12); position:relative; animation: floatPlane 5s ease-in-out infinite;">
                        <i class="fa-solid {{ $icon }}" style="font-size:2.2rem; color:white;"></i>
                    </div>
                    <div class="position-absolute bottom-0 start-0 m-3 d-flex gap-2">
                        <span class="badge bg-white shadow-sm" style="color:{{ $color }} !important; border-radius:2rem; padding:0.45rem 0.8rem; font-weight:700;"><i class="fa-solid {{ $icon }} me-1"></i> {{ $artikel->kategori }}</span>
                        <span class="badge" style="background:rgba(0,0,0,0.18); color:white; border:1px solid rgba(255,255,255,0.25); backdrop-filter:blur(6px); border-radius:2rem; padding:0.45rem 0.8rem;">AirNav Indonesia • Tanjung Pinang</span>
                    </div>
                </div>
                <div class="card-body p-4 p-md-5">
                    <div style="background: linear-gradient(135deg, #f0f2ff 0%, #ffffff 100%); border:1px solid #dbe0ff; border-left:4px solid {{ $color }}; border-radius:0.9rem; padding:1rem 1.2rem; margin-bottom:1.5rem; box-shadow:0 4px 14px rgba(73,84,140,0.06);">
                        <small class="artikel-meta" style="color:{{ $color }}; font-size:0.68rem;"><i class="fa-solid fa-quote-left me-1"></i> RINGKASAN</small>
                        <p class="mb-0 mt-1" style="color:#1a1f3d; font-family:'Instrument Sans','Plus Jakarta Sans',sans-serif; font-size:1.02rem; line-height:1.7; font-weight:600; letter-spacing:-0.01em;">{{ $artikel->deskripsi }}</p>
                    </div>
                    <div class="artikel-content" style="line-height:1.85; color:#212529; font-family:'Plus Jakarta Sans','Instrument Sans',sans-serif; font-size:0.94rem;">
                        {!! $content !!}
                    </div>
                    <div class="mt-4 p-3 rounded-3" style="background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%); border:1px solid #e8ecff; border-radius:1rem; animation: fadeIn 0.6s ease 0.4s forwards; opacity:0;">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div style="width:32px; height:32px; background: linear-gradient(135deg, {{ $color }}, {{ $color2 }}); border-radius:0.6rem; display:flex; align-items:center; justify-content:center;"><i class="fa-solid fa-link text-white" style="font-size:0.7rem;"></i></div>
                            <span class="fw-bold" style="color:#1a1f3d; font-family:'Outfit',sans-serif; font-size:0.9rem;">Sumber & Referensi</span>
                            <span class="badge ms-auto" style="background:#e8ecff; color:{{ $color }}; border-radius:2rem; font-size:0.6rem;">Rangkuman</span>
                        </div>
                        <small style="color:#495057; font-weight:600;">{{ $artikel->sumber }}</small>
                        @if($artikel->sumber_url)
                            <br><a href="{{ $artikel->sumber_url }}" target="_blank" class="small" style="color:{{ $color }}; word-break:break-all; font-weight:600;">{{ $artikel->sumber_url }} <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size:0.65rem;"></i></a>
                        @endif
                        <div class="small mt-2 p-2 rounded-3" style="background:#fff3cd; border:1px solid #ffe69c; color:#664d03; font-size:0.78rem;"><i class="fa-solid fa-circle-info me-1"></i> Ini adalah <strong>rangkuman edukatif</strong> — untuk informasi lengkap, silakan kunjungi sumber asli melalui tombol di atas.</div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <span class="badge" style="background: linear-gradient(135deg, {{ $color }}, {{ $color2 }}); color:white; border-radius:2rem; padding:0.45rem 0.8rem;"><i class="fa-solid fa-hashtag me-1"></i>AirNav</span>
                        <span class="badge" style="background:#e8ecff; color:{{ $color }}; border-radius:2rem; padding:0.45rem 0.8rem;">#{{ str_replace(' ','',$artikel->kategori) }}</span>
                        <span class="badge" style="background:#e8ecff; color:{{ $color }}; border-radius:2rem; padding:0.45rem 0.8rem;">#Penerbangan</span>
                        <span class="badge" style="background:#e8ecff; color:{{ $color }}; border-radius:2rem; padding:0.45rem 0.8rem;">#{{ $isLuar ? 'Global' : 'Nasional' }}</span>
                    </div>
                    <div class="d-flex flex-wrap gap-2 justify-content-center mt-4">
                        <a href="{{ route('beranda.artikel') }}" class="btn px-4 fw-semibold" style="background: linear-gradient(135deg, {{ $color }}, {{ $color2 }}); color:white; border-radius:2rem; border:none; box-shadow:0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</a>
                        <a href="{{ route('beranda.index') }}" class="btn btn-outline-secondary px-4" style="border-radius:2rem; border-color:#dbe0ff;">Beranda</a>
                        <button onclick="navigator.share ? navigator.share({title: document.title, url: location.href}) : navigator.clipboard.writeText(location.href).then(()=>alert('Link disalin!'))" class="btn px-4" style="background:white; border:1px solid #dbe0ff; color:{{ $color }}; border-radius:2rem; font-weight:600; transition: all 0.3s;" onmouseover="this.style.background='{{ $color }}'; this.style.color='white'" onmouseout="this.style.background='white'; this.style.color='{{ $color }}'"><i class="fa-solid fa-share-nodes me-1"></i> Bagikan</button>
                    </div>
                    @if($artikel->sumber_url)
                    <div class="text-center mt-3">
                        <a href="{{ $artikel->sumber_url }}" target="_blank" class="btn btn-sm fw-semibold px-4" style="background:#fff3cd; border:1px solid #ffe69c; color:#856404; border-radius:2rem; transition: all 0.3s;" onmouseover="this.style.background='#ffe69c'" onmouseout="this.style.background='#fff3cd'"><i class="fa-solid fa-external-link me-1"></i> Baca Lengkap di Sumber Asli <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size:0.65rem;"></i></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm reveal reveal-delay-1" style="border-radius:1.2rem; overflow:hidden; background:white;">
                <div style="height:4px; background: linear-gradient(90deg, {{ $color }}, {{ $color2 }});"></div>
                <div class="card-header bg-white fw-bold d-flex align-items-center gap-2" style="color:{{ $color }}; border-bottom:2px solid #e8ecff; font-family:'Outfit',sans-serif;">
                    <div style="width:28px; height:28px; background: linear-gradient(135deg, {{ $color }}, {{ $color2 }}); border-radius:0.5rem; display:flex; align-items:center; justify-content:center;"><i class="fa-solid fa-book-open text-white" style="font-size:0.7rem;"></i></div>
                    Artikel Terkait
                </div>
                <div class="card-body p-0">
                    @forelse($related as $o)
                        <a href="{{ route('beranda.detailArtikel',['id'=>$o->id]) }}" class="d-block p-3 text-decoration-none border-bottom" style="color:inherit; transition: all 0.2s;" onmouseover="this.style.background='#f8f9ff'" onmouseout="this.style.background='transparent'">
                            <span class="badge mb-1" style="background:#e8ecff; color:{{ $color }}; font-size:0.62rem; border-radius:2rem;">{{ $o->kategori }}</span>
                            <div class="small fw-bold" style="color:#1a1f3d; font-family:'Outfit',sans-serif; line-height:1.3;">{{ $o->judul }}</div>
                            <small class="text-muted" style="font-size:0.78rem;">{{ Str::limit($o->deskripsi, 70) }}</small>
                        </a>
                    @empty
                        <div class="p-3 text-muted small">Belum ada artikel terkait.</div>
                    @endforelse
                    <div class="p-3 text-center">
                        <a href="{{ route('beranda.artikel') }}" class="btn btn-sm w-100 fw-semibold" style="background: linear-gradient(135deg, {{ $color }}, {{ $color2 }}); color:white; border-radius:2rem; border:none;">Lihat Semua Artikel <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="card border-0 mt-3 reveal reveal-delay-2" style="background: linear-gradient(135deg, {{ $color }} 0%, {{ $color2 }} 100%); border-radius:1.2rem; overflow:hidden; position:relative;">
                <div style="position:absolute; top:-20px; right:-20px; width:80px; height:80px; background:rgba(255,255,255,0.1); border-radius:50%;"></div>
                <div class="card-body text-white" style="position:relative;">
                    <h6 class="text-white fw-bold" style="font-family:'Outfit',sans-serif;"><i class="fa-solid fa-plane me-2"></i>AirNav Assist</h6>
                    <small style="opacity:0.92; line-height:1.75; display:block; text-align:justify; text-align-last:left; hyphens:auto;">Sistem informasi terintegrasi untuk pengelolaan pengetahuan, pengembangan kompetensi, dan diseminasi informasi penerbangan yang akurat, berstandar, dan berorientasi keselamatan.</small>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

@push('scripts')
<style>
.artikel-content h5 { font-family:'Outfit',sans-serif; font-weight:800; color:#1a1f3d; margin-top:1.5rem; letter-spacing:-0.02em; line-height:1.3; }
.artikel-content h6 { font-family:'Outfit',sans-serif; font-weight:700; color:#2c365e; }
.artikel-content p { font-family:'Plus Jakarta Sans','Instrument Sans',sans-serif; line-height:1.85; color:#212529; letter-spacing:0.01em; }
.artikel-content ul, .artikel-content ol { font-family:'Plus Jakarta Sans','Instrument Sans',sans-serif; line-height:1.8; }
.artikel-content blockquote { font-family:'Plus Jakarta Sans',sans-serif; border-left:3px solid #dbe0ff; padding-left:1rem; color:#49548C; background:#f5f7ff; border-radius:0 0.6rem 0.6rem 0; padding:0.8rem 1rem; }
.artikel-content a { color:#49548C; font-weight:600; }
@keyframes floatPlane { 0%,100% { transform: translateY(0px); } 50% { transform: translateY(-8px); } }
@keyframes pulse { 0%,100% { transform: scale(1); } 50% { transform: scale(1.05); } }
@keyframes fadeInUp { from { opacity:0; transform: translateY(16px); } to { opacity:1; transform: translateY(0); } }
@keyframes fadeInDown { from { opacity:0; transform: translateY(-12px); } to { opacity:1; transform: translateY(0); } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
</style>
@endpush
@endsection
