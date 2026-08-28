@extends('pengguna.app')
@section('tab', 'Akun')

@section('content')

{{-- Modal Edit — premium --}}
<div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:1.4rem; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.18);">
            <div class="modal-header" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border:none; padding:1.1rem 1.3rem;">
                <h5 class="modal-title" id="modal-editLabel" style="font-family:'Outfit',sans-serif; font-weight:800; letter-spacing:-0.02em;"><i class="fa-solid fa-user-pen me-2"></i> Ubah Data Akun</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" style="background:#f8f9ff;">
                <form id="form-edit" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center mb-3">
                        <div style="position:relative; display:inline-block;">
                            <img id="previewFoto" src="{{ $user->foto ? asset('storage/avatars/'.$user->foto) : asset('src/img/pilot.png') }}" alt="Preview" style="width:84px; height:84px; object-fit:cover; border-radius:50%; border:3px solid white; box-shadow:0 6px 16px rgba(73,84,140,0.18);">
                            <label for="fotoInput" style="position:absolute; bottom:-4px; right:-4px; width:28px; height:28px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; box-shadow:0 4px 10px rgba(73,84,140,0.18); border:2px solid white;"><i class="fa-solid fa-camera text-white" style="font-size:0.65rem;"></i></label>
                        </div>
                        <div class="mt-2">
                            <label for="fotoInput" class="small fw-semibold" style="color:#49548C; cursor:pointer; font-family:'Instrument Sans',sans-serif;"><i class="fa-solid fa-upload me-1"></i> Upload Foto</label>
                            <input type="file" id="fotoInput" name="foto" accept="image/*" class="d-none">
                            <small class="d-block" style="color:#6c757d; font-size:0.65rem;">JPG/PNG/WEBP maks 2MB</small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-family:'Instrument Sans',sans-serif; font-size:0.8rem; color:#1a1f3d;">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f8f9ff; border:1px solid #dbe0ff; color:#49548C;"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" name="nama" value="{{ $user->name }}" placeholder="Nama lengkap" style="border:1px solid #dbe0ff; font-family:'Plus Jakarta Sans',sans-serif;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-family:'Instrument Sans',sans-serif; font-size:0.8rem; color:#1a1f3d;">Username</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f8f9ff; border:1px solid #dbe0ff; color:#49548C;"><i class="fa-solid fa-at"></i></span>
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Username" style="border:1px solid #dbe0ff; font-family:'Plus Jakarta Sans',sans-serif;">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-family:'Instrument Sans',sans-serif; font-size:0.8rem; color:#1a1f3d;">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="email@airnav.id" style="border:1px solid #dbe0ff; border-radius:0.7rem; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.85rem;">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-family:'Instrument Sans',sans-serif; font-size:0.8rem; color:#1a1f3d;">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="{{ $user->jabatan }}" placeholder="ATC / Teknisi" style="border:1px solid #dbe0ff; border-radius:0.7rem; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.85rem;">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-family:'Instrument Sans',sans-serif; font-size:0.8rem; color:#1a1f3d;">Password Baru</label>
                            <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ganti" style="border:1px solid #dbe0ff; border-radius:0.7rem; font-family:'Plus Jakarta Sans',sans-serif;">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-family:'Instrument Sans',sans-serif; font-size:0.8rem; color:#1a1f3d;">Konfirmasi</label>
                            <input type="password" class="form-control" name="konfirm" placeholder="Ulangi password" style="border:1px solid #dbe0ff; border-radius:0.7rem; font-family:'Plus Jakarta Sans',sans-serif;">
                        </div>
                    </div>
                    <button type="submit" class="btn w-100 fw-bold py-2" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 6px 16px rgba(73,84,140,0.18);"><i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- HERO premium --}}
