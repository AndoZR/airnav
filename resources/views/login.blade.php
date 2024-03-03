<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Sign In | Airnav</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-primary bg-opacity-25">
    <!-- Container -->
    <div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">
    
        <!-- Login component -->
        <div class="flex shadow-md">
            <!-- Login form -->
            <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
            <div class="w-72">
                <!-- Heading -->
                <h1 class="text-xl font-semibold">Sign In</h1>
                <small class="text-gray-400">Silahkan Masukkan Username dan Password!</small>

                <!-- Form -->
                <form class="mt-4" id="form-signin">
                @csrf
                <div class="mb-3">
                    <label class="mb-2 block text-xs font-semibold">Username</label>
                    <input type="text" name="username" placeholder="Enter your username" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                </div>

                <div class="mb-3">
                    <label class="mb-2 block text-xs font-semibold">Password</label>
                    <input type="password" name="password" placeholder="*****" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                </div>

                <div class="mb-3 flex flex-wrap content-center">
                    <a href="#" class="text-xs font-semibold text-purple-700">Lupa Password?</a>
                </div>

                <div class="mb-3">
                    <button type="submit" class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md">Sign in</button>
                </div>
                </form>
            </div>
            </div>

            <!-- Login banner -->
            <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
            <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="{{ asset('src/logoLogin.png') }}">
            </div>

        </div>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#form-signin').submit(function(e) {
            e.preventDefault(); // Mencegah pengiriman formulir normal

            var urlSignin = "{{ route('signin.store') }}";
            var formData = new FormData($(this)[0]); // Membuat objek FormData dari formulir

            $.ajax({
                type: 'post',
                url: urlSignin,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Menampilkan respons
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.meta.message,
                    })
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan kesalahan jika terjadi kesalahan
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat mengirimkan formulir.',
                    })
                }
            });
        });
    })
</script>