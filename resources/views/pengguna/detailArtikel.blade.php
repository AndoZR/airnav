@extends('pengguna.app')
@section('tab', 'Artikel')

@section('content')
<div class="card mx-auto my-5" style="max-width: 60rem;">
    <div class="card-header text-center">
        {{ $artikel->judul }}
    </div>
    <div class="card-body">
        <img style="width: 100%; max-height: 20rem; object-fit: cover;" src="{{ asset('src/img/sld3.png') }}" class="my-2 img-fluid rounded" alt="Gambar">
        <div>
            <?php
            print($content)
            ?>
        </div>
    </div>
    <div class="text-center mt-3"> <!-- Tambahkan class text-center dan mt-3 untuk margin top -->
        <a href="{{ route('beranda.artikel') }}" class="btn btn-warning mb-3">Kembali</a>
    </div>
</div>
@endsection