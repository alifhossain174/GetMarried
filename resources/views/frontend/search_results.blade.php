@extends('frontend.master')

@push('site-seo')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
        $homePageSeo = App\Models\Seo::where('id', 1)->first();
    @endphp
    <meta name="title" content="{{ $homePageSeo->meta_title }}" />
    <meta name="description" content="{{ $homePageSeo->meta_description }}" />
    <meta name="keywords" content="{{ str_replace(',', ', ', $homePageSeo->meta_keywords) }}" />
@endpush

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
    <!-- Breadcrumbs Area -->
    <section class="breadcrumbs-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="breadcrumbs-title">{{ __('label.biodata') }}</h3>
                        <p class="breadcrumbs-text">{{App::currentLocale() == 'en' ? $data->total() : $numto->bnNum($data->total())}} {{ __('label.biodata_found') }}</p>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{ url('/') }}">{{ __('label.menu_home') }}</a><i class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active">
                                <a href="#">{{ __('label.biodata') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- BioData Area -->
    <section class="biodata-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xl-9 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-6 col-12">
                            <div class="biodata-number-widget">
                                <form action="#" method="post" class="biodata-number-searchbar">
                                    <div class="form-group">
                                        <input type="search" name="search" placeholder="{{ __('label.biodata_no') }}" required />
                                        <div class="biodata-number-btn">
                                            <button type="submit" class="theme-btn secondary">
                                                <i class="fi fi-rs-search"></i>{{ __('label.biodata_search') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <div class="biodata-top-filter">
                                <div class="biodata-filter-select">
                                    <div class="form-group">
                                        <select class="select2 hero-search-filter-select">
                                            <option value="1">নতুন</option>
                                            <option value="2">পুরাতন</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="biodata-top-filter-btn">
                                    <button class="theme-btn secondary filter-open-btn">
                                        <i class="fi fi-rr-settings"></i>ফিল্টার
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="biodata-main-inner">
                        <div class="biodata-main-inner-card">

                            <!-- Single BioData Card -->
                            @foreach ($data as $item)
                            <div class="biodata-card">
                                <div class="biodata-card-top">
                                    <div class="biodata-card-icon">
                                        @if($item->biodata_type_id == 1)
                                        <img src="{{ url('frontend_assets') }}/assets/images/icons/man.svg" alt="#" />
                                        @else
                                        <img src="{{ url('frontend_assets') }}/assets/images/icons/woman.svg" alt="#" />
                                        @endif
                                    </div>
                                    <div class="biodata-card-top-info">
                                        <h4>{{ __('label.biodata_no') }}</h4>
                                        <p>{{$item->biodata_no}}</p>
                                    </div>
                                    <button class="wishlist-btn">
                                        <i class="fi fi-rs-heart"></i>
                                    </button>
                                </div>
                                <div class="biodata-card-bottom">
                                    <div class="biodata-card-bottom-info">
                                        <div class="biodata-card-each-item">
                                            <label>{{ __('label.date_of_birth') }}</label>
                                            <p>{{date("F, Y", strtotime($item->birth_date))}}</p>
                                        </div>
                                        <div class="biodata-card-each-item">
                                            <label>{{ __('label.height') }}</label>
                                            @if(App::currentLocale() == 'en')
                                            <p>{{$item->height_foot}}′ {{$item->height_inch}}′′</p>
                                            @else
                                            <p>{{$numto->bnNum($item->height_foot)}}′ {{$numto->bnNum($item->height_inch)}}′′</p>
                                            @endif
                                        </div>
                                        <div class="biodata-card-each-item">
                                            <label>{{ __('label.skin_tone') }}</label>
                                            <p>
                                                @if ($item->skin_tone == 1)
                                                    {{ __('label.skin_tone_black') }}
                                                @elseif ($item->skin_tone == 2)
                                                    {{ __('label.skin_tone_brown') }}
                                                @elseif ($item->skin_tone == 3)
                                                    {{ __('label.skin_tone_bright_brown') }}
                                                @elseif ($item->skin_tone == 4)
                                                    {{ __('label.skin_tone_white') }}
                                                @elseif ($item->skin_tone == 5)
                                                    {{ __('label.skin_tone_bright_white') }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="biodata-card-each-item">
                                            <label>{{ __('label.marital_status') }}</label>
                                            <p>{{App::currentLocale() == 'en' ? $item->title : $item->title_bn}}</p>
                                        </div>
                                        <div class="biodata-card-each-item">
                                            <label>{{ __('label.district') }}</label>
                                            <p>{{App::currentLocale() == 'en' ? $item->district_name : $item->district_name_bn}}</p>
                                        </div>
                                    </div>
                                    <div class="biodata-card-btn">
                                        <a href="{{url('biodata/details')}}/{{$item->slug}}" target="_blank" class="theme-btn">{{ __('label.view_details') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="biodata-pagination">

                                    <div class="d-flex">
                                        <div class="mx-auto">
                                            {{$data->appends($_GET)->links()}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="biodata-sidebar">
                        <div class="biodata-sidebar-close">
                            <button class="close-btn">
                                <i class="fi fi-ss-cross"></i>
                            </button>
                        </div>
                        <div class="biodata-sidebar-tab">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Tab Menu -->
                                    <div class="biodata-sidebar-tab-menu">
                                        <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item active" data-bs-toggle="list" role="tab">
                                                ফিল্টার সমূহ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!-- Tab Details -->
                                    <div class="biodata-sidebar-tab-details">
                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- Tab One -->
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                <div class="biodata-filter">
                                                    <div class="biodata-filter-accordion accordion accordion-flush"
                                                        id="accordionFlushExample">
                                                        <!-- Single Accordion Item -->
                                                        <div class="biodata-accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingOne">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseOne">
                                                                    প্রাথমিক
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseOne"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="flush-headingOne"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="biodata-accordion-body">
                                                                    <div class="form-group">
                                                                        <label>আমি খুঁজছি</label>
                                                                        <select class="select2 hero-search-filter-select">
                                                                            <option value="1">সকল</option>
                                                                            <option value="2">
                                                                                পাত্রের বায়োডাটা
                                                                            </option>
                                                                            <option value="3">
                                                                                পাত্রীর বায়োডাটা
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>বৈবাহিক অবস্থা</label>
                                                                        <select class="select2 hero-search-filter-select">
                                                                            <option value="1">সকল</option>
                                                                            <option value="2">অবিবাহিত</option>
                                                                            <option value="3">বিবাহিত</option>
                                                                            <option value="4">ডিভোর্সড</option>
                                                                            <option value="5">বিধবা</option>
                                                                            <option value="6">বিপত্নীক</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group age-range range">
                                                                        <label>বয়স</label>
                                                                        <div class="age-filter">
                                                                            <div class="label-input">
                                                                                <input type="text" id="amount-one"
                                                                                    name="age"
                                                                                    placeholder="Add Your age" />
                                                                            </div>
                                                                            <div class="age-filter-inner">
                                                                                <div id="slider-range-one"
                                                                                    class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                                    <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                                                        style="left: 0%; width: 100%">
                                                                                    </div>
                                                                                    <span
                                                                                        class="ui-slider-handle ui-state-default ui-corner-all"
                                                                                        tabindex="0"
                                                                                        style="left: 0%"></span><span
                                                                                        class="ui-slider-handle ui-state-default ui-corner-all"
                                                                                        tabindex="0"
                                                                                        style="left: 100%"></span>
                                                                                </div>
                                                                                <div class="age_slider_amount"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single Accordion Item -->
                                                        <div class="biodata-accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseTwo"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseTwo">
                                                                    ঠিকানা
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseTwo"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingTwo"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="biodata-accordion-body">
                                                                    <div class="form-group">
                                                                        <label>জেলা</label>
                                                                        <select class="hero-search-filter-select select2" name="state">
                                                                            <option value="0">সকল জেলা</option>
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
                                                                    <div class="form-group">
                                                                        <label>উপজেলা</label>
                                                                        <select class="hero-search-filter-select select2"
                                                                            name="state">
                                                                            <option value="0">সকল উপজেলা</option>
                                                                            <option value="1">দেবিদ্বার</option>
                                                                            <option value="2">বরুড়া</option>
                                                                            <option value="3">ব্রাহ্মণপাড়া</option>
                                                                            <option value="4">চান্দিনা</option>
                                                                            <option value="5">চৌদ্দগ্রাম</option>
                                                                            <option value="6">দাউদকান্দি</option>
                                                                            <option value="7">হোমনা</option>
                                                                            <option value="8">লাকসাম</option>
                                                                            <option value="9">মুরাদনগর</option>
                                                                            <option value="10">নাঙ্গলকোট</option>
                                                                            <option value="11">কুমিল্লা সদর</option>
                                                                            <option value="12">মেঘনা</option>
                                                                            <option value="13">মনোহরগঞ্জ</option>
                                                                            <option value="14">সদর দক্ষিণ</option>
                                                                            <option value="15">তিতাস</option>
                                                                            <option value="16">বুড়িচং</option>
                                                                            <option value="17">লালমাই</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single Accordion Item -->
                                                        <div class="biodata-accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingThree">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseThree"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseThree">
                                                                    শিক্ষা
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseThree"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingThree"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="biodata-accordion-body">
                                                                    <div class="biodata-check-list">
                                                                        <span>পড়াশোনার মাধ্যম</span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="1" />জেনারেল</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="2" />কওমি</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="3" />আলিয়া</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="biodata-check-list">
                                                                        <span>দ্বীনি শিক্ষাগত যোগ্যতা</span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="4" />হাফেজ</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="5" />মাওলানা</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="6" />মুফতি</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="7" />মুফাসসির</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="8" />আদিব</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single Accordion Item -->
                                                        <div class="biodata-accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingFour">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseFour"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseFour">
                                                                    ব্যক্তিগত
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseFour"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingFour"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="biodata-accordion-body">
                                                                    <div class="form-group age-range range height-range">
                                                                        <label> উচ্চতা </label>
                                                                        <div class="age-filter height-filter">
                                                                            <div class="label-input">
                                                                                <input type="text" id="amount-two"
                                                                                    name="age"
                                                                                    placeholder="Add Your age" />
                                                                            </div>
                                                                            <div
                                                                                class="age-filter-inner height-filter-inner">
                                                                                <div id="slider-range-two"
                                                                                    class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                                    <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                                                        style="left: 0%; width: 100%">
                                                                                    </div>
                                                                                    <span
                                                                                        class="ui-slider-handle ui-state-default ui-corner-all"
                                                                                        tabindex="0"
                                                                                        style="left: 0%"></span><span
                                                                                        class="ui-slider-handle ui-state-default ui-corner-all"
                                                                                        tabindex="0"
                                                                                        style="left: 100%"></span>
                                                                                </div>
                                                                                <div class="age_slider_amount"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="biodata-check-list">
                                                                        <span> গাত্রবর্ণ </span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="1" />কালো</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="2" />শ্যামলা</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="3" />উজ্জ্বল
                                                                                    শ্যামলা</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="4" />ফর্সা</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="5" />উজ্জ্বল
                                                                                    ফর্সা</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="biodata-check-list">
                                                                        <span> ফিকহ অনুসরণ </span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="6" />হানাফি</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="7" />মালিকি</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="8" />শাফিঈ</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="9" />হাম্বলি</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="10" />আহলে হাদীস /
                                                                                    সালাফি</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single Accordion Item -->
                                                        <div class="biodata-accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingFive">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseFive"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseFive">
                                                                    পেশা
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseFive"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingFive"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="biodata-accordion-body">
                                                                    <div class="biodata-check-list">
                                                                        <span> পেশা </span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="1" />ইমাম</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="2" />মাদ্রাসা
                                                                                    শিক্ষক</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="3" />শিক্ষক</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="4" />ডাক্তার</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="5" />ইঞ্জিনিয়ার</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="6" />ব্যবসায়ী</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="7" />সরকারী
                                                                                    চাকুরী</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="8" />বেসরকারী
                                                                                    চাকুরী</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="9" />ফ্রিল্যান্সার</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="10" />শিক্ষার্থী</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="11" />প্রবাসী</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="12" />অন্যান্য</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="13" />পেশা নেই</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single Accordion Item -->
                                                        <div class="biodata-accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingSix">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseSix"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseSix">
                                                                    অন্যান্য
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseSix"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingSix"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="biodata-accordion-body">
                                                                    <div class="biodata-check-list">
                                                                        <span> অর্থনৈতিক অবস্থা </span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="1" />উচ্চবিত্ত</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="2" />উচ্চ
                                                                                    মধ্যবিত্ত</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="3" />মধ্যবিত্ত</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="4" />নিম্ন
                                                                                    মধ্যবিত্ত</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="5" />নিম্নবিত্ত</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="biodata-check-list">
                                                                        <span> ক্যাটাগরি </span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="6" />প্রতিবন্ধী</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="7" />বন্ধ্যা</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="8" />নওমুসলিম</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="9" />এতিম</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="10" />মাসনা হতে
                                                                                    আগ্রহী</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="11" />তাবলীগ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="biodata-filter-btn">
                                                        <button type="button" class="theme-btn">
                                                            <i class="fi fi-rs-search"></i>খুঁজুন
                                                        </button>
                                                        <button type="button" class="theme-btn filter-remove">
                                                            <i class="icofont-eraser"></i>ফিল্টার মুছুন
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Tab Details -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End BioData Area -->
@endsection
