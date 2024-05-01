@extends('pengguna.app')
@section('tab', 'Preview')

@section('content')
<div class="mx-auto my-5" style="max-width: 60rem;">
    <div class="text-center m-3">
        <h3>
            <strong>
                {{ $judul }}
            </strong>
        </h3>
    </div>
    <hr>
    <div class="card-body">
        <!-- <img style="width: 100%; max-height: 20rem; object-fit: cover;" src="" class="my-2 img-fluid rounded" alt="Gambar"> -->
        <div class="m-3">
            <?php echo ($artikel) ?>
        </div>
    </div>
    <div class="text-center mt-3"> <!-- Tambahkan class text-center dan mt-3 untuk margin top -->
    </div>
</div>
@endsection