<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        <main role="main" class="mb-3">
            <div class="jumbotron bg-white" style="background-image: url('img/shopping.png'); background-size: 25%; background-repeat: no-repeat;">
                <div class="container text-center">
                    <h1 class="display-3 ">Hello, </h1>
                    <p class="">
                        Selamat datang, Silahkan cari barang impian mu disini
                    </p>
                </div>
            </div>
            @include('flash::message')
            @include('layouts._errors')
            @yield('content')
        </main>
    </div>
</body>
</html>
