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
    <section class="breadcrumbs-area" style="@if($faqConfig && $faqConfig->priority == 1) background-image: url('{{url($faqConfig->background_image)}}'); @else background-color: {{$faqConfig->background_color}} !important; @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="breadcrumbs-title">{{ App::currentLocale() == 'en' ? $faqConfig->section_title : $faqConfig->section_title_bn }}</h3>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{url('/')}}">{{__('label.menu_home')}}</a><i class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active">
                                <a href="{{url('/faq')}}">{{__('label.menu_question')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- Faq Area -->
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 col-12">
                    <div class="faq-inner accordion" id="accordionExample">

                        <!-- Single Faq -->
                        @php $sl=1; @endphp
                        @foreach ($faqs as $faq)
                        <div class="single-faq-widget">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button @if($sl > 1) collapsed @endif" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne{{$sl}}" aria-expanded="@if($sl > 1) false @else true @endif" aria-controls="collapseOne">
                                    <h3>{{ App::currentLocale() == 'en' ? $faq->question : $faq->question_bn }}</h3>
                                </button>
                            </h2>
                            <div id="collapseOne{{$sl}}" class="accordion-collapse collapse @if($sl == 1) show @endif" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="faq-inner-body">
                                    {!! App::currentLocale() == 'en' ? $faq->answer : $faq->answer_bn !!}
                                </div>
                            </div>
                        </div>
                        @php $sl++; @endphp
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Faq Area -->
@endsection
