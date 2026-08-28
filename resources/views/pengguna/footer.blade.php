<footer class="footer-wrapper" style="position:relative; overflow:hidden; margin-top:3rem;">
    {{-- Accent line animasi atas --}}
    <div style="height:4px; background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166, #49548C, #06d6a0); background-size:300% 100%; animation: footerGradientShift 5s ease infinite;"></div>

    {{-- Main footer: gradient AirNav + dekorasi --}}
    <div style="background: linear-gradient(135deg, #2c365e 0%, #343f6b 25%, #49548C 60%, #5d6ab0 100%); position:relative; overflow:hidden;">
        {{-- Dekorasi lingkaran halus --}}
        <div style="position:absolute; top:-60px; right:-60px; width:260px; height:260px; background:rgba(255,255,255,0.05); border-radius:50%; pointer-events:none; animation: footerPulse 6s ease-in-out infinite;"></div>
        <div style="position:absolute; bottom:-40px; left:5%; width:180px; height:180px; background:rgba(255,255,255,0.04); border-radius:50%; pointer-events:none; animation: footerPulse 7s ease-in-out infinite reverse;"></div>
        <div style="position:absolute; top:30%; left:45%; width:100px; height:100px; background:rgba(255,255,255,0.03); border-radius:50%; pointer-events:none;"></div>

        <div class="container" style="position:relative; padding: 2.8rem 1rem 1.5rem;">
            <div class="row g-4">
                {{-- KONTAK --}}
                <div class="col-lg-5 col-md-6" style="animation: footerFadeInUp 0.7s ease forwards;">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div style="width:36px; height:36px; background:rgba(255,255,255,0.12); backdrop-filter:blur(6px); border-radius:0.7rem; display:flex; align-items:center; justify-content:center; border:1px solid rgba(255,255,255,0.15);">
                            <i class="fa-solid fa-location-dot text-white" style="font-size:0.9rem;"></i>
                        </div>
                        <h5 class="text-white fw-bold mb-0" style="font-family:'Outfit',sans-serif; letter-spacing:0.04em; font-size:0.95rem;">KONTAK</h5>
                        <div style="flex:1; height:1px; background: linear-gradient(90deg, rgba(255,255,255,0.3), transparent); margin-left:0.5rem;"></div>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3 align-items-start footer-contact-item" style="transition: all 0.3s;">
                            <div style="width:38px; height:38px; background:rgba(255,255,255,0.1); border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0; border:1px solid rgba(255,255,255,0.12);">
                                <i class="fa-solid fa-map-pin text-white" style="font-size:0.8rem;"></i>
                            </div>
                            <p class="text-white mb-0 small" style="opacity:0.9; line-height:1.6; font-size:0.88rem;">
                                Jl. Adi Sucipto No.KM.12, Pinang Kencana,<br>
                                Kec. Tanjungpinang Tim., Kota Tanjung Pinang,<br>
                                Kepulauan Riau 29125
                            </p>
                        </div>
                        <a href="tel:07717335581" class="d-flex gap-3 align-items-center text-decoration-none footer-contact-item" style="transition: all 0.3s;">
                            <div style="width:38px; height:38px; background:rgba(255,255,255,0.1); border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0; border:1px solid rgba(255,255,255,0.12);">
                                <i class="fa-solid fa-phone text-white" style="font-size:0.8rem;"></i>
                            </div>
                            <span class="text-white small fw-semibold" style="opacity:0.9;">0771-7335581</span>
                        </a>
                        <a href="mailto:airnavtnj@gmail.com" class="d-flex gap-3 align-items-center text-decoration-none footer-contact-item" style="transition: all 0.3s;">
                            <div style="width:38px; height:38px; background: linear-gradient(135deg, #ffd166 0%, #ffb703 100%); border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 12px rgba(255,209,102,0.3);">
                                <i class="fa-solid fa-envelope" style="color:#2c365e; font-size:0.8rem;"></i>
                            </div>
                            <span class="text-white small fw-semibold" style="opacity:0.95;">airnavtnj@gmail.com</span>
                        </a>
                    </div>
                </div>

                {{-- LAYANAN --}}
                <div class="col-lg-3 col-md-6" style="animation: footerFadeInUp 0.7s ease 0.15s forwards; opacity:0;">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div style="width:36px; height:36px; background:rgba(255,255,255,0.12); backdrop-filter:blur(6px); border-radius:0.7rem; display:flex; align-items:center; justify-content:center; border:1px solid rgba(255,255,255,0.15);">
                            <i class="fa-solid fa-layer-group text-white" style="font-size:0.85rem;"></i>
                        </div>
                        <h5 class="text-white fw-bold mb-0" style="font-family:'Outfit',sans-serif; letter-spacing:0.04em; font-size:0.95rem;">LAYANAN</h5>
                        <div style="flex:1; height:1px; background: linear-gradient(90deg, rgba(255,255,255,0.3), transparent); margin-left:0.5rem;"></div>
                    </div>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-1">
                        <li><a href="{{ route('beranda.index') }}" class="footer-link text-white text-decoration-none small d-flex align-items-center gap-2 py-1.5" style="opacity:0.85; transition: all 0.3s; font-weight:500;"><span style="width:6px; height:6px; background:#8a9ad6; border-radius:50%; display:inline-block; transition: all 0.3s;" class="dot"></span> Beranda <i class="fa-solid fa-arrow-right ms-auto" style="font-size:0.6rem; opacity:0; transform:translateX(-6px); transition: all 0.3s;" class="arr"></i></a></li>
                        <li><a href="{{ route('beranda.artikel') }}" class="footer-link text-white text-decoration-none small d-flex align-items-center gap-2 py-1.5" style="opacity:0.85; transition: all 0.3s; font-weight:500;"><span style="width:6px; height:6px; background:#ffd166; border-radius:50%; display:inline-block;"></span> Artikel <i class="fa-solid fa-arrow-right ms-auto" style="font-size:0.6rem; opacity:0; transform:translateX(-6px); transition: all 0.3s;"></i></a></li>
                        <li><a href="{{ route('beranda.index') }}#pembelajaran" class="footer-link text-white text-decoration-none small d-flex align-items-center gap-2 py-1.5" style="opacity:0.85; transition: all 0.3s; font-weight:500;"><span style="width:6px; height:6px; background:#06d6a0; border-radius:50%; display:inline-block;"></span> Pembelajaran <i class="fa-solid fa-arrow-right ms-auto" style="font-size:0.6rem; opacity:0; transform:translateX(-6px); transition: all 0.3s;"></i></a></li>
                        <li><a href="{{ route('beranda.HangNadim_ATS') }}" class="footer-link text-white text-decoration-none small d-flex align-items-center gap-2 py-1.5" style="opacity:0.85; transition: all 0.3s; font-weight:500;"><span style="width:6px; height:6px; background:#ff6b6b; border-radius:50%; display:inline-block;"></span> Organisasi Cabang <i class="fa-solid fa-arrow-right ms-auto" style="font-size:0.6rem; opacity:0; transform:translateX(-6px); transition: all 0.3s;"></i></a></li>
                        <li><a href="{{ route('akun.index') }}" class="footer-link text-white text-decoration-none small d-flex align-items-center gap-2 py-1.5" style="opacity:0.85; transition: all 0.3s; font-weight:500;"><span style="width:6px; height:6px; background:#8a9ad6; border-radius:50%; display:inline-block;"></span> Akun <i class="fa-solid fa-arrow-right ms-auto" style="font-size:0.6rem; opacity:0; transform:translateX(-6px); transition: all 0.3s;"></i></a></li>
                    </ul>
                </div>

                {{-- LOGO + BRAND: logo putih di background gelap biar kontras --}}
                <div class="col-lg-4 col-md-12 d-flex flex-column align-items-center justify-content-center text-center" style="animation: footerFadeInUp 0.7s ease 0.3s forwards; opacity:0;">
                    <div style="background: rgba(255,255,255,0.10); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.18); border-radius:1.2rem; padding:1.2rem 1.5rem; box-shadow: 0 12px 32px rgba(0,0,0,0.18); transition: all 0.4s;" onmouseover="this.style.background='rgba(255,255,255,0.14)'; this.style.transform='scale(1.02)'" onmouseout="this.style.background='rgba(255,255,255,0.10)'; this.style.transform='scale(1)'">
                        <img src="{{ asset('src/img/logoAirNav.png') }}" alt="AirNav Indonesia" style="height:42px; width:auto; object-fit:contain; display:block; margin:0 auto; filter: brightness(0) invert(1) drop-shadow(0 2px 8px rgba(0,0,0,0.2));">
                        <div class="mt-3" style="height:2px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent); border-radius:1px;"></div>
                        <div class="fw-bold mt-2 text-white" style="font-family:'Space Grotesk',sans-serif; font-size:0.95rem; letter-spacing:0.03em;">AirNav Assist</div>
                        <small class="text-white" style="opacity:0.85; font-size:0.7rem; letter-spacing:0.04em; font-weight:600;">TANJUNG PINANG • PROFESSIONAL PORTAL</small>
                    </div>
                    <p class="text-white small mt-3 mb-0" style="opacity:0.85; font-size:0.78rem; max-width:320px; line-height:1.75; text-align:justify; text-align-last:left; hyphens:auto;">
                        Sistem informasi terintegrasi AirNav Indonesia untuk pengelolaan pengetahuan, pengembangan kompetensi, dan diseminasi informasi penerbangan yang akurat, berstandar, dan berorientasi keselamatan.
                    </p>
                </div>
            </div>

            {{-- Divider estetik --}}
            <div style="height:1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent); margin: 1.8rem 0 1.2rem;"></div>

            {{-- Social media --}}
            <div class="d-flex flex-wrap justify-content-center gap-2 mb-3" style="animation: footerFadeIn 0.7s ease 0.45s forwards; opacity:0;">
                <a class="footer-social btn btn-sm d-flex align-items-center justify-content-center" href="#!" role="button" style="width:42px; height:42px; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); backdrop-filter:blur(6px); border-radius:0.8rem; color:white; transition: all 0.35s; font-size:0.85rem;"><i class="fab fa-facebook-f"></i></a>
                <a class="footer-social btn btn-sm d-flex align-items-center justify-content-center" href="#!" role="button" style="width:42px; height:42px; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); backdrop-filter:blur(6px); border-radius:0.8rem; color:white; transition: all 0.35s; font-size:0.85rem;"><i class="fab fa-twitter"></i></a>
                <a class="footer-social btn btn-sm d-flex align-items-center justify-content-center" href="#!" role="button" style="width:42px; height:42px; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); backdrop-filter:blur(6px); border-radius:0.8rem; color:white; transition: all 0.35s; font-size:0.85rem;"><i class="fab fa-instagram"></i></a>
                <a class="footer-social btn btn-sm d-flex align-items-center justify-content-center" href="#!" role="button" style="width:42px; height:42px; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); backdrop-filter:blur(6px); border-radius:0.8rem; color:white; transition: all 0.35s; font-size:0.85rem;"><i class="fab fa-linkedin-in"></i></a>
                <a class="footer-social btn btn-sm d-flex align-items-center justify-content-center" href="#!" role="button" style="width:42px; height:42px; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); backdrop-filter:blur(6px); border-radius:0.8rem; color:white; transition: all 0.35s; font-size:0.85rem;"><i class="fab fa-youtube"></i></a>
                <a class="footer-social btn btn-sm d-flex align-items-center justify-content-center" href="mailto:airnavtnj@gmail.com" role="button" style="width:42px; height:42px; background: linear-gradient(135deg, #ffd166 0%, #ffb703 100%); border:none; border-radius:0.8rem; color:#2c365e; transition: all 0.35s; font-size:0.85rem; box-shadow:0 4px 12px rgba(255,209,102,0.3);"><i class="fa-solid fa-envelope"></i></a>
            </div>
        </div>
    </div>

    {{-- Copyright bar --}}
    <div style="background: #1e2540; position:relative; overflow:hidden;">
        <div style="position:absolute; top:0; left:0; width:100%; height:1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);"></div>
        <div class="container text-center py-3" style="position:relative;">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-2">
                <span class="text-white small" style="opacity:0.75; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.82rem; letter-spacing:0.02em;">
                    © 2024 Copyright:
                </span>
                <a class="text-white fw-bold text-decoration-none" href="https://airnavassist.com/" style="font-family:'Outfit',sans-serif; letter-spacing:0.03em; font-size:0.9rem; background: linear-gradient(90deg, #8a9ad6, #ffd166); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; transition: all 0.3s;" onmouseover="this.style.letterSpacing='0.05em'" onmouseout="this.style.letterSpacing='0.03em'">AirNav Assist</a>
                <span class="text-white small d-none d-sm-inline" style="opacity:0.4;">•</span>
                <span class="text-white small" style="opacity:0.5; font-size:0.75rem;">Tanjung Pinang • Batam • Professional Aviation Portal</span>
            </div>
        </div>
    </div>
</footer>

<style>
.footer-link:hover { opacity:1 !important; transform: translateX(4px); color:white !important; }
.footer-link:hover .dot { transform: scale(1.4); box-shadow:0 0 8px currentColor; }
.footer-link:hover i { opacity:1 !important; transform:translateX(0) !important; }
.footer-contact-item:hover { transform: translateX(3px); }
.footer-contact-item:hover div { background:rgba(255,255,255,0.15) !important; }
.footer-social:hover { transform: translateY(-4px) scale(1.05); background: white !important; color:#49548C !important; border-color:white !important; box-shadow:0 8px 20px rgba(0,0,0,0.2) !important; }
@keyframes footerGradientShift { 0% { background-position:0% 50%; } 50% { background-position:100% 50%; } 100% { background-position:0% 50%; } }
@keyframes footerPulse { 0%,100% { transform: scale(1); opacity:1; } 50% { transform: scale(1.08); opacity:0.8; } }
@keyframes footerFadeInUp { from { opacity:0; transform: translateY(16px); } to { opacity:1; transform: translateY(0); } }
@keyframes footerFadeIn { from { opacity:0; } to { opacity:1; } }
</style>
