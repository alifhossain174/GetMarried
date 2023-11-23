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
                                <h3 class="user-d-breadcrumbs-title">{{__('label.user_menu_settings')}}</h3>
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
                                                <h4 class="auth-card-title">{{__('message.user_settings_change_password')}}</h4>
                                            </div>
                                            <div class="auth-card-form-body">
                                                <form class="auth-card-form">
                                                    <div class="form-group">
                                                        <div class="form-group-icon">
                                                            <i class="fi fi-ss-lock"></i>
                                                        </div>
                                                        <div class="form-group-password">
                                                            <input type="password" id="password" placeholder="{{__('message.user_settings_new_password')}}" required />
                                                            <i id="showPasswordIcon" class="fi-rr-eye" onclick="togglePasswordVisibility()"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group-icon">
                                                            <i class="fi fi-ss-lock"></i>
                                                        </div>
                                                        <div class="form-group-password">
                                                            <input type="password" id="confirmPassword" placeholder="{{__('message.user_settings_confirm_password')}}" required />
                                                            <i id="showConfirmPasswordIcon" class="fi-rr-eye" onclick="toggleConfirmPasswordVisibility()"></i>
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
                                                {{__('message.user_settings_delete_biodata')}}
                                            </h3>
                                            <p class="delete-biodata-widget-text">
                                                {{__('message.user_settings_delete_biodata_msg1')}}
                                            </p>
                                            <div class="form-check">
                                                <label class="biodata-check-box">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                    {{__('message.user_settings_delete_biodata_msg2')}}
                                                </label>
                                            </div>
                                            <div class="delete-biodata-widget-btn">
                                                <button type="button" class="theme-btn secondary">
                                                    {{__('message.user_settings_delete_biodata')}}
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
