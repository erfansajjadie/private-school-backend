
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="مشاغل تخصصی بازاریابی و فروش، با ارایه گواهینامه بین المللی از سازمان آموزش فنی و حرفه‌ای">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon/favicon.ico')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/scss/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name=theme-color content=#03a0c9>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('css')

    <link rel="canonical" href="{{url('')}}"/>
</head>
<body class="{{$body_class}}">

<div class="scroll-footer">
    @include('includes.header')
    @yield('content')
</div>
@include('includes.footer')
@include('includes.login_modal')
@include('includes.activation_modal')
@auth
    @include('includes.profile_panel')
@endauth
<script src="{{asset('plugins/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/sweetalert.min.js')}}"></script>
<script src="{{asset('plugins/jquery.disableAutoFill.min.js')}}"></script>
<script src="{{asset('plugins/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('plugins/jquery.counterup.min.js')}}"></script>
<script src="{{asset('plugins/parallax.min.js')}}"></script>
<script src="{{asset('plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('plugins/jquery.hoverdir.js')}}"></script>
<script src="{{asset('plugins/owl/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
<script src="{{asset('js/general.js')}}"></script>
{{--<script src="{{asset('plugins/fontawesome/js/all.min.js')}}"></script>--}}
<script src="{{asset('plugins/sweetalert/dist/sweetalert2.all.min.js')}}"></script>
@stack('js')
</body>
</html>
