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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-white navbar-laravel">
            <div class="container">
                <a class="navbar-brand text-info" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{route('home')}}">
                            {{ __('Home') }}</a>
                        </li>
                        @role('admin')
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{route('petugas')}}">
                                {{ __('Data Petugas') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{route('petugas.customer')}}">
                                {{ __('Data Customer') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{route('petugas.pembelian')}}">
                                {{ __('Pembelian') }}</a>
                            </li>
                        @endrole
                        @role('gudang')
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{route('kategory')}}">
                                {{ __('Kategori') }}</a>
                            </li>
                        @endrole
                        @role('direktur')
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{route('petugas.pembelian.selesai')}}">
                                {{ __('Pembelian') }}</a>
                            </li>
                        @endrole
                        @role('gudang|direktur')
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{route('produck')}}">
                                {{ __('Produk') }}</a>
                            </li>
                        @endrole
                        @role('customer')
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{route('user.transaksi')}}">
                                {{ __('transaksi') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{route('user.cek.cart')}}">
                                {{ __('keranjang') }}</a>
                            </li>
                        @endrole
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link btn-pill bg-indigo-800 shadow-sm mr-2" href="{{ route('login') }}">{{ __('Please Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn-pill bg-indigo-300 " href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @include('flash::message')
            @include('layouts._errors')
            @yield('content')
        </main>
    </div>
</body>
</html>
