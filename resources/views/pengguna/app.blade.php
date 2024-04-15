<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tab')</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> <!-- untuk dropdown bootstrap -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
</head>

<body>
    <!-- NAVBAR -->
    @include('pengguna.navbar')

    <!-- Content -->
    @yield('content')
    
    {{-- FOOTER --}}
    @include('pengguna.footer')

</body>
<script src="{{ asset('src/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('src/jquery/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')

<script>
    var slider = tns({
        container: '#owl-carousel',
        mouseDrag: true,
        nav: false,
        axis: "horizontal",
        autoWidth: true,
        center: true,
        controlsContainer: document.getElementById('owl-nav'),
        viewportMax: 'fixedWidth',
    });
</script>

</html>