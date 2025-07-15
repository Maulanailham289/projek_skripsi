<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @include('layouts.navbar')
    <div class="min-h-screen bg-white text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white sm:rounded-lg flex justify-center flex-1">
            <div class="flex-1 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('img/pt agro.jpg') }}')">
                </div>
            </div>
            <div class="lg:w-1/2 p-6 sm:p-12 flex flex-col items-start justify-center">
                <div class="flex justify-start">
                    <img src="{{ asset('img/pt agro.jpg') }}" class="w-mx-auto h-11" />
                </div>
                <h1 class="mt-6 font-medium">PT AGRO GREEN JAVA
                    SOLID COMMODITY
                </h1>
                <button
                    class="mt-5 tracking-wide font-semibold bg-[#D5647D] text-white-500 w-1/2 py-4 rounded-lg hover:bg-[#A84A5F] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
                    onclick="window.location.href='/login'">
                    <h1 class="font-bold text-white text-lg mr-2">
                        Login
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="size-8">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</body>

</html>
