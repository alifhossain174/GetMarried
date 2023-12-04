@extends('frontend.master')

@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

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
                                <form action="{{url('purchase/connection')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="pricing_package_id" value="{{$package->id}}">
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
                                                            <p>{{ App::currentLocale() == 'en' ? $package->title : $package->title_bn }}</p>
                                                        </li>
                                                        <li>
                                                            <span>{{__('message.user_connection_no')}}</span>
                                                            <p>{{ App::currentLocale() == 'en' ? $package->connections : $numto->bnNum($package->connections) }}</p>
                                                        </li>
                                                        <li>
                                                            <span>{{__('message.user_package_price')}}</span>
                                                            <p>{{ App::currentLocale() == 'en' ? "BDT ".$package->price : "৳".$numto->bnNum($package->price) }}</p>
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

                                                         @foreach($paymentGateways as $gateway)
                                                        <div class="single-payment-gateway">
                                                            <label class="form-check-label" for="payment_gateway{{$gateway->id}}">
                                                                <input class="form-check-input" type="radio" name="payment_gateway[]" id="payment_gateway{{$gateway->id}}" value="{{$gateway->id}}" required/>
                                                                @if(file_exists(public_path($gateway->image)))
                                                                <img src="{{url($gateway->image)}}" alt="#" />
                                                                @endif
                                                                {{$gateway->title}}
                                                            </label>
                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <div class="payment-gateway-btn">
                                                    <button type="submit" class="theme-btn">
                                                        {{__('message.user_pay_now')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
