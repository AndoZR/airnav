@extends('pengguna.app')
@section('tab', 'Airnav Assist | E-Logbook')

@section('content')
<meta name="csrf-token" content="<?php echo (csrf_token()) ?>">

{{-- HERO premium --}}
<div style="background: linear-gradient(135deg, #1e2540 0%, #2c365e 22%, #49548C 48%, #5d6ab0 72%, #8a9ad6 100%); background-size:200% 200%; animation: heroGradient 12s ease infinite; padding: 2.2rem 0 1.8rem; position:relative; overflow:hidden;">
    <div style="position:absolute; top:-40px; right:-40px; width:260px; height:260px; background:rgba(255,255,255,0.07); border-radius:50%; animation: pulse 6s ease-in-out infinite;"></div>
    <div style="position:absolute; bottom:-30px; left:8%; width:180px; height:180px; background:rgba(255,255,255,0.05); border-radius:50%; animation: pulse 7s ease-in-out infinite reverse;"></div>
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at 30% 20%, rgba(255,255,255,0.07) 0%, transparent 50%); pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div class="d-flex flex-wrap gap-2 mb-3">
            <a href="{{ route('beranda.index') }}" class="btn btn-sm bg-white fw-semibold" style="color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif;"><i class="fa-solid fa-arrow-left me-1"></i> Beranda</a>
            <span class="badge bg-white px-3 py-2" style="color:#49548C !important; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700;"><i class="fa-solid fa-book-open me-1"></i> E-Logbook</span>
            <span class="badge px-3 py-2" style="background:rgba(255,255,255,0.16); color:white; border:1px solid rgba(255,255,255,0.28); backdrop-filter:blur(6px); border-radius:2rem; font-family:'Outfit',sans-serif;" id="heroCabangBadge"><i class="fa-solid fa-location-dot me-1"></i> <span id="heroCabangText">Cabang Pembantu Batam • Tanjung Pinang</span></span>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
            <div>
                <h1 class="text-white mb-1" style="font-family:'Outfit',sans-serif; font-weight:900; letter-spacing:-0.02em; font-size:clamp(1.4rem,3vw,1.85rem); text-shadow:0 3px 18px rgba(0,0,0,0.18);">E-Logbook <span style="background: linear-gradient(90deg, #ffd166, #ffb703); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">Digital</span></h1>
                <p class="text-white mb-0" style="opacity:0.92; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.9rem; max-width:620px;">Dokumentasi shift harian yang rapi, terintegrasi, dan siap export PDF. Pilih cabang, kelola rekap tahunan & bulanan dengan mudah.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('logbook.formLogbook') }}?cabang=batam" class="btn btn-sm bg-white fw-bold" style="color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 4px 12px rgba(0,0,0,0.12);"><i class="fa-solid fa-plus me-1"></i> Logbook Baru</a>
                <span class="badge px-3 py-2 align-self-center" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.7rem;"><i class="fa-solid fa-clock me-1"></i> Auto-save</span>
            </div>
        </div>
        {{-- tower switch — sesuai nama tower, Cabang Pembantu Batam dihapus, Semua menampilkan semua cabang --}}
        <div class="d-flex flex-wrap gap-2 mt-3 align-items-center">
            <div class="d-flex flex-wrap gap-1 align-items-center">
                <small class="text-white" style="opacity:0.9; font-family:'Outfit',sans-serif; font-weight:700; font-size:0.78rem;"><i class="fa-solid fa-tower-broadcast me-1"></i> Tower:</small>
                <select id="towerSelect" onchange="setTower(this.value)" class="form-select form-select-sm" style="border-radius:2rem; border:1px solid #dbe0ff; font-family:'Outfit',sans-serif; font-weight:700; font-size:0.78rem; color:#1a1f3d; padding:0.4rem 2rem 0.4rem 1rem; background:white; min-width:190px; box-shadow:0 4px 12px rgba(0,0,0,0.12);">
                    <option value="">Semua Tower — Semua Cabang</option>
                    <option value="Hang Nadim Tower">Hang Nadim Tower</option>
                    <option value="Tanjung Pinang Tower">Tanjung Pinang Tower</option>
                    <option value="TMA North Tower">TMA North Tower</option>
                    <option value="TMA South Tower">TMA South Tower</option>
                    <option value="Rajahaji Tower">Rajahaji Tower</option>
                    <option value="Ranai Tower">Ranai Tower</option>
                    <option value="Matak Tower">Matak Tower</option>
                    <option value="Letung Tower">Letung Tower</option>
                </select>
            </div>
            <span class="badge d-none d-md-inline" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.65rem;"><i class="fa-solid fa-filter me-1"></i> Pilih tower — otomatis pindah, Semua tampilkan semua cabang</span>
        </div>
    </div>
