@extends('layouts.app')

@section('content')

<section class="loginForm">
    <div class="loginForm__flex">
        <div class="loginForm__left">
            <div class="loginForm__left__inner desktop-center">
                <div class="loginForm__header">
                    <div class="loginForm__header__icon verified"></div>
                    <h2 class="loginForm__header__title"><span class="notVerified">Doesn't Match Email</span> <span class="verified d-none">Verify your email address</span> </h2>
                    <p class="loginForm__header__para mt-3">You have entered <strong>example@gmail.com</strong> as the email address for your account. we need to verify your email</p>
                </div>
                <div class="loginForm__wrapper mt-4">
                    <!-- Form -->
                    <form action="#" class="custom_form">
                        <div class="btn_wrapper single_input d-flex gap-2">
                            <a href="change_password.html" class="cmn_btn w-100 radius-5">Submit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="loginForm__right loginForm__bg " style="background-image: url(html/assets/img/login.jpg);">
            <div class="loginForm__right__logo">
                <div class="loginForm__logo">
                    <a href="{{ route('login') }}"><img src="html/assets/img/logo.webp" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
