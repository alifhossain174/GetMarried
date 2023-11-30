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
                            <h4 class="auth-card-title">{{ __('label.set_new_assword') }}</h4>
                        </div>
                        <div class="auth-card-form-body">
                            <form class="auth-card-form" action="{{ url('change/forgotten/password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rr-edit"></i>
                                    </div>
                                    <input name="code" placeholder="{{ __('label.verification_code') }}" required=""
                                        type="text" class="form-control @error('code') is-invalid @enderror"
                                        value="{{ old('code') }}" />
                                    @error('code')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" style="position: relative">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rr-lock"></i>
                                    </div>
                                    <input name="password" placeholder="{{ __('label.new_password') }}" required=""
                                        id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}" />
                                    <i class="fi-rs-eye-crossed" id="togglePassword"
                                        style="position: absolute; top: 50%; right: 15px; transform: translateY(-40%); cursor: pointer; color: #FF4949"></i>
                                    @error('password')
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
                                    {{ __('label.remember_credential') }}<a href="{{ url('user/login') }}">{{ __('label.sign_in') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Auth Page  Area -->
@endsection


@section('footer_js')
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            if (this.className == "fi-rs-eye-crossed") {
                this.className = "fi-rs-eye";
            } else {
                this.className = "fi-rs-eye-crossed";
            }
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
