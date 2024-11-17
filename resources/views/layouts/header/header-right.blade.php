
    <div class="dashboard__header__right">
        <div class="dashboard__header__right__flex">
            <div class="dashboard__header__right__item">
                <a href="javascript:void(0)" class="dashboard__header__notification__icon lightMode" id="mode_change">
                    <i class="material-symbols-outlined"></i>
                </a>
            </div>
            <div class="dashboard__header__right__item">
                <div class="dashboard__header__author">
                    <a href="javascript:void(0)" class="dashboard__header__author__flex flex-btn">
                        <div class="dashboard__header__author__thumb">
                            @guest
                                <img src="html/assets/img/guest_user.jfif" alt="authorImg">
                            @else
                                <img src="html/assets/img/author_nav_new.jpg" alt="authorImg">
                            @endguest
                        </div>
                    </a>
                    <div class="dashboard__header__author__wrapper">
                        <div class="dashboard__header__author__wrapper__list">
                            @guest
                                @if (request()->routeIs('register'))
                                    <a href="{{ route('login') }}" class="dashboard__header__author__wrapper__list__item">Sign In</a>
                                @else
                                    <a href="{{ route('register') }}" class="dashboard__header__author__wrapper__list__item">Sign Up</a>
                                @endif
                            @else
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dashboard__header__author__wrapper__list__item">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
