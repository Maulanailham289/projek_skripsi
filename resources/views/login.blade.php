<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="flex justify-center">
                    <img src="{{ asset('img/agro.jpg') }}" class="w-mx-auto h-11" />
                </div>
                @if (session('error'))
                    @include('alerts.error')
                @endif
                <div class="mt-10 flex flex-col items-center">
                    <div class="w-full flex-1">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mx-auto max-w-xs">
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="text" placeholder="Username" name="username" />
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                    type="password" placeholder="Password" name="password" />
                                <button
                                    class="mt-5 tracking-wide font-semibold bg-[#00A6BA] text-white-500 w-full py-4 rounded-lg hover:bg-[#047B87] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <span class="text-white">
                                        Sign In
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-green-100 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('img/pt agro.jpg') }}')">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
