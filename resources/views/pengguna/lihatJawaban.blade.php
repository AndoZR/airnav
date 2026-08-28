@extends('pengguna.app')
@section('tab', 'Airnav Assist | Review Jawaban')

@section('content')
@php
  $total = count($dataSoal);
  $benar = 0;
  foreach($dataSoal as $soal){
    foreach($soal->jawaban as $opt){
      if($opt->nilai==1 && in_array($opt->id, (array)$jawabanDipilih)) $benar++;
    }
  }
  $skor = $total ? $benar * 10 : 0;
  $persen = $total ? (int) round($benar/$total*100) : 0;
@endphp
<div style="background: linear-gradient(135deg, #1e2540 0%, #2c365e 22%, #49548C 48%, #5d6ab0 72%, #8a9ad6 100%); padding: 2rem 0 1.6rem; position:relative; overflow:hidden;">
    <div style="position:absolute; top:-40px; right:-40px; width:220px; height:220px; background:rgba(255,255,255,0.07); border-radius:50%; animation: pulse 6s ease-in-out infinite;"></div>
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at 30% 20%, rgba(255,255,255,0.07) 0%, transparent 50%); pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="d-flex flex-wrap gap-2 mb-3">
            <a href="{{ route('test.tower',['id'=>$towerId ?? 1]) }}" class="btn btn-sm bg-white fw-semibold" style="color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif;"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Sub Bab</a>
            <span class="badge bg-white px-3 py-2" style="color:#49548C !important; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700;"><i class="fa-solid fa-clipboard-check me-1"></i> Review Jawaban</span>
            <span class="badge px-3 py-2" style="background:rgba(255,255,255,0.16); color:white; border:1px solid rgba(255,255,255,0.28); border-radius:2rem; font-family:'Outfit',sans-serif;">{{ $test->subjek ?? 'Test' }}</span>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-lg-8">
                <h1 class="text-white mb-1" style="font-family:'Outfit',sans-serif; font-weight:900; font-size:clamp(1.4rem,3vw,1.8rem);">Hasil Anda <span style="background: linear-gradient(90deg, #ffd166, #ffb703); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">{{ $skor }}/100</span></h1>
                <p class="text-white mb-0" style="opacity:0.92; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.9rem;">{{ $benar }} benar dari {{ $total }} soal — kunci jawaban ditandai.</p>
            </div>
            <div class="col-lg-4 d-flex justify-content-lg-end">
                <div class="d-flex gap-2">
                    <div style="background:white; border-radius:1rem; padding:0.7rem 1rem; text-align:center; min-width:86px; box-shadow:0 8px 20px rgba(0,0,0,0.14);">
                        <div style="font-family:'Outfit',sans-serif; font-weight:900; color:#1a1f3d; font-size:1.4rem; line-height:1;">{{ $benar }}/{{ $total }}</div>
                        <small style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.65rem; font-weight:700; letter-spacing:0.04em;">BENAR</small>
                    </div>
                    <div style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); border-radius:1rem; padding:0.7rem 1rem; text-align:center; min-width:86px; box-shadow:0 8px 20px rgba(73,84,140,0.18);">
                        <div style="font-family:'Outfit',sans-serif; font-weight:900; color:white; font-size:1.4rem; line-height:1;">{{ $persen }}%</div>
                        <small style="color:rgba(255,255,255,0.9); font-family:'Instrument Sans',sans-serif; font-size:0.65rem; font-weight:700;">SKOR</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background: linear-gradient(180deg, #f8f9ff 0%, #ffffff 100%); padding: 1.8rem 0 2.4rem;">
    <div class="container">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="badge px-3 py-2" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; border:1px solid #dbe0ff;"><i class="fa-solid fa-list-ol me-1"></i> {{ $total }} Soal • Kunci Jawaban</span>
            <span class="badge px-3 py-2" style="background:#dcfce7; color:#14532d; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-weight:600; border:1px solid #bbf7d0;"><i class="fa-solid fa-check me-1"></i> Benar = hijau</span>
            <span class="badge px-3 py-2" style="background:#fee2e2; color:#7f1d1d; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-weight:600; border:1px solid #fecaca;"><i class="fa-solid fa-xmark me-1"></i> Salah = merah</span>
        </div>

        @foreach ($dataSoal as $idx => $item)
        @php
          $userChoice = null;
          $correct = null;
          foreach($item->jawaban as $o){ if($o->nilai==1) $correct=$o; if(in_array($o->id, (array)$jawabanDipilih)) $userChoice=$o; }
          $isCorrect = $userChoice && $userChoice->nilai==1;
        @endphp
        <div class="card border-0 mb-3 reveal" style="border-radius:1.2rem; overflow:hidden; background:white; border:1px solid {{ $isCorrect ? '#bbf7d0' : ($userChoice ? '#fecaca' : '#eef0ff') }} !important; box-shadow:0 8px 24px rgba(73,84,140,0.06); animation-delay: {{ $idx * 0.05 }}s;">
            <div style="height:3px; background: {{ $isCorrect ? 'linear-gradient(90deg, #22c55e, #4ade80)' : ($userChoice ? 'linear-gradient(90deg, #ef4444, #f87171)' : 'linear-gradient(90deg, #49548C, #8a9ad6)') }};"></div>
            <div class="card-body p-3 p-md-4">
                <div class="d-flex gap-2 mb-3">
                    <span class="badge d-flex align-items-center justify-content-center flex-shrink-0" style="width:32px; height:32px; background: {{ $isCorrect ? 'linear-gradient(135deg, #22c55e 0%, #4ade80 100%)' : ($userChoice ? 'linear-gradient(135deg, #ef4444 0%, #f87171 100%)' : 'linear-gradient(135deg, #49548C 0%, #8a9ad6 100%)') }}; color:white; border-radius:0.6rem; font-family:'Outfit',sans-serif; font-weight:800; font-size:0.78rem;">{{ $idx+1 }}</span>
                    <p class="mb-0" style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:600; color:#1a1f3d; font-size:0.92rem; line-height:1.6; text-align:justify; text-align-last:left;">{{ $item->pertanyaan }}</p>
                    <span class="ms-auto badge align-self-start" style="background: {{ $isCorrect ? '#dcfce7' : ($userChoice ? '#fee2e2' : '#f8f9ff') }}; color: {{ $isCorrect ? '#14532d' : ($userChoice ? '#7f1d1d' : '#49548C') }}; border:1px solid {{ $isCorrect ? '#bbf7d0' : ($userChoice ? '#fecaca' : '#e8ecff') }}; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.62rem; font-weight:700; white-space:nowrap;">{{ $isCorrect ? 'BENAR' : ($userChoice ? 'SALAH' : 'BELUM DIJAWAB') }}</span>
                </div>
                <div class="d-grid gap-2">
                    @foreach ($item->jawaban as $opsi)
                    @php $isUser = in_array($opsi->id, (array)$jawabanDipilih); $isKey = $opsi->nilai==1; @endphp
                    <div class="d-flex align-items-start gap-2 p-2 px-3" style="border-radius:0.8rem; border:1px solid {{ $isKey ? '#bbf7d0' : ($isUser ? '#fecaca' : '#eef0ff') }}; background: {{ $isKey ? 'linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%)' : ($isUser ? 'linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%)' : 'white') }}; transition: all 0.2s;">
                        <span style="width:22px; height:22px; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:1px; background: {{ $isKey ? '#22c55e' : ($isUser ? '#ef4444' : 'white') }}; border:1px solid {{ $isKey ? '#22c55e' : ($isUser ? '#ef4444' : '#dbe0ff') }}; color: {{ $isKey || $isUser ? 'white' : '#6c757d' }}; font-size:0.65rem;">
                            @if($isKey)<i class="fa-solid fa-check"></i>@elseif($isUser)<i class="fa-solid fa-xmark"></i>@else<i class="fa-regular fa-circle" style="font-size:0.55rem;"></i>@endif
                        </span>
                        <span class="flex-grow-1" style="font-family:'Plus Jakarta Sans',sans-serif; font-size:0.88rem; line-height:1.5; color:{{ $isKey ? '#14532d' : ($isUser ? '#7f1d1d' : '#334155') }}; font-weight: {{ $isKey || $isUser ? '600' : '400' }};">{{ $opsi->jawaban }}</span>
                        @if($isKey)<span class="badge" style="background:#22c55e; color:white; border-radius:2rem; font-size:0.58rem; font-family:'Instrument Sans',sans-serif; font-weight:700; white-space:nowrap;">KUNCI</span>@endif
                        @if($isUser && !$isKey)<span class="badge" style="background:#ef4444; color:white; border-radius:2rem; font-size:0.58rem; font-family:'Instrument Sans',sans-serif; font-weight:700;">PILIHAN ANDA</span>@endif
                        @if($isUser && $isKey)<span class="badge" style="background: linear-gradient(135deg, #22c55e, #4ade80); color:white; border-radius:2rem; font-size:0.58rem; font-family:'Instrument Sans',sans-serif; font-weight:700;">BENAR</span>@endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

        <div class="d-flex flex-wrap gap-2 justify-content-center mt-4">
            <a href="{{ route('test.tower',['id'=>$towerId ?? 1]) }}" class="btn px-4 py-2 fw-bold" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 6px 16px rgba(73,84,140,0.18);"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Sub Bab</a>
            <a href="{{ route('beranda.index') }}" class="btn px-4 py-2 fw-semibold" style="background:white; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; font-family:'Outfit',sans-serif;">Ke Beranda</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
  const els = document.querySelectorAll('.reveal');
  if(els.length){
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('in-view'); io.unobserve(e.target);} });
    }, {threshold:0.12});
    els.forEach(el=> io.observe(el));
  }
});
</script>
@endpush