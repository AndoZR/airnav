@extends('dashboard.dashboard')
@section('tab', 'Airport')
@section('title', 'Pembelajaran')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div>
                
            </div>
            <!-- <div class="table-responsive ">
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
            </div> -->
        </div>
    </div>
</section>

<!-- Modal Create artikel -->
<div class="modal fade" id="modal-create-artikel" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
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
</div>
@endsection

@push('scripts')
<script>
</script>
@endpush