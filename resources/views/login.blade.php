<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Sign In | Airnav</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-primary bg-opacity-25">
<section>
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
                <form class="mt-4" action="{{ route('signInPost') }}" method="POST">
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
            <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="{{ asset('src/img/logoLogin.png') }}">
            </div>

        </div>
    </div>
</section>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('message'))
    <script>
        console.log("test");
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: `{{ session('message') }}`,
            timer: 5000
        })
    </script>   
@endif
