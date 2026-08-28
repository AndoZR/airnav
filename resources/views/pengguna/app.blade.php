<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tab')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Space+Grotesk:wght@400;500;600;700&family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Plus Jakarta Sans', 'Instrument Sans', system-ui, -apple-system, sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; text-rendering: optimizeLegibility; background:#fcfdff; }
        h1,h2,h3,h4,h5,.fw-bold { font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.025em; }
        .display-font { font-family: 'Space Grotesk', 'Outfit', sans-serif; letter-spacing:-0.03em; }
        .artikel-hero-title { font-family:'Outfit',sans-serif; font-weight:800; letter-spacing:-0.03em; line-height:1.1; font-size:clamp(2rem, 4vw, 2.65rem); }
        .artikel-hero-sub { font-family:'Space Grotesk',sans-serif; font-weight:600; letter-spacing:-0.01em; line-height:1.25; font-size:clamp(1.05rem, 2.2vw, 1.35rem); }
        .artikel-hero-desc { font-family:'Plus Jakarta Sans',sans-serif; font-weight:400; line-height:1.85; letter-spacing:0.015em; font-size:0.96rem; }
        .artikel-title { font-family: 'Outfit', sans-serif; font-weight:700; letter-spacing:-0.02em; line-height:1.32; font-size:1.02rem; }
        .artikel-desc { font-family: 'Plus Jakarta Sans', sans-serif; font-weight:400; line-height:1.7; letter-spacing:0.015em; font-size:0.875rem; color:#3d4a5c; }
        .artikel-meta { font-family: 'Plus Jakarta Sans', sans-serif; font-weight:700; letter-spacing:0.06em; text-transform:uppercase; font-size:0.68rem; }
        .eyecatch-badge { font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:0.04em; }
        /* Pembelajaran — premium typography system (rapi, justify, hierarki jelas) */
        .pemb-hero-title { font-family:'Outfit',sans-serif; font-weight:900; letter-spacing:-0.03em; line-height:1.08; font-feature-settings:"ss01" 1; }
        .pemb-hero-desc { font-family:'Plus Jakarta Sans',sans-serif; font-weight:400; line-height:1.85; letter-spacing:0.015em; font-size:0.95rem; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word; }
        .pemb-section-title { font-family:'Outfit',sans-serif; font-weight:800; letter-spacing:-0.025em; line-height:1.22; font-size:1.55rem; }
        .pemb-section-sub { font-family:'Plus Jakarta Sans',sans-serif; font-weight:400; line-height:1.75; letter-spacing:0.01em; font-size:0.90rem; color:#6c757d; text-align:justify; text-align-last:center; hyphens:auto; text-justify:inter-word; }
        .pemb-card-title { font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:-0.02em; line-height:1.32; font-size:1.12rem; }
        .pemb-body { font-family:'Plus Jakarta Sans',sans-serif; font-weight:400; line-height:1.85; letter-spacing:0.012em; font-size:0.92rem; color:#3d4a5c; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word; }
        .pemb-body-sm { font-family:'Plus Jakarta Sans',sans-serif; font-weight:400; line-height:1.75; letter-spacing:0.01em; font-size:0.88rem; color:#6c757d; text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word; }
        .pemb-label { font-family:'Instrument Sans',sans-serif; font-weight:700; letter-spacing:0.06em; text-transform:uppercase; font-size:0.68rem; }
        .pemb-loca-title { font-family:'Outfit',sans-serif; font-weight:700; letter-spacing:-0.015em; line-height:1.3; font-size:0.82rem; }
        .pemb-justify { text-align:justify; text-align-last:left; hyphens:auto; text-justify:inter-word; }
        /* Scroll reveal */
        .reveal { opacity:0; transform: translateY(18px); transition: all 0.7s cubic-bezier(0.22,1,0.36,1); }
        .reveal.in-view { opacity:1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay:0.08s; } .reveal-delay-2 { transition-delay:0.16s; } .reveal-delay-3 { transition-delay:0.24s; }
        /* Gradient text helper */
        .grad-text { background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
        /* Page transition shimmer — antar halaman (Pembelajaran dll) */
        #pageTransition { position:fixed; inset:0; z-index:9998; pointer-events:none; opacity:0; visibility:hidden; transition: opacity 0.35s ease, visibility 0.35s; }
        #pageTransition.active { opacity:1; visibility:visible; pointer-events:auto; }
        #pageTransition .pt-bar { position:absolute; top:0; left:0; width:100%; height:3px; background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166, #06d6a0, #49548C); background-size:300% 100%; animation: navGradientShift 1.2s ease infinite; transform: scaleX(0); transform-origin:left; transition: transform 0.5s cubic-bezier(0.22,1,0.36,1); }
        #pageTransition.active .pt-bar { transform: scaleX(1); }
        #pageTransition .pt-overlay { position:absolute; inset:0; background: rgba(248,249,255,0.72); backdrop-filter: blur(6px); }
        #pageTransition .pt-card { position:absolute; top:50%; left:50%; transform: translate(-50%,-50%) scale(0.96); background:white; border:1px solid #e8ecff; border-radius:1.2rem; padding:1.2rem 1.6rem; box-shadow:0 16px 40px rgba(73,84,140,0.14); display:flex; align-items:center; gap:0.9rem; opacity:0; transition: all 0.4s cubic-bezier(0.22,1,0.36,1) 0.15s; }
        #pageTransition.active .pt-card { transform: translate(-50%,-50%) scale(1); opacity:1; }
        .pt-spinner { width:22px; height:22px; border:2.5px solid #e8ecff; border-top-color:#49548C; border-radius:50%; animation: ptSpin 0.7s linear infinite; }
        @keyframes ptSpin { to{ transform: rotate(360deg); } }
        @keyframes navGradientShift { 0%{background-position:0% 50%} 50%{background-position:100% 50%} 100%{background-position:0% 50%} }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> <!-- untuk dropdown bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
</head>

<body>
    <!-- Page transition shimmer — tower-aware -->
    <div id="pageTransition" aria-hidden="true">
        <div class="pt-overlay"></div>
        <div class="pt-bar"></div>
        <div class="pt-card">
            <div class="pt-spinner"></div>
            <div>
                <div id="ptTitle" style="font-family:'Outfit',sans-serif; font-weight:800; color:#1a1f3d; font-size:0.95rem; letter-spacing:-0.015em; line-height:1.2;">Memuat...</div>
                <small id="ptSub" style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.72rem; display:block; margin-top:2px; line-height:1.3;">Menyiapkan halaman</small>
            </div>
        </div>
    </div>
    <!-- NAVBAR -->
    @include('pengguna.navbar')

    <!-- Content -->
    @yield('content')

    {{-- FOOTER --}}
    @include('pengguna.footer')

<!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window._be || {};
    window.__be.id = "664a042a81fdc3000799237a";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<noscript>You need to <a href="https://www.chatbot.com/help/chat-widget/enable-javascript-in-your-browser/" rel="noopener nofollow">enable JavaScript</a> in order to use the AI chatbot tool powered by <a href="https://www.chatbot.com/" rel="noopener nofollow" target="_blank">ChatBot</a></noscript>
<!-- End of ChatBot code -->

</body>
<script src="{{ asset('src/jquery/jquery.js') }}"></script>
<script src="{{ asset('src/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('src/bootstrap/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script>
// Scroll reveal — professional eyecatching
document.addEventListener('DOMContentLoaded', function(){
  const els = document.querySelectorAll('.reveal');
  if(els.length){
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if(e.isIntersecting){ e.target.classList.add('in-view'); io.unobserve(e.target); }
      });
    }, {threshold:0.12, rootMargin:'0px 0px -40px 0px'});
    els.forEach(el=> io.observe(el));
  }
  // Page transition shimmer — untuk link Pembelajaran & navigasi internal
  const pt = document.getElementById('pageTransition');
  const ptTitle = document.getElementById('ptTitle');
  const ptSub = document.getElementById('ptSub');
  // Map tower id -> nama untuk label jelas di Test & Pembelajaran
  const towerNames = {1:'Hang Nadim Tower',2:'Tanjung Pinang Tower',3:'TMA North Tower',4:'TMA South Tower',5:'Rajahaji Tower',6:'Ranai Tower',7:'Matak Tower',8:'Letung Tower'};
  function towerFromHref(href){
    var m = href.match(/\/beranda\/pembelajaran\/(\d+)/);
    if(m && towerNames[m[1]]) return towerNames[m[1]];
    // Test mulai: /test/mulai/{id} — coba ambil label dari link (subjek mengandung tower) atau fallback
    var tm = href.match(/\/test\/mulai\/(\d+)/);
    if(tm) return null; // biar diambil dari text link
    return null;
  }
  function showTransition(label, subLabel){
    if(!pt) return;
    if(ptTitle) ptTitle.textContent = label || 'Memuat...';
    if(ptSub) ptSub.textContent = subLabel || (label ? 'Menuju ' + label : 'Menyiapkan halaman');
    pt.classList.add('active');
  }
  document.addEventListener('click', function(e){
    var a = e.target.closest('a[href]');
    if(!a || !pt) return;
    var href = a.getAttribute('href');
    if(!href || href.startsWith('#') || href.startsWith('javascript:') || a.target==='_blank' || a.hasAttribute('download')) return;
    var isPemb = href.indexOf('/beranda/pembelajaran/') !== -1;
    var isTest = href.indexOf('/test/mulai/') !== -1;
    var isBeranda = href.indexOf('/beranda/artikel') !== -1 || href.indexOf('/beranda') !== -1;
    if(!isPemb && !isTest && !isBeranda) return;
    if(href === window.location.pathname) return;
    var tower = towerFromHref(href);
    var raw = (a.textContent||'').trim().replace(/\s+/g,' ');
    var label, sub;
    if(tower){
      label = tower;
      sub = 'Menyiapkan pembelajaran • ' + tower;
    } else if(isTest){
      // Test: ambil subjek dari card (h5.card-header) atau text link
      var card = a.closest('.card');
      var subjek = card ? (card.querySelector('.card-header')||{}).textContent : '';
      subjek = (subjek||raw).trim().slice(0,42) || 'Test';
      // Jika subjek mengandung nama tower, pakai itu
      var towerInSubjek = Object.values(towerNames).find(function(n){ return subjek.toLowerCase().indexOf(n.toLowerCase().split(' ')[0]) !== -1; });
      label = subjek;
      sub = towerInSubjek ? ('Menyiapkan test • ' + towerInSubjek) : 'Menyiapkan test • ' + subjek;
      if(raw.toLowerCase().indexOf('lanjut') !== -1) sub = 'Melanjutkan ' + subjek;
    } else {
      label = raw.slice(0,36) || 'Memuat...';
      sub = label ? 'Menuju ' + label : 'Menyiapkan halaman';
      if(isPemb) { label = label.replace('Tower','').trim() + ' Tower'; sub = 'Menyiapkan pembelajaran • ' + label; }
    }
    showTransition(label, sub);
  });
  window.addEventListener('pageshow', function(){ if(pt) pt.classList.remove('active'); });
  window.addEventListener('beforeunload', function(){ if(pt) pt.classList.add('active'); });
});
</script>
@stack('scripts')
</html>