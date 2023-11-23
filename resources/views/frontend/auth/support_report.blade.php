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
                                <h3 class="user-d-breadcrumbs-title">রিপোর্ট সমূহ</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-list-items myPurchased-package" style="margin-top: 32px">
                                <div class="user-d-list-item list-head">
                                    <h4>#</h4>
                                    <h4>রিপোর্ট আইডি</h4>
                                    <h4>বায়োডাটা নং</h4>
                                    <h4>স্ট্যাটাস</h4>
                                    <h4>তারিখ</h4>
                                    <h4>নতুন উত্তর</h4>
                                    <h4>অপশন</h4>
                                </div>
                                <!-- Single List Data -->
                                <div class="user-d-list-item">
                                    <div>
                                        <p>1</p>
                                    </div>
                                    <div>
                                        <p>od-51561-65362671aa356</p>
                                    </div>
                                    <div>
                                        <p>10370</p>
                                    </div>
                                    <div>
                                        <p class="status">OPEN</p>
                                    </div>
                                    <div>
                                        <p>23/10/2023</p>
                                    </div>
                                    <div>
                                        <p>0</p>
                                    </div>
                                    <div>
                                        <a class="create-report-btn" href="{{url('user/report/conversation')}}">বিস্তারিত</a>
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
