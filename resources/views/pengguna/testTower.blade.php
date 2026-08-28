@extends('pengguna.app')
@section('tab', 'Test — ' . $airport->name . ' Tower')

@section('content')
<div style="background: linear-gradient(135deg, #1e2540 0%, #2c365e 22%, #49548C 48%, #5d6ab0 72%, #8a9ad6 100%); background-size:200% 200%; animation: heroGradient 12s ease infinite; padding: 2.2rem 0 1.8rem; position:relative; overflow:hidden;">
    <div style="position:absolute; top:-40px; right:-40px; width:220px; height:220px; background:rgba(255,255,255,0.07); border-radius:50%; animation: pulse 6s ease-in-out infinite;"></div>
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at 30% 20%, rgba(255,255,255,0.07) 0%, transparent 50%); pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="d-flex flex-wrap gap-2 mb-3">
            <a href="{{ route('beranda.index') }}" class="btn btn-sm bg-white fw-semibold" style="color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif;"><i class="fa-solid fa-arrow-left me-1"></i> Beranda</a>
            <span class="badge bg-white px-3 py-2" style="color:#49548C !important; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700;"><i class="fa-solid fa-clipboard-check me-1"></i> Test Kompetensi</span>
            <span class="badge px-3 py-2" style="background:rgba(255,255,255,0.16); color:white; border:1px solid rgba(255,255,255,0.28); border-radius:2rem; font-family:'Outfit',sans-serif;">{{ $airport->name }} Tower</span>
        </div>
        <h1 class="text-white mb-1" style="font-family:'Outfit',sans-serif; font-weight:900; font-size:clamp(1.5rem,3vw,1.9rem);">Test — {{ $airport->name }} Tower <span style="background: linear-gradient(90deg, #ffd166, #ffb703); -webkit-background-clip:text; -webkit-text-fill-color:transparent;"> • 3 Sub Bab</span></h1>
        <p class="text-white mb-0" style="opacity:0.92; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.9rem;">Pilih sub bab, kerjakan 10 soal acak dalam 30 menit. Nilai akan tampil setelah submit — tidak dapat diulang jika sudah selesai.</p>
    </div>
</div>

