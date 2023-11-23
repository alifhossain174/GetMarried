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
                                <h3 class="user-d-breadcrumbs-title">{{__('label.user_menu_support_report')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-list-items myPurchased-package" style="margin-top: 32px">
                                <div class="user-d-list-item list-head">
                                    <h4>#</h4>
                                    <h4>{{__('message.user_support_report_id')}}</h4>
                                    <h4>{{__('message.user_support_report_biodata_no')}}</h4>
                                    <h4>{{__('message.user_support_report_status')}}</h4>
                                    <h4>{{__('message.user_support_report_date')}}</h4>
                                    <h4>{{__('message.user_support_report_new_answer')}}</h4>
                                    <h4>{{__('message.user_support_report_option')}}</h4>
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
                                        <a class="create-report-btn" href="{{url('user/report/conversation')}}">{{__('message.user_support_report_details')}}</a>
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
