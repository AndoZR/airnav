@extends('dashboard.dashboard')
@section('tab', 'Test')
@section('title', 'Test')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive ">
                <table id="table-test" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Subjek</th>
                            <th scope="col">Status</th>
                            <th scope="col">Durasi</th>
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

<!-- Modal Create Test -->
<div class="modal fade" id="modal-create-test" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Ujian</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <form id="form-create-test">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="subjek">Subjek <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Isi subjek" autofocus autocomplete="off">
                  <div class="invalid-feedback subjek_error"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="durasi">Durasi <span class="text-danger">*</span></label>
                  <input type="time" class="form-control" name="durasi" id="durasi" placeholder="Isi durasi" autofocus autocomplete="off">
                  <div class="invalid-feedback durasi_error"></div>
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

        var idTest;
        let url;
        let urlTest = '{{ route('test.index') }}';

        let tableTest = $('#table-test').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
            ajax: {
                url: urlTest,
                type: "GET"
            },
            layout: {
                topStart: {
                    buttons: [
                        {
                            text: '<i class="fas fa-plus mr-2"></i> Tambah Data',
                            className: 'btn btn-primary btn-tambah mb-3',
                            action: function(e, dt, node, config) {
                                $('#modal-create-test').modal('show');
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
                    data: 'subjek',
                    className: 'text-center align-middle',
                    render: function(data, type, row, meta) {
                        return data;
                    }
                },
                {
                    targets: 2,
                    data: null,
                    className: 'text-center align-middle',
                    render: function(data, type, row, meta) {
                        if (row.status == 1){
                            return `<input type="checkbox" status-data='0' class="form-check-input form-check-primary form-check-glow check-status" checked name="customCheck" id="checkboxGlow1">`;
                        } else {
                            return `<input type="checkbox" status-data='1' class="form-check-input form-check-primary form-check-glow check-status" name="customCheck" id="checkboxGlow1">`;
                        }
                    }
                },
                {
                    targets: 3,
                    data: 'durasi',
                    className: 'text-center align-middle',
                    render: function(data, type, row, meta) {
                        return data;
                    }
                },
                {
                    targets: 4,
                    data: null,
                    className: 'text-center align-middle',
                    render: function(data, type, row, meta) {
                        url = "{{ route('test.soal.soalIndex',['id' => ':id']) }}"
                        url = url.replace(':id', row.id)
                        $button = `<a href="${url}" class="btn btn-primary btn-sm btn-soal" title="Soal"><i class="fas fa-book"></i></a>`;
                        if (row.status == 1){
                            $button += `<button disabled class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                            <br><button disabled class="btn btn-warning btn-sm btn-edit" title="Ubah"><i class="fas fa-pencil-alt"></i></button><br>`;
                        } else {
                            $button += `<button class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                            <br><button class="btn btn-warning btn-sm btn-edit" title="Ubah"><i class="fas fa-pencil-alt"></i></button><br>`;
                        }
                        return $button;
                    }
                },
            ],
        });

        // Submit Form Create test
        $('#form-create-test').submit(function(e) {
            e.preventDefault();

            if(idTest !== undefined){
                url = "{{ route('test.update', ['id' => ':id']) }}";
                url = url.replace(':id', idTest)
            }else{
                url = "{{ route('test.store') }}";
            }

            var formData = new FormData($("#form-create-test")[0]);

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
                    $('#modal-create-test').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Tersimpan!',
                        text: response.meta.message,
                    });
                    tableTest.ajax.reload();
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

        // Edit Data test
        $('#table-test tbody').on('click', '.btn-edit', function() {
            var data = tableTest.row($(this).parents('tr')).data();
            idTest = data.id;

            // set form action
            $('input[name="subjek"]').val(data.subjek);
            $('input[name="durasi"]').val(data.durasi);

            // show modal
            $('#modal-create-test').modal('show');
        });

        // Hapus Data test
        $('#table-test tbody').on('click', '.btn-delete', function() {
            var data = tableTest.row($(this).parents('tr')).data();
            let urlDestroy = "{{ route('test.delete', ['id' => ':id']) }}"
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
                    tableTest.ajax.reload();
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

        // Active test
        $('#table-test tbody').on('click', '.check-status', function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var data = tableTest.row($(this).parents('tr')).data();
            idTest = data.id;

            var status = $(this).attr('status-data');

            url = "{{ route('test.active', ['id' => ':id']) }}";
            url = url.replace(':id', idTest)

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: csrfToken, // Menggunakan _token sebagai kunci untuk token CSRF
                    id: idTest,
                    status: status,
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Tersimpan!',
                        text: response.meta.message,
                    });
                    tableTest.ajax.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    switch (xhr.status) {
                        case 422:
                        var errors = xhr.responseJSON.meta.message;
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: errors,
                        })
                        tableTest.ajax.reload();
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