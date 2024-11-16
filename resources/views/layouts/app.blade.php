<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- favicon -->
    <link rel=icon href="html/favicons.png" sizes="16x16" type="icon/png">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <!-- preloader area start -->
        <div class="preloader" id="preloader">
            <div class="preloader-inner">
                <div class="loader_bars">
                    <span></span>
                </div>
            </div>
        </div>
        <!-- preloader area end -->
            <!-- Dashboard start -->
            <div class="body-overlay"></div>
            <div class="dashboard__area">
                <div class="container-fluid p-0">
                    <div class="dashboard__contents__wrapper">
                        @auth
                            @include('layouts.sidebar')
                        @endauth

                        <div class="dashboard__right">

                            @include('layouts.header.header-container')

                            <main class="py-4">
                                @yield('content')
                            </main>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Dashboard end -->
        <footer>
            <!-- jquery -->
            <script src="html/assets/js/jquery-3.6.0.min.js"></script>
            <!-- jquery Migrate -->
            <script src="html/assets/js/jquery-migrate.min.js"></script>
            <!-- bootstrap -->
            <script src="html/assets/js/bootstrap.bundle.min.js"></script>
            <!-- Slick Slider -->
            <script src="html/assets/js/slick.js"></script>
            <!-- Plugins Js -->
            <script src="html/assets/js/plugin.js"></script>
            <!-- Fancy box Js -->
            <script src="html/assets/js/fancybox.umd.js"></script>
            <!-- Map Js -->
            <script src="html/assets/js/map/raphael.min.js"></script>
            <script src="html/assets/js/map/jquery.mapael.js"></script>
            <script src="html/assets/js/map/world_countries.js"></script>

            <!-- main js -->
            <script src="html/assets/js/main.js"></script>

        </footer>
    </div>

</body>
</html>
