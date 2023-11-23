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
                                <h3 class="user-d-breadcrumbs-title">{{__('label.user_menu_checked_biodata')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-list-widget">
                                <h4 class="user-d-list-item-title">
                                    {{__('message.user_checked_biodata_till_now')}} <span>1</span>
                                </h4>
                                <div class="user-d-list-items myPurchased">
                                    <div class="user-d-list-item list-head">
                                        <h4>#</h4>
                                        <h4>{{__('message.user_checked_biodata_no')}}</h4>
                                        <h4>{{__('message.user_checked_biodata_date')}}</h4>
                                        <h4>{{__('message.user_checked_biodata_option')}}</h4>
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
                                            <a class="create-report-btn" href="{{url('user/create/report')}}">{{__('message.user_checked_biodata_report_now')}}</a>
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
