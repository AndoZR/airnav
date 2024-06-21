@extends('pengguna.app')
@section('tab', 'Airnav Assist | Logbook')

@section( 'content' )
<meta name="csrf-token" content="<?php echo (csrf_token()) ?>">
<br>
<header class="container">
    <ul id="artikelMenu" class="nav nav-tabs">
        <li class="nav-item">
            <a id="rekapBulan" class="nav-link active" href="#">Rekap Tahunan</a>
        </li>
        <li class="nav-item">
            <a id="elogHarian" class="nav-link" href="#">Rekap Bulanan</a>
        </li>
    </ul>
</header>
<br>
<div id="rekapBulanDashboard">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <p><strong>Data Rekap Tahunan</strong><br><small>Nama : {{session()->get('name')}}</small></p>
            </div>
            <div class="col text-end">
                <a href="{{route('logbook.createLogbook')}}"><button id="" type="button" class="btn btn-success"><b>Logbook Baru</b></button></a>
            </div>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <!-- <th scope="col">No</th> -->
                    <th scope="col">Rekap ID</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Status</th>
                    <th scope="col">Mengetahui</th>
                    <th scope="col">Rincian</th>
                </tr>
            </thead>
            <tbody id="rekapBulanBaris">
            </tbody>
        </table>
    </div>
</div>
<div id="elogbookHarian" hidden>
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <small><b>Nama</b></small>
                <p class="mb-0"><strong>{{session()->get('name')}}</strong></p>
            </div>
            <div class="col text-end">
                <form method="POST" action="{{route('logbook.form')}}">
                    @csrf
                    <input id="logbook_input_id" type="hidden" name="logbook_id">
                    <input id="logbook_input_month" type="hidden" name="bulan">
                    <input id="logbook_input_year" type="hidden" name="tahun">
                    <button id="new_daily_input" type="submit" class="btn btn-primary"><b>Data Baru</b></button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Data Rekap</strong><br><small>Rekap ID : <span id="rekap_bulan_id"></span></small></p>
            </div>
            <div class="col">
                <form class="row align-items-end">
                    <div class="col">
                        <label class="form-label"><small><strong>Tahun</strong></small></label>
                        <input id="rekap_bulan_tahun" class="form-control form-control-sm" type="number" name="" id="" value="" disabled>
                    </div>
                    <div class="col">
                        <label class="form-label"><small><strong>Bulan</strong></small></label>
                        <!-- need to be refactor, next time used javascript to handle -->
                        <input id="rekap_bulan_bulan" class="form-control form-control-sm" type="text" name="" id="" value="" disabled>
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
                        <th scope="col" class="col-3" colspan="3"><small>Morning</small></th>
                        <th scope="col" class="col-3" colspan="3"><small>Afternoon</small></th>
                        <th scope="col" class="col-3" colspan="3"><small>Night</small></th>
                        <th scope="col" class="col-1" rowspan="2"><small>Unit</small></th>
                        <th scope="col" class="col-1" rowspan="2"><small>Option</small></th>
                    </tr>
                    <tr class="">

                        <th scope="col" class=""><small>CTR</small></th>
                        <th scope="col" class=""><small>ASS</small></th>
                        <th scope="col" class=""><small>REST</small></th>
                        <th scope="col" class=""><small>CTR</small></th>
                        <th scope="col" class=""><small>ASS</small></th>
                        <th scope="col" class=""><small>REST</small></th>
                        <th scope="col" class=""><small>CTR</small></th>
                        <th scope="col" class=""><small>ASS</small></th>
                        <th scope="col" class=""><small>REST</small></th>
                    </tr>
                </thead>

                <tbody id="body_daily_logbook" class="text-center">
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
    document.getElementById('elogHarian').addEventListener('click', () => {
        if (document.getElementById("elogbookHarian").hidden) {
            menuDeactivate()
            document.getElementById('elogHarian').classList.toggle('active')
            document.getElementById("rekapBulanDashboard").hidden = true;
            document.getElementById("elogbookHarian").hidden = false;
        } else {}
    })

    document.getElementById('rekapBulan').addEventListener('click', () => {
        if (document.getElementById("rekapBulanDashboard").hidden) {
            menuDeactivate()
            document.getElementById('rekapBulan').classList.toggle('active')
            document.getElementById("elogbookHarian").hidden = true;
            document.getElementById("rekapBulanDashboard").hidden = false;
        } else {}
    })

    function menuDeactivate() {
        menu = document.getElementById("artikelMenu").getElementsByTagName('a');
        for (const nav of menu) {
            nav.classList.remove('active')
        }
    }
