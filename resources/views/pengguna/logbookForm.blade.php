@extends('pengguna.app')
@section('tab', 'Airnav Assist | Logbook')

@section( 'content' )
<div class="container">
    <br>
    <div class="">
        <h4 class="fw-bold m-3"><strong>Form Logbook</strong></h4>
        <form method="post" action="{{route('logbook.formPost')}}">
            @csrf
            <div class="d-flex flex-warp justify-content-between">
                <div class="border rounded bg-light-subtle m-3 flex-grow-1">
                    <div class="m-3">
                        <label class="form-label"><small><strong>Nama Lengkap</strong></small></label>
                        <input type="text" class="form-control form-control-sm" name="namaUser" value="{{session('name')}}">
                    </div>
                    <div class="m-3">
                        <label class="form-label"><small><strong>NIK</strong></small></label>
                        <input type="text" class="form-control form-control-sm" name="NomorNik" value="****************" disabled>
                    </div>
                    <div class="m-3">
                        <label class="form-label"><small><strong>Logbook ID</strong></small></label>
                        <input type="number" class="form-control form-control-sm" name="logbookID" value="{{$logbook_id}}" disabled>
                    </div>
                </div>

                <div class="border rounded bg-light-subtle m-3 flex-grow-1">
                    <div class="m-3">
                        <label class="form-label"><small><strong>Tanggal</strong></small></label>
                        <input type="number" class="form-control form-control-sm" max="31" min="1" name="tanggal" value="{{date('d')}}">
                        <span>
                            <p></p>
                        </span>
                        <label class="form-label"><small><strong>Bulan</strong></small></label>
                        <select class="form-select form-select-sm" aria-label="Default select example" name="bulan">
                            <option value="01" <?php if(date('m') == '01'){print('selected');} ?> >Januari</option>
                            <option value="02" <?php if(date('m') == '02'){print('selected');} ?> >Februari</option>
                            <option value="03" <?php if(date('m') == '03'){print('selected');} ?> >Maret</option>
                            <option value="04" <?php if(date('m') == '04'){print('selected');} ?> >April</option>
                            <option value="05" <?php if(date('m') == '05'){print('selected');} ?>>Mei</option>
                            <option value="06" <?php if(date('m') == '06'){print('selected');} ?> >Juni</option>
                            <option value="07" <?php if(date('m') == '07'){echo('selected');} ?> >Juli</option>
                            <option value="08" <?php if(date('m') == '08'){echo('selected');} ?> >Agustus</option>
                            <option value="09" <?php if(date('m') == '09'){echo('selected');} ?> >September</option>
                            <option value="10" <?php if(date('m') == '10'){echo('selected');} ?> >Oktober</option>
                            <option value="11" <?php if(date('m') == '11'){echo('selected');} ?> >November</option>
                            <option value="12" <?php if(date('m') == '12'){echo('selected');} ?> >Desember</option>
                        </select>
                        <span>
                            <p></p>
                        </span>
                        <label class="form-label"><small><strong>Tahun</strong></small></label>
                        <input type="number" class="form-control form-control-sm" value="{{date('Y')}}" name="tahun" max="{{date('Y')}}" min="1945">
                    </div>
                </div>
            </div>

            <div class="row m-3">
                <div class="border rounded col-12 col-sm-12 col-md-12 bg-light-subtle">
                    <div class="m-3">
                        <label class="form-label"><strong>Duty</strong></label>
                        <br>
                        <div>
                            <input class="form-check-input" type="radio" name="duty" value="morning" checked>
                            <label class="form-check-label ms-2">
                                <small>Morning</small>
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" value="afternoon" name="duty">
                            <label class="form-check-label ms-2">
                                <small>Afternoon</small>
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" value="night" name="duty">
                            <label class="form-check-label ms-2">
                                <small>Night</small>
                            </label>
                        </div>
                    </div>

                    <div class="m-3">
                        <label class="form-label"><strong>Unit</strong></label>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <div class="">
                                    <input class="form-check-input" type="radio" name="unit" value="adc" checked>
                                    <label class="form-check-label ms-2">
                                        <small>ADC</small>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="unit" value="app">
                                    <label class="form-check-label ms-2">
                                        <small>APP</small>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="unit" value="app_surv">
                                    <label class="form-check-label ms-2">
                                        <small>APP SURV</small>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="">
                                    <input class="form-check-input" type="radio" name="unit" value="combine_adc_app">
                                    <label class="form-check-label ms-2">
                                        <small> COMBINE ADC/APP</small>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="unit" value="acc">
                                    <label class="form-check-label ms-2">
                                        <small> ACC</small>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="unit" value="acc_surv">
                                    <label class="form-check-label ms-2">
                                        <small>ACC SURV </small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <label class="form-label"><strong>Position(Day)</strong></label>
                        <div class="row">
                            <div class="col-1 ms-3">
                                <label class="form-label"><small><strong>CTR</strong></small></label>
                            </div>
                            <div class="col-3">
                                <input type="number" class="form-control form-control-sm" placeholder="Hours" name="ctrHour" max="24" min="0">
                            </div>
                            :
                            <div class="col-3">
                                <input type="number" class="form-control form-control-sm" placeholder="Minute" name="ctrMinute" max="59" min="0">
                            </div>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col-1 ms-3">
                                <label class="form-label"><small><strong>ASS</strong></small></label>
                            </div>
                            <div class="col-3">
                                <input type="number" class="form-control form-control-sm" placeholder="Hours" name="assHour" max="24" min="0">
                            </div>
                            :
                            <div class="col-3">
                                <input type="number" class="form-control form-control-sm" placeholder="Minute" name="assMinute" max="59" min="0">
                            </div>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col-1 ms-3">
                                <label class="form-label"><small><strong>REST</strong></small></label>
                            </div>
                            <div class="col-3">
                                <input type="number" class="form-control form-control-sm" placeholder="Hours" name="restHour" max="24" min="0">
                            </div>
                            :
                            <div class="col-3">
                                <input type="number" class="form-control form-control-sm" placeholder="Minute" name="restMinute" max="59" min="0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-3">
                <button class="btn btn-primary" type="submit">Submit</button>
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