@extends('pengguna.app')
@section('tab', 'Airnav Assist | Test')

@section('content')
<div class="container">
    <div class="alert alert-primary alert-dismissible fade show mt-5" role="alert">
        Silahkan pilih Ujian yang tersedia!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    @foreach ($test as $item)
    <div class="card mb-5">
        <h5 class="card-header">{{ $item->subjek }}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="card-title">Deskripsi</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores perspiciatis quas expedita cum illum animi? Numquam ipsa, possimus aliquid molestias minima temporibus veniam delectus, nostrum deserunt fuga ex officiis modi?</p>
                </div>
                <div class="col-sm-6 mt-auto me-auto">
                    <label id="time">{{ $item->durasi }}</label>
                    @if ($item->hasilTest == null)
                    <a href="{{ route('test.mulai',['id' => $item->id]) }}" class="mx-3 btn btn-warning px-5">Mulai</a>
                    @elseif (!isset($item->hasilTest->hasil))
                    <a href="{{ route('test.mulai',['id' => $item->id]) }}" class="mx-3 btn btn-primary px-5">Lanjut</a>
                    @else
                    <a class="btn btn-success disabled placeholder col-3" aria-disabled="true">Hasil: {{ $item->hasilTest->hasil }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('scripts')

@if(session('message'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: `{{ session('message') }}`,
        });
    </script>
@endif
@endpush