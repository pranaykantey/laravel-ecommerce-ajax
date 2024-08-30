<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="surfside media" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('assets/frontend/images/favicon.ico')}}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
    href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/swiper.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="gradient-bg">
  @include('layouts.frontend.guest-header')

  {{ $slot }}


  <hr class="mt-5 text-secondary" />

  @include('layouts.frontend.guest-footer')

  <script src="{{ asset('assets/frontend/js/plugins/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/plugins/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/plugins/bootstrap-slider.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/plugins/swiper.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/plugins/countdown.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/theme.js') }}"></script>
</body>

</html>
