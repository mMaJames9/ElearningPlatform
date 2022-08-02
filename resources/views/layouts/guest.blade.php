<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="ExamSucces">
        <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- ===============================================-->
        <!--    Document Title-->
        <!-- ===============================================-->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- ===============================================-->
        <!--    Favicons-->
        <!-- ===============================================-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
        {{-- <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}"> --}}
        <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
        <meta name="theme-color" content="#ffffff">

        <script src="{{ asset('assets/js/config.js') }}" defer></script>
        <script src="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.js') }}" defer></script>

        <!-- ===============================================-->
        <!--    Stylesheets-->
        <!-- ===============================================-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        @yield('styles')

        <link rel="stylesheet" href="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/choices/choices.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}" id="style-default">



        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/core.js') }}" defer></script>
        <script src="{{ asset('vendors/inputmask/jquery.inputmask.bundle.js') }}" defer></script>
        <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}" defer></script>
        <script src="{{ asset('vendors/is/is.min.js') }}" defer></script>
        <script src="{{ asset('vendors/fontawesome/all.min.js') }}" defer></script>
        <script src="{{ asset('vendors/lodash/lodash.min.js') }}" defer></script>
        <script src="{{ asset('vendors/list.js/list.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/theme.js') }}" defer></script>
        <script src="{{ asset('assets/js/inputmask.js') }}" defer></script>
        <script src="{{ asset('vendors/choices/choices.min.js') }}" defer></script>

        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>

    </head>

    <body>

        {{ $slot }}

        @include('partials._settings-panel')

    </body>

</html>
