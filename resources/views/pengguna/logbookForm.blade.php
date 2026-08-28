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
                        <label class="form-label"><small><strong>NIK</strong></small> <span class="badge" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-size:0.6rem; border:1px solid #dbe0ff;">freetext</span></label>
                        <input type="text" class="form-control form-control-sm" name="NomorNik" value="" placeholder="Ketik NIK bebas (contoh: 3501xxxxxxxx)" style="border:1px solid #dbe0ff; border-radius:0.6rem;">
                    </div>
                    <div class="m-3">
                        <label class="form-label"><small><strong>Logbook ID — unique key</strong></small> <span class="badge" style="background:#fee2e2; color:#7f1d1d; border-radius:2rem; font-size:0.6rem; border:1px solid #fecaca;"><i class="fa-solid fa-lock me-1"></i> Disabled — tidak boleh diganti</span></label>
                        <input type="number" class="form-control form-control-sm" name="logbookID" value="{{$logbook_id}}" readonly style="background:#f1f3f9; border:1px solid #e5e7eb; border-radius:0.6rem; color:#6b7280; cursor:not-allowed; font-family:'Instrument Sans',sans-serif; font-weight:700;">
                        <input type="hidden" name="logbookID_hidden" value="{{$logbook_id}}">
                        <small style="color:#6c757d; font-size:0.65rem;"><i class="fa-solid fa-key me-1"></i> Tiap bikin logbook baru, ID unik otomatis beda</small>
                    </div>
                </div>

                <div class="border rounded bg-light-subtle m-3 flex-grow-1">
                    <div class="m-3">
                        <label class="form-label"><small><strong>Tanggal</strong></small> <span class="badge" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-size:0.6rem; border:1px solid #dbe0ff;">Default hari ini</span></label>
                        <input type="number" class="form-control form-control-sm" max="31" min="1" name="tanggal" value="{{date('d')}}" placeholder="1-31" style="border:1px solid #dbe0ff; border-radius:0.6rem;">
                        <span>
                            <p></p>
                        </span>
                        <label class="form-label"><small><strong>Bulan</strong></small> <span class="badge" style="background: linear-gradient(135deg, #49548C 0%, #6a7ab8 100%); color:white; border-radius:2rem; font-size:0.6rem;">Filter aktif — default hari ini</span></label>
                        @php $defaultBulan = $logbook_bulan ?? date('m'); @endphp
                        <select class="form-select form-select-sm" name="bulan" style="border:1px solid #dbe0ff; border-radius:0.6rem; font-family:'Instrument Sans',sans-serif; font-weight:600;">
                            <option value="01" {{ $defaultBulan == '01' ? 'selected' : '' }} >Januari</option>
                            <option value="02" {{ $defaultBulan == '02' ? 'selected' : '' }} >Februari</option>
                            <option value="03" {{ $defaultBulan == '03' ? 'selected' : '' }} >Maret</option>
                            <option value="04" {{ $defaultBulan == '04' ? 'selected' : '' }} >April</option>
                            <option value="05" {{ $defaultBulan == '05' ? 'selected' : '' }}>Mei</option>
                            <option value="06" {{ $defaultBulan == '06' ? 'selected' : '' }} >Juni</option>
                            <option value="07" {{ $defaultBulan == '07' ? 'selected' : '' }} >Juli</option>
                            <option value="08" {{ $defaultBulan == '08' ? 'selected' : '' }} >Agustus</option>
                            <option value="09" {{ $defaultBulan == '09' ? 'selected' : '' }} >September</option>
                            <option value="10" {{ $defaultBulan == '10' ? 'selected' : '' }} >Oktober</option>
                            <option value="11" {{ $defaultBulan == '11' ? 'selected' : '' }} >November</option>
                            <option value="12" {{ $defaultBulan == '12' ? 'selected' : '' }} >Desember</option>
                        </select>
                        <small style="color:#6c757d; font-size:0.65rem;"><i class="fa-solid fa-calendar-day me-1"></i> Default hari ini ({{ date('d') }} {{ date('F') }}) — besok otomatis ganti</small>
                        <span>
                            <p></p>
                        </span>
                        <label class="form-label"><small><strong>Tahun — filter</strong></small> <span class="badge" style="background:#e8ecff; color:#49548C; border-radius:2rem; font-size:0.6rem; border:1px solid #dbe0ff;">Bisa diketik</span></label>
                        <input type="number" class="form-control form-control-sm" value="{{$logbook_tahun}}" name="tahun" min="2020" max="{{ date('Y')+2 }}" placeholder="Ketik tahun, mis. {{ date('Y') }}" style="border:1px solid #dbe0ff; border-radius:0.6rem; font-family:'Instrument Sans',sans-serif; font-weight:600;">
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
                                    <input class="form-check-input" type="radio" name="unit" value="comb_adc_app">
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
                    <div id="positionWarning" class="alert alert-warning d-none d-flex align-items-center gap-2 py-2 px-3 mb-3" style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border:1px solid #fde68a; border-radius:0.8rem; font-family:'Instrument Sans',sans-serif; font-size:0.78rem; color:#92400e;"><i class="fa-solid fa-triangle-exclamation" style="color:#f59e0b;"></i> <span id="positionWarningText">Total jam melebihi 24 jam — harap sesuaikan.</span></div>
                    <div class="m-3">
                        <label class="form-label"><strong>Position(Day)</strong></label>
                        <small class="ms-2" style="color:#6c757d; font-size:0.68rem; font-family:'Instrument Sans',sans-serif;"><i class="fa-solid fa-circle-info me-1"></i> Himbauan di atas muncul langsung saat isi — bukan pas submit</small>
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