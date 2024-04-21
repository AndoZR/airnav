@extends('dashboard.dashboard')
@section('tab', 'Artikel')
@section('title', 'Manajemen Artikel')

@section('content')
<section class="section">
    <div class="card">
        <div class="row m-3">
            <div class="col-12 text-end">
                <button id="artikelPublish" type="button" class="btn btn-primary">Publish</button>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="card">
        <div class="row m-3">
            <div class="input-group input-group-lg" data-bs-theme="light">
                <input id="judulArtikel" type="text" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Judul Artikel">
            </div>
        </div>
        <br>
        <div class="row m-3  bg-white">
            <div id="editor" class="col-12 text-dark">
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    document.getElementById('artikelPublish').addEventListener('click', saveAndPublish, false)

    function saveAndPublish() {
        editorContent = quill.getContents()
        console.log(document.getElementById('judulArtikel').value)
        console.log(JSON.stringify(editorContent))


        const self = this;
        let text = $("#pesan").val()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: urlPush,
            type: 'POST',
            data: {
                pesan: text
            },

            success: function(response) {
                if (response != 0) {
                    // self.pollData(urlPoll);
                } else {
                    $("#pesan").val("Chat Telah Berakhir");
                }


            },

            error: function(response) {
                console.log(response);
            }
        })
    }
</script>
@endpush