@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
<div class="container">
    <div class="">
        <h3 class="fw-bolder m-3"><strong>Form Logbook</strong></h3>
        <form class="row m-3 g-3">
            <div class="border rounded col-md-6">
                <div class="m-3">
                    <label class="form-label"><strong>Nama</strong></label>
                    <input type="text" class="form-control">
                </div>
                <div class="m-3">
                    <label for="inputPassword4" class="form-label"><strong>NIK</strong></label>
                    <input type="tel" class="form-control">
                </div>
            </div>
            <div class="border rounded col-12">
                <div class="m-3">
                    <label for="inputAddress" class="form-label"><strong>Tanggal</strong></label>
                    <input type="date" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
            </div>
            <div class="border rounded col-12">
                <div class="m-3">
                    <label for="inputAddress2" class="form-label"><strong>Duty</strong></label>
                    <br>
                    <div>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Morning
                        </label>
                    </div>
                    <div>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Afternoon
                        </label>
                    </div>
                    <div>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            Night
                        </label>
                    </div>
                </div>

                <div class="m-3">
                    <label for="inputAddress2" class="form-label"><strong>Unit</strong></label>
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <div class="">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    ADC
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    APP
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    APP SURV
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    COMBINE ADC/APP
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    ACC
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    ACC SURV
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>

        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
</script>
@endpush