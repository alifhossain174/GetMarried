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
                                <img src="{{url('frontend_assets')}}/assets/images/icons/lock.svg" alt="#" />
                            </div>
                            <h4 class="auth-card-title">Sign in</h4>
                        </div>
                        <div class="auth-card-form-body">
                            <form class="auth-card-form" action="{{ route('login') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rs-user"></i>
                                    </div>
                                    <input name="username" placeholder="Email or Phone Number" required="" type="text" id="username" class="form-control @error('email') is-invalid @enderror" value="{{ old('username') }}" />

                                    @if(count($errors) > 0)
                                        @foreach( $errors->all() as $message )
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    @endif

                                </div>
                                <div class="form-group" style="position: relative">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rr-lock"></i>
                                    </div>
                                    <input name="password" placeholder="Password" required="" type="password" id="password" class="form-control @error('password') is-invalid @enderror" value="" />
                                    <i class="fi-rs-eye-crossed" id="togglePassword" style="position: absolute; top: 50%; right: 15px; transform: translateY(-40%); cursor: pointer; color: #FF4949"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="auth-card-info">
                                    <div class="form-check">
                                        <input type="checkbox" id="custom-checkbox" class="form-check-input" /><label title="" for="custom-checkbox" class="form-check-label">Remember me</label>
                                    </div>
                                    <a href="{{url('user/forget/password')}}">Forgotten password?</a>
                                </div>
                                <button type="submit" class="auth-card-form-btn theme-btn btn btn-primary">Sign in</button>

                            </form>
                            <div class="auth-card-bottom">
                                <span>or</span>
                                <div class="auth-card-google-btn">
                                    <a target="_blank" href="#">
                                        <img src="{{url('frontend_assets')}}/assets/images/icons/google.svg" alt="#" />
                                        Sign in with Google
                                    </a>
                                </div>
                                <p class="auth-card-bottom-link">
                                    Don’t have any account?<a href="{{url('user/register')}}">Register account</a>
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

@section("footer_js")
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
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
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
@endsection
