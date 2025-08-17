<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <link rel="icon" type="image/png" href="{!! asset('assets/img/favicon.png') !!}"/>
    <link rel="apple-touch-icon" type="image/png" href="{!! asset('assets/img/apple-touch-icon.png') !!}"/>

    {{-- <title> @yield('title')</title> --}}
    <title>Admin - @yield('title')</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <script src="adminAssets/assets/vendor/jquery/jquery.min.js"></script> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="adminAssets/assets/css/style.css" rel="stylesheet">
    @include('include.admin.cssAdmin')
    {{-- @yield('style') --}}

</head>

<body>

    @include('include.admin.navAdmin')

    @include('include.admin.sidebarAdmin')
  
    @yield('content')
  
    @include('include.admin.footerAdmin')
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  </body>

@include('include.admin.jsAdmin')
@yield('script')

</html>
