@extends('frontend.master')

@push('site-seo')
    @php
        $homePageSeo = App\Models\Seo::where('id', 1)->first();
    @endphp
    <meta name="title" content="{{ $homePageSeo->meta_title }}" />
    <meta name="description" content="{{ $homePageSeo->meta_description }}" />
    <meta name="keywords" content="{{ str_replace(',', ', ', $homePageSeo->meta_keywords) }}" />
@endpush

@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@section('content')

    <!-- Hero Area -->
    <section class="hero-area background-image"
        style="@if ($banner->priority == 1) background-image: url('{{ url($banner->background_image) }}'); @else background-color: {{ $banner->background_color }} !important; @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-8 col-12">
                    <div class="hero-content">
                        <h2 class="hero-cont-title">
                            {{-- পাত্র পাত্রী খোঁজার একমাত্র <span>বিশ্বস্ত মাধ্যম!</span> --}}
                            {{ App::currentLocale() == 'en' ? $banner->banner_title : $banner->banner_title_bn }}
                        </h2>
                        <p class="hero-cont-text">
                            {{-- আপনার জেলার পাত্র/পাত্রী খুঁজে নিন খুব সহজেই। --}}
                            {{ App::currentLocale() == 'en' ? $banner->banner_description : $banner->banner_description_bn }}
                        </p>
                    </div>
                    <form action="{{url('search/results')}}" method="GET">
                        @csrf
                        <input type="hidden" name="order" value="1">
                        <div class="hero-search-filter">
                            <div class="form-group">
                                <label>{{ __('label.hero_searching_for') }}</label>
                                <select class="select2 hero-search-filter-select" name="biodata_type">
                                    <option value="">{{ __('label.hero_all') }}</option>
                                    @foreach ($biodataTypes as $type)
                                    <option value="{{$type->id}}">{{ App::currentLocale() == 'en' ? $type->title : $type->title_bn }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('label.hero_marital_status') }}</label>
                                <select class="select2 hero-search-filter-select" name="marital_status">
                                    <option value="">{{ __('label.hero_all') }}</option>
                                    @foreach ($maritalConditions as $mc)
                                    <option value="{{$mc->id}}">{{ App::currentLocale() == 'en' ? $mc->title : $mc->title_bn }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('label.hero_permenant_address') }}</label>
                                <select class="hero-search-filter-select select2" name="district">
                                    <option value="">{{ __('label.hero_all_district') }}</option>
                                    @foreach ($districts as $district)
                                    <option value="{{$district->id}}">{{ App::currentLocale() == 'en' ? $district->name : $district->bn_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="order" value="1">
                            <button type="submit" class="h-search-filter-btn">
                                <i class="fi fi-rs-search"></i>{{ __('label.hero_search') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->


    <!-- BioData CTA Area -->
    @if ($homePageBiodata && $homePageBiodata->status == 1)
        <section class="biodata-cta-area background-image"
            style="@if ($homePageBiodata->priority == 1) background-image: url('{{ url($homePageBiodata->background_image) }}'); @else background-color: {{ $homePageBiodata->background_color }} !important; @endif">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="biodata-cta-img">
                            @if ($homePageBiodata && file_exists(public_path($homePageBiodata->image)))
                                <img src="{{ url($homePageBiodata->image) }}" alt="Image" />
                            @else
                                <img src="{{ url('frontend_assets') }}/assets/images/cta-img.svg" alt="#" />
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="biodata-cta-content">
                            <h3 class="biodata-cta-cont-title">
                                {{ App::currentLocale() == 'en' ? $homePageBiodata->title : $homePageBiodata->title_bn }}
                            </h3>
                            <p class="biodata-cta-cont-text">
                                {{ App::currentLocale() == 'en' ? $homePageBiodata->description : $homePageBiodata->description_bn }}
                            </p>
                            <div class="biodata-cta-btn">
                                <a href="{{ $homePageBiodata->button1_url }}" target="_blank" class="theme-btn"><i
                                        class="fi fi-rr-plus"></i>{{ App::currentLocale() == 'en' ? $homePageBiodata->button1_text : $homePageBiodata->button1_text_bn }}</a>
                                <a href="{{ $homePageBiodata->button2_url }}" target="_blank"
                                    class="theme-btn secondary"><i
                                        class="icofont-youtube-play"></i>{{ App::currentLocale() == 'en' ? $homePageBiodata->button2_text : $homePageBiodata->button2_text_bn }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End BioData CTA Area -->


    <!-- Funfact  Area -->
    @if ($homePageStatConfig && $homePageStatConfig->status == 1)
        <section class="funfact-area background-image"
            style="@if ($homePageStatConfig->priority == 1) background-image: url('{{ url($homePageStatConfig->background_image) }}'); @else background-color: {{ $homePageStatConfig->background_color }} !important; @endif">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-12">
                        <div class="section-head">
                            <h3 class="section-head-title">
                                {{ App::currentLocale() == 'en' ? $homePageStatConfig->section_title : $homePageStatConfig->section_title_bn }}
                                {{-- <span>সাদিকরুন</span> সেবা গ্রহীতার পরিসংখ্যান --}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Single Funfact  -->
                    @foreach ($homePageStatistics as $satistic)
                        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                            <div class="funfact-card">
                                <div class="funfact-card-icon">
                                    <img src="{{ url($satistic->image) }}" alt="Image" />
                                </div>
                                <div class="funfact-card-info">
                                    <p>{{ App::currentLocale() == 'en' ? $satistic->title : $satistic->title_bn }}</p>

                                    @if (App::currentLocale() == 'en')
                                        <h4><span class="counter">{{ $satistic->number }}</span></h4>
                                    @else
                                        <h4><span>{{ $numto->bnCommaLakh($satistic->number) }}</span></h4>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- End Funfact Area -->


    <!-- Work Process Area -->
    @if ($howItWorksConfig && $howItWorksConfig->status == 1)
        <section class="work-process-area background-image"
            style="@if ($howItWorksConfig->priority == 1) background-image: url('{{ url($howItWorksConfig->background_image) }}'); @else background-color: {{ $howItWorksConfig->background_color }} !important; @endif">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="section-head">
                            <h3 class="section-head-title">
                                <span>{{ App::currentLocale() == 'en' ? $howItWorksConfig->section_title : $howItWorksConfig->section_title_bn }}</span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Single Work Process -->
                    @foreach ($howItWorks as $item)
                        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                            <div class="work-process-card">
                                <div class="work-process-icon">
                                    <img src="{{ url($item->image) }}" alt="Image" />
                                </div>
                                <div class="work-process-info">
                                    <h4>{{ App::currentLocale() == 'en' ? $item->title : $item->title_bn }}</h4>
                                    <p>{{ App::currentLocale() == 'en' ? $item->description : $item->description_bn }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- End Work Process Area -->


    <!-- App Download Area -->
    @if ($mobileAppSection && $mobileAppSection->status == 1)
        <section class="app-download-area background-image"
            style="@if ($mobileAppSection->priority == 1) background-image: url('{{ url($mobileAppSection->background_image) }}'); @else background-color: {{ $mobileAppSection->background_color }} !important; @endif">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="app-download-content">
                            <h3>{{ App::currentLocale() == 'en' ? $mobileAppSection->title : $mobileAppSection->title_bn }}
                            </h3>
                            <p>
                                {{ App::currentLocale() == 'en' ? $mobileAppSection->description : $mobileAppSection->description_bn }}
                            </p>
                            <div class="app-download-btn">
                                @if ($mobileAppSection->play_store_link)
                                    <a href="{{ $mobileAppSection->play_store_link }}" target="_blank">
                                        <img src="{{ url('frontend_assets') }}/assets/images/google-play.svg"
                                            alt="#" />
                                    </a>
                                @endif
                                @if ($mobileAppSection->play_store_link)
                                    <a href="{{ $mobileAppSection->app_store_link }}" target="_blank">
                                        <img src="{{ url('frontend_assets') }}/assets/images/app-store.svg"
                                            alt="#" />
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 order-class">
                        <div class="app-download-img">
                            @if ($mobileAppSection && file_exists(public_path($mobileAppSection->image)))
                                <img src="{{ url($mobileAppSection->image) }}" alt="Image" />
                            @else
                                <img src="{{ url('frontend_assets') }}/assets/images/app-download-img.png"
                                    alt="Image" />
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End App Download Area -->
@endsection
