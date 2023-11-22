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
    <section class="breadcrumbs-area" style="@if($contactConfig && $contactConfig->priority == 1) background-image: url('{{url($contactConfig->background_image)}}'); @else background-color: {{$contactConfig->background_color}} !important; @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="breadcrumbs-title">{{ App::currentLocale() == 'en' ? $contactConfig->page_title : $contactConfig->page_title_bn }}</h3>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{url('/')}}">{{__('label.menu_home')}}</a><i class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active">
                                <a href="{{url('/contact')}}">{{__('label.menu_contact_us')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- Contact Us Area -->
    <section class="contact-us-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10 col-md-10 col-12">
                    <div class="contact-us-inner">
                        <div class="row g-0">
                            <div class="col-lg-6 col-12">
                                <form class="contact-form" action="{{url('contact/request/submit')}}" method="post">
                                    @csrf
                                    @honeypot
                                    <div class="form-group">
                                        <label>{{__('label.form_name')}}</label>
                                        <input type="text" name="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('label.form_email')}}</label>
                                        <input type="email" name="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('label.form_subject')}}</label>
                                        <input type="text" name="subject" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('label.form_message')}}</label>
                                        <textarea name="message" required></textarea>
                                    </div>
                                    <div class="contact-form-btn">
                                        <button type="submit" class="theme-btn">{{__('label.form_send')}}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="contact-us-map">
                                    <div class="gmap_canvas">
                                        <iframe id="gmap_canvas" src="{{$contactConfig->google_map_link}}" width="434" height="500"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Us Area -->
@endsection
