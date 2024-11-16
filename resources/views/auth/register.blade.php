@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!--Register Area start-->
<section class="loginForm">
    <div class="loginForm__flex">
        <div class="loginForm__left">
            <div class="loginForm__left__inner desktop-center">
                <div class="loginForm__header">
                    <h2 class="loginForm__header__title">Welcome Back</h2>
                    <p class="loginForm__header__para mt-3">Register a new account</p>
                </div>
                <div class="loginForm__wrapper mt-4">
                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" class="custom_form">
                        <div class="single_input">
                            <label class="label_title" for="name">Name</label>
                            <div class="include_icon">
                                <input class="form--control radius-5" type="text" placeholder="Enter your Full Name" id="name" name="name"  @error('name') is-invalid @enderror" required autocomplete="name" autofocus>
                                <div class="icon"><span class="material-symbols-outlined">person</span></div>
                            </div>
                        </div>
                        <div class="single_input">
                            <label class="label_title" for="username">Username</label>
                            <div class="include_icon">
                                <input class="form--control radius-5" type="text" placeholder="Enter a Username" id="username" name="username"  @error('name') is-invalid @enderror" required autocomplete="username" autofocus>
                                <div class="icon"><span class="material-symbols-outlined">person</span></div>
                            </div>
                        </div>
                        <div class="single_input">
                            <label class="label_title" for="email">Email</label>
                            <div class="include_icon">
                                <input class="form--control radius-5" type="email" placeholder="Enter your email address" id="email" name="email"  @error('name') is-invalid @enderror" required autocomplete="email" autofocus>
                                <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                            </div>
                        </div>
                        <div class="single_input">
                            <label class="label_title" for="password">Password</label>
                            <div class="include_icon">
                                <input class="form--control radius-5" type="password" placeholder="Enter your password" id="password" name="password" @error('name') is-invalid @enderror" required autocomplete="new-password" autofocus>
                                <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                            </div>
                        </div>
                        <div class="single_input">
                            <label class="label_title" for="password-confirm">Confirm Password</label>
                            <div class="include_icon">
                                <input class="form--control radius-5" type="password" placeholder="confirm password" id="password-confirma" name="password-confirmation" @error('name') is-invalid @enderror" required autocomplete="new-password" autofocus>
                                <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                            </div>
                        </div>
                        <div class="btn_wrapper single_input">
                            <button type="submit" class="cmn_btn w-100 radius-5">Sign Up</button>
                        </div>
                        <div class="btn-wrapper mt-4">
                            <p class="loginForm__wrapper__signup"><span>Already have an Account?  </span> <a href="{{ route('login') }}" class="loginForm__wrapper__signup__btn">Sign In</a></p>
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
<!-- Register Area end -->

@endsection
