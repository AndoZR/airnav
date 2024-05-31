@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
<br>
<header class="container">
    <ul id="artikelMenu" class="nav nav-tabs">
        <li class="nav-item">
            <a id="rekapBulan" class="nav-link active" href="#">Rekap Bulan</a>
        </li>
        <li class="nav-item">
            <a id="elogHarian" class="nav-link" href="#">Elogbook Harian</a>
        </li>
    </ul>
</header>
<br>
<div id="elogbookHarian" hidden>
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <small><b>Nama</b></small>
                <p class="mb-0"><strong>Adiyatma Yudha</strong></p>
            </div>
            <div class="col text-end">
                <a href="{{route('logbook.form')}}"><button type="button" class="btn btn-primary"><b>Input Data Baru</b></button></a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Data Rekap</strong><br><small>Rekap ID : <span><?php echo ($elogbookID); ?></span></small></p>
            </div>
            <div class="col">
                <form class="row align-items-end">
                    <div class="col">
                        <label class="form-label"><small><strong>Tahun</strong></small></label>
                        <input class="form-control form-control-sm" type="number" name="" id="" value="{{$tahun}}" disabled>
                    </div>
                    <div class="col">
                        <label class="form-label"><small><strong>Bulan</strong></small></label>
                        <!-- need to be refactor, next time used javascript to handle -->
                        <select class="form-select form-select-sm" aria-label="Default select example" disabled>
                            <option value="01" <?php if ($bulan == '01') {
                                                    print('selected');
                                                } ?>>Januari</option>
                            <option value="02" <?php if ($bulan == '02') {
                                                    print('selected');
                                                } ?>>Februari</option>
                            <option value="03" <?php if ($bulan == '03') {
                                                    print('selected');
                                                } ?>>Maret</option>
                            <option value="04" <?php if ($bulan == '04') {
                                                    print('selected');
                                                } ?>>April</option>
                            <option value="05" <?php if ($bulan == '05') {
                                                    print('selected');
                                                } ?>>Mei</option>
                            <option value="06" <?php if ($bulan == '06') {
                                                    print('selected');
                                                } ?>>Juni</option>
                            <option value="07" <?php if ($bulan == '07') {
                                                    echo ('selected');
                                                } ?>>Juli</option>
                            <option value="08" <?php if ($bulan == '08') {
                                                    echo ('selected');
                                                } ?>>Agustus</option>
                            <option value="09" <?php if ($bulan == '09') {
                                                    echo ('selected');
                                                } ?>>September</option>
                            <option value="10" <?php if ($bulan == '10') {
                                                    echo ('selected');
                                                } ?>>Oktober</option>
                            <option value="11" <?php if ($bulan == '11') {
                                                    echo ('selected');
                                                } ?>>November</option>
                            <option value="12" <?php if ($bulan == '12') {
                                                    echo ('selected');
                                                } ?>>Desember</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <!-- <button type="submit" class="btn btn-primary btn-sm">Cari</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="table-responsive-md">
            <table class="table table-sm table-bordered">
                <thead class="text-center table-secondary align-middle">
                    <tr class="">
                        <th scope="col" class="col" rowspan="2"> <small>Date</small></th>
                        <th scope="col" class="col-1" colspan="3"><small>Morning</small></th>
                        <th scope="col" class="col-1" colspan="3"><small>Afternoon</small></th>
                        <th scope="col" class="col-1" colspan="3"><small>Night</small></th>
                        <th scope="col" class="col-6" colspan="6"><small>Unit</small></th>
                        <th scope="col" class="col-2" rowspan="2"><small>Option</small></th>
                    </tr>
                    <tr class="">
                        <th scope=""><small>CTR</small></th>
                        <th scope=""><small>ASS</small></th>
                        <th scope=""><small>REST</small></th>
                        <th scope=""><small>CTR</small></th>
                        <th scope=""><small>ASS</small></th>
                        <th scope=""><small>REST</small></th>
                        <th scope=""><small>CTR</small></th>
                        <th scope=""><small>ASS</small></th>
                        <th scope=""><small>REST</small></th>
                        <th scope="" class="col-1"><small>ADC</small></th>
                        <th scope="" class="col-1"><small>APP</small></th>
                        <th scope="" class="col-1"><small>APP SURV</small></th>
                        <th scope="" class="col-1"><small>COMB ADC/APP</small></th>
                        <th scope="" class="col-1"><small>ACC</small></th>
                        <th scope="" class="col-1"><small>ACC SURV</small></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($elogbook as $logbookRow)
                    <tr>

                        <td><small>{{$logbookRow->day.$logbookRow->month.$logbookRow->year}}</small></td>
                        <td><small>{{$logbookRow->morning_ctr}}</small></td>
                        <td><small>{{$logbookRow->morning_ass}}</small></td>
                        <td><small>{{$logbookRow->morning_rest}}</small></td>
                        <td><small>{{$logbookRow->afternoon_ctr}}</small></td>
                        <td><small>{{$logbookRow->afternoon_ass}}</small></td>
                        <td><small>{{$logbookRow->afternoon_rest}}</small></td>
                        <td><small>{{$logbookRow->night_ctr}}</small></td>
                        <td><small>{{$logbookRow->night_ass}}</small></td>
                        <td><small>{{$logbookRow->night_rest}}</small></td>
                        <td><small>{{$logbookRow->unit_adc}}</small></td>
                        <td><small>{{$logbookRow->unit_app}}</small></td>
                        <td><small>{{$logbookRow->unit_app_surv}}</small></td>
                        <td><small>{{$logbookRow->unit_adc_app}}</small></td>
                        <td><small>{{$logbookRow->unit_acc}}</small></td>
                        <td><small>{{$logbookRow->unit_acc_surv}}</small></td>
                        <td>Delete Edit</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="border">
            <div class="m-3">
                <label for="inputAddress2" class="form-label ms-3"><strong>Total Hour Position (Monthly)</strong></label>
                <br>
                <br>
                <div class="row">
                    <div class="col-1 ms-3">
                        CTR
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" placeholder="Hours" readonly>
                    </div>
                    :
                    <div class="col-3">
                        <input type="number" class="form-control" placeholder="Minute" readonly>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-1 ms-3">
                        ASS
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" placeholder="Hours" readonly>
                    </div>
                    :
                    <div class="col-3">
                        <input type="number" class="form-control" placeholder="Minute" readonly>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-1 ms-3">
                        REST
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" placeholder="Hours" readonly>
                    </div>
                    :
                    <div class="col-3">
                        <input type="number" class="form-control" placeholder="Minute" readonly>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('rekapBulan').addEventListener('click', () => {
        if (!(document.getElementById("elogbookHarian").hidden)) {
            menuDeactivate()
            document.getElementById('rekapBulan').classList.toggle('active')
            document.getElementById("elogbookHarian").hidden = true;
            // document.getElementById("editorArtikel").hidden = false;
        } else {
            menuDeactivate()
            document.getElementById('elogHarian').classList.toggle('active')
            document.getElementById("elogbookHarian").hidden = true;
            // document.getElementById("editorArtikel").hidden = false;
        }
    })

    document.getElementById('elogHarian').addEventListener('click', () => {
        if (!(document.getElementById("elogbookHarian").hidden)) {
            menuDeactivate()
            document.getElementById('elogHarian').classList.toggle('active')
            document.getElementById("elogbookHarian").hidden = false;
            // document.getElementById("editorArtikel").hidden = true;
        } else {
            menuDeactivate()
            document.getElementById('elogHarian').classList.toggle('active')
            document.getElementById("elogbookHarian").hidden = false;
            // document.getElementById("editorArtikel").hidden = true;
        }
    })

    function menuDeactivate() {
        menu = document.getElementById("artikelMenu").getElementsByTagName('a');
        for (const nav of menu) {
            nav.classList.remove('active')
        }
    }
</script>
@endpush