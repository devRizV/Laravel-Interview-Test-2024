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
                                        <li class="dashboard__bottom__list__item show open {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                            <a href="{{ route('home') }}"><i class="material-symbols-outlined">dashboard</i> <span class="icon_title">Dashboard</span></a>
                                        </li>
                                        <li class="dashboard__bottom__list__item has-children {{ request()->routeIs('countries.index') ? 'active' : '' }}">
                                            <a href="javascript:void(0)"><span class="icon_title">Country</span></a>
                                            <ul class="submenu">
                                                <li class="dashboard__bottom__list__item">
                                                    <a href="{{ route('countries.index') }}">Country List</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dashboard__bottom__list__item has-children {{ request()->routeIs('states.index') ? 'active' : '' }}">
                                            <a href="javascript:void(0)"><span class="icon_title">State</span></a>
                                            <ul class="submenu">
                                                <li class="dashboard__bottom__list__item">
                                                    <a href="{{ route('states.index') }}">State List</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dashboard__bottom__list__item has-children {{ request()->routeIs('cities.index') ? 'active' : '' }}">
                                            <a href="javascript:void(0)"><span class="icon_title">City</span></a>
                                            <ul class="submenu">
                                                <li class="dashboard__bottom__list__item">
                                                    <a href="{{ route('states.index') }}">City List</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dashboard__bottom__list__item has-children">
                                            <a href="javascript:void(0)"><i class="material-symbols-outlined">group</i> <span class="icon_title">User</span></a>
                                            <ul class="submenu">
                                                @guest
                                                    <li class="dashboard__bottom__list__item">
                                                        <a href="{{ route('login') }}">Sign In</a>
                                                    </li>
                                                    <li class="dashboard__bottom__list__item">
                                                        <a href="{{ route('register') }}">Sign Up</a>
                                                    </li>
                                                @else
                                                    <li class="dashboard__bottom__list__item">
                                                        <a href="{{ route('logout') }}"><i class="material-symbols-outlined">logout</i> <span class="icon_title">Log Out</span></a>
                                                    </li>
                                                @endguest
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
