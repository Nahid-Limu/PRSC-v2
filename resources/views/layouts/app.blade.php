<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{!! asset('assets/img/favicon.png') !!}"/>
    {{-- <link rel="apple-touch-icon" type="image/png" href="{!! asset('assets/img/apple-touch-icon.png') !!}"/> --}}

    <title>PRSC - @yield('title')</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('include.css')
</head>

<body>

    @include('include.nav')
    
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
      <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        <h1 class="text-danger">Learning Today,<br><span class="text-success"> Leading Tomorrow.</span></h1>
        <h2>We are team of talented Administration & Teachers Making the most of their Unique Talents.</h2>
        {{-- <a href="courses.html" class="btn-get-started">Get Started</a> --}}
      </div>
    </section>
    <!-- End Hero -->
  
    @yield('content')
  
    @include('include.footer')
  
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  </body>
@include('include.js')
@yield('script')
</html>
