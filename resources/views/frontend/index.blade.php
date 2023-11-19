@extends('frontend.master')

@push('site-seo')
    @php
        $homePageSeo = App\Models\Seo::where('id', 1)->first();
    @endphp
    <meta name="title" content="{{$homePageSeo->meta_title}}" />
    <meta name="description" content="{{$homePageSeo->meta_description}}" />
    <meta name="keywords" content="{{str_replace(",",", ",$homePageSeo->meta_keywords)}}" />
@endpush

@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@section('content')

    <!-- Hero Area -->
    <section class="hero-area background-image" style="@if($banner->priority == 1) background-image: url('{{url($banner->background_image)}}'); @else background-color: {{$banner->background_color}} !important; @endif">
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
                    <div class="hero-search-filter">
                        <div class="form-group">
                            <label>{{__('label.hero_searching_for')}}</label>
                            <select class="select2 hero-search-filter-select">
                                <option value="">{{__('label.hero_all')}}</option>
                                <option value="2">পাত্রের বায়োডাটা</option>
                                <option value="3">পাত্রীর বায়োডাটা</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{__('label.hero_marital_status')}}</label>
                            <select class="select2 hero-search-filter-select">
                                <option value="">{{__('label.hero_all')}}</option>
                                <option value="2">অবিবাহিত</option>
                                <option value="3">বিবাহিত</option>
                                <option value="4">ডিভোর্সড</option>
                                <option value="5">বিধবা</option>
                                <option value="6">বিপত্নীক</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{__('label.hero_permenant_address')}}</label>
                            <select class="hero-search-filter-select select2" name="state">
                                <option value="">{{__('label.hero_all_district')}}</option>
                                <option value="1">কুমিল্লা</option>
                                <option value="2">ফেনী</option>
                                <option value="3">ব্রাহ্মণবাড়িয়া</option>
                                <option value="4">রাঙ্গামাটি</option>
                                <option value="5">নোয়াখালী</option>
                                <option value="6">চাঁদপুর</option>
                                <option value="7">লক্ষ্মীপুর</option>
                                <option value="8">চট্টগ্রাম</option>
                                <option value="9">কক্সবাজার</option>
                                <option value="10">খাগড়াছড়ি</option>
                                <option value="11">বান্দরবান</option>
                                <option value="12">সিরাজগঞ্জ</option>
                                <option value="13">পাবনা</option>
                                <option value="14">বগুড়া</option>
                                <option value="15">রাজশাহী</option>
                                <option value="16">নাটোর</option>
                                <option value="17">জয়পুরহাট</option>
                                <option value="18">চাঁপাইনবাবগঞ্জ</option>
                                <option value="19">নওগাঁ</option>
                                <option value="20">যশোর</option>
                                <option value="21">সাতক্ষীরা</option>
                                <option value="22">মেহেরপুর</option>
                                <option value="23">নড়াইল</option>
                                <option value="24">চুয়াডাঙ্গা</option>
                                <option value="25">কুষ্টিয়া</option>
                                <option value="26">মাগুরা</option>
                                <option value="27">খুলনা</option>
                                <option value="28">বাগেরহাট</option>
                                <option value="29">ঝিনাইদহ</option>
                                <option value="30">ঝালকাঠি</option>
                                <option value="31">পটুয়াখালী</option>
                                <option value="32">পিরোজপুর</option>
                                <option value="33">বরিশাল</option>
                                <option value="34">ভোলা</option>
                                <option value="35">বরগুনা</option>
                                <option value="36">সিলেট</option>
                                <option value="37">মৌলভীবাজার</option>
                                <option value="38">হবিগঞ্জ</option>
                                <option value="39">সুনামগঞ্জ</option>
                                <option value="40">নরসিংদী</option>
                                <option value="41">গাজীপুর</option>
                                <option value="42">শরীয়তপুর</option>
                                <option value="43">নারায়ণগঞ্জ</option>
                                <option value="44">টাঙ্গাইল</option>
                                <option value="45">কিশোরগঞ্জ</option>
                                <option value="46">মানিকগঞ্জ</option>
                                <option value="47">ঢাকা</option>
                                <option value="48">মুন্সিগঞ্জ</option>
                                <option value="49">রাজবাড়ী</option>
                                <option value="50">মাদারীপুর</option>
                                <option value="51">গোপালগঞ্জ</option>
                                <option value="52">ফরিদপুর</option>
                                <option value="53">পঞ্চগড়</option>
                                <option value="54">দিনাজপুর</option>
                                <option value="55">লালমনিরহাট</option>
                                <option value="56">নীলফামারী</option>
                                <option value="57">গাইবান্ধা</option>
                                <option value="58">ঠাকুরগাঁও</option>
                                <option value="59">রংপুর</option>
                                <option value="60">কুড়িগ্রাম</option>
                                <option value="61">শেরপুর</option>
                                <option value="62">ময়মনসিংহ</option>
                                <option value="63">জামালপুর</option>
                                <option value="64">নেত্রকোণা</option>
                            </select>
                        </div>
                        <a href="biodata.html" class="h-search-filter-btn">
                            <i class="fi fi-rs-search"></i>{{__('label.hero_search')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->


    <!-- BioData CTA Area -->
    @if($homePageBiodata && $homePageBiodata->status == 1)
    <section class="biodata-cta-area background-image" style="@if($homePageBiodata->priority == 1) background-image: url('{{url($homePageBiodata->background_image)}}'); @else background-color: {{$homePageBiodata->background_color}} !important; @endif">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="biodata-cta-img">
                        @if($homePageBiodata && file_exists(public_path($homePageBiodata->image)))
                        <img src="{{url($homePageBiodata->image)}}" alt="Image" />
                        @else
                        <img src="{{url('frontend_assets')}}/assets/images/cta-img.svg" alt="#" />
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
                            <a href="{{$homePageBiodata->button1_url}}" target="_blank" class="theme-btn"><i class="fi fi-rr-plus"></i>{{ App::currentLocale() == 'en' ? $homePageBiodata->button1_text : $homePageBiodata->button1_text_bn }}</a>
                            <a href="{{$homePageBiodata->button2_url}}" target="_blank" class="theme-btn secondary"><i class="icofont-youtube-play"></i>{{ App::currentLocale() == 'en' ? $homePageBiodata->button2_text : $homePageBiodata->button2_text_bn }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End BioData CTA Area -->


    <!-- Funfact  Area -->
    @if($homePageStatConfig && $homePageStatConfig->status == 1)
    <section class="funfact-area background-image" style="@if($homePageStatConfig->priority == 1) background-image: url('{{url($homePageStatConfig->background_image)}}'); @else background-color: {{$homePageStatConfig->background_color}} !important; @endif">
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
                @foreach($homePageStatistics as $satistic)
                <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                    <div class="funfact-card">
                        <div class="funfact-card-icon">
                            <img src="{{url($satistic->image)}}" alt="Image" />
                        </div>
                        <div class="funfact-card-info">
                            <p>{{ App::currentLocale() == 'en' ? $satistic->title : $satistic->title_bn }}</p>

                            @if(App::currentLocale() == 'en')
                            <h4><span class="counter">{{$satistic->number}}</span></h4>
                            @else
                            <h4><span>{{$numto->bnCommaLakh($satistic->number)}}</span></h4>
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
    @if($howItWorksConfig && $howItWorksConfig->status == 1)
    <section class="work-process-area background-image" style="@if($howItWorksConfig->priority == 1) background-image: url('{{url($howItWorksConfig->background_image)}}'); @else background-color: {{$howItWorksConfig->background_color}} !important; @endif">
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
                @foreach($howItWorks as $item)
                <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                    <div class="work-process-card">
                        <div class="work-process-icon">
                            <img src="{{url($item->image)}}" alt="Image" />
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
    @if($mobileAppSection && $mobileAppSection->status == 1)
    <section class="app-download-area background-image" style="@if($mobileAppSection->priority == 1) background-image: url('{{url($mobileAppSection->background_image)}}'); @else background-color: {{$mobileAppSection->background_color}} !important; @endif">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="app-download-content">
                        <h3>{{ App::currentLocale() == 'en' ? $mobileAppSection->title : $mobileAppSection->title_bn }}</h3>
                        <p>
                            {{ App::currentLocale() == 'en' ? $mobileAppSection->description : $mobileAppSection->description_bn }}
                        </p>
                        <div class="app-download-btn">
                            @if($mobileAppSection->play_store_link)
                            <a href="{{$mobileAppSection->play_store_link}}" target="_blank">
                                <img src="{{url('frontend_assets')}}/assets/images/google-play.svg" alt="#" />
                            </a>
                            @endif
                            @if($mobileAppSection->play_store_link)
                            <a href="{{$mobileAppSection->app_store_link}}" target="_blank">
                                <img src="{{url('frontend_assets')}}/assets/images/app-store.svg" alt="#" />
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-class">
                    <div class="app-download-img">
                        @if($mobileAppSection && file_exists(public_path($mobileAppSection->image)))
                        <img src="{{url($mobileAppSection->image)}}" alt="Image" />
                        @else
                        <img src="{{url('frontend_assets')}}/assets/images/app-download-img.png" alt="Image" />
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End App Download Area -->
@endsection
