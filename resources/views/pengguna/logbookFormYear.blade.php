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