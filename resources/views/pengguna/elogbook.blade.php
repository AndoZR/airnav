@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
{{-- MASTERHEAD --}}
<header class="">
    <br>
</header>
<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <small><b>Nama</b></small>
            <p class="mb-0"><strong>Jean Doe</strong></p>
        </div>
        <div class="col text-end">
            <a href="{{route('beranda.elogbook.form')}}"><button type="button" class="btn btn-primary"><b>Input Data Baru</b></button></a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <p><strong>Data Rekap</strong><br><small>Rekap ID : 1233456789</small></p>
        </div>
        <div class="col">
            <form class="row align-items-end">
                <div class="col">
                    <label class="form-label"><small><strong>Tahun</strong></small></label>
                    <select class="form-select form-select-sm" aria-label="Default select example">
                        <option selected>Tahun</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label"><small><strong>Bulan</strong></small></label>
                    <select class="form-select form-select-sm" aria-label="Default select example">
                        <option selected>Bulan</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="table-responsive-md">
        <table class="table table-sm table-bordered">
            <thead class="text-center table-secondary">
                <tr class="">
                    <th scope="col" rowspan="2"> <small>Date</small></th>
                    <th scope="col" colspan="3"><small>Morning</small></th>
                    <th scope="col" colspan="3"><small>Afternoon</small></th>
                    <th scope="col" colspan="3"><small>Night</small></th>
                    <th scope="col" colspan="6"><small>Unit</small></th>
                    <th scope="col" rowspan="2"><small>Option</small></th>
                </tr>
                <tr class="">
                    <th scope="col"><small>CTR</small></th>
                    <th scope="col"><small>ASS</small></th>
                    <th scope="col"><small>REST</small></th>
                    <th scope="col"><small>CTR</small></th>
                    <th scope="col"><small>ASS</small></th>
                    <th scope="col"><small>REST</small></th>
                    <th scope="col"><small>CTR</small></th>
                    <th scope="col"><small>ASS</small></th>
                    <th scope="col"><small>REST</small></th>
                    <th scope="col"><small>ADC</small></th>
                    <th scope="col"><small>APP</small></th>
                    <th scope="col"><small>APP SURV</small></th>
                    <th scope="col"><small>COMB ADC/APP</small></th>
                    <th scope="col"><small>ACC</small></th>
                    <th scope="col"><small>ACC SURV</small></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
</script>
@endpush