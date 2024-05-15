@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
{{-- MASTERHEAD --}}
<header class="">
    <br>
</header>
<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-primary btn-sm"><b>Input Data Baru</b></button>
        </div>

    </div>


    <hr>
    <p><strong>Data Rekap</strong><br><small>Rekap ID : 1233456789</small></p>
</div>

<div class="container">
    <div class="table-responsive-sm">
        <table class="table table-sm table-bordered">
            <thead class="text-center">
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