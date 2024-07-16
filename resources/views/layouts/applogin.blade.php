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
	<link rel="stylesheet" type="text/css" href="{{asset('templates/assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('templates/assets/css/style.css')}}"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			@yield('content')
		</div>
	</div>

