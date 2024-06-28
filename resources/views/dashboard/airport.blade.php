@extends('dashboard.dashboard')
@section('tab','Airport')
@section('title','Airport')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive ">
                <table id="table-airport" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">SOP & LOCA</th>
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

<!-- Modal Create Airport -->
<div class="modal fade" id="modal-create-airport" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Airport</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <form id="form-create-airport">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="name">Nama <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Isi Nama" autofocus autocomplete="off">
                  <div class="invalid-feedback name_error"></div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="sop">SOP <span class="text-danger">*</span></label>
                  <input type="file" class="form-control" name="sop" id="sop" placeholder="Isi sop" autofocus autocomplete="off">
                  <div class="invalid-feedback sop_error"></div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="loca">LOCA <span class="text-danger">*</span></label>
                  <input type="file" name="loca[]" placeholder="Choose files" id="loca" placeholder="Isi loca" autofocus autocomplete="off" class="form-control" multiple >
                  <div class="invalid-feedback loca_error"></div>
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

<!-- Modal Lihat Loca -->
<div class="modal fade" id="modal-loca" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">LOCA</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <form id="form-loca">
            <div class="modal-body">
                <ul>
                    <!-- File list will be appended here by JavaScript -->
                </ul>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal Lihat Berkas -->
<div class="modal fade" id="modal-berkas" tabindex="-1" role="dialog" aria-labelledby="modalBerkas" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                <embed src="" frameborder="0" width="100%" height="500px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
            </div>
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
            idAirport = undefined;
        });

        var idAirport;
        let url;
        let urlAirport = '{{ route('airport.index') }}';

        let tableAirport = $('#table-airport').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
            ajax: {
                url: urlAirport,
                type: "GET"
            },
            layout: {
                topStart: {
                    buttons: [
                        {
                            text: '<i class="fas fa-plus mr-2"></i> Tambah Data',
                            className: 'btn btn-primary btn-tambah mb-3',
                            action: function(e, dt, node, config) {
                                $('#modal-create-airport').modal('show');
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
                    data: null,
                    className: 'text-center align-middle',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-primary btn-sm btn-sop" title="SOP"><i class="fas fa-file-alt"></i></button><br>
                        <button class="btn btn-success btn-sm btn-loca" title="LOCA"><i class="fas fa-file-alt"></i></button>`;
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

        // Submit Form Create AIRPORT
        $('#form-create-airport').submit(function(e) {
            e.preventDefault();

            if(idAirport !== undefined){
                url = "{{ route('airport.update', ['id' => ':id']) }}";
                url = url.replace(':id', idAirport)
            }else{
                url = "{{ route('airport.store') }}";
            }

            var formData = new FormData($("#form-create-airport")[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('*').removeClass('is-invalid');
                    // Tampilkan SweetAlert loading
                    Swal.fire({
                        title: 'Uploading...',
                        text: 'Please wait while your file is being uploaded.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    $('#modal-create-airport').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Tersimpan!',
                        text: response.meta.message,
                    });
                    tableAirport.ajax.reload();
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

        // Edit Data AIRPORT
        $('#table-airport tbody').on('click', '.btn-edit', function() {
            var data = tableAirport.row($(this).parents('tr')).data();
            idAirport = data.id;

            // set form action
            $('input[name="name"]').val(data.name);
            

            // show modal
            $('#modal-create-airport').modal('show');
        });
        
        // Hapus Data AIRPORT
        $('#table-airport tbody').on('click', '.btn-delete', function() {
            var data = tableAirport.row($(this).parents('tr')).data();
            let urlDestroy = "{{ route('airport.delete', ['id' => ':id']) }}"
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
                    tableAirport.ajax.reload();
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

        // Buka Modal LOCA
        $('#table-airport tbody').on('click', '.btn-loca', function() {
            var data = tableAirport.row($(this).parents('tr')).data();         
            var locaFiles = JSON.parse(data.LOCA);

            // Empty previous file list in modal
            $('#modal-loca .modal-body ul').empty();

            // Generate file list in modal
            locaFiles.forEach(function(file) {
                var file_url = "{{ asset('storage/airport/loca') }}/" + file;

                $('#modal-loca .modal-body ul').append(`<li><a class="btn btn-success btn-sm btn-loca-spesific" data-file="${file_url}" title="LOCA"><i class="fas fa-file-alt"></i>${file}</a></li>`);
            });

            // Show modal
            $('#modal-loca').modal('show');
        });

        $(document).on('click', '.btn-loca-spesific', function() {
            var file_url = $(this).data('file');

            $('#modal-berkas').find('.modal-title').text('LIHAT BERKAS');
            $('#modal-berkas').find('embed').attr('src', file_url);

            // Tampilkan modal
            $('#modal-berkas').modal('show');
        });

        $('#table-airport tbody').on('click', '.btn-sop', function() {
            var data = tableAirport.row($(this).parents('tr')).data();
            var file_url = "{{ asset('storage/airport/sop') }}/" + data.SOP;
            $('#modal-berkas').find('.modal-title').text($(this).data('name'));
            $('#modal-berkas').find('embed').attr('src', file_url);
            console.log(file_url);
            $('#modal-berkas').modal('show');
        });
    })
</script>

@endpush