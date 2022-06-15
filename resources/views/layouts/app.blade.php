
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
<meta name="author" content="NobleUI">
<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- End fonts -->

<!-- core:css -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
<!-- End plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<!-- endinject -->

<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('assets/css/demo1/style.min.css') }}">
<!-- End layout styles -->

<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

<!-- base:js -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('assets/vendors/core/core.js') }}"></script>
<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}" defer></script>
<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}" defer></script>
<script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.bundle.js') }}" defer></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}" defer></script>
<script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}" defer></script>
<script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}" defer></script>
<script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}" defer></script>
<script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}" defer></script>
<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}" defer></script>
<script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}" defer></script>
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}" defer></script>
<script src="{{ asset('assets/vendors/dropify/dist/dropify.min.js') }}" defer></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('assets/js/template.js') }}" defer></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('assets/js/inputmask.js') }}" defer></script>
<script src="{{ asset('assets/js/dashboard-light.js') }}" defer></script>
<script src="{{ asset('assets/js/datepicker.js') }}" defer></script>
<script src="{{ asset('assets/js/data-table.js') }}" defer></script>
<script src="{{ asset('assets/js/select2.js') }}" defer></script>
<script src="{{ asset('assets/js/dropify.js') }}" defer></script>
<!-- End custom js for this page -->

</head>

<body>
    <div class="main-wrapper">
        
        @include('partials._sidebar')
        {{-- @include('partials._settings-panel') --}}

        <div class="page-wrapper">
            @livewire('navigation-menu')

            <div class="page-content">
            
                <!-- Page Content -->
                {{ $slot }}
                
                @stack('modals')
            </div>

            @include('partials._footer')

        </div>
    </div>
    
    @yield('scripts')

    @livewireScripts
</body>

</html>

