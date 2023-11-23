@extends('frontend.master')

@section('content')
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
                                <h3 class="user-d-breadcrumbs-title">অর্ডার সম্পন্ন করুন</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10 col-12">
                            <div class="user-d-payment-process">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="payment-process-widget order-summary">
                                            <h3 class="payment-process-widget-title">
                                                অর্ডার সম্পর্কিত তথ্য
                                            </h3>
                                            <div class="payment-process-widget-inner">
                                                <ul>
                                                    <li>
                                                        <span>প্যাকেজের নাম</span>
                                                        <p>বেসিক</p>
                                                    </li>
                                                    <li>
                                                        <span>কানেকশন সংখ্যা</span>
                                                        <p>1</p>
                                                    </li>
                                                    <li>
                                                        <span>মূল্য</span>
                                                        <p>৳১০০</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="payment-gateway-widget">
                                            <div class="payment-process-widget payment-gateway">
                                                <h3 class="payment-process-widget-title">
                                                    পেমেন্ট গেটওয়ে নির্বাচন করুন
                                                </h3>
                                                <div class="payment-process-widget-inner">
                                                    <div class="single-payment-gateway">
                                                        <label class="form-check-label" for="exampleRadios1"><input
                                                                class="form-check-input" type="radio" name="exampleRadios"
                                                                id="exampleRadios1" value="option1" checked />
                                                            <img src="{{url('frontend_assets')}}/assets/images/bkash-icon.svg" alt="#" />
                                                            Bkash Payment
                                                        </label>
                                                    </div>
                                                    <div class="single-payment-gateway">
                                                        <label class="form-check-label" for="exampleRadios2"><input
                                                                class="form-check-input" type="radio" name="exampleRadios"
                                                                id="exampleRadios2" value="option2" />
                                                            <img src="{{url('frontend_assets')}}/assets/images/nagad-icon.svg" alt="#" />
                                                            Nagad Payment
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="payment-gateway-btn">
                                                <button type="button" class="theme-btn">
                                                    পেমেন্ট করুন
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
@endsection
