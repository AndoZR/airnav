@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
<div class="container">
    <br>
    <div class="">
        <h4 class="fw-bold m-3"><strong>Form Logbook</strong></h4>
        <form method="post" action="{{route('logbook.formPost')}}">
            <div class="d-flex flex-warp justify-content-between">
                <div class="border rounded bg-light-subtle m-3 flex-grow-1">
                    <div class="m-3">
                        <label class="form-label"><small><strong>Nama Lengkap</strong></small></label>
                        <input type="text" class="form-control form-control-sm" name="namaUser">
                    </div>
                    <div class="m-3">
                        <label class="form-label"><small><strong>NIK</strong></small></label>
                        <input type="number" class="form-control form-control-sm" name="NomorNik">
                    </div>
                </div>

                <div class="border rounded bg-light-subtle m-3 flex-grow-1">
                    <div class="m-3">
                        <label class="form-label"><small><strong>Tanggal</strong></small></label>
                        <input type="number" class="form-control form-control-sm" id="" max="31" min="1" name="tanggal">
                        <span>
                            <p></p>
                        </span>
                        <label class="form-label"><small><strong>Bulan</strong></small></label>
                        <select class="form-select form-select-sm" aria-label="Default select example" name="bulan">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5" selected>Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <span>
                            <p></p>
                        </span>
                        <label class="form-label"><small><strong>Tahun</strong></small></label>
                        <input type="number" class="form-control form-control-sm" id="" value="" name="tahun">
                    </div>
                </div>
            </div>

            <div class="row m-3">
                <div class="border rounded col-12 col-sm-12 col-md-12 bg-light-subtle">
                    <div class="m-3">
                        <label class="form-label"><strong>Duty</strong></label>
                        <br>
                        <div>
                            <input class="form-check-input" type="radio" name="duty" checked>
                            <label class="form-check-label ms-2">
                                <small>Morning</small>
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="duty">
                            <label class="form-check-label ms-2">
                                <small>Afternoon</small>
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="duty">
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
                                    <input class="form-check-input" type="radio" name="unit" checked>
                                    <label class="form-check-label ms-2">
                                        <small>ADC</small>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="unit">
                                    <label class="form-check-label ms-2">
                                        <small>APP</small>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="unit">
                                    <label class="form-check-label ms-2">
                                        <small>APP SURV</small>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="">
                                    <input class="form-check-input" type="radio" name="unit">
                                    <label class="form-check-label ms-2">
                                        <small> COMBINE ADC/APP</small>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="unit">
                                    <label class="form-check-label ms-2">
                                        <small> ACC</small>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="unit">
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
                                <input type="number" class="form-control" placeholder="Hours" name="ctrHour">
                            </div>
                            :
                            <div class="col-3">
                                <input type="number" class="form-control" placeholder="Minute" name="ctrMinute">
                            </div>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col-1 ms-3">
                                <label class="form-label"><small><strong>ASS</strong></small></label>
                            </div>
                            <div class="col-3">
                                <input type="number" class="form-control" placeholder="Hours" name="assHour">
                            </div>
                            :
                            <div class="col-3">
                                <input type="number" class="form-control" placeholder="Minute" name="assMinute">
                            </div>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col-1 ms-3">
                                <label class="form-label"><small><strong>REST</strong></small></label>
                            </div>
                            <div class="col-3">
                                <input type="number" class="form-control" placeholder="Hours" name="restHour">
                            </div>
                            :
                            <div class="col-3">
                                <input type="number" class="form-control" placeholder="Minute" name="restMinute">
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