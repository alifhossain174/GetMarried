@extends('frontend.auth.master')

@section('content')
    <!-- User Dashboard Area -->
    <section class="user-dashboard-area">
        <div class="user-d-container">
            <div class="user-d-row">
                <a href="#" class="sidebar-trigger trigger-fixed"></a>
                <!-- Dashboard Sidebar -->
                <div class="user-d-sidebar">
                    <a href="#" class="sidebar-trigger"></a>
                    <div class="user-d-sidebar-info">
                        <img src="{{url('frontend_assets')}}/assets/images/icons/user.svg" alt="#" />
                        <div class="user-d-bio-status-wrap">
                            <h3>বায়োডাটার অবস্থা</h3>
                            <div class="user-d-bio-status">
                                <span class="user-d-complete">Complete</span>
                                <!-- <span class="user-d-incomplete">Incomplete</span> -->
                            </div>
                        </div>
                        <div class="user-d-preview-biodata-link">
                            <a href="preview-biodata.html" class="theme-btn">আমার বায়োডাটা</a>
                        </div>
                    </div>
                    <nav class="user-d-nav">
                        <ul>
                            <li>
                                <a href="dashboard.html"><i class="fi fi-rs-apps"></i>ড্যাশবোর্ড</a>
                            </li>
                            <li>
                                <a href="edit-biodata.html"><i class="fi fi-rr-edit"></i>বায়োডাটা এডিট করুন</a>
                            </li>
                            <li>
                                <a href="short-list.html"><i class="fi fi-rs-heart"></i>পছন্দের তালিকা</a>
                            </li>
                            <li>
                                <a href="ignore-list.html"><i class="fi fi-br-ban"></i>অপছন্দের তালিকা</a>
                            </li>
                            <li>
                                <a href="checked-biodata.html"><i class="fi fi-rr-following"></i>বায়োডাটা দেখেছেন</a>
                            </li>
                            <li>
                                <a href="my-purchased.html"><i class="fi fi-rr-shopping-bag"></i>আমার ক্রয়সমূহ</a>
                            </li>
                            <li>
                                <a href="support-report.html"><i class="fi-rs-flag"></i>সাপোর্ট & রিপোর্ট</a>
                            </li>
                            <li class="active">
                                <a href="setting.html"><i class="fi fi-rr-settings"></i>সেটিংস</a>
                            </li>
                            <li>
                                <a href="../login.html"><i class="fi fi-rs-sign-out-alt"></i>লগআউট</a>
                            </li>
                        </ul>
                    </nav>
                </div>
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
                                                    <img src="../assets/images/icons/edit.svg" alt="#" />
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
