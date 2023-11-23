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
                                <h3 class="user-d-breadcrumbs-title">{{__('label.user_menu_purchased')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="user-d-list-widget-btn" style="text-align: right; margin-top: 24px">
                            <a href="{{url('user/connection')}}" class="theme-btn">{{__('message.user_purchased_buy_connection')}}</a>
                        </div>
                        <div class="col-12">
                            <div class="user-d-list-widget" style="margin-top: 24px">
                                <div class="user-d-list-items myPurchased-package">
                                    <div class="user-d-list-item list-head">
                                        <h4>#</h4>
                                        <h4>{{__('message.user_purchased_package')}}</h4>
                                        <h4>{{__('message.user_purchased_price')}}</h4>
                                        <h4>{{__('message.user_purchased_connections')}}</h4>
                                        <h4>{{__('message.user_purchased_transaction')}}</h4>
                                        <h4>{{__('message.user_purchased_payment_gateway')}}</h4>
                                        <h4>{{__('message.user_purchased_date')}}</h4>
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
