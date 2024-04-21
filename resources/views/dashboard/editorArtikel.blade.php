@extends('dashboard.dashboard')
@section('tab', 'Artikel')
@section('title', 'Manajemen Artikel')

@section('content')
<section class="section">
    <div class="card">
        <div class="row m-3">
            <div class="col-12 text-end">
                <a href="{{ route('artikel.editor') }}"><button type="button" class="btn btn-primary">Publish</button></a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="input-group input-group-lg ">
        <input type="text" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Judul Artikel">
    </div>
    <br>
    <div class="card bg-white">
        <div class="row m-3">
            <div id="editor" class="col-12 text-dark">
            </div>
        </div>
    </div>
</section>

<!-- <section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive ">
                <table id="tableArtikel" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section> -->

<!-- Modal Create artikel -->
<!-- <div class="modal fade" id="modal-create-artikel" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Artikel</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <form id="form-create-artikel">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="judul">Judul Artikel <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Isi Judul" autofocus autocomplete="off">
                  <div class="invalid-feedback judul_error"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Isi deskripsi" autofocus autocomplete="off">
                  <div class="invalid-feedback deskripsi_error"></div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="file">File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="file" id="file" autofocus autocomplete="off">
                        <div class="invalid-feedback deskripsi_error"></div>
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
</div> -->

@endsection

@push('scripts')
<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });
    // $(document).ready(function () {
    //     $('.modal').on('hidden.bs.modal', function(e) {
    //         $('form').trigger('reset');
    //         $('*').removeClass('is-invalid');
    //         $('.custom-file-label').html('Pilih file...');
    //     });

    //     var idArtikel = null;
    //     let url;
    //     let urlArtikel = '{{ route('artikel.index') }}';

    //     let tableArtikel = $('#tableArtikel').DataTable({
    //         paging: true,
    //         lengthChange: false,
    //         searching: true,
    //         ordering: true,
    //         info: true,
    //         autoWidth: true,
    //         responsive: true,
    //         ajax: {
    //             url: urlArtikel,
    //             type: "GET"
    //         },
    //         layout: {
    //             topStart: {
    //                 buttons: [
    //                     {
    //                         text: '<i class="fas fa-plus mr-2"></i> Tambah Data',
    //                         className: 'btn btn-primary btn-tambah mb-3',
    //                         action: function(e, dt, node, config) {
    //                             $('#modal-create-artikel').modal('show');
    //                         }
    //                     }
    //                 ]
    //             },
    //         },
    //         columnDefs: [
    //             {
    //                 targets: 0,
    //                 data: null,
    //                 className: 'text-center align-middle',
    //                 render: function(data, type, row, meta) {
    //                     return meta.row + 1;
    //                 }
    //             },
    //             {
    //                 targets: 1,
    //                 data: 'judul',
    //                 className: 'text-center align-middle',
    //                 render: function(data, type, row, meta) {
    //                     return data;
    //                 }
    //             },
    //             {
    //                 targets: 2,
    //                 data: 'deskripsi',
    //                 className: 'text-center align-middle',
    //                 render: function(data, type, row, meta) {
    //                     return data;
    //                 }
    //             },
    //             {
    //                 targets: 3,
    //                 data: null,
    //                 className: 'text-center align-middle',
    //                 render: function() {
    //                     return `<button class="btn btn-warning btn-sm btn-edit" title="Ubah"><i class="fas fa-pencil-alt"></i></button><br>
    //                     <button class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></button>`;
    //                 }
    //             },
    //         ],
    //     });

    //     // Submit Form Create artikel
    //     $('#form-create-artikel').submit(function(e) {
    //         e.preventDefault();

    //         if(idArtikel !== null){
    //             url = "{{ route('artikel.update', ['id' => ':id']) }}";
    //             url = url.replace(':id', idArtikel)
    //         }else{
    //             url = "{{ route('artikel.store') }}";
    //         }

    //         var formData = new FormData($("#form-create-artikel")[0]);

    //         $.ajax({
    //             type: "POST",
    //             url: url,
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             beforeSend: function() {
    //                 $('*').removeClass('is-invalid');
    //             },
    //             success: function(response) {
    //                 $('#modal-create-artikel').modal('hide');
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Berhasil Tersimpan!',
    //                     text: response.meta.message,
    //                 });
    //                 tableArtikel.ajax.reload();
    //                 idArtikel = null;
    //             },
    //             error: function(xhr, ajaxOptions, thrownError) {
    //                 switch (xhr.status) {
    //                     case 422:
    //                     var errors = xhr.responseJSON.meta.message;
    //                     var message = '';
    //                     $.each(errors, function(key, value) {
    //                         message = value;
    //                         $('*[name="' + key + '"]').addClass('is-invalid');
    //                         $('.invalid-feedback.' + key + '_error').html(value);
    //                     });
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Gagal!',
    //                         text: message,
    //                     })
    //                     break;
    //                     default:
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Gagal!',
    //                         text: 'Terjadi kesalahan!',
    //                     })
    //                     break;
    //                 }
    //             }
    //         });
    //     });

    //     // Edit Data artikel
    //     $('#tableArtikel tbody').on('click', '.btn-edit', function() {
    //         var data = tableArtikel.row($(this).parents('tr')).data();
    //         idArtikel = data.id;

    //         // set form action
    //         $('input[name="judul"]').val(data.judul);
    //         $('input[name="deskripsi"]').val(data.deskripsi);

    //         // show modal
    //         $('#modal-create-artikel').modal('show');
    //     });

    //     // Hapus Data artikel
    //     $('#tableArtikel tbody').on('click', '.btn-delete', function() {
    //         var data = tableArtikel.row($(this).parents('tr')).data();
    //         let urlDestroy = "{{ route('artikel.delete', ['id' => ':id']) }}"
    //         urlDestroy = urlDestroy.replace(':id', data.id);

    //         Swal.fire({
    //             title: 'Apakah anda yakin?',
    //             text: "Data yang dihapus tidak dapat dikembalikan!",
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#dc3545',
    //             cancelButtonColor: '#6c757d',
    //             confirmButtonText: 'Ya, hapus!',
    //             cancelButtonText: 'Batal'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //             $.ajax({
    //                 type: "GET",
    //                 url: urlDestroy,
    //                 beforeSend: function() {
    //                 },
    //                 success: function(data) {
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Berhasil',
    //                     text: 'Data berhasil dihapus!',
    //                 })
    //                 tableArtikel.ajax.reload();
    //                 },
    //                 error: function(xhr, ajaxOptions, thrownError) {
    //                 switch (xhr.status) {
    //                     case 500:
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Gagal!',
    //                         text: 'Server Error!',
    //                     })
    //                     break;
    //                     default:
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Gagal!',
    //                         text: 'Terjadi kesalahan!',
    //                     })
    //                     break;
    //                 }
    //                 }
    //             });
    //             }
    //         });
    //     });
    // })
</script>
@endpush