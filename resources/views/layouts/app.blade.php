<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'SPK PKH') }}</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('templates/assets/img/favicon.png')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/css/feathericon.min.css')}}">
	<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="{{asset('templates/assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/css/style.css')}}"> </head>
	<link rel="stylesheet" href="{{asset('templates/assets/plugins/datatables/datatables.min.css')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/css/select2.min.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>
	<div class="main-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        @yield('content')
    </div>
<!-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<script src="{{asset('templates/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('templates/assets/js/popper.min.js')}}"></script>
<script src="{{asset('templates/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('templates/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('templates/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('templates/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('templates/assets/js/chart.morris.js')}}"></script>
<script src="{{asset('templates/assets/js/script.js')}}"></script>
<script src="{{asset('templates/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('templates/assets/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{asset('templates/assets/js/select2.min.js')}}"></script>

@stack('scripts')
</body>

</html>