</div>

{{-- TABS premium pills --}}
<div style="background: linear-gradient(135deg, #e8ecff 0%, #dde3ff 30%, #dbe4ff 55%, #e0e7ff 78%, #eef0ff 100%); padding: 1.1rem 0; border-top:1px solid #dbe0ff; border-bottom:1px solid #e8ecff;">
    <div class="container d-flex flex-wrap gap-2 align-items-center">
        <div class="d-inline-flex p-1" style="background:white; border-radius:2rem; border:1px solid #e8ecff; box-shadow:0 4px 14px rgba(73,84,140,0.06);">
            <a id="rekapBulan" class="btn btn-sm fw-bold px-4 active-tab" href="#" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 4px 12px rgba(73,84,140,0.18);"><i class="fa-solid fa-calendar me-1"></i> Rekap Tahunan</a>
            <a id="elogHarian" class="btn btn-sm fw-semibold px-4" href="#" style="background:transparent; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif;"><i class="fa-solid fa-table me-1"></i> Rekap Bulanan</a>
        </div>
        <span class="ms-auto small" style="color:#6c757d; font-family:'Instrument Sans',sans-serif;"><i class="fa-solid fa-circle-info me-1" style="color:#8a9ad6;"></i> Klik “Tampilkan” untuk melihat rincian bulanan</span>
    </div>
</div>

<div id="rekapBulanDashboard" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9ff 100%); padding: 1.8rem 0 2rem;">
    <div class="container">
        <div class="card border-0 shadow-sm" style="border-radius:1.2rem; overflow:hidden; background:white; border:1px solid #eef0ff !important;">
            <div style="height:4px; background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166); background-size:200% 100%; animation: footerGradientShift 4s ease infinite;"></div>
            <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center gap-3 py-3" style="border-bottom:1px solid #eef0ff;">
                <div>
                    <div class="fw-bold" style="font-family:'Outfit',sans-serif; color:#1a1f3d; font-size:0.95rem;"><i class="fa-solid fa-database me-2" style="color:#49548C;"></i> Data Rekap Tahunan</div>
                    <small id="rekap_tahun_nama" style="color:#6c757d; font-family:'Instrument Sans',sans-serif;">Nama : {{session()->get('name')}}</small>
                </div>
                <a href="{{route('logbook.createLogbook')}}" class="btn btn-sm fw-bold px-4" style="background: linear-gradient(135deg, #198754 0%, #4ade80 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 4px 12px rgba(25,135,84,0.18);"><i class="fa-solid fa-plus me-1"></i> Logbook Baru</a>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 align-middle" style="font-family:'Plus Jakarta Sans',sans-serif; font-size:0.88rem;">
                    <thead style="background: linear-gradient(135deg, #f8f9ff 0%, #eef0ff 100%); color:#49548C; font-family:'Outfit',sans-serif; font-size:0.78rem; letter-spacing:0.03em;">
                        <tr class="text-center">
                            <th class="py-3" style="border-bottom:1px solid #e8ecff; font-weight:700;">Rekap ID</th>
                            <th class="py-3" style="border-bottom:1px solid #e8ecff; font-weight:700;">Bulan</th>
                            <th class="py-3" style="border-bottom:1px solid #e8ecff; font-weight:700;">Tahun</th>
                            <th class="py-3" style="border-bottom:1px solid #e8ecff; font-weight:700;">Cabang</th>
                            <th class="py-3" style="border-bottom:1px solid #e8ecff; font-weight:700;">Tower</th>
                            <th class="py-3" style="border-bottom:1px solid #e8ecff; font-weight:700;">Status</th>
                            <th class="py-3" style="border-bottom:1px solid #e8ecff; font-weight:700;">Rincian</th>
                        </tr>
                    </thead>
                    <tbody id="rekapBulanBaris" style="background:white;"></tbody>
                </table>
            </div>
            <div class="card-footer bg-white text-center py-3" style="border-top:1px solid #eef0ff; font-family:'Instrument Sans',sans-serif; font-size:0.75rem; color:#6c757d;">
                <i class="fa-solid fa-lightbulb me-1" style="color:#ffb703;"></i> Tip: Buat logbook baru tiap bulan untuk cabang masing-masing
            </div>
        </div>
    </div>