<div style="background: linear-gradient(135deg, #e8ecff 0%, #dde3ff 30%, #dbe4ff 55%, #e0e7ff 78%, #eef0ff 100%); padding: 2rem 0; position:relative; overflow:hidden; border-top:1px solid #dbe0ff;">
    <div style="position:absolute; inset:0; opacity:0.14; background-image: radial-gradient(circle, rgba(73,84,140,0.06) 1px, transparent 1px); background-size:22px 22px; pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="alert d-flex align-items-center gap-2 mb-4" style="background:white; border:1px solid #dbe0ff; border-radius:1rem; font-family:'Instrument Sans',sans-serif; font-size:0.85rem; color:#1a1f3d; box-shadow:0 4px 16px rgba(73,84,140,0.06);">
            <span style="width:32px; height:32px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-circle-info text-white" style="font-size:0.8rem;"></i></span>
            <span><strong>30 menit</strong> per sub bab • 10 soal acak • Nilai = benar × 10</span>
            <span class="ms-auto badge" style="background:#e8ecff; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem;"><i class="fa-solid fa-shuffle me-1"></i> Soal diacak setiap percobaan</span>
        </div>

        @if(session('message'))
        <div class="alert alert-warning border-0 d-flex align-items-center gap-2" style="background: linear-gradient(135deg, #fff3cd 0%, #ffe69c 100%); border-radius:1rem; font-family:'Instrument Sans',sans-serif;">
            <i class="fa-solid fa-triangle-exclamation" style="color:#664d03;"></i> {{ session('message') }}
        </div>
        @endif

        <div class="row g-3 g-md-4">
            @foreach($tests as $idx => $item)
            @php $done = isset($item->hasilTest) && isset($item->hasilTest->hasil); $score = $done ? $item->hasilTest->hasil : null; @endphp
            <div class="col-12 col-md-4">
                <div class="card h-100 border-0 shadow-sm" style="border-radius:1.4rem; overflow:hidden; background:white; border:1px solid #eef0ff !important;">
                    <div style="height:4px; background: {{ $idx==0 ? 'linear-gradient(90deg, #49548C, #8a9ad6)' : ($idx==1 ? 'linear-gradient(90deg, #0d6efd, #5ab0ff)' : 'linear-gradient(90deg, #198754, #4ade80)') }};"></div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span style="width:36px; height:36px; background: {{ $idx==0 ? 'linear-gradient(135deg, #49548C 0%, #8a9ad6 100%)' : ($idx==1 ? 'linear-gradient(135deg, #0d6efd 0%, #5ab0ff 100%)' : 'linear-gradient(135deg, #198754 0%, #4ade80 100%)') }}; border-radius:0.7rem; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 12px rgba(73,84,140,0.18);"><i class="fa-solid {{ $idx==0 ? 'fa-list-check' : ($idx==1 ? 'fa-comments' : 'fa-shield-halved') }} text-white" style="font-size:0.8rem;"></i></span>
                            <span class="badge" style="background:#f8f9ff; color:#49548C; border:1px solid #e8ecff; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.62rem; font-weight:700;">SUB BAB {{ $idx+1 }}</span>
                            <span class="ms-auto small" style="color:#6c757d; font-family:'Instrument Sans',sans-serif;"><i class="fa-regular fa-clock me-1"></i> 30 menit</span>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d; font-size:0.95rem; line-height:1.35;">{{ $item->subjek }}</h6>
                        <p class="small mb-3" style="color:#6c757d; font-family:'Plus Jakarta Sans',sans-serif; line-height:1.6; font-size:0.84rem; text-align:justify; text-align-last:left;">
                            {{ $idx==0 ? 'Prosedur ATS dasar sesuai SOP ATS Edisi 2.' : ($idx==1 ? 'Phraseology ICAO dan komunikasi efektif.' : 'Keselamatan, emergency, dan mitigasi risiko.') }}
                        </p>
                        <div class="d-flex align-items-center gap-2 mt-auto">
                            <span class="small" style="color:#49548C; font-family:'Instrument Sans',sans-serif; font-weight:600;"><i class="fa-solid fa-file-lines me-1"></i> 10 soal acak</span>
                            @if($done)
                                <span class="badge ms-auto" style="background: linear-gradient(135deg, #14b8a6 0%, #2dd4bf 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; padding:0.45rem 0.8rem;"><i class="fa-solid fa-chart-simple me-1"></i> Hasil: {{ $score }}</span>
                            @else
                                <span class="badge ms-auto" style="background:#fff7e6; color:#92400e; border:1px solid #fde68a; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-weight:700;">Belum dikerjakan</span>
                            @endif
                        </div>
                        <div class="d-flex gap-2 mt-3">
                            @if(!$done)
                                <a href="{{ route('test.mulai',['id'=>$item->id]) }}" class="btn btn-sm fw-bold flex-fill" style="background: linear-gradient(135deg, #ffb703 0%, #ffd166 100%); color:#1a1f3d; border:none; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 4px 12px rgba(255,183,3,0.22);">Mulai</a>
                            @else
                                <a class="btn btn-sm fw-bold flex-fill disabled" style="background: linear-gradient(135deg, #14b8a6 0%, #2dd4bf 100%); color:white; border:none; border-radius:2rem; font-family:'Outfit',sans-serif; opacity:0.95;">Hasil: {{ $score }}</a>
                            @endif
                            @if($done)
                                <a href="{{ route('test.lihatJawaban',['id'=>$item->id]) }}" class="btn btn-sm fw-semibold" style="background:white; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; font-family:'Outfit',sans-serif;">Lihat Jawaban</a>
                            @endif
                        </div>
                        @if($done)
                        <small class="d-block text-center mt-2" style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.68rem;"><i class="fa-solid fa-lock me-1"></i> Tidak dapat diulang</small>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('beranda.index') }}" class="btn btn-sm px-4" style="background:white; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; font-family:'Outfit',sans-serif;">Kembali ke Home</a>
        </div>
    </div>
</div>
@endsection
