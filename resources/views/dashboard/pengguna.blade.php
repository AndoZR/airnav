@extends('dashboard.dashboard')
@section('tab', 'Pengguna')
@section('title', 'Pengguna')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive ">
                <table id="table-pengguna" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal Create pengguna -->
<div class="modal fade" id="modal-create-pengguna" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengguna</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
        </button>
      </div>
      <form id="form-create-pengguna">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Isi Nama" autofocus autocomplete="off">
                <div class="invalid-feedback nama_error"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="username">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Isi Username" autofocus autocomplete="off">
                <div class="invalid-feedback username_error"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="pass    ">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Isi Password" autofocus autocomplete="off">
                <div class="invalid-feedback pass_error"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Batal</span>
            </button>
            <button type="submit" class="btn btn-primary ms-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Simpan</span>
            </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.modal').on('hidden.bs.modal', function(e) {
            $('form').trigger('reset');
            $('*').removeClass('is-invalid');
            $('.custom-file-label').html('Pilih file...');
        });

        var idPengguna;
        var idPenggunaDelete;
        let url;
        let urlPengguna = '{{ route('pengguna.index') }}';

        let tablePengguna = $('#table-pengguna').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
            ajax: {
                url: urlPengguna,
                type: "GET"
            },
            layout: {
                topStart: {
                    buttons: [
                        {
                            text: '<i class="fas fa-plus mr-2"></i> Tambah Data',
                            className: 'btn btn-primary btn-tambah mb-3',
                            action: function(e, dt, node, config) {
                                $('#modal-create-pengguna').modal('show');
                            }
                        }
                    ]
                },
            },
            columnDefs: [
                {
                    targets: 0,
                    data: null,
                    className: 'text-center align-middle',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    targets: 1,
                    data: 'name',
                    className: 'text-center align-middle',
                    render: function(data, type, row, meta) {
                        return data;
                    }
                },
                {
                    targets: 2,
                    data: 'username',
                    className: 'text-center align-middle',
                    render: function(data, type, row, meta) {
                        return data;
                    }
                },
                {
                    targets: 3,
                    data: null,
                    className: 'text-center align-middle',
                    render: function() {
                        return `<button class="btn btn-warning btn-sm btn-edit" title="Ubah"><i class="fas fa-pencil-alt"></i></button><br>
                        <button class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></button>`;
                    }
                },
            ],
        });

        // Submit Form Create pengguna
        $('#form-create-pengguna').submit(function(e) {
            e.preventDefault();

            if(idPengguna !== undefined){
                console.log(idPengguna);
                url = "{{ route('pengguna.update', ['id' => ':id']) }}";
                url = url.replace(':id', idPengguna)
            }else{
                console.log("store");
                url = "{{ route('pengguna.store') }}";
            }

            var formData = new FormData($("#form-create-pengguna")[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('*').removeClass('is-invalid');
                },
                success: function(response) {
                    $('#modal-create-pengguna').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Tersimpan!',
                        text: response.meta.message,
                    });
                    tablePengguna.ajax.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    switch (xhr.status) {
                        case 422:
                        var errors = xhr.responseJSON.meta.message;
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

        // Edit Data Pengguna
        $('#table-pengguna tbody').on('click', '.btn-edit', function() {
            var data = tablePengguna.row($(this).parents('tr')).data();
            idPengguna = data.id;

            // set form action
            $('input[name="nama"]').val(data.name);
            $('input[name="username"]').val(data.username);

            // show modal
            $('#modal-create-pengguna').modal('show');
        });

        // Hapus Data Pengguna
        $('#table-pengguna tbody').on('click', '.btn-delete', function() {
            var data = tablePengguna.row($(this).parents('tr')).data();
            let urlDestroy = "{{ route('pengguna.delete', ['id' => ':id']) }}"
            urlDestroy = urlDestroy.replace(':id', data.id);

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: urlDestroy,
                    beforeSend: function() {
                    },
                    success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil dihapus!',
                    })
                    tablePengguna.ajax.reload();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                    switch (xhr.status) {
                        case 500:
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Server Error!',
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
                }
            });
        });
    })
</script>
@endpush