</div>

<div id="elogbookHarian" hidden style="background: linear-gradient(180deg, #ffffff 0%, #f8f9ff 100%); padding: 1.6rem 0 2rem;">
    <div class="container">
        <div class="card border-0 shadow-sm mb-3" style="border-radius:1.2rem; overflow:hidden; background:white; border:1px solid #eef0ff !important;">
            <div style="height:3px; background: linear-gradient(90deg, #49548C, #8a9ad6);"></div>
            <div class="card-body p-3 p-md-4">
                <div class="row align-items-center g-3">
                    <div class="col-md-6">
                        <small style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-weight:600; letter-spacing:0.04em; font-size:0.68rem;"><i class="fa-solid fa-user me-1"></i> NAMA</small>
                        <p class="mb-0 fw-bold" style="font-family:'Outfit',sans-serif; color:#1a1f3d;" id="rekap_bulan_nama">{{session()->get('name')}}</p>
                        <small style="font-family:'Instrument Sans',sans-serif; color:#6c757d;">Rekap ID : <span id="rekap_bulan_id" class="fw-bold" style="color:#49548C;"></span></small>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end gap-2">
                        <form method="POST" action="{{route('logbook.form')}}">
                            @csrf
                            <input id="logbook_input_id" type="hidden" name="logbook_id">
                            <input id="logbook_input_month" type="hidden" name="bulan">
                            <input id="logbook_input_year" type="hidden" name="tahun">
                            <button id="new_daily_input" type="submit" class="btn btn-sm fw-bold px-4" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 4px 12px rgba(73,84,140,0.18);"><i class="fa-solid fa-plus me-1"></i> Data Baru</button>
                        </form>
                        <button id="report_pdf" type="button" class="btn btn-sm fw-bold px-4" style="background: linear-gradient(135deg, #dc3545 0%, #ff6b6b 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 4px 12px rgba(220,53,69,0.18);"><i class="fa-solid fa-file-pdf me-1"></i> Ubah PDF</button>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-6">
                        <label class="form-label mb-1" style="font-family:'Instrument Sans',sans-serif; font-size:0.7rem; font-weight:700; color:#49548C; letter-spacing:0.04em;">TAHUN</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text" style="background:#f8f9ff; border:1px solid #dbe0ff; color:#49548C;"><i class="fa-solid fa-calendar"></i></span>
                            <input id="rekap_bulan_tahun" class="form-control" type="number" disabled style="background:#f8f9ff; border:1px solid #dbe0ff; font-family:'Outfit',sans-serif; font-weight:600;">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label mb-1" style="font-family:'Instrument Sans',sans-serif; font-size:0.7rem; font-weight:700; color:#49548C; letter-spacing:0.04em;">BULAN</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text" style="background:#f8f9ff; border:1px solid #dbe0ff; color:#49548C;"><i class="fa-solid fa-calendar-days"></i></span>
                            <input id="rekap_bulan_bulan" class="form-control" type="text" disabled style="background:#f8f9ff; border:1px solid #dbe0ff; font-family:'Outfit',sans-serif; font-weight:600;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius:1.2rem; overflow:hidden; background:white; border:1px solid #eef0ff !important;">
            <div class="table-responsive-md">
                <table class="table table-sm table-bordered mb-0" style="font-family:'Instrument Sans',sans-serif; font-size:0.82rem;">
                    <thead class="text-center align-middle" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; font-family:'Outfit',sans-serif; font-size:0.72rem; letter-spacing:0.03em;">
                        <tr>
                            <th rowspan="2" style="vertical-align:middle; border-color:rgba(255,255,255,0.18);">Date</th>
                            <th colspan="3" style="border-color:rgba(255,255,255,0.18);">Morning</th>
                            <th colspan="3" style="border-color:rgba(255,255,255,0.18);">Afternoon</th>
                            <th colspan="3" style="border-color:rgba(255,255,255,0.18);">Night</th>
                            <th rowspan="2" style="vertical-align:middle; border-color:rgba(255,255,255,0.18);">Unit</th>
                        </tr>
                        <tr>
                            <th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">CTR</th><th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">ASS</th><th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">REST</th>
                            <th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">CTR</th><th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">ASS</th><th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">REST</th>
                            <th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">CTR</th><th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">ASS</th><th style="border-color:rgba(255,255,255,0.18); font-weight:600; font-size:0.68rem;">REST</th>
                        </tr>
                    </thead>
                    <tbody id="body_daily_logbook" class="text-center" style="font-family:'Instrument Sans',sans-serif; font-size:0.8rem;"></tbody>
                </table>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-3" style="border-radius:1.2rem; overflow:hidden; background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%); border:1px solid #e8ecff !important;">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div style="width:32px; height:32px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.6rem; display:flex; align-items:center; justify-content:center;"><i class="fa-solid fa-calculator text-white" style="font-size:0.8rem;"></i></div>
                    <span class="fw-bold" style="font-family:'Outfit',sans-serif; color:#1a1f3d; font-size:0.9rem;">Total Hour Position (Monthly)</span>
                    <span class="ms-auto badge" style="background:#e8ecff; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.65rem;"><i class="fa-solid fa-chart-simple me-1"></i> Auto-calculated</span>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label mb-1" style="font-family:'Instrument Sans',sans-serif; font-weight:700; font-size:0.68rem; color:#49548C; letter-spacing:0.04em;">CTR</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control" placeholder="Hours" readonly style="background:#f8f9ff; border:1px solid #dbe0ff; border-radius:0.7rem 0 0 0.7rem; font-family:'Outfit',sans-serif; font-weight:600; text-align:center;">
                            <span class="input-group-text" style="background:#49548C; color:white; border:1px solid #49548C; font-weight:700;">:</span>
                            <input type="number" class="form-control" placeholder="Minute" readonly style="background:#f8f9ff; border:1px solid #dbe0ff; border-radius:0 0.7rem 0.7rem 0; font-family:'Outfit',sans-serif; font-weight:600; text-align:center;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label mb-1" style="font-family:'Instrument Sans',sans-serif; font-weight:700; font-size:0.68rem; color:#49548C; letter-spacing:0.04em;">ASS</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control" placeholder="Hours" readonly style="background:#f8f9ff; border:1px solid #dbe0ff; border-radius:0.7rem 0 0 0.7rem; font-family:'Outfit',sans-serif; font-weight:600; text-align:center;">
                            <span class="input-group-text" style="background:#49548C; color:white; border:1px solid #49548C; font-weight:700;">:</span>
                            <input type="number" class="form-control" placeholder="Minute" readonly style="background:#f8f9ff; border:1px solid #dbe0ff; border-radius:0 0.7rem 0.7rem 0; font-family:'Outfit',sans-serif; font-weight:600; text-align:center;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label mb-1" style="font-family:'Instrument Sans',sans-serif; font-weight:700; font-size:0.68rem; color:#49548C; letter-spacing:0.04em;">REST</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control" placeholder="Hours" readonly style="background:#f8f9ff; border:1px solid #dbe0ff; border-radius:0.7rem 0 0 0.7rem; font-family:'Outfit',sans-serif; font-weight:600; text-align:center;">
                            <span class="input-group-text" style="background:#49548C; color:white; border:1px solid #49548C; font-weight:700;">:</span>
                            <input type="number" class="form-control" placeholder="Minute" readonly style="background:#f8f9ff; border:1px solid #dbe0ff; border-radius:0 0.7rem 0.7rem 0; font-family:'Outfit',sans-serif; font-weight:600; text-align:center;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// tower switcher — sesuai nama tower, Semua tampilkan semua cabang (cabang Batam dihapus)
