@extends('frontend.master')

@section('content')
    <!-- Auth Page  Area -->
    <section class="auth-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                    <div class="auth-card verifyOTP-card">
                        <div class="auth-card-head">
                            <div class="auth-card-head-icon">
                                <img src="{{url('frontend_assets')}}/assets/images/icons/edit.svg" alt="Image" />
                            </div>
                            <h4 class="auth-card-head-title">Verify OTP</h4>
                            <p class="auth-card-head-title-text">
                                A 6-digit verification code was sent to
                                <span class="otp-number d-block">"{{Auth::user()->email}}"</span>
                                Enter the code to verify.
                            </p>
                        </div>
                        <form class="auth-card-form" action="#" method="post">
                            <div class="form-group">
                                <label>Enter code</label>
                                <div class="otp-input" id="otp-input">
                                    <input type="text" maxlength="1" class="otp-input-field is-invalid" value="" />
                                    <input type="text" maxlength="1" class="otp-input-field is-invalid" value="" />
                                    <input type="text" maxlength="1" class="otp-input-field is-invalid" value="" />
                                    <input type="text" maxlength="1" class="otp-input-field is-invalid" value="" />
                                    <input type="text" maxlength="1" class="otp-input-field is-invalid" value="" />
                                    <input type="text" maxlength="1" class="otp-input-field is-invalid" value="" />
                                </div>
                            </div>
                            <div class="auth-form-btn mt-20">
                                <button id="verify-btn" class="theme-btn" type="submit" disabled>
                                    Verify
                                </button>
                                <p id="verification-result"></p>
                            </div>
                        </form>
                        <div class="auth-card-bottom">
                            <p class="OTP-send-again m-0">
                                Didn’t receive an SMS? <a href="#">Send again</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Auth Page  Area -->
@endsection
