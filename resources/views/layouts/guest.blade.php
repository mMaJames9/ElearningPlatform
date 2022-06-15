
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
<link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
<!-- endinject -->

<!-- Plugin css for this page -->
<!-- End plugin css for this page -->

<!-- inject:css -->
{{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<!-- endinject -->

<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('assets/css/demo1/style.min.css') }}">
<!-- End layout styles -->

<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

<!-- core:js -->
{{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
<script src="{{ asset('assets/vendors/core/core.js') }}" defer></script>
<script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.bundle.js') }}" defer></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}" defer></script>
<script src="{{ asset('assets/js/template.js') }}" defer></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('assets/js/inputmask.js') }}" defer></script>
<!-- End custom js for this page -->

</head>

<body>
{{ $slot }}
<!-- container-scroller -->
</body>

</html>
