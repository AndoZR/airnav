@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
<div class="container">
    <br>
    <div class="">
        <h4 class="fw-bold m-3"><strong>Form Logbook</strong></h4>
        <form class="row m-3 g-3">
            <div class="border rounded col-md-6">
                <div class="m-3">
                    <label class="form-label"><strong>Nama</strong></label>
                    <input type="text" class="form-control">
                </div>
                <div class="m-3">
                    <label for="inputPassword4" class="form-label"><strong>NIK</strong></label>
                    <input type="number" class="form-control">
                </div>
            </div>
            <div class="border rounded col-12">
                <div class="m-3">
                    <label for="inputAddress" class="form-label"><strong>Tanggal</strong></label>
                    <input type="date" class="form-control" id="" value="2024-05-22">
                </div>
            </div>
            <div class="border rounded col-12">
                <div class="m-3">
                    <label for="inputAddress2" class="form-label"><strong>Duty</strong></label>
                    <br>
                    <div>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label ms-3" for="flexRadioDefault1">
                            <small>Morning</small>
                        </label>
                    </div>
                    <div>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label ms-3" for="flexRadioDefault2">
                            <small>Afternoon</small>
                        </label>
                    </div>
                    <div>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label ms-3" for="flexRadioDefault3">
                            <small>Night</small>
                        </label>
                    </div>
                </div>

                <div class="m-3">
                    <label for="inputAddress2" class="form-label"><strong>Unit</strong></label>
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <div class="">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault11" checked>
                                <label class="form-check-label ms-3" for="flexRadioDefault11">
                                    <small>ADC</small>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
                                <label class="form-check-label ms-3" for="flexRadioDefault2">
                                    <small>APP</small>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault3">
                                <label class="form-check-label ms-3" for="flexRadioDefault3">
                                    <small>APP SURV</small>
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault1">
                                <label class="form-check-label ms-3" for="flexRadioDefault1">
                                    <small> COMBINE ADC/APP</small>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
                                <label class="form-check-label ms-3" for="flexRadioDefault2">
                                    <small> ACC</small>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault3">
                                <label class="form-check-label ms-3" for="flexRadioDefault3">
                                    <small>ACC SURV </small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <label for="inputAddress2" class="form-label"><strong>Position(Day)</strong></label>
                    <div class="row">
                        <div class="col-1 ms-3">
                            CTR
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" placeholder="Hours">
                        </div>
                        :
                        <div class="col-3">
                            <input type="number" class="form-control" placeholder="Minute">
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col-1 ms-3">
                            ASS
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" placeholder="Hours">
                        </div>
                        :
                        <div class="col-3">
                            <input type="number" class="form-control" placeholder="Minute">
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col-1 ms-3">
                            REST
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" placeholder="Hours">
                        </div>
                        :
                        <div class="col-3">
                            <input type="number" class="form-control" placeholder="Minute">
                        </div>
                    </div>

                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
    <br>
</div>

@endsection

@push('scripts')
<script>
</script>
@endpush