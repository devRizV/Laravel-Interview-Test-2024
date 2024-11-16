@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

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
                    <a href="index.html"><img src="html/assets/img/logo.webp" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
