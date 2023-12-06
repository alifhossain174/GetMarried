@extends('frontend.master')

@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@section('header_css')
    <style>
        .active > .page-link, .page-link.active{
            background-color: var(--secondary-color) !important;
            border-color: var(--secondary-color) !important;
        }
        .page-link{
            color: var(--primary-color);
        }
    </style>
@endsection 

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
                                    @foreach($data as $index => $item)
                                    <div class="user-d-list-item">
                                        <div>
                                            <p>{{ $index + $data->firstItem() }}</p>
                                        </div>
                                        <div>
                                            <p class="package-type">{{ App::currentLocale() == 'en' ? $item->title : $item->title_bn }}</p>
                                        </div>
                                        <div>
                                            <p>{{ App::currentLocale() == 'en' ? $item->currency." ".$item->amount : "৳".$item->amount }}</p>
                                        </div>
                                        <div>
                                            <p>{{ App::currentLocale() == 'en' ? $item->purchased_connections : $numto->bnNum($item->purchased_connections) }}</p>
                                        </div>
                                        <div>
                                            <p>{{$item->tran_id}}</p>
                                        </div>
                                        <div>
                                            <p class="payment">{{$item->card_type}}</p>
                                        </div>
                                        <div>
                                            <p>{{date("M d, Y", strtotime($item->created_at))}}</p>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
