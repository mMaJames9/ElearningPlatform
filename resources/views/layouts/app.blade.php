
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>

<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}">
<!-- End plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
<!-- endinject -->

<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

<!-- plugins:js -->
<script src="{{ asset('js/jquery-3.5.1.js') }}" defer></script>
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}" defer></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}" defer></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}" defer></script>
<script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}" defer></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
{{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
<script src="{{ asset('js/off-canvas.js') }}" defer></script>
<script src="{{ asset('js/hoverable-collapse.js') }}" defer></script>
<script src="{{ asset('js/template.js') }}" defer></script>
<script src="{{ asset('js/settings.js') }}" defer></script>
<script src="{{ asset('js/todolist.js') }}" defer></script>
<!-- end-->

<!-- Custom js for this page-->
<script src="{{ asset('js/jquery.cookie.js') }}" defer></script>
<script src="{{ asset('js/dashboard.js') }}" defer></script>
<script src="{{ asset('js/Chart.roundedBarCharts.js') }}" defer></script>
<!-- End custom js for this page-->
</head>
<body class="with-welcome-text">
    <div class="container-scroller">

    @livewire('navigation-menu')

    <div class="container-fluid page-body-wrapper">
        @include('partials._settings-panel')
        @include('partials._rightbar')
        @include('partials._sidebar')

        <!-- Page Content -->
        {{ $slot }}

        @stack('modals')

    </div>


@livewireScripts
</body>
</html>
