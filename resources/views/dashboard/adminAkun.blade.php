@extends('dashboard.dashboard')
@section('tab', 'Akun')
@section('title', 'PROFIL')

@section('content')

<!-- Modal -->
<div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modal-editLabel">Ubah Data Akun</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="form-edit">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="konfirm" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="konfirm" name="konfirm">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="card mb-5" style="background-image: linear-gradient(150deg, #49548C, #3eabfe);">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3" style="position: relative; overflow: hidden;">
                    <img style="overflow: hidden; position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" src="{{ asset('src/img/planeakun.png') }}" alt="">
                </div>
                <div class="col-sm-9">
                    <h5 class="card-title text-warning">Welcome!</h5>
                    <p class="card-text text-light">"Advanture is calling and I have to answer.<br>- Airnav Assist</p>
                </div>
            </div>
        </div>
    </div>
     
    <div class="card px-5">
        <div class="row px-5">
            <div class="col-sm-6">
                <div class="card-body">
                    <h5 class="card-title"><b>Akun Admin</b></h5>
                    <p class="card-text">Nama: {{ $user->name }}</p>
                    <p class="card-text">Username: {{ $user->username }}</p>
                </div>
            </div>
            <div class="col-sm-3 pt-2">
                <img src="{{ asset('src/img/pilot.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-sm-3">
                <button title="Edit" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
    </div>   
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Submit Form Create pengguna
        $('#form-edit').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($("#form-edit")[0]);
            $.ajax({
                type: "POST",
                url: '{{ route('adminAkun.edit') }}',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('*').removeClass('is-invalid');
                },
                success: function(response) {
                    $('#modal-edit').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Tersimpan!',
                        text: response.meta.message,
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    switch (xhr.status) {
                        case 422:
                        var errors = xhr.responseJSON.meta.message;
                        console.log('message');
                        var message = '';
                        $.each(errors, function(key, value) {
                            message = value;
                            $('*[name="' + key + '"]').addClass('is-invalid');
                            $('.invalid-feedback.' + key + '_error').html(value);
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: message,
                        })
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
    })
</script>
@endpush
