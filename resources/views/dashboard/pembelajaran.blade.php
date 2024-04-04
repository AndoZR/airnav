@extends('dashboard.dashboard')
@section('tab', 'Airport')
@section('title', 'Pembelajaran')

@section('content')
<section class="section">

    <div class="card p-3">
        <div class="row g-0">
            <div class="col-sm-3 border">
                <img class="" src="" class="m-2" alt="">
            </div>
            <div class="col-sm-9">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="btn btn-danger">PDF File</a>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-warning">Remove</a>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="card p-3">
        <div class="row g-0">
            <div class="col-sm-3 border">
                <img class="" src="" class="m-2" alt="">
            </div>
            <div class="col-sm-9">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="btn btn-danger">PDF File</a>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-warning">Remove</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
</section>
@endsection

@push('scripts')
<script>
</script>
@endpush