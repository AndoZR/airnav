@extends('pengguna.app')
@section('tab', 'Airnav Assist | Test')

@section('content')
<div class="container my-5">
    <h3 class="d-flex ms-auto"><span class="badge text-bg-warning me-3" id="timer"></span></h3>
    <form id="form-test">
        @foreach ($dataSoal as $item)
        <div class="card my-4 shadow">
            <div class="card-body">
                <div class="row px-3">
                    <label class="mb-3">{{ $item->pertanyaan }}</label>
                    @foreach ($item->jawaban as $opsi)
                    <div class="form-check">

                        @if (in_array($opsi->id,$jawabanDipilih))
                        <input class="form-check-input" type="radio" disabled checked>
                        @else
                        <input class="form-check-input" type="radio" disabled>
                        @endif

                        <label class="form-check-label" for="{{ $opsi->id }}">
                            {{ $opsi->jawaban }}
                        </label>
                        @if ($opsi->nilai == 1)
                            <i class="fas fa-check"></i>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        <a href="{{ route('test.userIndex') }}" class="btn btn-warning" type="submit">Kembali</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    
</script>
@endpush