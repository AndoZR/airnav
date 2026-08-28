<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Sign In — AirNav Assist</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body{ font-family:'Plus Jakarta Sans',sans-serif; -webkit-font-smoothing:antialiased; }
        @keyframes heroGradient{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
        @keyframes floatPlane{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
        @keyframes fadeInUp{from{opacity:0; transform:translateY(16px)}to{opacity:1; transform:translateY(0)}}
        @keyframes fadeInLeft{from{opacity:0; transform:translateX(-16px)}to{opacity:1; transform:translateX(0)}}
        @keyframes fadeInRight{from{opacity:0; transform:translateX(16px)}to{opacity:1; transform:translateX(0)}}
        @keyframes pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.04)}}
        @keyframes shimmer{0%{background-position:-200% 0}100%{background-position:200% 0}}
    </style>
</head>
<body class="min-h-screen bg-[#f0f2ff] flex items-center justify-center p-4 md:p-6" style="background: radial-gradient(ellipse at 20% 20%, #e8ecff 0%, #f0f2ff 45%, #eef2ff 100%);">
    <!-- BG dekor -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-[420px] h-[420px] rounded-full" style="background: radial-gradient(circle, rgba(73,84,140,0.08) 0%, transparent 70%); animation: pulse 8s ease-in-out infinite;"></div>
        <div class="absolute -bottom-20 -left-20 w-[340px] h-[340px] rounded-full" style="background: radial-gradient(circle, rgba(138,154,214,0.10) 0%, transparent 70%); animation: pulse 9s ease-in-out infinite reverse;"></div>
    </div>

    <div class="relative w-full max-w-[920px] bg-white rounded-[1.6rem] shadow-[0_20px_60px_rgba(73,84,140,0.18),0_4px_16px_rgba(73,84,140,0.08)] overflow-hidden flex flex-col md:flex-row min-h-[520px] border border-white" style="animation: fadeInUp 0.7s cubic-bezier(0.22,1,0.36,1);">
        <!-- KIRI: Form -->
        <div class="flex-1 p-7 md:p-9 flex flex-col justify-center" style="animation: fadeInLeft 0.7s cubic-bezier(0.22,1,0.36,1) 0.1s both;">
            <div class="mb-6">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-[0.65rem] font-bold tracking-wider" style="background:#e8ecff; color:#49548C; border:1px solid #dbe0ff; font-family:'Outfit',sans-serif; letter-spacing:0.06em;"><i class="fa-solid fa-shield-halved" style="color:#ffb703;"></i> PROFESSIONAL AVIATION PORTAL</div>
                <h1 class="mt-4 text-[1.7rem] font-extrabold leading-none" style="font-family:'Outfit',sans-serif; letter-spacing:-0.03em; color:#1a1f3d;">Sign In</h1>
                <p class="mt-1.5 text-[0.84rem] leading-relaxed" style="color:#6b7280; font-family:'Plus Jakarta Sans',sans-serif;">Silahkan Masukkan Username dan Password!</p>
            </div>

            <form class="space-y-4" action="{{ route('signInPost') }}" method="POST">
                @csrf
                <div>
                    <label class="mb-1.5 block text-[0.72rem] font-bold tracking-wide" style="color:#1a1f3d; font-family:'Outfit',sans-serif; letter-spacing:0.04em;">Username</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="color:#8a9ad6;"><i class="fa-solid fa-user text-[0.8rem]"></i></span>
                        <input type="text" name="username" value="{{ old('username', 'user0') }}" placeholder="Enter your username" required class="block w-full rounded-xl border bg-[#f8f9ff] py-2.5 pl-9 pr-3 text-[0.88rem] placeholder:text-gray-400 focus:bg-white focus:border-[#6a7ab8] focus:outline-none focus:ring-2 focus:ring-[#e8ecff] transition-all" style="border:1px solid #e8ecff; color:#1a1f3d; font-family:'Plus Jakarta Sans',sans-serif;" />
                    </div>
                </div>

                <div>
                    <label class="mb-1.5 block text-[0.72rem] font-bold tracking-wide" style="color:#1a1f3d; font-family:'Outfit',sans-serif; letter-spacing:0.04em;">Password</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="color:#8a9ad6;"><i class="fa-solid fa-lock text-[0.8rem]"></i></span>
                        <input id="pwdInput" type="password" name="password" placeholder="••••••••" required class="block w-full rounded-xl border bg-[#f8f9ff] py-2.5 pl-9 pr-10 text-[0.88rem] placeholder:text-gray-400 focus:bg-white focus:border-[#6a7ab8] focus:outline-none focus:ring-2 focus:ring-[#e8ecff] transition-all" style="border:1px solid #e8ecff; color:#1a1f3d; font-family:'Plus Jakarta Sans',sans-serif;" />
                        <button type="button" onclick="togglePwd()" class="absolute inset-y-0 right-0 pr-3 flex items-center" style="color:#8a9ad6;"><i id="pwdIcon" class="fa-regular fa-eye text-[0.85rem]"></i></button>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" class="rounded border-[#dbe0ff] text-[#49548C] focus:ring-[#e8ecff]" style="accent-color:#49548C;">
                        <span class="text-[0.75rem] font-semibold" style="color:#6b7280; font-family:'Instrument Sans',sans-serif;">Ingat saya</span>
                    </label>
                    <a href="#" onclick="openForgot(event)" class="text-[0.78rem] font-bold hover:underline" style="color:#6a7ab8; font-family:'Outfit',sans-serif;">Lupa Password?</a>
                </div>

                <button type="submit" class="w-full text-center text-white font-bold py-2.5 rounded-xl shadow-[0_8px_20px_rgba(73,84,140,0.22)] hover:shadow-[0_12px_28px_rgba(73,84,140,0.28)] hover:-translate-y-[1px] active:translate-y-[0px] transition-all" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 50%, #8a9ad6 100%); background-size:200% 100%; font-family:'Outfit',sans-serif; letter-spacing:0.02em;">
                    Sign in <i class="fa-solid fa-arrow-right ml-1.5 text-[0.75rem]"></i>
                </button>

                {{-- Demo credentials disembunyikan untuk keamanan hosting publik --}}
            </form>

            <p class="mt-6 text-center text-[0.7rem]" style="color:#9ca3af; font-family:'Instrument Sans',sans-serif;"><i class="fa-solid fa-lock me-1"></i> Aman & terenkripsi • AirNav Indonesia</p>
        </div>

        <!-- KANAN: Banner -->
        <div class="flex-1 relative flex flex-col justify-center p-7 md:p-8 text-white overflow-hidden" style="background: linear-gradient(135deg, #1e2540 0%, #2c365e 18%, #49548C 42%, #5d6ab0 68%, #8a9ad6 100%); background-size:200% 200%; animation: heroGradient 12s ease infinite; min-height:320px;">
            <div class="absolute top-0 left-0 w-full h-[3px]" style="background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166, #49548C); background-size:300% 100%; animation: heroGradient 3s ease infinite;"></div>
            <div class="absolute -top-10 -right-10 w-56 h-56 rounded-full" style="background:rgba(255,255,255,0.07); animation: pulse 6s ease-in-out infinite;"></div>
            <div class="absolute -bottom-10 -left-10 w-44 h-44 rounded-full" style="background:rgba(255,255,255,0.05); animation: pulse 7s ease-in-out infinite reverse;"></div>
            <div class="absolute inset-0" style="background: radial-gradient(ellipse at 30% 20%, rgba(255,255,255,0.08) 0%, transparent 55%);"></div>

            <div class="relative" style="animation: fadeInRight 0.7s cubic-bezier(0.22,1,0.36,1) 0.2s both;">
                <div class="flex items-center gap-3 mb-5">
                    <img src="{{ asset('src/img/logoAirNav.png') }}" alt="AirNav Assist" style="height:38px; width:auto; object-fit:contain; filter: brightness(0) invert(1) drop-shadow(0 4px 12px rgba(0,0,0,0.2)); image-rendering: -webkit-optimize-contrast;">
                    <div class="h-8 w-px" style="background:rgba(255,255,255,0.22);"></div>
                    <img src="{{ asset('src/img/logo.png') }}" alt="AirNav" style="height:38px; width:38px; object-fit:contain; background:white; border-radius:50%; padding:3px; box-shadow:0 4px 12px rgba(0,0,0,0.18);">
                    <div>
                        <div class="font-black leading-none" style="font-family:'Outfit',sans-serif; font-size:1.05rem; letter-spacing:0.02em;">AirNav Assist</div>
                        <div class="font-bold" style="font-size:0.6rem; letter-spacing:0.08em; opacity:0.85;">TANJUNG PINANG • BATAM</div>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-[0.65rem] font-bold" style="background:rgba(255,255,255,0.14); border:1px solid rgba(255,255,255,0.22); backdrop-filter:blur(6px); letter-spacing:0.05em;"><i class="fa-solid fa-plane" style="color:#ffd166;"></i> Profesional • Aman • Terintegrasi</div>
                    <h2 class="mt-4 font-black leading-[1.08]" style="font-family:'Outfit',sans-serif; font-size:clamp(1.4rem, 2.8vw, 1.75rem); letter-spacing:-0.02em;">Navigasi Penerbangan<br><span style="background: linear-gradient(90deg, #ffd166, #ffb703, #ff8fab); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">Kelas Dunia</span></h2>
                    <p class="mt-3 text-[0.88rem] leading-relaxed" style="opacity:0.88; font-family:'Plus Jakarta Sans',sans-serif;">Platform terintegrasi untuk pembelajaran, ujian kompetensi, dan E-Logbook berstandar ICAO.</p>
                </div>

                <div class="relative flex justify-center py-2">
                    <img src="{{ asset('src/img/airplane_pic.png') }}" alt="Pesawat" style="width:84%; max-width:320px; height:auto; object-fit:contain; filter: drop-shadow(0 16px 24px rgba(0,0,0,0.22)); animation: floatPlane 4.5s ease-in-out infinite;">
                    <div class="absolute bottom-1 left-1/2 -translate-x-1/2 w-[48%] h-3 rounded-full" style="background: radial-gradient(ellipse at center, rgba(0,0,0,0.22) 0%, transparent 70%);"></div>
                </div>

                <div class="mt-6 grid grid-cols-3 gap-2">
                    <div class="rounded-xl p-2.5 text-center" style="background:rgba(255,255,255,0.10); border:1px solid rgba(255,255,255,0.14); backdrop-filter:blur(8px);">
                        <div class="w-7 h-7 rounded-lg mx-auto flex items-center justify-center mb-1" style="background: linear-gradient(135deg, #ffd166, #ffb703);"><i class="fa-solid fa-graduation-cap text-[0.7rem]" style="color:#1a1f3d;"></i></div>
                        <div class="text-[0.65rem] font-bold" style="font-family:'Outfit',sans-serif;">Pembelajaran</div>
                    </div>
                    <div class="rounded-xl p-2.5 text-center" style="background:rgba(255,255,255,0.10); border:1px solid rgba(255,255,255,0.14); backdrop-filter:blur(8px);">
                        <div class="w-7 h-7 rounded-lg mx-auto flex items-center justify-center mb-1" style="background: linear-gradient(135deg, #4ade80, #22c55e);"><i class="fa-solid fa-clipboard-check text-[0.7rem] text-white"></i></div>
                        <div class="text-[0.65rem] font-bold" style="font-family:'Outfit',sans-serif;">Test</div>
                    </div>
                    <div class="rounded-xl p-2.5 text-center" style="background:rgba(255,255,255,0.10); border:1px solid rgba(255,255,255,0.14); backdrop-filter:blur(8px);">
                        <div class="w-7 h-7 rounded-lg mx-auto flex items-center justify-center mb-1" style="background: linear-gradient(135deg, #f87171, #ef4444);"><i class="fa-solid fa-book-open text-[0.7rem] text-white"></i></div>
                        <div class="text-[0.65rem] font-bold" style="font-family:'Outfit',sans-serif;">E-Logbook</div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-3 right-3 text-[0.6rem] flex items-center gap-1.5" style="opacity:0.7; font-family:'Instrument Sans',sans-serif;"><span class="w-2 h-2 rounded-full" style="background:#4ade80; box-shadow:0 0 0 4px rgba(74,222,128,0.25);"></span> Live • Tanjung Pinang • Batam</div>
        </div>
    </div>

    <!-- Forgot modal -->
    <div id="forgotModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4" style="background:rgba(26,31,61,0.55); backdrop-filter:blur(6px);">
        <div class="bg-white rounded-2xl shadow-[0_20px_60px_rgba(0,0,0,0.22)] w-full max-w-[420px] overflow-hidden" style="animation: fadeInUp 0.35s ease;">
            <div class="h-1 w-full" style="background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166);"></div>
            <div class="p-6">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-3" style="background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); box-shadow:0 6px 16px rgba(73,84,140,0.18);"><i class="fa-solid fa-key text-white text-[0.85rem]"></i></div>
                <h3 class="font-extrabold" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.02em;">Lupa Password?</h3>
                <p class="mt-1 text-[0.84rem] leading-relaxed" style="color:#6b7280; font-family:'Plus Jakarta Sans',sans-serif;">Masukkan email akun Anda — kami akan kirim password baru ke email terverifikasi.</p>
                <form id="forgotForm" class="mt-4 space-y-3">
                    <div>
                        <label class="block text-[0.72rem] font-bold mb-1" style="color:#1a1f3d; font-family:'Outfit',sans-serif;">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center" style="color:#8a9ad6;"><i class="fa-solid fa-envelope text-[0.8rem]"></i></span>
                            <input type="email" id="forgotEmail" placeholder="email@airnav.id" required class="block w-full rounded-xl border bg-[#f8f9ff] py-2.5 pl-9 pr-3 text-[0.88rem] focus:bg-white focus:border-[#6a7ab8] focus:outline-none focus:ring-2 focus:ring-[#e8ecff] transition-all" style="border:1px solid #e8ecff; color:#1a1f3d;" />
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button type="button" onclick="closeForgot()" class="flex-1 py-2.5 rounded-xl font-bold" style="background:white; color:#49548C; border:1px solid #dbe0ff; font-family:'Outfit',sans-serif;">Batal</button>
                        <button type="submit" class="flex-1 py-2.5 rounded-xl font-bold text-white shadow-[0_6px_16px_rgba(73,84,140,0.18)]" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); font-family:'Outfit',sans-serif;">Kirim Password Baru</button>
                    </div>
                </form>
                <p class="mt-3 text-center text-[0.7rem]" style="color:#9ca3af; font-family:'Instrument Sans',sans-serif;"><i class="fa-solid fa-shield-halved me-1"></i> Link verifikasi akan dikirim jika email terdaftar</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function togglePwd(){
            const i=document.getElementById('pwdInput'), ic=document.getElementById('pwdIcon');
            if(i.type==='password'){ i.type='text'; ic.className='fa-regular fa-eye-slash text-[0.85rem]'; } else { i.type='password'; ic.className='fa-regular fa-eye text-[0.85rem]'; }
        }
        function openForgot(e){ e.preventDefault(); document.getElementById('forgotModal').classList.remove('hidden'); document.getElementById('forgotModal').classList.add('flex'); }
        function closeForgot(){ document.getElementById('forgotModal').classList.add('hidden'); document.getElementById('forgotModal').classList.remove('flex'); }
        document.getElementById('forgotModal').addEventListener('click', (e)=>{ if(e.target.id==='forgotModal') closeForgot(); });
        document.getElementById('forgotForm').addEventListener('submit', async (e)=>{
            e.preventDefault();
            const email=document.getElementById('forgotEmail').value.trim();
            if(!email) return;
            try{
                const res=await fetch('{{ route("akun.forgot") }}', {
                    method:'POST',
                    headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
                    body: JSON.stringify({email})
                });
                const data=await res.json();
                if(res.ok){
                    Swal.fire({icon:'success', title:'Terkirim!', text: data.meta?.message || 'Password baru telah dikirim ke email Anda.'});
                    closeForgot();
                } else {
                    Swal.fire({icon:'error', title:'Gagal', text: data.meta?.message || 'Email tidak ditemukan'});
                }
            }catch(err){
                Swal.fire({icon:'error', title:'Gagal', text:'Terjadi kesalahan'});
            }
        });
    </script>
    @if (session('message'))
        <script>
            Swal.fire({ position:'center', icon:'error', title:`{{ session('message') }}`, timer:5000 })
        </script>
    @endif
</body>
</html>
