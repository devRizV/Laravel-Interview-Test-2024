@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Enter Email or User name Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

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
                    <form form method="POST" action="{{ route('login') }}" class="custom_form">
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
                        <div class="btn-wrapper mt-4">
                            <p class="loginForm__wrapper__signup"><span>Don’t have an account ? </span> <a href="{{ route('register') }}" class="loginForm__wrapper__signup__btn">Sign Up</a></p>
                            <div class="loginForm__wrapper__another d-flex flex-column gap-2 mt-3">
                                <a href="javascript:void(0)" class="loginForm__wrapper__another__btn radius-5 w-100"><img src="html/assets/img/icon/googleIocn.svg" alt="" class="icon"> Login With Google</a>
                                <a href="javascript:void(0)" class="loginForm__wrapper__another__btn radius-5 w-100"><img src="html/assets/img/icon/fbIcon.svg" alt="" class="icon">Login With Facebook</a>
                            </div>
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
