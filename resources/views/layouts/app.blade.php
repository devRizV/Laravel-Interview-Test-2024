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
        <!-- preloader area start -->
        <div class="preloader" id="preloader">
            <div class="preloader-inner">
                <div class="loader_bars">
                    <span></span>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            {{-- modal content here --}}
        </div>
        <!-- preloader area end -->
            <!-- Dashboard start -->
            <div class="body-overlay"></div>
            <div class="dashboard__area">
                <div class="container-fluid p-0">
                    <div class="dashboard__contents__wrapper">
                        @auth
                            @include('layouts.sidebar')

                            <div class="dashboard__right">

                                @include('layouts.header.header-container')

                                <main class="py-4">
                                    @yield('content')
                                </main>

                            </div>
                        @else
                            @include('layouts.header.header-container')
                            <main class="py-4">
                                @yield('content')
                            </main>
                        @endauth
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
