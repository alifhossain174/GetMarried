@extends('frontend.master')

@section('content')
    <!-- User Dashboard Area -->
    <section class="user-dashboard-area">
        <div class="user-d-container">
            <div class="user-d-row">
                <a href="#" class="sidebar-trigger trigger-fixed"></a>

                @include('frontend.auth.sideMenu')

                <!-- Dashboard Content -->
                <div class="user-d-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-breadcrumbs">
                                <h3 class="user-d-breadcrumbs-title">{{ __('label.user_menu_settings') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-10 col-12">
                            <div class="user-d-setting-page">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-xl-6 col-md-8 col-12">
                                        <div class="auth-card change-password-card">
                                            <div class="auth-card-head">
                                                <div class="auth-card-head-icon">
                                                    <img src="{{ url('frontend_assets') }}/assets/images/icons/edit.svg" alt="Image" />
                                                </div>
                                                <h4 class="auth-card-title">{{ __('message.user_settings_change_password') }}</h4>
                                            </div>
                                            <div class="auth-card-form-body">
                                                <form action="{{url('user/password/change')}}" method="POST" class="auth-card-form">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="form-group-icon">
                                                            <i class="fi fi-ss-lock"></i>
                                                        </div>
                                                        <div class="form-group-password">
                                                            <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="{{ __('message.user_settings_new_password') }}" required />
                                                            <i id="showPasswordIcon" class="fi-rr-eye" onclick="togglePasswordVisibility()"></i>
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert" style="display: block;">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group-icon">
                                                            <i class="fi fi-ss-lock"></i>
                                                        </div>
                                                        <div class="form-group-password">
                                                            <input type="password" id="confirmPassword" name="confirm_password" class="@error('confirm_password') is-invalid @enderror" value="{{ old('confirm_password') }}" placeholder="{{ __('message.user_settings_confirm_password') }}" required />
                                                            <i id="showConfirmPasswordIcon" class="fi-rr-eye" onclick="toggleConfirmPasswordVisibility()"></i>
                                                            @error('confirm_password')
                                                                <span class="invalid-feedback" role="alert" style="display: block;">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <button class="auth-card-form-btn theme-btn" type="submit">
                                                        Update
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-12">
                                        <div class="delete-biodata-widget">
                                            @if($biodataInfo->delete_request != 1)
                                            <h3 class="delete-biodata-widget-title">
                                                {{ __('message.user_settings_delete_biodata') }}
                                            </h3>
                                            <p class="delete-biodata-widget-text">
                                                {{ __('message.user_settings_delete_biodata_msg1') }}
                                            </p>
                                            <form action="{{url('user/biodata/remove')}}" method="POST">
                                                @csrf
                                                <div class="form-check">
                                                    <label class="biodata-check-box">
                                                        <input class="form-check-input" name="check" type="checkbox" value="1" required/>
                                                        {{ __('message.user_settings_delete_biodata_msg2') }}
                                                    </label>
                                                </div>
                                                <div class="delete-biodata-widget-btn">
                                                    @error('check')
                                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <button type="submit" class="theme-btn secondary">
                                                        {{ __('message.user_settings_delete_biodata') }}
                                                    </button>
                                                </div>
                                            </form>
                                            @else
                                            <a href="{{url('remove/biodata/removal/request')}}" class="theme-btn secondary">
                                                <i class="fi fi-rr-trash"></i> &nbsp;{{ __('message.revoke_removal_request') }}
                                            </a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User Dashboard Area -->
@endsection

@section('footer_js')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const showPasswordIcon = document.getElementById("showPasswordIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.className = "fi-rr-eye-crossed";
            } else {
                passwordInput.type = "password";
                showPasswordIcon.className = "fi-rr-eye";
            }
        }

        function toggleConfirmPasswordVisibility() {
            const confirmPasswordInput = document.getElementById("confirmPassword");
            const showConfirmPasswordIcon = document.getElementById(
                "showConfirmPasswordIcon"
            );
            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
                showConfirmPasswordIcon.className = "fi-rr-eye-crossed";
            } else {
                confirmPasswordInput.type = "password";
                showConfirmPasswordIcon.className = "fi-rr-eye";
            }
        }
    </script>
@endsection
