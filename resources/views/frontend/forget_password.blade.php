@extends('frontend.master')

@section('header_css')
    <style>
        input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea{
            color: #1e1e1e;
        }
    </style>
@endsection

@section('content')
    <!-- Auth Page  Area -->
    <section class="auth-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                    <div class="auth-card">
                        <div class="auth-card-head">
                            <div class="auth-card-head-icon">
                                <img src="{{ url('frontend_assets') }}/assets/images/icons/edit.svg" alt="#" />
                            </div>
                            <h4 class="auth-card-title">{{ __('label.forgotten_password') }}</h4>
                        </div>
                        <div class="auth-card-form-body">
                            <form class="auth-card-form" action="{{ url('send/forget/password/code') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rr-user"></i>
                                    </div>
                                    <input name="username" placeholder="{{ __('label.email_or_phone') }}" required=""
                                        type="text" class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}" />
                                    @error('username')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="auth-card-form-btn theme-btn btn btn-primary">
                                    {{ __('label.next') }}
                                </button>
                            </form>
                            <div class="auth-card-bottom">
                                <p class="auth-card-bottom-link" style="margin-top: 32px">
                                    {{ __('label.remember_credential') }}<a
                                        href="{{ url('user/login') }}">{{ __('label.sign_in') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Auth Page  Area -->
@endsection
