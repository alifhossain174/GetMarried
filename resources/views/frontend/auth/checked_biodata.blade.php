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
                                <h3 class="user-d-breadcrumbs-title">বায়োডাটা দেখেছেন</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-list-widget">
                                <h4 class="user-d-list-item-title">
                                    আপনি এখন পর্যন্ত <span>1</span> টি বায়োডাটার যোগাযোগ তথ্য
                                    দেখেছেন
                                </h4>
                                <div class="user-d-list-items myPurchased">
                                    <div class="user-d-list-item list-head">
                                        <h4>#</h4>
                                        <h4>বায়োডাটা নং</h4>
                                        <h4>তারিখ</h4>
                                        <h4>অপশন</h4>
                                    </div>
                                    <!-- Single List Data -->
                                    <div class="user-d-list-item">
                                        <div>
                                            <p>1</p>
                                        </div>
                                        <div>
                                            <a href="#" target="_blank" class="bio-num">10912</a>
                                        </div>
                                        <div>
                                            <p>Oct 22, 2023</p>
                                        </div>
                                        <div class="user-d-list-item-option">
                                            <a class="create-report-btn" href="create-report.html"
                                                target="_blank">রিপোর্ট</a>
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
