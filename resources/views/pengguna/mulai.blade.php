@extends('pengguna.app')
@section('tab', 'Airnav Assist | Test')

@section('content')
<div style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); padding:1.2rem 0; position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at 30% 20%, rgba(255,255,255,0.08) 0%, transparent 50%); pointer-events:none;"></div>
    <div class="container d-flex flex-wrap gap-2 align-items-center" style="position:relative;">
        <span class="badge bg-white px-3 py-2" style="color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; border:1px solid rgba(255,255,255,0.2); box-shadow:0 4px 12px rgba(0,0,0,0.12);"><i class="fa-solid fa-tower-broadcast me-1"></i> {{ $test->subjek ?? 'Test' }}</span>
        <span class="badge px-3 py-2" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.28); backdrop-filter:blur(6px); border-radius:2rem; font-family:'Outfit',sans-serif;"><i class="fa-solid fa-layer-group me-1"></i> 10 soal acak</span>
        <span class="ms-auto d-flex align-items-center gap-2 px-3 py-2" id="timer" style="background: linear-gradient(135deg, #ffd166 0%, #ffb703 100%); color:#1a1f3d; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:800; font-size:0.92rem; box-shadow:0 4px 14px rgba(0,0,0,0.18); border:1px solid rgba(255,255,255,0.3); animation: timerPulse 1.8s ease-in-out infinite;"><i class="fa-solid fa-hourglass-half"></i> <span>30:00</span></span>
    </div>
