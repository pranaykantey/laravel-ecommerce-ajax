<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <meta name="author" content="surfside media" /> --}}
        <link rel="shortcut icon" href="{{ asset('assets/frontend/assets/images/favicon.ico') }}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link
            href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/plugins/swiper.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/style.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/custom.css') }}" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @include('layouts.frontend.header')

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> --}}

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <div class="footermain-area" style="margin-top: 15px">
            @include('layouts.frontend.footer');
        </div>

        <script src="{{ asset('assets/frontend/assets/js/plugins/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/assets/js/plugins/bootstrap-slider.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/assets/js/plugins/swiper.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/assets/js/plugins/countdown.js') }}"></script>
        <script src="{{ asset('assets/frontend/assets/js/theme.js') }}"></script>
    </body>
</html>
