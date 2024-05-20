@extends('dashboard.dashboard')
@section('tab', 'Organisasi')
@section('title', 'Organisasi')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive ">
                <table id="table-airport" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">name</th>
                            <th scope="col">divisi</th>
                            <th scope="col">posisi</th>
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
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.modal').on('hidden.bs.modal', function(e) {
            $('form').trigger('reset');
            $('*').removeClass('is-invalid');
            $('.custom-file-label').html('Pilih file...');
        });

        let urlAirport = '{{ route('organisasi.airport') }}';

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
                      url = "{{ route('organisasi.divisi',['id' => ':id']) }}"
                      url = url.replace(':id', row.id)
                      return `<a href="${url}" class="btn btn-primary btn-sm btn-organisasi" title="Divisi"><i class="fas fa-sitemap"></i></a><br>`;
                    }
                },
            ],
        });
    })
</script>
@endpush