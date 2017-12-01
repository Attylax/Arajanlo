<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Árajánló</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/layout_style.css') }}"/>

</head>
<body>
@include('layout.header')
<div id="main_content">
    @yield('content')
</div>
@include('layout.footer')
</body>
</html>