let urlParams = new URLSearchParams(window.location.search);
let currentTower = urlParams.get('tower') || '';
let currentCabang = urlParams.get('cabang') || '';
function setTower(t){
  currentTower = t;
  // infer cabang dari tower (untuk filter lama) — tapi Semua = tanpa filter
  if(t.includes('Hang Nadim')) currentCabang = 'batam';
  else if(t) currentCabang = 'tanjung';
  else currentCabang = '';
  // hero badge: tampilkan nama tower sesuai pilihan
  let hero = document.getElementById('heroCabangText');
  if(hero){
    if(!t) hero.textContent = 'Semua Tower — Semua Cabang';
    else hero.textContent = t + ' • ' + (currentCabang==='batam' ? 'Cabang Pembantu Batam' : 'Cabang Tanjung Pinang');
  }
  // update create links agar tower ikut tersimpan
  document.querySelectorAll('a[href*=\"logbook.createLogbook\"], a[href*=\"logbook.formLogbook\"]').forEach(a=>{
    let u = new URL(a.href, window.location.origin);
    if(t) u.searchParams.set('tower', t); else u.searchParams.delete('tower');
    if(currentCabang) u.searchParams.set('cabang', currentCabang); else u.searchParams.delete('cabang');
    a.href = u.toString();
  });
  // reload rekap dengan filter tower baru
  let tbody = document.getElementById('rekapBulanBaris');
  if(tbody){ tbody.innerHTML=''; }
  // pindah filter & fetch ulang
  getRekapTahunan(function(dataset){
    // clear & refill
    document.getElementById('rekapBulanBaris').innerHTML='';
    for(let i in dataset.responses){ tableRowCreate(dataset.responses[i]); }
    if(dataset.responses.length>0){
      let recent = dataset.responses[dataset.responses.length -1].uid;
      formDailyLogbook(recent, dataset.responses);
      getDailyLogbook(function(d){ tableRowDailyLogbook(d.responses); }, recent);
    } else {
      // kosongkan detail jika tidak ada data untuk tower tersebut
      let daily = document.getElementById('body_daily_logbook');
      if(daily){ createRowTableBulanan(daily, table_col, 31); }
      document.getElementById('rekap_bulan_id').textContent='-';
    }
  });
  // update URL tanpa reload
  let newUrl = new URL(window.location.href);
  if(t) newUrl.searchParams.set('tower', t); else newUrl.searchParams.delete('tower');
  if(currentCabang) newUrl.searchParams.set('cabang', currentCabang); else newUrl.searchParams.delete('cabang');
  history.replaceState({}, '', newUrl);
  // animasi profesional
  let sel = document.getElementById('towerSelect');
  if(sel){ sel.style.transform='scale(1.02)'; setTimeout(()=> sel.style.transform='scale(1)', 180); }
}
document.addEventListener('DOMContentLoaded',()=>{
  // init select value dari URL
  let sel = document.getElementById('towerSelect');
  if(sel && currentTower) sel.value = currentTower;
  // init hero
  let hero = document.getElementById('heroCabangText');
  if(hero){
    if(!currentTower) hero.textContent = 'Semua Tower — Semua Cabang';
    else hero.textContent = currentTower + ' • ' + (currentCabang==='batam' ? 'Cabang Pembantu Batam' : 'Cabang Tanjung Pinang');
  }
});
</script>
<script>
    // basic javascript feature
    function is_null(a) {
        if (a === null) {
            return true;
        }
        return false;
    }

    function addZero(i) {
        if (is_null(i)) {
            i = "00"
        } else if (i < 10) {
            i = "0" + i
        }
        return i;
    }

    function time_format(a, b) {
        if (is_null(a) & is_null(b)) {
            a = 0
            b = 0
            return [a, b];
        } else {
            a = addZero(a);
            b = addZero(b);
            return [a, b];
        }
    }

    function range(size, startAt) {
        return [...Array(size).keys()].map(i => i + startAt);
    }

    function sortDataset(datasetBulanan) {
        let daily_dataset = datasetBulanan.responses
        daily_dataset.sort(function(a, b) {
            let x = parseInt(a.day);
            let y = parseInt(b.day);
            if (x < y) {
                return -1;
            }
            if (x > y) {
                return 1;
            }
            return 0;
        });
        return daily_dataset;
    }
