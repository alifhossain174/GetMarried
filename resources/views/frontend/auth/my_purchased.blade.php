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
                                <h3 class="user-d-breadcrumbs-title">আমার ক্রয়সমূহ</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="user-d-list-widget-btn" style="text-align: right; margin-top: 24px">
                            <a href="{{url('user/connection')}}" class="theme-btn">কানেকশন কিনুন</a>
                        </div>
                        <div class="col-12">
                            <div class="user-d-list-widget" style="margin-top: 24px">
                                <div class="user-d-list-items myPurchased-package">
                                    <div class="user-d-list-item list-head">
                                        <h4>#</h4>
                                        <h4>প্যাকেজের নাম</h4>
                                        <h4>মূল্য</h4>
                                        <h4>কানেকশন সংখ্যা</h4>
                                        <h4>ট্রানজেকশন</h4>
                                        <h4>পেমেন্ট মাধ্যম</h4>
                                        <h4>তারিখ</h4>
                                    </div>
                                    <!-- Single List Data -->
                                    <div class="user-d-list-item">
                                        <div>
                                            <p>1</p>
                                        </div>
                                        <div>
                                            <p class="package-type">Basic</p>
                                        </div>
                                        <div>
                                            <p>৳১০০</p>
                                        </div>
                                        <div>
                                            <p>1</p>
                                        </div>
                                        <div>
                                            <p>AJM9NG6KY5</p>
                                        </div>
                                        <div>
                                            <p class="payment">BKASH</p>
                                        </div>
                                        <div>
                                            <p>Oct 22, 2023</p>
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
