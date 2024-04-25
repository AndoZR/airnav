@extends('dashboard.dashboard')
@section('tab', 'Artikel')
@section('title', 'Manajemen Artikel')

@section('content')
<section class="section">
    <div class="card">
        <div class="row m-3">
            <div class="col-12 text-end">
                <form id="preview" action="<?= route('artikel.preview') ?>" method="post" target="_blank">
                    @csrf
                    <input type="hidden" id="contentArt" name="content" >
                    <input type="hidden" id="htmlArt" name="html" >
                    <input type="hidden" id="judulArt" name="judul" >
                    <button id="artikelPreview" type="button" class="btn btn-primary">Preview</button>
                </form>
                <form action="" method="post">
                    @csrf
                    <button id="artikelPublish" type="button" class="btn btn-primary">Publish</button>
                </form>
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
@vite('resources/js/app.js')
<script>
    document.getElementById('artikelPreview').addEventListener('click', ()=>{
        editorContent = editor.getContents()
        editorHTML = editor.getSemanticHTML()
        judul = document.getElementById('judulArtikel').value
        document.getElementById("contentArt").value = editorContent;
        document.getElementById("htmlArt").value = editorHTML
        document.getElementById("judulArt").value = judul
        document.getElementById('preview').submit()
    })
    // document.getElementById('preview').addEventListener('submit', e => {
    //     e.preventDefault();
    //     editorContent = editor.getContents()
    //     editorHTML = editor.getSemanticHTML()
    //     document.getElementsByName("content").value = editorContent;
    //     document.getElementsByName("html").value = editorHTML
    //     e.submit()
    // });

    // function saveAndPublish() {

        

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         url: '',
    //         type: 'POST',
    //         data: {
    //             content: editorContent,
    //             html: editorHTML
    //         },

    //         success: function(response) {
    //             if (response != 0) {
    //                 // self.pollData(urlPoll);
    //             } else {
    //                 $("#pesan").val("Chat Telah Berakhir");
    //             }


    //         },

    //         error: function(response) {
    //             console.log(response);
    //         }
    //     })
    // }
</script>
@endpush