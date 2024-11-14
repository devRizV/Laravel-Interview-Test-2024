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
    <!-- animate -->
    <link rel="stylesheet" href="html/assets/css/animate.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="html/assets/css/bootstrap.min.css">
    <!-- All Icon -->
    <link rel="stylesheet" href="html/assets/css/icon.css">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="html/assets/css/slick.css">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="html/assets/css/select2.min.css">
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="html/assets/css/sweetalert.css">
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="html/assets/css/flatpickr.min.css">
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="html/assets/css/fancybox.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="html/assets/css/dashboard.css">
    <!-- dark css -->
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
                    <div class="dashboard__left dashboard-left-content">
                        <div class="dashboard__left__main">
                            <div class="dashboard__left__close close-bars"><i class="fa-solid fa-times"></i></div>
                            <div class="dashboard__top">
                                <div class="dashboard__top__logo">
                                    <a href="index.html">
                                        <img class="main_logo" src="html/assets/img/logo.webp" alt="logo">
                                        <img class="iocn_view__logo" src="html/assets/img/Favicon.png" alt="logo_icon">
                                    </a>
                                </div>
                            </div>
                            <div class="dashboard__bottom mt-5">
                                <div class="dashboard__bottom__search mb-3">
                                    <input class="form--control  w-100" type="text" placeholder="Search here..." id="search_sidebarList">
                                </div>
                                <ul class="dashboard__bottom__list dashboard-list">
                                    <li class="dashboard__bottom__list__item has-children show open active">
                                        <a href="javascript:void(0)"><i class="material-symbols-outlined">dashboard</i> <span class="icon_title">Dashboard</span></a>
                                        <ul class="submenu">
                                            <li class="dashboard__bottom__list__item selected">
                                                <a href="index.html">Default</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dashboard__bottom__list__item has-children">
                                        <a href="basic_form.html"><span class="icon_title">Form</span></a>
                                    </li>
                                    <li class="dashboard__bottom__list__item has-children">
                                        <a href="table.html"><span class="icon_title">Table</span></a>
                                    </li>
                                    <li class="dashboard__bottom__list__item has-children">
                                        <a href="javascript:void(0)"><i class="material-symbols-outlined">group</i> <span class="icon_title">User</span></a>
                                        <ul class="submenu">
                                            <li class="dashboard__bottom__list__item">
                                                <a href="sign_in.html">Login</a>
                                            </li>
                                            <li class="dashboard__bottom__list__item">
                                                <a href="sign_up.html">Register</a>
                                            </li>
                                            <li class="dashboard__bottom__list__item">
                                                <a href="forgot_password.html">Reset Password</a>
                                            </li>
                                            <li class="dashboard__bottom__list__item">
                                                <a href="mail_varification.html">Mail Varification</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dashboard__bottom__list__item">
                                        <a href="javascript:void(0)"><i class="material-symbols-outlined">logout</i> <span class="icon_title">Log Out</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__right">
                        <div class="dashboard__header single_border_bottom">
                            <div class="row gx-4 align-items-center justify-content-between">
                                <div class="col-sm-2">
                                    <div class="dashboard__header__left">
                                        <div class="dashboard__header__left__inner">
                                            <span class="dashboard__sidebarIcon d-none d-lg-block"></span>
                                            <span class="dashboard__sidebarIcon__mobile sidebar-icon d-lg-none"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 d-none d-sm-block">
                                    <div class="dashboard__header__middle">
                                        <div class="dashboard__header__middle__search">
                                            <div class="dashboard__header__middle__search__item">
                                                <input class="form--control radius-5" type="text" placeholder="Search anything...">
                                                <button class="search_icon"><i class="material-symbols-outlined">search</i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="dashboard__header__right">
                                        <div class="dashboard__header__right__flex">
                                            <div class="dashboard__header__right__item responsive_search">
                                                <a href="javascript:void(0)" class="dashboard__search__icon search__click"> <i class="material-symbols-outlined">search</i> </a>
                                                <div class="search__wrapper">
                                                    <form class="search__wrapper__form" action="#">
                                                        <div class="search__wrapper__close"> <i class="fa-solid fa-times"></i> </div>
                                                        <input class="search__wrapper__input" type="text" placeholder="Search Here.....">
                                                        <button type="submit"><i class="material-symbols-outlined">search</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="dashboard__header__right__item">
                                                <a href="javascript:void(0)" class="dashboard__header__notification__icon lightMode" id="mode_change"> <i class="material-symbols-outlined">wb_sunny</i> </a>
                                            </div>
                                            <div class="dashboard__header__right__item">
                                                <div class="dashboard__header__notification">
                                                    <a href="javascript:void(0)" class="dashboard__header__notification__icon"> <i class="material-symbols-outlined">notifications</i> </a>
                                                    <span class="dashboard__header__notification__number">9</span>
                                                    <div class="dashboard__header__notification__wrap">
                                                        <h6 class="dashboard__header__notification__wrap__title"> Notifications </h6>
                                                        <ul class="dashboard__header__notification__wrap__list">
                                                            <li class="dashboard__header__notification__wrap__list__item">
                                                                <div class="dashboard__header__notification__wrap__list__flex">
                                                                    <div class="dashboard__header__notification__wrap__list__icon">
                                                                        <i class="las la-bell"></i>
                                                                    </div>
                                                                    <div class="dashboard__header__notification__wrap__list__contents">
                                                                        <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification One </a>
                                                                        <span class="dashboard__header__notification__wrap__list__contents__sub"> 4 hours ago </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="dashboard__header__notification__wrap__list__item">
                                                                <div class="dashboard__header__notification__wrap__list__flex">
                                                                    <div class="dashboard__header__notification__wrap__list__icon">
                                                                        <i class="las la-bell"></i>
                                                                    </div>
                                                                    <div class="dashboard__header__notification__wrap__list__contents">
                                                                        <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification Two </a>
                                                                        <span class="dashboard__header__notification__wrap__list__contents__sub"> 8 hours ago </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="dashboard__header__notification__wrap__list__item">
                                                                <div class="dashboard__header__notification__wrap__list__flex">
                                                                    <div class="dashboard__header__notification__wrap__list__icon">
                                                                        <i class="las la-bell"></i>
                                                                    </div>
                                                                    <div class="dashboard__header__notification__wrap__list__contents">
                                                                        <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification Three </a>
                                                                        <span class="dashboard__header__notification__wrap__list__contents__sub"> 1 day ago </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="dashboard__header__notification__wrap__list__item">
                                                                <div class="dashboard__header__notification__wrap__list__flex">
                                                                    <div class="dashboard__header__notification__wrap__list__icon">
                                                                        <i class="las la-bell"></i>
                                                                    </div>
                                                                    <div class="dashboard__header__notification__wrap__list__contents">
                                                                        <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification Four </a>
                                                                        <span class="dashboard__header__notification__wrap__list__contents__sub"> 3 day ago </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="dashboard__header__notification__wrap__list__item">
                                                                <div class="dashboard__header__notification__wrap__list__flex">
                                                                    <div class="dashboard__header__notification__wrap__list__icon">
                                                                        <i class="las la-bell"></i>
                                                                    </div>
                                                                    <div class="dashboard__header__notification__wrap__list__contents">
                                                                        <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)"> Notification Five </a>
                                                                        <span class="dashboard__header__notification__wrap__list__contents__sub"> 7 day ago </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <a href="javascript:void(0)" class="dashboard__header__notification__wrap__btn"> See All Notification </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dashboard__header__right__item">
                                                <div class="dashboard__header__author">
                                                    <a href="javascript:void(0)" class="dashboard__header__author__flex flex-btn">
                                                        <div class="dashboard__header__author__thumb">
                                                            <img src="html/assets/img/author_nav_new.jpg" alt="authorImg">
                                                        </div>
                                                    </a>
                                                    <div class="dashboard__header__author__wrapper">
                                                        <div class="dashboard__header__author__wrapper__list">
                                                            <a href="javascript:void(0)" class="dashboard__header__author__wrapper__list__item">Sign In</a>
                                                            <a href="javascript:void(0)" class="dashboard__header__author__wrapper__list__item">Sign Up</a>
                                                            <a href="javascript:void(0)" class="dashboard__header__author__wrapper__list__item">Log Out</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard__body posPadding">
                            <div class="dashboard__inner">
                                <div class="dashboard__inner__item">
                                    <div class="dashboard__inner__item__flex">
                                        <div class="dashboard__inner__item__left bodyItemPadding">
                                            <div class="dashboard__inner__header">
                                                <div class="dashboard__inner__header__flex">
                                                    <div class="dashboard__inner__header__left">
                                                        <h4 class="dashboard__inner__header__title">Good Morning, Md Zahid</h4>
                                                        <p class="dashboard__inner__header__para">Manage your dashboard here</p>
                                                    </div>
                                                    <div class="dashboard__inner__header__right">
                                                        <div class="dashboard__inner__item__right recent_activities">
                                                            <div class="btn-wrapper">
                                                                <a href="javascript:void(0)" class="cmn_btn btn_small radius-5" id="activity_btn">Show Activities</a>
                                                            </div>
                                                            <div class="dashboard__recentActivities bg__white padding-20">
                                                                <div class="dashboard__recentActivities__flex">
                                                                    <div class="dashboard__recentActivities__left">
                                                                        <h5 class="dashboard__recentActivities__title">Recent Activities</h5>
                                                                    </div>
                                                                    <span class="dashboard__recentActivities__close"><i class="material-symbols-outlined">close</i></span>
                                                                </div>
                                                                <div class="dashboard__recentActivities__inner mt-4">
                                                                    <div class="dashboard__recentActivities__item">
                                                                        <div class="dashboard__recentActivities__single">
                                                                            <div class="dashboard__recentActivities__single__flex">
                                                                                <div class="dashboard__recentActivities__single__thumb">
                                                                                    <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities1.jpg" alt="activities"></a>
                                                                                </div>
                                                                                <div class="dashboard__recentActivities__single__contents">
                                                                                    <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">Gown party wear is sold 01 piece</a></h6>
                                                                                    <p class="dashboard__recentActivities__single__time mt-2">10 Min ago</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dashboard__recentActivities__item">
                                                                        <div class="dashboard__recentActivities__single">
                                                                            <div class="dashboard__recentActivities__single__flex">
                                                                                <div class="dashboard__recentActivities__single__thumb">
                                                                                    <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities2.jpg" alt="activities"></a>
                                                                                </div>
                                                                                <div class="dashboard__recentActivities__single__contents">
                                                                                    <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">This product is running low on stock</a></h6>
                                                                                    <p class="dashboard__recentActivities__single__time mt-2">1 Hours ago</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dashboard__recentActivities__item">
                                                                        <div class="dashboard__recentActivities__single">
                                                                            <div class="dashboard__recentActivities__single__flex">
                                                                                <div class="dashboard__recentActivities__single__thumb">
                                                                                    <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities3.jpg" alt="activities"></a>
                                                                                </div>
                                                                                <div class="dashboard__recentActivities__single__contents">
                                                                                    <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">This product is added to stock</a></h6>
                                                                                    <p class="dashboard__recentActivities__single__time mt-2">2 Hours ago</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dashboard__recentActivities__item">
                                                                        <div class="dashboard__recentActivities__single">
                                                                            <div class="dashboard__recentActivities__single__flex">
                                                                                <div class="dashboard__recentActivities__single__thumb">
                                                                                    <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities4.jpg" alt="activities"></a>
                                                                                </div>
                                                                                <div class="dashboard__recentActivities__single__contents">
                                                                                    <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">Rafael is moved to Elgine St. Branch</a></h6>
                                                                                    <p class="dashboard__recentActivities__single__time mt-2">3 Hours ago</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dashboard__recentActivities__item">
                                                                        <div class="dashboard__recentActivities__single">
                                                                            <div class="dashboard__recentActivities__single__flex">
                                                                                <div class="dashboard__recentActivities__single__thumb">
                                                                                    <a href="javascript:void(0)"><img src="html/assets/img/recent_activities/activities5.jpg" alt="activities"></a>
                                                                                </div>
                                                                                <div class="dashboard__recentActivities__single__contents">
                                                                                    <h6 class="dashboard__recentActivities__single__title"><a href="javascript:void(0)">Robert F is added in Herbert St. Branch as General Staff</a></h6>
                                                                                    <p class="dashboard__recentActivities__single__time mt-2">4 Hours ago</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="alert alert-danger mt-4 rounded-2 fw-bold">Please review the README file to fully understand your task.</div>
    
                                            <div class="dashboard_promo">
                                                <div class="row g-4 mt-2">
                                                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                                                        <div class="dashboard_promo__single bg__white radius-10 padding-20">
                                                            <span class="dashboard_promo__single__subtitle">Total Sales</span>
                                                            <h4 class="dashboard_promo__single__price mt-2">$12,300</h4>
                                                            <p class="dashboard_promo__single__para mt-3"><span class="percentage"> +20%</span> Than last month</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                                                        <div class="dashboard_promo__single bg__white radius-10 padding-20">
                                                            <span class="dashboard_promo__single__subtitle">Total Orders</span>
                                                            <h4 class="dashboard_promo__single__price mt-2">810</h4>
                                                            <p class="dashboard_promo__single__para mt-3"><span class="percentage">+19%</span> Than last month</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                                                        <div class="dashboard_promo__single bg__white radius-10 padding-20">
                                                            <span class="dashboard_promo__single__subtitle">Total Customers</span>
                                                            <h4 class="dashboard_promo__single__price mt-2">240</h4>
                                                            <p class="dashboard_promo__single__para mt-3"><span class="percentage"> +08%</span> Than last month</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                                                        <div class="dashboard_promo__single bg__white radius-10 padding-20">
                                                            <span class="dashboard_promo__single__subtitle">Total Revenue</span>
                                                            <h4 class="dashboard_promo__single__price mt-2">$10,800</h4>
                                                            <p class="dashboard_promo__single__para mt-3"><span class="percentage percentDown"> -12%</span> Than last month</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-4 mt-1">
                                                <div class="col-lg-12">
                                                    <div class="dashboard__card bg__white padding-20 radius-10">
                                                        <h5 class="dashboard__card__header__title">Recent Orders</h5>
                                                        <div class="dashboard__card__inner border_top_1">
                                                            <div class="dashboard__inventory__table custom_table">
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ORDER ID</th>
                                                                            <th>CUSTOMER</th>
                                                                            <th>ORDERED</th>
                                                                            <th>AMOUNT</th>
                                                                            <th>PAYMENT METHOD</th>
                                                                            <th>STATUS</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="table_row">
                                                                            <td><span class="order_id">RTS2235611</span></td>
                                                                            <td>
                                                                                <div class="table_customer">
                                                                                    <div class="table_customer__flex">
                                                                                        <div class="table_customer__thumb">
                                                                                            <img src="html/assets/img/customer/customer1.jpg" alt="customer">
                                                                                        </div>
                                                                                        <div class="table_customer__contents">
                                                                                            <h6 class="table_customer__title">Naomi Russel</h6>
                                                                                            <p class="table_customer__para mt-1">ckctm12@gmail.com</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><span class="table_date">22 Feb 2023</span></td>
                                                                            <td><span class="table_price">$446.61</span></td>
                                                                            <td><span class="table_payment"><img src="html/assets/img/payment_method/apple.png" alt=""></span></td>
                                                                            <td><p class="status_btn completed">Complete</p></td>
                                                                            <td>
                                                                                <div class="action__icon d-flex">
                                                                                    <div class="action__icon__item">
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">sticky_note_2</i></a>
                                                                                    </div>
                                                                                    <div class="action__icon__item">
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">print</i></a>
                                                                                    </div>
                                                                                    <div class="action__icon__item">
                                                                                        <div class="btn-group">
                                                                                            <a href="javascript:void(0)" class="icon" data-bs-toggle="dropdown"> <i class="material-symbols-outlined">more_vert</i></a>
                                                                                            <ul class="dropdown-menu">
                                                                                                <li class="single-item"><a class="dropdown-item" href="javascript:void(0)"><i class="material-symbols-outlined">edit</i> Edit Product</a></li>
                                                                                                <li class="single-item"><a class="dropdown-item delete delete_item" href="javascript:void(0)"><i class="material-symbols-outlined">delete</i> Delete Product</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="table_row">
                                                                            <td><span class="order_id">RTS2235612</span></td>
                                                                            <td>
                                                                                <div class="table_customer">
                                                                                    <div class="table_customer__flex">
                                                                                        <div class="table_customer__thumb">
                                                                                            <img src="html/assets/img/customer/customer2.jpg" alt="customer">
                                                                                        </div>
                                                                                        <div class="table_customer__contents">
                                                                                            <h6 class="table_customer__title">Wade Warren</h6>
                                                                                            <p class="table_customer__para mt-1">vuhaithuongnute@gmail.com</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><span class="table_date">23 Feb 2023</span></td>
                                                                            <td><span class="table_price">$928.36</span></td>
                                                                            <td><span class="table_payment"><img src="html/assets/img/payment_method/cash.png" alt=""></span></td>
                                                                            <td><p class="status_btn in_progress">In Progress</p></td>
                                                                            <td>
                                                                                <div class="action__icon d-flex">
                                                                                    <div class="action__icon__item">
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">sticky_note_2</i></a>
                                                                                    </div>
                                                                                    <div class="action__icon__item">
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">print</i></a>
                                                                                    </div>
                                                                                    <div class="action__icon__item">
                                                                                        <div class="btn-group">
                                                                                            <a href="javascript:void(0)" class="icon" data-bs-toggle="dropdown"> <i class="material-symbols-outlined">more_vert</i></a>
                                                                                            <ul class="dropdown-menu">
                                                                                                <li class="single-item"><a class="dropdown-item" href="javascript:void(0)"><i class="material-symbols-outlined">edit</i> Edit Product</a></li>
                                                                                                <li class="single-item"><a class="dropdown-item delete delete_item" href="javascript:void(0)"><i class="material-symbols-outlined">delete</i> Delete Product</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="table_row">
                                                                            <td><span class="order_id">RTS2235613</span></td>
                                                                            <td>
                                                                                <div class="table_customer">
                                                                                    <div class="table_customer__flex">
                                                                                        <div class="table_customer__thumb">
                                                                                            <img src="html/assets/img/customer/customer3.jpg" alt="customer">
                                                                                        </div>
                                                                                        <div class="table_customer__contents">
                                                                                            <h6 class="table_customer__title">Kristin Watson</h6>
                                                                                            <p class="table_customer__para mt-1">thuhang.nute@gmail.com</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><span class="table_date">22 Feb 2023</span></td>
                                                                            <td><span class="table_price">$275.43</span></td>
                                                                            <td><span class="table_payment"><img src="html/assets/img/payment_method/google.png" alt=""></span></td>
                                                                            <td><p class="status_btn pending">Pending</p></td>
                                                                            <td>
                                                                                <div class="action__icon d-flex">
                                                                                    <div class="action__icon__item">
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">sticky_note_2</i></a>
                                                                                    </div>
                                                                                    <div class="action__icon__item">
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">print</i></a>
                                                                                    </div>
                                                                                    <div class="action__icon__item">
                                                                                        <div class="btn-group">
                                                                                            <a href="javascript:void(0)" class="icon" data-bs-toggle="dropdown"> <i class="material-symbols-outlined">more_vert</i></a>
                                                                                            <ul class="dropdown-menu">
                                                                                                <li class="single-item"><a class="dropdown-item" href="javascript:void(0)"><i class="material-symbols-outlined">edit</i> Edit Product</a></li>
                                                                                                <li class="single-item"><a class="dropdown-item delete delete_item" href="javascript:void(0)"><i class="material-symbols-outlined">delete</i> Delete Product</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="table_row">
                                                                            <td><span class="order_id">RTS2235614</span></td>
                                                                            <td>
                                                                                <div class="table_customer">
                                                                                    <div class="table_customer__flex">
                                                                                        <div class="table_customer__thumb">
                                                                                            <img src="html/assets/img/customer/customer4.jpg" alt="customer">
                                                                                        </div>
                                                                                        <div class="table_customer__contents">
                                                                                            <h6 class="table_customer__title">Kristin Watson</h6>
                                                                                            <p class="table_customer__para mt-1">thuhang.nute@gmail.com</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><span class="table_date">24 Feb 2023</span></td>
                                                                            <td><span class="table_price">$275.43</span></td>
                                                                            <td><span class="table_payment"><img src="html/assets/img/payment_method/cash.png" alt=""></span></td>
                                                                            <td><p class="status_btn cancelled">Canceled</p></td>
                                                                            <td>
                                                                                <div class="action__icon d-flex">
                                                                                    <div class="action__icon__item">
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">sticky_note_2</i></a>
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">sticky_note_2</i></a>
                                                                                    </div>
                                                                                    <div class="action__icon__item">
                                                                                        <a href="javascript:void(0)" class="icon"> <i class="material-symbols-outlined">print</i></a>
                                                                                    </div>
                                                                                    <div class="action__icon__item">
                                                                                        <div class="btn-group">
                                                                                            <a href="javascript:void(0)" class="icon" data-bs-toggle="dropdown"> <i class="material-symbols-outlined">more_vert</i></a>
                                                                                            <ul class="dropdown-menu">
                                                                                                <li class="single-item"><a class="dropdown-item" href="javascript:void(0)"><i class="material-symbols-outlined">edit</i> Edit Product</a></li>
                                                                                                <li class="single-item"><a class="dropdown-item delete delete_item" href="javascript:void(0)"><i class="material-symbols-outlined">delete</i> Delete Product</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard end -->

        <main class="py-4">
            @yield('content')
        </main>

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
