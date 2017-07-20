<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Game Collection | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('custom_styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('custom_scripts')
</head>

<body>
    @include('layouts.main-nav')

    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>
