@extends('dashboard.dashboard')
@section('tab', 'Artikel')
@section('title', 'Editor Artikel')

@section('content')
<section class="section">
    <div class="card">
        <div class="row m-3">
            <div class="col-6">
                <ul id="artikelMenu" class="nav nav-tabs">
                    <li class="nav-item">
                        <a id="editorLink" class="nav-link active" href="#">Editor</a>
                    </li>
                    <li class="nav-item">
                        <a id="deksripsiLink" class="nav-link" href="#">Deksripsi</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Konfigurasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Media</a>
                    </li> -->
                </ul>
            </div>
            <div class="col-6 text-end">
                <form id="preview" action="<?= route('artikel.preview') ?>" method="post" target="_blank">
                    @csrf
                    <input type="hidden" id="contentArt" name="content">
                    <input type="hidden" id="htmlArt" name="html">
                    <input type="hidden" id="judulArt" name="judul">
                </form>
                <button id="artikelPreview" type="button" class="btn btn-primary">Preview</button>
                <button id="artikelPublish" type="button" class="btn btn-primary">Publish</button>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div id="deksripsiArtikel" class="card" hidden>
        <div class="m-3">
            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Singkat</label>
            <textarea id="deksripsiArtikelForm" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>

    <div id="editorArtikel" class="card">
        <div class="row m-3">
            <div class="input-group input-group-lg" data-bs-theme="light">
                <input id="judulArtikel" type="text" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Judul Artikel">
            </div>
        </div>
        <hr>
        <div class="row m-3  bg-white">
            <div id="editor" class="col-12 text-dark">
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="module">
    const options = {
        debug: "info",
        modules: {
            toolbar: true,
        },
        placeholder: "Compose an epic...",
        theme: "snow",
    };
    editor = new Quill("#editor", options);

    
</script>
<script>
    document.getElementById('editorLink').addEventListener('click', () => {
        if (!(document.getElementById("deksripsiArtikel").hidden)) {
            menuDeactivate()
            document.getElementById('editorLink').classList.toggle('active')
            document.getElementById("deksripsiArtikel").hidden = true;
            document.getElementById("editorArtikel").hidden = false;
        } else {
            menuDeactivate()
            document.getElementById('deksripsiLink').classList.toggle('active')
            document.getElementById("deksripsiArtikel").hidden = true;
            document.getElementById("editorArtikel").hidden = false;
        }
    })

    document.getElementById('deksripsiLink').addEventListener('click', () => {
        if (!(document.getElementById("deksripsiArtikel").hidden)) {
            menuDeactivate()
            document.getElementById('deksripsiLink').classList.toggle('active')
            document.getElementById("deksripsiArtikel").hidden = false;
            document.getElementById("editorArtikel").hidden = true;
        } else {
            menuDeactivate()
            document.getElementById('deksripsiLink').classList.toggle('active')
            document.getElementById("deksripsiArtikel").hidden = false;
            document.getElementById("editorArtikel").hidden = true;
        }
    })

    function menuDeactivate() {
        menu = document.getElementById("artikelMenu").getElementsByTagName('a');
        for (const nav of menu) {
            nav.classList.remove('active')
        }
    }

    //preview artikel
    document.getElementById('artikelPreview').addEventListener('click', () => {
        editorContent = editor.getContents()
        editorHTML = editor.getSemanticHTML()
        judul = document.getElementById('judulArtikel').value
        document.getElementById("contentArt").value = editorContent;
        document.getElementById("htmlArt").value = editorHTML
        document.getElementById("judulArt").value = judul
        document.getElementById('preview').submit()
    })


    //publish article
    document.getElementById('artikelPublish').addEventListener('click', saveAndPublish);

    function saveAndPublish() {
        editorContent = editor.getContents()
        editorHTML = editor.getSemanticHTML()
        judulArtikel = document.getElementById('judulArtikel').value
        deksripsiArtikel = document.getElementById('deksripsiArtikelForm').value

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '<?= route('artikel.publish') ?>',
            type: 'POST',
            data: {
                content: JSON.stringify(editorContent),
                html: editorHTML,
                judul: judulArtikel,
                deksripsi: deksripsiArtikel
            },

            success: function(response) {
                alert("Artikel Berhasil Publish");
                document.getElementById("artikelPublish").setAttribute('disabled', 'true')
                // if (response != 0) {
                //     // self.pollData(urlPoll);
                // } else {
                //     $("#pesan").val("Chat Telah Berakhir");
                // }

            },

            error: function(response) {
                alert("Artikel Gagal Publish");
            }
        })
    }
</script>
@endpush