@extends('frontend.master')

@push('site-seo')
    @php
        $homePageSeo = App\Models\Seo::where('id', 1)->first();
    @endphp
    <meta name="title" content="{{ $homePageSeo->meta_title }}" />
    <meta name="description" content="{{ $homePageSeo->meta_description }}" />
    <meta name="keywords" content="{{ str_replace(',', ', ', $homePageSeo->meta_keywords) }}" />
@endpush

@section('content')
    <!-- Breadcrumbs Area -->
    <section class="breadcrumbs-area"
        style="@if ($aboutUsConfig && $aboutUsConfig->priority == 1) background-image: url('{{ url($aboutUsConfig->background_image) }}'); @else background-color: {{ $aboutUsConfig->background_color }} !important; @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="breadcrumbs-title">
                            {{ App::currentLocale() == 'en' ? $aboutUsConfig->page_title : $aboutUsConfig->page_title_bn }}
                        </h3>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{ url('/') }}">{{ __('label.menu_home') }}</a><i
                                    class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active"><a href="{{ url('/about') }}">{{ __('label.menu_about_us') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- About Us Area -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10 col-12">
                    <div class="about-us-image-slider">
                        <!-- Single Slider -->

                        @foreach (json_decode($aboutUs->images) as $img)
                            <div class="about-us-single-img">
                                <img src="{{ url($img) }}" alt="Image" />
                            </div>
                        @endforeach

                    </div>
                    <div class="about-us-content">
                        <h4>{{ App::currentLocale() == 'en' ? $aboutUs->title : $aboutUs->title_bn }}</h4>
                        <p>
                            {!! App::currentLocale() == 'en' ? $aboutUs->description : $aboutUs->description_bn !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Area -->
@endsection
