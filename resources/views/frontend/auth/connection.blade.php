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
                                <h3 class="user-d-breadcrumbs-title">
                                    কানেকশন সম্পর্কিত তথ্য
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 32px">
                        <div class="col-12">
                            <h3 class="user-d-connection-bottom-title">
                                কানেকশন ক্রয় করুন
                            </h3>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="user-d-connection-bottom">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="user-d-pricing-plan">
                                            <div class="user-d-pricing-plan-title">
                                                <h3>বেসিক</h3>
                                            </div>
                                            <div class="user-d-pricing-plan-content">
                                                <h4>১টি কানেকশন</h4>
                                                <p>৳১০০</p>
                                                <span>১টি বায়োডাটার যোগাযোগ তথ্য দেখা যাবে।</span>
                                            </div>
                                            <div class="user-d-pricing-plan-action">
                                                <a href="{{url('user/payment/process')}}" class="theme-btn secondary"><i
                                                        class="fi fi-rr-shopping-bag"></i>ক্রয় করুন</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="user-d-pricing-plan">
                                            <div class="user-d-pricing-plan-title">
                                                <h3>স্ট্যান্ডার্ড</h3>
                                            </div>
                                            <div class="user-d-pricing-plan-content">
                                                <h4>৫টি কানেকশন</h4>
                                                <p>৳৪০০</p>
                                                <span>৫টি বায়োডাটার যোগাযোগ তথ্য দেখা যাবে।</span>
                                            </div>
                                            <div class="user-d-pricing-plan-action">
                                                <a href="{{url('user/payment/process')}}" class="theme-btn secondary"><i
                                                        class="fi fi-rr-shopping-bag"></i>ক্রয় করুন</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="user-d-pricing-plan">
                                            <div class="user-d-pricing-plan-title">
                                                <h3>পপুলার</h3>
                                            </div>
                                            <div class="user-d-pricing-plan-content">
                                                <h4>১০টি কানেকশন</h4>
                                                <p>৳৭০০</p>
                                                <span>১০টি বায়োডাটার যোগাযোগ তথ্য দেখা যাবে।</span>
                                            </div>
                                            <div class="user-d-pricing-plan-action">
                                                <a href="{{url('user/payment/process')}}" class="theme-btn secondary"><i
                                                        class="fi fi-rr-shopping-bag"></i>ক্রয় করুন</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="user-d-connection-top">
                                <div class="user-d-c-total-widget">
                                    <span class="total-connection">2</span>
                                    <h4>কানেকশন রয়েছে</h4>
                                    <p>সর্বশেষ ক্রয় October 22, 2023</p>
                                </div>
                                <div class="user-d-connection-top-btn">
                                    <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" target="_blank"
                                        class="theme-btn popup-video"><i class="icofont-youtube-play"></i>যেভাবে কানেকশন
                                        কিনবেন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
