@extends('layouts.app')

@section('content')
<!--login Area start-->
<section class="loginForm">
    <div class="loginForm__flex">
        <div class="loginForm__left">
            <div class="loginForm__left__inner desktop-center">
                <div class="loginForm__header">
                    <h2 class="loginForm__header__title">Welcome Back</h2>
                    <p class="loginForm__header__para mt-3">Enter using your email or username and password</p>
                </div>
                <div class="loginForm__wrapper mt-4">
                    <!-- Form -->
                    <form form method="POST" action="{{npm  route('login') }}" class="custom_form">
                        @csrf
                        <div class="single_input">
                            <label class="label_title">Email or Username</label>
                            <div class="include_icon">
                                <input class="form--control radius-5" type="text" id="email" name="email" @error('email') is-invalid @enderror" placeholder="Enter your email or username" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                @error('email')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="single_input">
                            <label class="label_title">Password</label>
                            <div class="include_icon">
                                <input class="form--control radius-5" type="password" id="password" name="password" @error('password') is-invalid @enderror" placeholder="Enter your password" required autocomplete="current-password">
                                <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                @error('password')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="loginForm__wrapper__remember single_input">
                            <div class="dashboard_checkBox">
                                <input class="dashboard_checkBox__input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="dashboard_checkBox__label" for="remember">Remember me</label>
                            </div>
                            <!-- forgetPassword -->
                            <div class="forgotPassword">
                                <a href="{{ route('password.request') }}" class="forgotPass">Forgot passwords?</a>
                            </div>
                        </div>
                        <div class="btn_wrapper single_input">
                            <button class="cmn_btn w-100 radius-5" type="submit">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="loginForm__right loginForm__bg " style="background-image: url(html/assets/img/login.jpg);">
            <div class="loginForm__right__logo">
                <div class="loginForm__logo">
                    <a href="index.html"><img src="html/assets/img/logo.webp" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login Area end -->
@endsection
