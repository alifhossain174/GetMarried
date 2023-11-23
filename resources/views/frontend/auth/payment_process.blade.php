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
                                <h3 class="user-d-breadcrumbs-title">{{__('message.user_complete_order')}}</h3>
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
                                                {{__('message.user_order_info')}}
                                            </h3>
                                            <div class="payment-process-widget-inner">
                                                <ul>
                                                    <li>
                                                        <span>{{__('message.user_package_name')}}</span>
                                                        <p>বেসিক</p>
                                                    </li>
                                                    <li>
                                                        <span>{{__('message.user_connection_no')}}</span>
                                                        <p>1</p>
                                                    </li>
                                                    <li>
                                                        <span>{{__('message.user_package_price')}}</span>
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
                                                    {{__('message.user_select_payment_gateway')}}
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
                                                    {{__('message.user_pay_now')}}
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