<div style="position:relative; overflow:hidden; border-radius:1.2rem; margin:1.2rem auto; max-width:1160px; background: linear-gradient(135deg, #49548C 0%, #6a7ab8 50%, #8a9ad6 100%); background-size:200% 200%; animation: heroGradient 12s ease infinite; box-shadow:0 14px 36px rgba(73,84,140,0.18);">
    <div style="position:absolute; top:-30px; right:-30px; width:220px; height:220px; background:rgba(255,255,255,0.08); border-radius:50%; animation: pulse 6s ease-in-out infinite;"></div>
    <div style="position:absolute; bottom:-20px; left:6%; width:160px; height:160px; background:rgba(255,255,255,0.06); border-radius:50%; animation: pulse 7s ease-in-out infinite reverse;"></div>
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at 20% 20%, rgba(255,255,255,0.07) 0%, transparent 50%); pointer-events:none;"></div>
    <div class="d-flex align-items-center gap-3 p-4 p-md-4" style="position:relative;">
        <div style="position:relative; flex-shrink:0;">
            <img src="{{ asset('src/img/planeakun.png') }}" alt="" style="width:96px; height:64px; object-fit:contain; filter: drop-shadow(0 8px 16px rgba(0,0,0,0.18)); animation: floatPlaneAkun 4s ease-in-out infinite;">
            <div style="position:absolute; bottom:-6px; left:50%; transform:translateX(-50%); width:60%; height:10px; background: radial-gradient(ellipse at center, rgba(0,0,0,0.18) 0%, transparent 70%); border-radius:50%;"></div>
        </div>
        <div>
            <div class="badge bg-white mb-1 px-3 py-1" style="color:#49548C !important; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:800; font-size:0.65rem; letter-spacing:0.04em;"><i class="fa-solid fa-sparkles me-1" style="color:#ffb703;"></i> PROFESSIONAL ACCOUNT</div>
            <h5 class="text-white mb-1" style="font-family:'Outfit',sans-serif; font-weight:800; letter-spacing:-0.02em; text-shadow:0 2px 10px rgba(0,0,0,0.12);">Welcome, {{ $user->name }}!</h5>
            <p class="text-white mb-0" style="opacity:0.92; font-family:'Plus Jakarta Sans',sans-serif; font-size:0.9rem; font-style:italic;">“Advanture is calling and I have to answer.” — Airnav Assist</p>
        </div>
        <div class="ms-auto d-none d-md-flex gap-2">
            <span class="badge px-3 py-2" style="background:rgba(255,255,255,0.14); color:white; border:1px solid rgba(255,255,255,0.22); border-radius:2rem; font-family:'Instrument Sans',sans-serif; font-size:0.7rem;"><i class="fa-solid fa-shield-halved me-1"></i> Verified</span>
            <span class="badge px-3 py-2" style="background:white; color:#49548C; border-radius:2rem; font-family:'Outfit',sans-serif; font-weight:700; font-size:0.7rem;"><i class="fa-solid fa-circle-check me-1"></i> Active</span>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4 align-items-stretch">
        {{-- KIRI: profil card --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100" style="border-radius:1.4rem; overflow:hidden; background: linear-gradient(180deg, #ffffff 0%, #f8f9ff 100%); border:1px solid #eef0ff !important;">
                <div style="height:4px; background: linear-gradient(90deg, #49548C, #8a9ad6, #ffd166); background-size:200% 100%; animation: sopGradientShift 4s ease infinite;"></div>
                <div class="card-body p-4 text-center">
                    <div style="position:relative; display:inline-block;" class="mb-3">
                        <div style="position:absolute; inset:-6px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 50%, #ffd166 100%); border-radius:50%; opacity:0.18; filter: blur(8px);"></div>
                        <img id="avatarDisplay" src="{{ $user->foto ? asset('storage/avatars/'.$user->foto) : asset('src/img/pilot.png') }}" alt="Avatar" style="width:128px; height:128px; object-fit:cover; border-radius:50%; border:4px solid white; box-shadow:0 10px 28px rgba(73,84,140,0.16); position:relative; display:block; transition: all 0.4s;">
                        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit" title="Edit Foto & Identitas" style="position:absolute; bottom:4px; right:4px; width:36px; height:36px; background: linear-gradient(135deg, #ffb703 0%, #ffd166 100%); color:#1a1f3d; border:2px solid white; border-radius:50%; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 16px rgba(0,0,0,0.14); transition: all 0.2s;"><i class="fa-solid fa-pencil" style="font-size:0.8rem;"></i></button>
                    </div>
                    <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d; letter-spacing:-0.02em;">{{ $user->name }}</h5>
                    <p class="mb-2" style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.85rem;"><i class="fa-solid fa-at me-1" style="color:#8a9ad6;"></i> {{ $user->username }}</p>
                    <div class="d-flex flex-wrap justify-content-center gap-2 mb-3">
                        <span class="badge px-3 py-2" style="background:#e8ecff; color:#49548C; border-radius:2rem; border:1px solid #dbe0ff; font-family:'Instrument Sans',sans-serif; font-size:0.68rem; font-weight:700;"><i class="fa-solid fa-id-badge me-1"></i> {{ $user->jabatan ?? 'Personel AirNav' }}</span>
                        @if($user->status != 4)
                        <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); color:#14532d; border-radius:2rem; border:1px solid #bbf7d0; font-family:'Instrument Sans',sans-serif; font-size:0.68rem; font-weight:700;"><i class="fa-solid fa-circle-check me-1"></i> Status {{ $user->status }}</span>
                        @endif
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn fw-bold py-2" data-bs-toggle="modal" data-bs-target="#modal-edit" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; font-family:'Outfit',sans-serif; box-shadow:0 6px 16px rgba(73,84,140,0.18);"><i class="fa-solid fa-user-pen me-1"></i> Edit Identitas & Foto</button>
                        <label for="fotoInput2" class="btn fw-semibold py-2" style="background:white; color:#49548C; border:1px solid #dbe0ff; border-radius:2rem; font-family:'Outfit',sans-serif; cursor:pointer;"><i class="fa-solid fa-camera me-1"></i> Upload Foto</label>
                        <input type="file" id="fotoInput2" accept="image/*" class="d-none">
                    </div>
                    <small class="d-block mt-3" style="color:#6c757d; font-family:'Instrument Sans',sans-serif; font-size:0.7rem;"><i class="fa-solid fa-circle-info me-1"></i> Foto tersimpan di storage/avatars — klik pencil untuk edit semua.</small>
                </div>
            </div>
        </div>

        {{-- KANAN: detail --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm h-100" style="border-radius:1.4rem; overflow:hidden; background:white; border:1px solid #eef0ff !important;">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3" style="border-bottom:1px solid #eef0ff;">
                    <span class="fw-bold" style="font-family:'Outfit',sans-serif; color:#1a1f3d;"><i class="fa-solid fa-address-card me-2" style="color:#49548C;"></i> Identitas Akun</span>
                    <button type="button" class="btn btn-sm fw-bold px-3" data-bs-toggle="modal" data-bs-target="#modal-edit" style="background:#fff7e6; color:#92400e; border:1px solid #fde68a; border-radius:2rem; font-family:'Outfit',sans-serif; font-size:0.72rem;"><i class="fa-solid fa-pencil me-1"></i> Edit</button>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="p-3" style="background: linear-gradient(135deg, #f8f9ff 0%, #eef0ff 100%); border:1px solid #e8ecff; border-radius:1rem;">
                                <small style="font-family:'Instrument Sans',sans-serif; font-weight:700; color:#49548C; letter-spacing:0.05em; font-size:0.65rem;">NAMA LENGKAP</small>
                                <div class="fw-bold mt-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d; font-size:1.05rem; letter-spacing:-0.01em;">{{ $user->name }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3" style="background:white; border:1px solid #eef0ff; border-radius:1rem;">
                                <small style="font-family:'Instrument Sans',sans-serif; font-weight:700; color:#6c757d; letter-spacing:0.05em; font-size:0.65rem;"><i class="fa-solid fa-at me-1"></i> USERNAME</small>
                                <div class="fw-bold mt-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d;">{{ $user->username }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3" style="background:white; border:1px solid #eef0ff; border-radius:1rem;">
                                <small style="font-family:'Instrument Sans',sans-serif; font-weight:700; color:#6c757d; letter-spacing:0.05em; font-size:0.65rem;"><i class="fa-solid fa-envelope me-1"></i> EMAIL</small>
                                <div class="fw-semibold mt-1" style="font-family:'Plus Jakarta Sans',sans-serif; color:#1a1f3d; font-size:0.9rem;">{{ $user->email ?? '— belum diisi —' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3" style="background:white; border:1px solid #eef0ff; border-radius:1rem;">
                                <small style="font-family:'Instrument Sans',sans-serif; font-weight:700; color:#6c757d; letter-spacing:0.05em; font-size:0.65rem;"><i class="fa-solid fa-briefcase me-1"></i> JABATAN</small>
                                <div class="fw-semibold mt-1" style="font-family:'Outfit',sans-serif; color:#1a1f3d;">{{ $user->jabatan ?? '—' }}</div>
                            </div>
                        </div>
                        @if($user->status != 4)
                        <div class="col-md-6">
                            <div class="p-3" style="background: linear-gradient(135deg, #fff7e6 0%, #ffecd2 100%); border:1px solid #fde68a; border-radius:1rem;">
                                <small style="font-family:'Instrument Sans',sans-serif; font-weight:700; color:#92400e; letter-spacing:0.05em; font-size:0.65rem;"><i class="fa-solid fa-shield-halved me-1"></i> STATUS</small>
                                <div class="fw-bold mt-1" style="font-family:'Outfit',sans-serif; color:#92400e;">Level {{ $user->status }} • {{ $user->status==4 ? 'Pengguna' : 'Admin' }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="alert d-flex align-items-center gap-2 mt-4 mb-0" style="background: linear-gradient(135deg, #f8f9ff 0%, #eef0ff 100%); border:1px solid #dbe0ff; border-radius:1rem; font-family:'Instrument Sans',sans-serif; font-size:0.78rem; color:#1a1f3d;">
                        <span style="width:28px; height:28px; background: linear-gradient(135deg, #49548C 0%, #8a9ad6 100%); border-radius:0.6rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa-solid fa-lightbulb text-white" style="font-size:0.7rem;"></i></span>
                        <span><strong>Tips:</strong> Ganti foto & jabatan agar profil terlihat profesional — klik Edit.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<style>
@keyframes floatPlaneAkun { 0%,100%{ transform: translateY(0); } 50%{ transform: translateY(-6px); } }
#avatarDisplay:hover { transform: scale(1.03); box-shadow:0 14px 32px rgba(73,84,140,0.18) !important; }
</style>
<script>
    $(document).ready(function () {
        function previewFile(input, imgId){
            if(input.files && input.files[0]){
                let reader = new FileReader();
                reader.onload = function(e){ $('#'+imgId).attr('src', e.target.result); };
                reader.readAsDataURL(input.files[0]);
                // auto open modal if from card button
                if(imgId==='avatarDisplay') $('#modal-edit').modal('show');
            }
        }
        $('#fotoInput').on('change', function(){ previewFile(this,'previewFoto'); $('#avatarDisplay').attr('src', $('#previewFoto').attr('src')); });
        $('#fotoInput2').on('change', function(){ previewFile(this,'avatarDisplay'); // set also modal preview
            if(this.files && this.files[0]){
                let r=new FileReader(); r.onload=function(e){ $('#previewFoto').attr('src', e.target.result); }; r.readAsDataURL(this.files[0]);
                // push to modal input
                let dt = new DataTransfer(); dt.items.add(this.files[0]); document.getElementById('fotoInput').files = dt.files;
            }
        });

        $('#form-edit').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($("#form-edit")[0]);
            $.ajax({
                type: "POST",
                url: '{{ route('akun.edit') }}',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('*').removeClass('is-invalid');
                },
                success: function(response) {
                    $('#modal-edit').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Tersimpan!',
                        text: response.meta.message,
                    }).then(()=> location.reload());
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    switch (xhr.status) {
                        case 422:
                        var errors = xhr.responseJSON.meta.message;
                        var message = '';
                        $.each(errors, function(key, value) {
                            message = value;
                            $('*[name="' + key + '"]').addClass('is-invalid');
                            $('.invalid-feedback.' + key + '_error').html(value);
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: Array.isArray(message) ? message[0] : message,
                        })
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
    })
</script>
@endpush
