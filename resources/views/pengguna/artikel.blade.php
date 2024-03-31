@extends('pengguna.app')
@section('tab', 'Artikel')

@section('content')
<div class="alert alert-primary alert-dismissible fade show my-5 mx-5" role="alert">
    <strong>Selamat Datang!</strong> Temukan Artikel dan Berita Terbaru Di Sini!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="row mb-5 mt-5 justify-content-center">
  @foreach ($artikel as $item)
  <div class="card mb-3 mx-5 col-md-6" style="max-width: 40rem;">
      <div class="row g-0" style="display: flex;">
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <img src="{{ asset('src/img/sld3.png') }}" class="my-2 img-fluid rounded" alt="Gambar">
        </div>      
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ $item->judul }}</h5>
            <p class="card-text" style="text-align: justify;">{{ $item->deskripsi }}</p>
            <a href="{{ route('beranda.detailArtikel', ['id' => $item->id]) }}" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
  </div>
  @endforeach
</div>
@endsection