</script>
<script>
    function getRekapTahunan(callback, date = new Date) {
        let yearLocal = date.getFullYear()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?= route('logbook.tahunan') ?>',
            type: 'POST',
            data: {
                uniq_id: '{{session()->get("user_id")}}',
                year: yearLocal
            },
            success: function(response) {
                callback({
                    responses: response,
                    statusCode: 200,
                    message: "request complete"
                })
            },
            error: function(response) {
                callback({
                    responses: response,
                    statusCode: 400,
                    message: "request complete"
                })
            },
            complete: function() {

            }
        });
    }

    function tableRowCreate(dataset) {
        let tableBody = document.getElementById("rekapBulanBaris")
        let tableRow = document.createElement('tr')
        let cellRow1 = document.createElement('td')
        let cellRow2 = document.createElement('td')
        let cellRow3 = document.createElement('td')
        let cellRow4 = document.createElement('td')
        let cellRow5 = document.createElement('td')
        let cellRow6 = document.createElement('td')
        let expandButton = document.createElement('button')
        expandButton.append('Tampilkan')
        expandButton.classList.add('elogBulanExpand')
        expandButton.addEventListener('click', () => {
            let daily_body_table = document.getElementById("body_daily_logbook")
            let uid = dataset.uid
            daily_body_table.innerHTML = null
            document.getElementById('rekap_bulan_id').textContent = uid
            document.getElementById('logbook_input_id').value = uid
            document.getElementById('rekap_bulan_tahun').value = dataset.year
            document.getElementById('rekap_bulan_bulan').value = dataset.month

            tableDailyLogbook(function(callbackfunction) {

                for (row in callbackfunction.responses) {
                    let daily_dataset = callbackfunction.responses
                    daily_dataset.sort(function(a, b) {
                        let x = parseInt(a.day);
                        let y = parseInt(b.day);
                        if (x < y) {
                            return -1;
                        }
                        if (x > y) {
                            return 1;
                        }
                        return 0;
                    });
                    tableRowDailyLogbook(daily_dataset[row])
                }
            }, uid)

            if (document.getElementById("elogbookHarian").hidden) {
                menuDeactivate()
                document.getElementById('elogHarian').classList.toggle('active')
                document.getElementById("rekapBulanDashboard").hidden = true;
                document.getElementById("elogbookHarian").hidden = false;
            } else {}
        })
        cellRow1.append(dataset.uid)
        cellRow2.append(dataset.month)
        cellRow3.append(dataset.year)
        cellRow6.append(expandButton)
        tableRow.classList.add(['text-center'])
        tableRow.append(cellRow1, cellRow2, cellRow3, cellRow4, cellRow5, cellRow6)
        tableBody.insertAdjacentElement('afterbegin', tableRow)
    }

    function tableRowDailyLogbook(dataset) {
        let tableBody = document.getElementById("body_daily_logbook")
        let tableRow = document.createElement('tr')
        let morning_ctr = String(dataset.morning_ctr_hour || "").concat(":", String(dataset.morning_ctr_minute || ""))
        let morning_ass = String(dataset.morning_ass_hour || "").concat(":", String(dataset.morning_ass_minute || ""))
        let morning_rest = String(dataset.morning_rest_hour || "").concat(":", String(dataset.morning_rest_minute || ""))
        let afternoon_ctr = String(dataset.afternoon_ctr_hour || "").concat(":", String(dataset.afternoon_ctr_minute || ""))
        let afternoon_ass = String(dataset.afternoon_ass_hour || "").concat(":", String(dataset.afternoon_ass_minute || ""))
        let afternoon_rest = String(dataset.afternoon_rest_hour || "").concat(":", String(dataset.afternoon_rest_minute || ""))
        let night_ctr = String(dataset.night_ctr_hour || "").concat(":", String(dataset.night_ctr_minute || ""))
        let night_ass = String(dataset.night_ass_hour || "").concat(":", String(dataset.night_ass_minute || ""))
        let night_rest = String(dataset.night_rest_hour || "").concat(":", String(dataset.night_rest_minute || ""))
        let cell_day = document.createElement('th')
        cell_day.append(dataset.day)
        tableRow.append(cell_day)

        let sorting_cell = [morning_ctr, morning_ass, morning_rest, afternoon_ctr, afternoon_ass, afternoon_rest, night_ctr, night_ass, night_rest, String(dataset.unit).toUpperCase()]

        for (cell in sorting_cell) {
            if (sorting_cell[cell] == ':') {
                let cellData = document.createElement('td')
                cellData.append("")
                tableRow.append(cellData)
            } else {
                let cellData = document.createElement('td')
                cellData.append(sorting_cell[cell])
                tableRow.append(cellData)
            }
        }
        tableBody.insertAdjacentElement('afterbegin', tableRow)

    }

    function tableDailyLogbook(callback, rekap_id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?= route('logbook.bulanan') ?>',
            type: 'POST',
            data: {
                elogbook_id: rekap_id,
                user_id: 'test'
            },
            success: function(response) {
                callback({
                    responses: response,
                    statusCode: 200,
                    message: "request complete"
                })
            },
            error: function(response) {
                callback({
                    responses: response,
                    statusCode: 400,
                    message: "request complete"
                })
            },
            complete: function() {

            }
        });
    }

    function formDailyLogbook(id, dataset) {
        document.getElementById('rekap_bulan_id').textContent = id
        document.getElementById('logbook_input_id').value = id
        document.getElementById('logbook_input_month').value = dataset[dataset.length - 1].month
        document.getElementById('logbook_input_year').value = dataset[dataset.length - 1].year
        document.getElementById('rekap_bulan_tahun').value = dataset[dataset.length - 1].year
        document.getElementById('rekap_bulan_bulan').value = dataset[dataset.length - 1].month
    }
</script>
<script>
    $(document).ready(function() {
        getRekapTahunan(function(callback) {
            for (i in callback.responses) {
                tableRowCreate(callback.responses[i])
            }
            let recentRekap = callback.responses[callback.responses.length - 1].uid
            formDailyLogbook(recentRekap, callback.responses)
            tableDailyLogbook(function(callbackfunction) {
                let daily_dataset = callbackfunction.responses
                daily_dataset.sort(function(a, b) {
                    let x = parseInt(a.day);
                    let y = parseInt(b.day);
                    if (x < y) {
                        return -1;
                    }
                    if (x > y) {
                        return 1;
                    }
                    return 0;
                });
                for (row in daily_dataset) {
                    tableRowDailyLogbook(daily_dataset[row])
                }
            }, recentRekap)
        })
    })
</script>
@endpush