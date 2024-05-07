@extends('dashboard.dashboard')
@section('tab', 'Soal')
@section('title', 'Soal')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive ">
                <table id="table-soal" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col">Jawaban</th>
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

<!-- Modal Create Soal -->
<div class="modal fade" id="modal-create-soal" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Soal</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <form id="form-create-soal">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="pertanyaan">Pertanyaan <span class="text-danger">*</span></label>
                  <textarea class="form-control" name="pertanyaan" id="pertanyaan" placeholder="Isi pertanyaan" autofocus autocomplete="off" required></textarea>
                  <div class="invalid-feedback pertanyaan_error"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="jawaban">Jawaban <span class="text-danger">*</span></label>
                  <button class="btn btn-outline-primary" type="button" id="add-answer" title="Tambah Jawaban"><i class="fas fa-plus"></i></button>
                  <input type="hidden" id="correct" name="correct" value="">
                  <div class="invalid-feedback jawaban_error"></div>
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

<!-- Modal Jawaban -->
<div class="modal fade" id="modal-jawaban" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Jawaban</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <form id="form-jawaban">
          <div class="modal-body addJawaban">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        var maxInputGroup = 5; // Jumlah maksimal input group jawaban yang diizinkan
        var currentInputGroup = 0; // Jumlah input group jawaban yang sudah ditambahkan

        $('.modal').on('hidden.bs.modal', function(e) {
            $(this).find('.input-group').remove(); // Menghapus semua input group di dalam modal
            $('form').trigger('reset');
            $('*').removeClass('is-invalid');
            $('.custom-file-label').html('Pilih file...');
            $('#correct').val('');
            currentInputGroup = 0
        });

        var correctAnswer
        var status = `{{ $status }}`;
        var html;
        var idTest = `{{ $id }}`;
        var idSoal;
        let url;
        let urlSoal = "{{ route('test.soal.soalIndex', ['id' => ':id']) }}";
        urlSoal = urlSoal.replace(':id',idTest)

        $("#add-answer").click(function() {
            if (currentInputGroup < maxInputGroup) {
                html = '<div class="input-group mb-3">' +
                                '<input required type="text" class="form-control" name="jawaban[]" placeholder="Isi jawaban">' +
                                '<button class="btn btn-outline-success correct" type="button" title="Pilih Opsi Benar"><i class="fas fa-check"></i></button>' +
                                '<button class="btn btn-danger remove-answer" type="button" title="Hapus Jawaban"><i class="fas fa-trash-alt"></i></button>' +
                            '</div>';
                $(".modal-body").append(html);
                currentInputGroup++; // Menambah jumlah input group yang sudah ditambahkan
            } else {
                Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Jumlah opsi sudah mencapai batas maksimal.',
                        });
            }
        });
        
        $(document).on("click", ".correct", function() {
            $(".correct").removeClass("btn-success").addClass("btn-outline-success");
            $(this).removeClass("btn-outline-success").addClass("btn-success");
        });

        $(document).on("click", ".remove-answer", function() {
            $(this).parent().remove();
        });

        let tableSoal = $('#table-soal').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
            ajax: {
                url: urlSoal,
                type: "GET"
            },
            layout: {
                topStart: {
                    buttons: [
                        {
                            text: '<i class="fas fa-plus mr-2"></i> Tambah Soal',
                            className: 'btn btn-primary btn-tambah mb-3',
                            enabled: function () {
                                console.log(data)
                                // Nonaktifkan tombol jika data.test.status == 1
                                return !data || !data.test || data.test.status != 1;
                            },
                            action: function(e, dt, node, config) {
                                $('#modal-create-soal').modal('show');
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
                    data: 'pertanyaan',
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
                        return `<button class="btn btn-success btn-sm btn-jawaban" title="Lihat Jawaban"><i class="fas fa-search"></i></button>`
                    }
                },
                {
                    targets: 3,
                    data: null,
                    className: 'text-center align-middle',
                    render: function(row){
                        if (status == 0) {
                            return `<button class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></button>`
                        } else {
                            return `<button disabled class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></button>`
                        }
                    }
                },
            ],
            initComplete: function() {
                if (status == 1) {
                $('.btn-tambah').prop('disabled', true);
                }
            }
        });

        // Submit Form Create Soal
        $('#form-create-soal').submit(function(e) {
            // Simpan nilai jawaban benar ke dalam input tersembunyi
            correctAnswer = $('.btn-success').closest(".input-group").find("input[name='jawaban[]']").val();
            $("#correct").val(correctAnswer);
            
            e.preventDefault();

            url = "{{ route('test.soal.store', ['id' => ':id']) }}";
            url = url.replace(':id', idTest)

            var formData = new FormData($("#form-create-soal")[0]);

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
                    $('#modal-create-soal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Tersimpan!',
                        text: response.meta.message,
                    });
                    tableSoal.ajax.reload();
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

        // Lihat Jawaban
        $('#table-soal tbody').on('click', '.btn-jawaban', function() {
            $('.modal').find('.input-group').remove();
            var data = tableSoal.row($(this).parents('tr')).data();
            idSoal = data.id;
            var jawabanHTML

            var urlJawaban = "{{ route('test.soal.getJawaban', ['id' => ':id']) }}";
            urlJawaban = urlJawaban.replace(':id',idSoal);
            
            // Mengambil data dari controller
            $.ajax({
                type: "GET",
                url: urlJawaban,
                success: function(response) {
                    for (var item of response.data) {
                        jawabanHTML = `<div class="input-group mb-3">
                                    <input disabled type="text" class="form-control" name="jawaban[]" value="${item.jawaban}">
                                    ${item.nilai == 1 ? '<button disabled class="btn btn-success" type="button"><i class="fas fa-check"></i></button>' : '<button disabled class="btn btn-outline-danger type="button"><i class="fas fa-window-close"></i></button>'}
                                </div>`;
                        $(".addJawaban").append(jawabanHTML);
                    }
                },
                error: function() {
                    alert('Gagal mengambil data.');
                }
            })

            // show modal
            $('#modal-jawaban').modal('show');
        });

        // Hapus Data Soal
        $('#table-soal tbody').on('click', '.btn-delete', function() {
            var data = tableSoal.row($(this).parents('tr')).data();
            let urlDestroy = "{{ route('test.soal.delete', ['id' => ':id']) }}"
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
                    tableSoal.ajax.reload();
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