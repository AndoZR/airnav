@extends('pengguna.app')
@section('tab', 'Airnav Assist | Pembelajaran')

@section( 'content' )
    {{-- MASTERHEAD --}}
    <header class="masterhead">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="text-primary fw-bold" style="text-shadow: 0px 0px 10px white, 2px 2px 3px white, -2px -2px 5px white , 5px 5px 20px white;">Hang Nadim Tower</h1>
        </div>
    </header>
   

    {{-- BACKGROUND III --}}
    <div class="endbackground container-fluid"></div>

    <div class="lastbackground">
        <div class="container text-center">
            <div class="row" style="padding-bottom: 3rem;">
                <div class="d-flex justify-content-center align-items-center" style="margin-top: 5rem;">
                    <h1 class="text-primary fw-bold" style="margin-top: -20rem;">Struktur Organisasi Cabang<br>Tanjung Pinang<br>(Bagan Managerial)</h1>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 5rem;">
                    <img src="{{ asset('src/img/bagan.png') }}" alt="Bagan" style="max-width: 100%;">
                </div>
            </div>
        </div>

    </div>
@endsection