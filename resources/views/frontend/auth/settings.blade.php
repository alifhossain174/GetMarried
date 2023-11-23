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
                                <h3 class="user-d-breadcrumbs-title">Account Setting</h3>
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
                                                    <img src="{{url('frontend_assets')}}/assets/images/icons/edit.svg" alt="#" />
                                                </div>
                                                <h4 class="auth-card-title">Change Password</h4>
                                            </div>
                                            <div class="auth-card-form-body">
                                                <form class="auth-card-form">
                                                    <div class="form-group">
                                                        <div class="form-group-icon">
                                                            <i class="fi fi-ss-lock"></i>
                                                        </div>
                                                        <div class="form-group-password">
                                                            <input type="password" id="password" placeholder="New password"
                                                                required />
                                                            <i id="showPasswordIcon" class="fi-rr-eye"
                                                                onclick="togglePasswordVisibility()"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group-icon">
                                                            <i class="fi fi-ss-lock"></i>
                                                        </div>
                                                        <div class="form-group-password">
                                                            <input type="password" id="confirmPassword"
                                                                placeholder="Confirm New password" required />
                                                            <i id="showConfirmPasswordIcon" class="fi-rr-eye"
                                                                onclick="toggleConfirmPasswordVisibility()"></i>
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
                                            <h3 class="delete-biodata-widget-title">
                                                Delete Biodata
                                            </h3>
                                            <p class="delete-biodata-widget-text">
                                                If it is temporary you can hide it from the sidebar
                                                menu. This action will be permanently deleted your
                                                biodata.
                                            </p>
                                            <div class="form-check">
                                                <label class="biodata-check-box">
                                                    <input class="form-check-input" type="checkbox" value="1" />I
                                                    understand and would like to delete this
                                                    biodata.</label>
                                            </div>
                                            <div class="delete-biodata-widget-btn">
                                                <button type="button" class="theme-btn secondary">
                                                    Delete Biodata
                                                </button>
                                            </div>
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
