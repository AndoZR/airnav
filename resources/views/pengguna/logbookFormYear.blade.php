@extends('pengguna.app')
@section('tab', 'Airnav Assist | Logbook')

@section( 'content' )
<div class="container">
    <br>
    <div class="">
        <h4 class="fw-bold m-3 text-center"><strong>Logbook Record</strong></h4>
        <form method="post" action="{{route('logbook.createLogbook')}}">
            @csrf
            <div class="row justify-content-center">
                <div class="border rounded bg-light-subtle m-3 col-6">
                    <div class="m-3">
                        <label class="form-label"><small><strong>Nama</strong></small></label>
                        <input type="text" class="form-control form-control-sm" name="nama_user" value="{{session('name')}}">
                    </div>
                    <div class="m-3">
                        <input type="hidden" class="form-control form-control-sm" name="user_id" value="{{session()->get('user_id')}}">
                    </div>
                    <div class="m-3">
                        <label class="form-label"><small><strong>Tahun</strong></small></label>
                        <input type="text" class="form-control form-control-sm" name="tahun" max="{{date('Y')}}" min="1945" value="{{date('Y')}}" >
                    </div>
                    <div class="m-3">
                        <label class="form-label"><small><strong>Bulan</strong></small></label>
                        <select class="form-select form-select-sm" aria-label="Default select example" name="bulan">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="m-3">
                        <label class="form-label"><small><strong>Cabang</strong></small></label>
                        <select class="form-select form-select-sm" name="cabang" required>
                            <option value="batam" {{ (request()->query('cabang')=='batam' ? 'selected' : '') }}>Cabang Pembantu Batam</option>
                            <option value="tanjung" {{ (request()->query('cabang')!='batam' ? 'selected' : '') }}>Cabang Tanjung Pinang</option>
                        </select>
                    </div>
                    <div class="m-3">
                        <label class="form-label"><small><strong>Tower</strong></small></label>
                        <select class="form-select form-select-sm" name="tower" required>
                            <option value="Tanjung Pinang">Tanjung Pinang</option>
                            <option value="TMA North">TMA North</option>
                            <option value="TMA South">TMA South</option>
                            <option value="Hang Nadim Tower">Hang Nadim Tower</option>
                            <option value="Rajahaji Tower">Rajahaji Tower</option>
                            <option value="Ranai Tower">Ranai Tower</option>
                            <option value="Matak Tower">Matak Tower</option>
                            <option value="Letung Tower">Letung Tower</option>
                        </select>
                        <small class="text-muted" style="font-size:0.7rem;">Pilih tower — akan tersimpan dan jadi filter di rekap</small>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>


        </form>
    </div>
    <br>
</div>

@endsection

@push('scripts')
<script>
</script>
@endpush