</div>
<div style="background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 30%, #dbe4ff 70%, #e8ecff 100%); padding: 1.6rem 0 2rem; min-height:70vh; position:relative;">
    <div style="position:absolute; inset:0; opacity:0.14; background-image: radial-gradient(circle, rgba(73,84,140,0.06) 1px, transparent 1px); background-size:22px 22px; pointer-events:none;"></div>
    <div class="container" style="position:relative;">
    <div class="alert d-flex align-items-center gap-2" style="background: rgba(255,255,255,0.96); border:1px solid #dbe0ff; border-radius:1rem; font-family:'Instrument Sans',sans-serif; font-size:0.84rem; color:#1a1f3d; backdrop-filter:blur(6px); box-shadow:0 6px 18px rgba(73,84,140,0.08);">
        <span style="width:28px; height:28px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-shuffle text-white" style="font-size:0.7rem;"></i></span>
        <span>Soal diacak — urutan berbeda setiap percobaan. Jawab semua lalu <strong>Submit</strong> untuk lihat total skor.</span>
        <span class="ms-auto badge" style="background:#e8ecff; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.65rem;"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Profesional • ATC</span>
    </div>
    <form id="form-test">
        @csrf
        @foreach ($dataTest as $idx => $item)
        <div class="card border-0 my-3 soal-card" style="border-radius:1.2rem; overflow:hidden; background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%); border:1px solid #eef0ff !important; box-shadow:0 8px 24px rgba(73,84,140,0.08); animation: soalEntrance 0.5s cubic-bezier(0.22,1,0.36,1) backwards; animation-delay: {{ $idx * 0.06 }}s;">
            <div style="height:3px; background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166); background-size:200% 100%; animation: footerGradientShift 3s ease infinite;"></div>
            <div class="card-body p-4">
                <div class="d-flex gap-3">
                    <span style="width:34px; height:34px; min-width:34px; background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:0.7rem; display:flex; align-items:center; justify-content:center; font-family:'Outfit',sans-serif; font-weight:800; font-size:0.85rem; box-shadow:0 4px 12px rgba(73,84,140,0.18);">{{ $idx+1 }}</span>
                    <label class="mb-3 flex-grow-1" style="font-family:'Outfit',sans-serif; font-weight:600; color:#1a1f3d; font-size:0.96rem; line-height:1.5; margin:0; padding-top:0.2rem;">{{ preg_replace('/^\d+\.\s*/','',$item->pertanyaan) }}</label>
                </div>
                <div class="mt-3 d-flex flex-column gap-2">
                    @foreach ($item->jawaban as $opsi)
                    <label class="d-flex align-items-center gap-3 p-3 rounded-3" style="border:1px solid #eef0ff; background:white; cursor:pointer; transition: all 0.25s ease; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.88rem; color:#2a3342; line-height:1.5;" onmouseover="this.style.borderColor='#8a9ad6'; this.style.background='#f8f9ff'; this.style.transform='translateX(4px)'" onmouseout="this.style.borderColor='#eef0ff'; this.style.background='white'; this.style.transform='none'">
                        <input class="form-check-input m-0" type="radio" name="{{ $opsi->id_soal }}" id="{{ $opsi->id }}" value="{{ $opsi->nilai }}" style="width:18px; height:18px; flex-shrink:0; accent-color:#49548C;">
                        <span>{{ $opsi->jawaban }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 p-3 gap-2" style="background: rgba(255,255,255,0.96); border:1px solid #dbe0ff; border-radius:1rem; box-shadow:0 8px 24px rgba(73,84,140,0.08); backdrop-filter:blur(6px);">
            <small style="color:#6c757d; font-family:'Instrument Sans',sans-serif;"><i class="fa-solid fa-circle-info me-1"></i> Jawab semua 10 soal lalu submit — skor = benar × 10 (maks 100)</small>
            <div class="d-flex align-items-center gap-2 ms-auto">
                <span id="scoreInline" class="d-none badge" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); color:#14532d; border:1px solid #bbf7d0; border-radius:2rem; padding:0.6rem 1.1rem; font-family:'Outfit',sans-serif; font-weight:800; font-size:1rem; box-shadow:0 4px 12px rgba(34,197,94,0.15);"><i class="fa-solid fa-star me-1" style="color:#16a34a;"></i> Nilai: <span id="scoreVal">0</span>/100</span>
                <button class="btn px-5 fw-bold" type="submit" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 6px 16px rgba(73,84,140,0.18); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">Submit — Lihat Skor</button>
            </div>
        </div>
    </form>
    <div id="scorePreview" class="alert d-none mt-3 text-center" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border:1px solid #bbf7d0; border-radius:1rem; font-family:'Outfit',sans-serif; font-weight:700; color:#14532d;"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var idTest = `{{ $idTest }}`;
    var idHasil = `{{ $idHasil }}`;
    var jawabanDipilih = [];

    // build jawabanDipilih live dari radio terpilih
    function rebuildJawabanDipilih(){
        jawabanDipilih = [];
        document.querySelectorAll('input[type=\"radio\"]:checked').forEach(function(r){ jawabanDipilih.push(r.id); });
    }
    // submit
    $('#form-test').submit(function(e) {
        e.preventDefault();
        rebuildJawabanDipilih();

        var url = "{{ route('test.selesai',['id'=>':id']) }}";
        url = url.replace(':id', idTest)

        var formData = new FormData($("#form-test")[0]);
        formData.append('idHasil', idHasil);

        // Konversi array jawabanDipilih ke JSON string sebelum menambahkannya ke formData
        formData.append('jawabanDipilih', JSON.stringify(jawabanDipilih));

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var skor = response.data && response.data.hasil ? response.data.hasil : '';
                var txt = skor ? ' Skor Anda: ' + skor + '/100' : '';
                var box = document.getElementById('scorePreview');
                if(box){ box.textContent = 'Total skor: ' + skor + '/100'; box.classList.remove('d-none'); }
                // tampil di samping Submit
                var inline = document.getElementById('scoreInline');
                var val = document.getElementById('scoreVal');
                if(inline && val){ val.textContent = skor; inline.classList.remove('d-none'); inline.style.animation='treeFadeIn 0.5s ease'; }
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Tersimpan!',
                    text: (response.meta.message || '') + txt,
                    timer: 10000
                }).then((result) => {
                    localStorage.clear();
                    // kembali ke tampilan 3 kartu premium (tower) — tidak ke list panjang lama
                    var towerMatch = (document.referrer||'').match(/\/tower\/(\d+)/);
                    // coba ambil tower dari subjek jika ada
                    var subj = "{{ $test->subjek ?? '' }}";
                    var towerFromSubj = null;
                    if(subj.includes('Hang Nadim')) towerFromSubj=1;
                    else if(subj.includes('Tanjung Pinang')) towerFromSubj=2;
                    else if(subj.includes('TMA North')) towerFromSubj=3;
                    else if(subj.includes('TMA South')) towerFromSubj=4;
                    else if(subj.includes('Rajahaji')) towerFromSubj=5;
                    else if(subj.includes('Ranai')) towerFromSubj=6;
                    else if(subj.includes('Matak')) towerFromSubj=7;
                    else if(subj.includes('Letung')) towerFromSubj=8;
                    var target = towerMatch ? towerMatch[1] : (towerFromSubj || 1);
                    window.location.href = "{{ url('test/tower') }}/" + target;
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                switch (xhr.status) {
                    case 422:
                    var message = xhr.responseJSON.meta.message;
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: message,
                    });
                    break;
                    default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan!',
                    })
                    break;
                }
            }
        });
    });

    // Hapus data dengan kunci 'startTime'
    // localStorage.removeItem('startTime');

    // Hapus semua data dari localStorage
    // localStorage.clear();

    // Cek apakah waktu mulai sudah disimpan di Local Storage
    var startTime = localStorage.getItem('startTime');

    if (!startTime) {
        // Jika belum disimpan, simpan waktu mulai saat ini
        startTime = new Date().getTime();
        localStorage.setItem('startTime', startTime);
    }

    // Waktu dalam format "00:01:00"
    var waktu = `{{ $durasi }}`;

    // Pisahkan jam, menit, dan detik
    var waktuSplit = waktu.split(":");
    var jam = parseInt(waktuSplit[0]);
    var menit = parseInt(waktuSplit[1]);
    var detik = parseInt(waktuSplit[2]);

    // Konversi ke detik
    var duration = (jam * 3600) + (menit * 60) + detik;

    // Timer premium — tampil MM:SS dengan warna berubah
    var timerEl = document.getElementById("timer");
    var timerSpan = timerEl ? timerEl.querySelector("span") : null;
    var timer = setInterval(function() {
        var now = new Date().getTime();
        var elapsed = (now - startTime) / 1000;
        var remaining = duration - elapsed;
        if(remaining < 0) remaining = 0;
        var minutes = Math.floor(remaining / 60);
        var seconds = Math.floor(remaining % 60);
        var mm = String(minutes).padStart(2,'0');
        var ss = String(seconds).padStart(2,'0');
        if(timerSpan) timerSpan.textContent = mm + ":" + ss;
        else if(timerEl) timerEl.textContent = mm + ":" + ss;
        if(timerEl){
            if(remaining < 300) { timerEl.style.background='linear-gradient(135deg, #ef4444 0%, #f87171 100%)'; timerEl.style.color='white'; timerEl.style.animation='timerPulse 0.8s ease-in-out infinite'; }
            else if(remaining < 600) { timerEl.style.background='linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%)'; timerEl.style.color='#1a1f3d'; }
        }

        // Hentikan timer jika waktu habis
        if (remaining <= 0) {
            clearInterval(timer);
            document.getElementById("timer").innerHTML = "Time's up!";
            $('#form-test').submit();
        }
    }, 1000); // Update setiap detik

    document.addEventListener('DOMContentLoaded', function() {
        var radios = document.querySelectorAll('input[type="radio"]');
        radios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                localStorage.setItem(this.name, this.id);
            });
        });
    });

    // Animasi soal cards — sudah via CSS soalEntrance
    var style = document.createElement('style');
    style.textContent = "@keyframes soalEntrance{from{opacity:0; transform: translateY(14px) scale(0.98);} to{opacity:1; transform: translateY(0) scale(1);} } @keyframes timerPulse{0%,100%{transform:scale(1);}50%{transform:scale(1.04);}} @keyframes timerPulseBg{0%,100%{box-shadow:0 4px 14px rgba(0,0,0,0.18);}50%{box-shadow:0 6px 20px rgba(239,68,68,0.35);}}";
    document.head.appendChild(style);
    document.addEventListener('DOMContentLoaded', function() {
    var radios = document.querySelectorAll('input[type="radio"]');
    radios.forEach(function(radio) {
        var storedValue = localStorage.getItem(radio.name);
        if (storedValue === radio.id) {
            radio.checked = true;
            jawabanDipilih.push(storedValue);
            // highlight selected label
            var lbl = radio.closest('label'); if(lbl){ lbl.style.borderColor='#49548C'; lbl.style.background='#eef0ff'; }
        }
        radio.addEventListener('change', function(){
            // reset siblings highlight
            document.querySelectorAll('input[name=\"'+this.name+'\"]').forEach(function(r){
                var l = r.closest('label'); if(l){ l.style.borderColor='#eef0ff'; l.style.background='white'; }
            });
            var cur = this.closest('label'); if(cur){ cur.style.borderColor='#49548C'; cur.style.background='#eef0ff'; }
        });
    });
});

</script>
@endpush