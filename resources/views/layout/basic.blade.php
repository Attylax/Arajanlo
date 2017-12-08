<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arajanlo - @yield('pageTitle')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/layout_style.css') }}"/>


    @yield('javascript')
    @yield('css')
</head>
<body>
@include('layout.header')
@include('layout.nav')
<div id="main_content">
    @yield('content')
</div>
@include('layout.footer')
</body>
</html>
