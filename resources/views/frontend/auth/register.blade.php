@extends('frontend.master')

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
                            <h4 class="auth-card-title">{{ __('label.register_account') }}</h4>
                        </div>
                        <div class="auth-card-form-body">
                            <form class="auth-card-form" action="{{ url('register') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rs-user"></i>
                                    </div>
                                    <input type="text" id="name" name="name"
                                        placeholder="{{ __('label.full_name') }}" required=""
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rr-envelope"></i>
                                    </div>
                                    <input name="email" placeholder="{{ __('label.email_or_phone') }}" required=""
                                        type="text" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" style="position: relative">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rr-lock"></i>
                                    </div>
                                    <input name="password" placeholder="{{ __('label.password') }}" required=""
                                        type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" value="" />
                                    <i class="fi-rs-eye-crossed" id="togglePassword"
                                        style="position: absolute; top: 50%; right: 15px; transform: translateY(-40%); cursor: pointer; color: #FF4949"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi-rr-home-location-alt"></i>
                                    </div>
                                    <input name="address" placeholder="{{ __('label.address') }}" type="address"
                                        id="address" class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}" />
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="auth-card-form-btn theme-btn btn btn-primary">
                                    {{ __('label.register_account') }}
                                </button>
                            </form>
                            <div class="auth-card-bottom">
                                <span>{{ __('label.or') }}</span>
                                <div class="auth-card-google-btn">
                                    <a target="_blank" href="#"><img
                                            src="{{ url('frontend_assets') }}/assets/images/icons/google.svg"
                                            alt="#" />{{ __('label.sign_in_with_google') }}</a>
                                </div>
                                <p class="auth-card-bottom-link">
                                    {{ __('label.already_have_account') }}<a
                                        href="{{ url('user/login') }}">{{ __('label.sign_in') }}</a>
                                </p>
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
