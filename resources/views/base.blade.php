<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Git Management Portal')</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-3.2.0-dist/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/uikit-2.9.0/css/uikit.min.css') }}"/>
</head>
<body>
@if(Auth::check())
@include('partials.navbar')
@endif
@yield('content')
<script src="{{ asset('assets/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-3.2.0-dist/js/bootstrap.min.js') }}"></script>
@yield('javascript')
</body>
</html>