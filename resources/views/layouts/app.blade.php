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
        <script src="{{ asset('assets/js/toastify.js') }}" defer></script>
        <script src="{{ asset('assets/js/dropify.js') }}" defer></script>

        <script src="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.js') }}" defer></script>

        <!-- ===============================================-->
        <!--    Stylesheets-->
        <!-- ===============================================-->

        @yield('styles')

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap">
        <link rel="stylesheet" href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/choices/choices.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/dropzone/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/prism/prism-okaidia.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}" id="style-default">


        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/core.js') }}" defer></script>
        <script src="{{ asset('vendors/inputmask/jquery.inputmask.bundle.js') }}" defer></script>
        <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}" defer></script>
        <script src="{{ asset('vendors/is/is.min.js') }}" defer></script>
        <script src="{{ asset('vendors/chart/chart.min.js') }}" defer></script>
        <script src="{{ asset('vendors/leaflet/leaflet.js') }}" defer></script>
        <script src="{{ asset('vendors/leaflet.markercluster/leaflet.markercluster.js') }}" defer></script>
        <script src="{{ asset('vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}" defer></script>
        <script src="{{ asset('vendors/choices/choices.min.js') }}" defer></script>
        <script src="{{ asset('vendors/toastify/toastify.js') }}" defer></script>
        <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}" defer></script>
        <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}" defer></script>
        <script src="{{ asset('vendors/prism/prism.js') }}" defer></script>
        <script src="{{ asset('vendors/countup/countUp.umd.js') }}" defer></script>
        <script src="{{ asset('vendors/echarts/echarts.min.js') }}" defer></script>
        <script src="{{ asset('assets/data/world.js') }}" defer></script>
        <script src="{{ asset('vendors/dayjs/dayjs.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/flatpickr.js') }}" defer></script>
        <script src="{{ asset('vendors/fontawesome/all.min.js') }}" defer></script>
        <script src="{{ asset('vendors/lodash/lodash.min.js') }}" defer></script>
        <script src="{{ asset('vendors/list.js/list.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/theme.js') }}" defer></script>
        <script src="{{ asset('assets/js/inputmask.js') }}" defer></script>

        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>

    </head>

    <body>

        <main class="main" id="top">
            <div class="container" data-layout="container">
                <script>
                    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                    if (isFluid) {
                        var container = document.querySelector('[data-layout]');
                        container.classList.remove('container');
                        container.classList.add('container-fluid');
                    }
                </script>

                @livewire('navigation-menu')

                @include('partials._navbar-vertical')

                <div class="content">
                    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
                        @include('partials._logo-toogle')
                        @include('partials._control-panel')
                    </nav>

                    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;" data-move-target="#navbarVerticalNav" data-navbar-top="combo">

                        @include('partials._logo-toogle')

                        @include('partials._navbar-standard')
                    </nav>

                    <script>
                        var navbarPosition = localStorage.getItem('navbarPosition');
                        var navbarVertical = document.querySelector('.content [data-navbar-top="combo"]');
                        var navbarTopVertical = document.querySelector('.content [data-navbar-top="combo"]');
                        var navbarTop = document.querySelector('.content [data-navbar-top="combo"]');
                        var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');
                        if (navbarPosition === 'top') {
                            navbarTop.removeAttribute('style');
                            navbarTopVertical.remove(navbarTopVertical);
                            navbarVertical.remove(navbarVertical);
                            navbarTopCombo.remove(navbarTopCombo);
                        } else if (navbarPosition === 'combo') {
                            navbarVertical.removeAttribute('style');
                            navbarTopCombo.removeAttribute('style');
                            navbarTop.remove(navbarTop);
                            navbarTopVertical.remove(navbarTopVertical);
                        } else {
                            navbarVertical.removeAttribute('style');
                            navbarTopVertical.removeAttribute('style');
                            navbarTop.remove(navbarTop);
                            navbarTopCombo.remove(navbarTopCombo);
                        }
                    </script>

                    {{ $slot }}

                    @include('partials._footer')
                </div>
            </div>
        </main>

        @include('partials._settings-panel')

        @yield('scripts')

        @include('partials._notifications')

        @livewireScripts


    </body>

</html>

