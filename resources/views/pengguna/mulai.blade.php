@extends('pengguna.app')
@section('tab', 'Airnav Assist | Test')

@section('content')
<div class="container my-5">
    <h3 class="d-flex ms-auto"><span class="badge text-bg-warning me-3" id="timer"></span></h3>
    <form id="form-test">
        @csrf
        @foreach ($dataTest as $item)
        <div class="card my-4 shadow">
            <div class="card-body">
                <div class="row px-3">
                    <label class="mb-3">{{ $item->pertanyaan }}</label>
                    @foreach ($item->jawaban as $opsi)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $opsi->id_soal }}" id="{{ $opsi->id }}" value="{{ $opsi->nilai }}">
                        <label class="form-check-label" for="{{ $opsi->id }}">
                        {{ $opsi->jawaban }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        <button class="btn btn-warning d-flex ms-auto px-5" type="submit">Selesai</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    var idTest = `{{ $idTest }}`;
    var idHasil = `{{ $idHasil }}`;

    // submit
    $('#form-test').submit(function(e) {
        e.preventDefault();

        var url = "{{ route('test.selesai',['id'=>':id']) }}";
        url = url.replace(':id', idTest)

        var formData = new FormData($("#form-test")[0]);
        formData.append('idHasil', idHasil);

        // Konversi array jawabanDipilih ke JSON string sebelum menambahkannya ke formData
        formData.append('jawabanDipilih', JSON.stringify(jawabanDipilih));

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Tersimpan!',
                    text: response.meta.message,
                    timer: 10000
                }).then((result) => {
                    localStorage.clear();
                    window.location.href = "{{ route('test.userIndex') }}";
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                switch (xhr.status) {
                    case 422:
                    var message = xhr.responseJSON.meta.message;
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: message,
                    });
                    break;
                    default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan!',
                    })
                    break;
                }
            }
        });
    });

    // Hapus data dengan kunci 'startTime'
    // localStorage.removeItem('startTime');

    // Hapus semua data dari localStorage
    // localStorage.clear();

    // Cek apakah waktu mulai sudah disimpan di Local Storage
    var startTime = localStorage.getItem('startTime');

    if (!startTime) {
        // Jika belum disimpan, simpan waktu mulai saat ini
        startTime = new Date().getTime();
        localStorage.setItem('startTime', startTime);
    }

    // Waktu dalam format "00:01:00"
    var waktu = `{{ $durasi }}`;

    // Pisahkan jam, menit, dan detik
    var waktuSplit = waktu.split(":");
    var jam = parseInt(waktuSplit[0]);
    var menit = parseInt(waktuSplit[1]);
    var detik = parseInt(waktuSplit[2]);

    // Konversi ke detik
    var duration = (jam * 3600) + (menit * 60) + detik;

    var timer = setInterval(function() {
        // Hitung waktu yang tersisa
        var now = new Date().getTime();
        var elapsed = (now - startTime) / 1000;
        var remaining = duration - elapsed;

        // Format waktu tersisa menjadi menit dan detik
        var hours = Math.floor(remaining / 3600);
        var minutes = Math.floor(remaining / 60);
        var seconds = Math.floor(remaining % 60);

        // Tampilkan waktu tersisa
        document.getElementById("timer").innerHTML = "Time remaining: " + hours + "h " + minutes + "m " + seconds + "s";

        // Hentikan timer jika waktu habis
        if (remaining <= 0) {
            clearInterval(timer);
            document.getElementById("timer").innerHTML = "Time's up!";
            $('#form-test').submit();
        }
    }, 1000); // Update setiap detik

    document.addEventListener('DOMContentLoaded', function() {
        var radios = document.querySelectorAll('input[type="radio"]');
        radios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                localStorage.setItem(this.name, this.id);
            });
        });
    });

    var jawabanDipilih = [];
    document.addEventListener('DOMContentLoaded', function() {
    var radios = document.querySelectorAll('input[type="radio"]');
    radios.forEach(function(radio) {
        var storedValue = localStorage.getItem(radio.name);

        if (storedValue === radio.id) {
            radio.checked = true;
            jawabanDipilih.push(storedValue); // Menggunakan push untuk menambahkan nilai ke array
        }
    });
});

</script>
@endpush