</script>
<script type="module" src="{{ asset('src/pdf-lib/pdf-lib.js') }}"></script>
<script type="" src="{{ asset('src/pdf-lib/pdf.js') }}"></script>
<script>
    //toggle button for show tab
    document.getElementById('elogHarian').addEventListener('click', (e) => {
        e.preventDefault();
        if (document.getElementById("elogbookHarian").hidden) {
            menuDeactivate()
            document.getElementById('elogHarian').classList.add('active-tab'); document.getElementById('elogHarian').style.background='linear-gradient(135deg, #49548C 0%, #6a7ab8 100%)'; document.getElementById('elogHarian').style.color='white';
            document.getElementById('rekapBulan').classList.remove('active-tab'); document.getElementById('rekapBulan').style.background='transparent'; document.getElementById('rekapBulan').style.color='#49548C';
            document.getElementById("rekapBulanDashboard").hidden = true;
            document.getElementById("elogbookHarian").hidden = false;
        } else {}
    })

    document.getElementById('rekapBulan').addEventListener('click', (e) => {
        e.preventDefault();
        if (document.getElementById("rekapBulanDashboard").hidden) {
            menuDeactivate()
            document.getElementById('rekapBulan').classList.add('active-tab'); document.getElementById('rekapBulan').style.background='linear-gradient(135deg, #49548C 0%, #6a7ab8 100%)'; document.getElementById('rekapBulan').style.color='white';
            document.getElementById('elogHarian').classList.remove('active-tab'); document.getElementById('elogHarian').style.background='transparent'; document.getElementById('elogHarian').style.color='#49548C';
            document.getElementById("elogbookHarian").hidden = true;
            document.getElementById("rekapBulanDashboard").hidden = false;
        } else {}
    })

    document.getElementById('report_pdf').addEventListener('click', () => {
        let logbook_id = document.getElementById('rekap_bulan_id').textContent
        getDailyLogbook(function(callback) {
            let dataset = callback.responses;
            let url = '<?= asset('src/ATC_Logbook.pdf') ?>';
            let tahun = document.getElementById('rekap_bulan_tahun').value;
            let bulan = document.getElementById('rekap_bulan_bulan').value;
            let elogbook_id = document.getElementById('rekap_bulan_id').textContent;
            let nama = document.getElementById('rekap_bulan_nama').textContent;

            savetoPDF(dataset, url, nama, elogbook_id, tahun, bulan)

        }, logbook_id)

    })

    function menuDeactivate() {
        // kept for compatibility
    }
