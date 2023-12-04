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
                                <h3 class="user-d-breadcrumbs-title">
                                    {{__('label.user_menu_connection_info')}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 32px">
                        <div class="col-12">
                            <h3 class="user-d-connection-bottom-title">
                                {{__('label.user_menu_buy_connection_label')}}
                            </h3>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="user-d-connection-bottom">
                                <div class="row">

                                    @foreach ($pricingPackages as $package)
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="user-d-pricing-plan">
                                            <div class="user-d-pricing-plan-title">
                                                <h3>{{ App::currentLocale() == 'en' ? $package->title : $package->title_bn }}</h3>
                                            </div>
                                            <div class="user-d-pricing-plan-content">
                                                <h4>{{ App::currentLocale() == 'en' ? $package->connections." Connections" : $numto->bnNum($package->connections)."টি কানেকশন" }}</h4>
                                                <p>{{ App::currentLocale() == 'en' ? "BDT ".$package->price : "৳".$numto->bnNum($package->price) }}</p>
                                                <span>{{ App::currentLocale() == 'en' ? $package->description : $package->description_bn }}</span>
                                            </div>
                                            <div class="user-d-pricing-plan-action">
                                                <a href="{{url('user/payment/process')}}/{{$package->slug}}" class="theme-btn secondary"><i class="fi fi-rr-shopping-bag"></i>{{__('label.user_menu_buy_connection')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="user-d-connection-top">
                                <div class="user-d-c-total-widget">
                                    <span class="total-connection">{{ App::currentLocale() == 'en' ? Auth::user()->connections : $numto->bnNum(Auth::user()->connections) }}</span>
                                    <h4>{{__('label.user_menu_has_connection')}}</h4>
                                    <p>
                                        @if(Auth::user()->last_purchase_date)
                                        {{__('label.user_menu_last_purchase')}}
                                        {{date("F d, Y", strtotime(Auth::user()->last_purchase_date))}}
                                        @endif
                                    </p>
                                </div>
                                <div class="user-d-connection-top-btn">
                                    <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" target="_blank" class="theme-btn popup-video"><i class="icofont-youtube-play"></i>{{__('label.user_menu_buy_connection_video')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
