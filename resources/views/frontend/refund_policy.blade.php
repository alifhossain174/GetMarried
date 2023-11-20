@extends('frontend.master')

@push('site-seo')
    @php
        $homePageSeo = App\Models\Seo::where('id', 1)->first();
    @endphp
    <meta name="title" content="{{$homePageSeo->meta_title}}" />
    <meta name="description" content="{{$homePageSeo->meta_description}}" />
    <meta name="keywords" content="{{str_replace(",",", ",$homePageSeo->meta_keywords)}}" />
@endpush

@section('content')
    <!-- Breadcrumbs Area -->
    <section class="breadcrumbs-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="breadcrumbs-title">{{__('label.menu_refund_policy')}}</h3>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{url('/')}}">{{__('label.menu_home')}}</a><i class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active">
                                <a href="{{url('refund-policy')}}">{{__('label.menu_refund_policy')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- Privacy Policy  Area -->
    <section class="policy-terms-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10 col-12">
                    <div class="policy-terms-content">
                        <div class="policy-terms-content-widget">
                            {!! App::currentLocale() == 'en' ? $data->details : $data->details_bn !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Privacy Policy  Area -->
@endsection
