@extends('dashboard.dashboard')
@section('tab', 'Divisi')
@section('title', 'Divisi')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive ">
                <table id="table-divisi" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
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

<!-- Modal Create Divisi -->
<div class="modal fade" id="modal-create-divisi" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Divisi</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <form id="form-create-divisi">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="divisi">Divisi <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="divisi" id="divisi" placeholder="Isi divisi" autofocus autocomplete="off">
                  <div class="invalid-feedback divisi_error"></div>
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

        var idAirport = `{{ $id }}`;
        var idDivisi;
        let urlDivisi = "{{ route('organisasi.divisi', ['id'=>':id']) }}";
        urlDivisi = urlDivisi.replace(':id',idAirport);

        let tableDivisi = $('#table-divisi').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
            ajax: {
                url: urlDivisi,
                type: "GET"
            },
            layout: {
                topStart: {
                    buttons: [
                        {
                            text: '<i class="fas fa-plus mr-2"></i> Tambah Divisi',
                            className: 'btn btn-primary btn-tambah mb-3',
                            action: function(e, dt, node, config) {
                                $('#modal-create-divisi').modal('show');
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
                    data: 'divisi',
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
                        return `<button class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                            <br><button class="btn btn-warning btn-sm btn-edit" title="Ubah"><i class="fas fa-pencil-alt"></i></button><br>`;
                    }
                },
            ],
        });

        // Submit Form Divisi
        $('#form-create-divisi').submit(function(e) {
            e.preventDefault();

            if(idDivisi !== undefined){
                url = "{{ route('organisasi.divisi.update', ['id' => ':id']) }}";
                url = url.replace(':id', idDivisi)
            }else{
                url = "{{ route('organisasi.divisi.store') }}";
            }

            var formData = new FormData($("#form-create-divisi")[0]);
            formData.append('idAirport', idAirport);

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
                    $('#modal-create-divisi').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Tersimpan!',
                        text: response.meta.message,
                    });
                    tableDivisi.ajax.reload();
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

        // Edit Data Divisi
        $('#table-divisi tbody').on('click', '.btn-edit', function() {
            var data = tableDivisi.row($(this).parents('tr')).data();
            idDivisi = data.id;

            // set form action
            $('input[name="divisi"]').val(data.divisi);

            // show modal
            $('#modal-create-divisi').modal('show');
        });

        // Hapus Data Divisi
        $('#table-divisi tbody').on('click', '.btn-delete', function() {
            var data = tableDivisi.row($(this).parents('tr')).data();
            let urlDestroy = "{{ route('organisasi.divisi.delete', ['id' => ':id']) }}"
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
                    tableDivisi.ajax.reload();
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