</script>
<script>
    //view logbook dan generator tabel
    function createRowTableBulanan(table_body, column, max_row) {
        table_body.innerHTML = null;
        let max_day = range(max_row, 1)
        for (i in max_day) {
            var row = document.createElement('tr')
            row.style.transition='all 0.3s'; row.style.animation='fadeInUp 0.4s ease '+(i*0.02)+'s both';
            var cell = document.createElement('td')
            cell.append(max_day[i])
            cell.id = 'day' + max_day[i]
            cell.style.fontWeight='700'; cell.style.color='#49548C'; cell.style.background='#f8f9ff';
            row.append(cell)
            for (x in column) {
                var cell = document.createElement('td')
                cell.id = column[x] + i
                cell.style.fontWeight='500';
                row.append(cell)
            }
            table_body.append(row)
        }
    }

    function getRekapTahunan(callback, date = new Date) {
        let yearLocal = date.getFullYear()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?= route('logbook.tahunan') ?>',
            type: 'POST',
            data: {
                uniq_id: '{{session()->get("user_id")}}',
                year: yearLocal,
                cabang: currentCabang,
                tower: currentTower
            },
            success: function(response) {
                callback({
                    responses: response,
                    statusCode: 200,
                    message: "request complete"
                })
            },
            error: function(response) {
                callback({
                    responses: response,
                    statusCode: 400,
                    message: "request complete"
                })
            },
            complete: function() {

            }
        });
    }

    function tableRowCreate(dataset) {
        let kolom = {
            "morning_ctr": "morning_ctr",
            "morning_ass": "morning_ass",
            "morning_rest": "morning_rest",
            "afternoon_ctr": "afternoon_ctr",
            "afternoon_ass": "afternoon_ass",
            "afternoon_rest": "afternoon_rest",
            "night_ctr": "night_ctr",
            "night_ass": "night_ass",
            "night_rest": "night_rest",
            "unit": "unit",
            "option": "option"
        };
        let tableBody = document.getElementById("rekapBulanBaris")
        let tableRow = document.createElement('tr')
        tableRow.style.transition='all 0.3s'; tableRow.style.animation='fadeInUp 0.35s ease both';
        tableRow.addEventListener('mouseenter', ()=> tableRow.style.background='#f8f9ff');
        tableRow.addEventListener('mouseleave', ()=> tableRow.style.background='white');
        let cellRow1 = document.createElement('td')
        let cellRow2 = document.createElement('td')
        let cellRow3 = document.createElement('td')
        let cellRowCabang = document.createElement('td')
        let cellRowTower = document.createElement('td')
        let cellRow4 = document.createElement('td')
        let cellRow5 = document.createElement('td')
        let cellRow6 = document.createElement('td')
        let expandButton = document.createElement('button')
        expandButton.append('Tampilkan')
        expandButton.style.background='linear-gradient(135deg, #49548C 0%, #6a7ab8 100%)'; expandButton.style.color='white'; expandButton.style.border='none'; expandButton.style.borderRadius='2rem'; expandButton.style.padding='0.3rem 0.9rem'; expandButton.style.fontFamily="'Outfit',sans-serif"; expandButton.style.fontWeight='600'; expandButton.style.fontSize='0.75rem'; expandButton.style.boxShadow='0 3px 10px rgba(73,84,140,0.18)'; expandButton.style.transition='all 0.2s';
        expandButton.addEventListener('mouseenter', ()=> expandButton.style.transform='translateY(-1px)'); expandButton.addEventListener('mouseleave', ()=> expandButton.style.transform='none');
        expandButton.classList.add('elogBulanExpand')
        expandButton.addEventListener('click', () => {
            let daily_body_table = document.getElementById("body_daily_logbook")
            let uid = dataset.uid
            daily_body_table.innerHTML = null
            document.getElementById('rekap_bulan_id').textContent = uid
            document.getElementById('logbook_input_id').value = uid
            document.getElementById('rekap_bulan_tahun').value = dataset.year
            document.getElementById('rekap_bulan_bulan').value = dataset.month

            getDailyLogbook(function(datasetBulanan) {
                createRowTableBulanan(daily_body_table, kolom, 31)
                tableRowDailyLogbook(datasetBulanan.responses)
            }, uid)

            if (document.getElementById("elogbookHarian").hidden) {
                document.getElementById('elogHarian').click();
            } else {}
        })
        cellRow1.append(dataset.uid)
        cellRow1.style.fontWeight='600'; cellRow1.style.color='#1a1f3d'; cellRow1.style.fontFamily="'Instrument Sans',sans-serif"; cellRow1.style.fontSize='0.75rem';
        cellRow2.append(dataset.month)
        cellRow3.append(dataset.year)
        cellRowCabang.append(dataset.cabang ? dataset.cabang : '-')
        cellRowCabang.style.textTransform='capitalize'; cellRowCabang.style.fontSize='0.75rem'; cellRowCabang.style.fontWeight='600'; cellRowCabang.style.color='#49548C';
        cellRowTower.append(dataset.tower ? dataset.tower : '-')
        cellRowTower.style.fontSize='0.72rem'; cellRowTower.style.fontWeight='600'; cellRowTower.style.color='#1a1f3d'; cellRowTower.style.fontFamily="'Outfit',sans-serif";
        if(dataset.tower){ cellRowTower.innerHTML = '<span style="background:#e8ecff; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; padding:0.2rem 0.6rem; font-size:0.68rem; white-space:nowrap;"><i class="fa-solid fa-tower-broadcast me-1" style="font-size:0.6rem;"></i> '+dataset.tower+'</span>'; } else { cellRowTower.textContent='-'; }
        let badge = document.createElement('span'); badge.textContent = dataset.month ? 'Tersedia' : '-'; badge.style.background='#dcfce7'; badge.style.color='#14532d'; badge.style.border='1px solid #bbf7d0'; badge.style.borderRadius='2rem'; badge.style.padding='0.2rem 0.6rem'; badge.style.fontFamily="'Instrument Sans',sans-serif"; badge.style.fontSize='0.65rem'; badge.style.fontWeight='700';
        cellRow4.append(badge)
        cellRow5.innerHTML = '<span style="color:#49548C; font-weight:600;"><i class="fa-solid fa-user-check me-1"></i> OK</span>';
        cellRow6.append(expandButton)
        tableRow.classList.add(['text-center'])
        tableRow.append(cellRow1, cellRow2, cellRow3, cellRowCabang, cellRowTower, cellRow4, cellRow6)
        tableBody.insertAdjacentElement('afterbegin', tableRow)
    }

    function tableRowDailyLogbook(dataset) {
        const text_field = {
            "morning_ctr": "morning_ctr",
            "morning_ass": "morning_ass",
            "morning_rest": "morning_rest",
            "afternoon_ctr": "afternoon_ctr",
            "afternoon_ass": "afternoon_ass",
            "afternoon_rest": "afternoon_rest",
            "night_ctr": "night_ctr",
            "night_ass": "night_ass",
            "night_rest": "night_rest",
        };
        const unit_field = {
            "unit": "unit"
        }

        for (i in dataset) {
            for (fields in text_field) {
                cell = document.getElementById(text_field[fields] + dataset[i].day)
                var hour = dataset[i][text_field[fields] + "_hour"]
                var minute = dataset[i][text_field[fields] + "_minute"]
                timedata = time_format(hour, minute)
                if (timedata[0] == 0 & timedata[1] == 0) {} else {
                    let time = timedata[0] + ":" + timedata[1];
                    cell.textContent = time;
                    cell.style.color='#1a1f3d'; cell.style.fontWeight='600';
                }

            }
            cell = document.getElementById("unit" + i)
            cell.textContent = dataset[i].unit.toUpperCase();
            cell.style.color='#49548C'; cell.style.fontWeight='700'; cell.style.fontSize='0.68rem';
        }
    }

    function getDailyLogbook(callback, rekap_id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?= route('logbook.bulanan') ?>',
            type: 'POST',
            data: {
                elogbook_id: rekap_id,
                user_id: 'test'
            },
            success: function(response) {
                callback({
                    responses: response,
                    statusCode: 200,
                    message: "request complete"
                })
            },
            error: function(response) {
                callback({
                    responses: response,
                    statusCode: 400,
                    message: "request complete"
                })
            },
            complete: function() {

            }
        });
    }

    function formDailyLogbook(id, dataset) {
        document.getElementById('rekap_bulan_id').textContent = id
        document.getElementById('logbook_input_id').value = id
        document.getElementById('logbook_input_month').value = dataset[dataset.length - 1].month
        document.getElementById('logbook_input_year').value = dataset[dataset.length - 1].year
        document.getElementById('rekap_bulan_tahun').value = dataset[dataset.length - 1].year
        document.getElementById('rekap_bulan_bulan').value = dataset[dataset.length - 1].month
    }
</script>
<script>
    let table_col = {
        "morning_ctr": "morning_ctr",
        "morning_ass": "morning_ass",
        "morning_rest": "morning_rest",
        "afternoon_ctr": "afternoon_ctr",
        "afternoon_ass": "afternoon_ass",
        "afternoon_rest": "afternoon_rest",
        "night_ctr": "night_ctr",
        "night_ass": "night_ass",
        "night_rest": "night_rest",
        "unit": "unit",
        "option": "option"
    };
    let table_body_bulan = document.getElementById("body_daily_logbook")
    //init elogbook process
    $(document).ready(function() {
        createRowTableBulanan(table_body_bulan, table_col, 31)
        getRekapTahunan(function(dataset) {
            for (i in dataset.responses) {
                tableRowCreate(dataset.responses[i])
            }
            if(dataset.responses.length>0){
                let recentDataUID = dataset.responses[dataset.responses.length - 1].uid
                formDailyLogbook(recentDataUID, dataset.responses)
                getDailyLogbook(function(datasetBulanan) {
                    tableRowDailyLogbook(datasetBulanan.responses)
                }, recentDataUID)
            }
        })
    })
</script>
@endpush
