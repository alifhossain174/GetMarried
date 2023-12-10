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
        .active>.page-link,
        .page-link.active {
            background-color: var(--secondary-color) !important;
            border-color: var(--secondary-color) !important;
        }

        .page-link {
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
                        <p class="breadcrumbs-text">
                            {{ App::currentLocale() == 'en' ? $data->total() : $numto->bnNum($data->total()) }}
                            {{ __('label.biodata_found') }}</p>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{ url('/') }}">{{ __('label.menu_home') }}</a><i
                                    class="fi fi-rs-angle-small-right"></i>
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
                                <form action="{{ url('search/biodata/no') }}" method="GET"
                                    class="biodata-number-searchbar">
                                    @csrf
                                    <div class="form-group">
                                        <input type="search" value="{{ isset($biodata_no) ? $biodata_no : '' }}"
                                            style="color: #4f4f4f;" name="biodata_no"
                                            placeholder="{{ __('label.biodata_no') }}" />
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
                                    <form action={{ url('/change/search/result/order') }} type="get">
                                        @csrf
                                        <input type="hidden" name="biodata_type" value="{{ isset($biodataType) ? $biodataType : '' }}">
                                        <input type="hidden" name="marital_status" value="{{ isset($maritalStatus) ? $maritalStatus : '' }}">
                                        <input type="hidden" name="district" value="{{ isset($district) ? $district : '' }}">
                                        <input type="hidden" name="upazila" value="{{ isset($upazila) ? $upazila : '' }}">
                                        <div class="form-group">
                                            <select class="select2 hero-search-filter-select" name="order"
                                                onchange="this.form.submit()">
                                                <option value="1" @if(isset($order) && $order == 1) selected @endif>{{ __('label.biodata_search_results_new') }}</option>
                                                <option value="2" @if(isset($order) && $order == 2) selected @endif>{{ __('label.biodata_search_results_old') }}</option>
                                            </select>
                                            <noscript><input type="submit" value="Submit"></noscript>
                                        </div>
                                    </form>
                                </div>
                                <div class="biodata-top-filter-btn">
                                    <button class="theme-btn secondary filter-open-btn">
                                        <i class="fi fi-rr-settings"></i>{{ __('label.biodata_search_results_filter') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="biodata-main-inner">

                        @if($data->total() > 0)
                        <div class="biodata-main-inner-card">
                            <!-- Single BioData Card -->
                            @foreach ($data as $item)
                                <div class="biodata-card">
                                    <div class="biodata-card-top">
                                        <div class="biodata-card-icon">
                                            @if ($item && $item->biodata_type_id == 1 && $item->show_image != 1)
                                                <img src="{{ url('frontend_assets') }}/assets/images/icons/man.svg" alt="Image" />
                                            @elseif ($item && $item->biodata_type_id == 2 && $item->show_image != 1)
                                                <img src="{{ url('frontend_assets') }}/assets/images/icons/woman.svg" alt="Image" />
                                            @else
                                                @if($item->show_image && file_exists(public_path($item->image)))
                                                    <img src="{{ url($item->image) }}" alt="Image" />
                                                @endif
                                            @endif
                                        </div>
                                        <div class="biodata-card-top-info">
                                            <h4>{{ __('label.biodata_no') }}</h4>
                                            <p>{{ $item->biodata_no }}</p>
                                        </div>

                                        @auth
                                            @php
                                                $isLiked = App\Models\SavedBiodata::where([['user_id', Auth::user()->id], ['biodata_id', $item->id], ['status', 1]])->first();
                                            @endphp
                                            @if ($isLiked)
                                                <a class="wishlist-btn"
                                                    @if ($isLiked) style="background: var(--primary-color); color: white" @endif
                                                    href="javascript:void(0)" onclick="alreadyAddedToLikeList()">
                                                    <i class="fi fi-rs-heart"></i>
                                                </a>
                                            @else
                                                <a class="wishlist-btn"
                                                    href="{{ url('add/to/liked/list') }}/{{ $item->slug }}">
                                                    <i class="fi fi-rs-heart"></i>
                                                </a>
                                            @endif
                                        @else
                                            <a class="wishlist-btn" href="{{ url('add/to/liked/list') }}/{{ $item->slug }}">
                                                <i class="fi fi-rs-heart"></i>
                                            </a>
                                        @endauth

                                    </div>
                                    <div class="biodata-card-bottom">
                                        <div class="biodata-card-bottom-info">
                                            <div class="biodata-card-each-item">
                                                <label>{{ __('label.date_of_birth') }}</label>
                                                <p>{{ date('M, Y', strtotime($item->birth_date)) }}</p>
                                            </div>
                                            <div class="biodata-card-each-item">
                                                <label>{{ __('label.height') }}</label>
                                                @if (App::currentLocale() == 'en')
                                                    <p>{{ $item->height_foot }}′ {{ $item->height_inch }}′′</p>
                                                @else
                                                    <p>{{ $numto->bnNum($item->height_foot) }}′
                                                        {{ $numto->bnNum($item->height_inch) }}′′</p>
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
                                                <p>{{ App::currentLocale() == 'en' ? $item->title : $item->title_bn }}</p>
                                            </div>
                                            <div class="biodata-card-each-item">
                                                <label>{{ __('label.district') }}</label>
                                                <p>{{ App::currentLocale() == 'en' ? $item->district_name : $item->district_name_bn }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="biodata-card-btn">
                                            <a href="{{ url('biodata/details') }}/{{ $item->slug }}"
                                                class="theme-btn">{{ __('label.view_details') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="alert alert-danger text-center d-block w-100 mt-3">Sorry! No Matching Data Found</span>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-12">
                                <div class="biodata-pagination">

                                    <div class="d-flex">
                                        <div class="mx-auto">
                                            {{ $data->appends($_GET)->links() }}
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
                                                {{ __('label.biodata_search_results_filters') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!-- Tab Details -->
                                    <form action="{{url('filter/search/results')}}" method="GET">
                                    @csrf
                                    <input type="hidden" name="order" value="{{isset($order) ? $order : 1}}">
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
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                                    {{ __('label.biodata_filter_criteria_primary') }}
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                                <div class="biodata-accordion-body">
                                                                    <div class="form-group">
                                                                        @php
                                                                            $biodataTypes = App\Models\BiodataType::where('status', 1)->orderBy('serial', 'asc')->get();
                                                                        @endphp
                                                                        <label>{{ __('label.hero_searching_for') }}</label>
                                                                        <select class="select2 hero-search-filter-select" name="biodata_type">
                                                                            <option value="">{{ __('label.hero_all') }}</option>
                                                                            @foreach ($biodataTypes as $type)
                                                                            <option value="{{$type->id}}" @if(isset($biodataType) && $biodataType==$type->id) selected @endif>{{ App::currentLocale() == 'en' ? $type->title : $type->title_bn }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        @php
                                                                            $maritalConditions = App\Models\MaritalCondition::where('status', 1)->orderBy('serial', 'asc')->get();
                                                                        @endphp
                                                                        <label>{{ __('label.hero_marital_status') }}</label>
                                                                        <select class="select2 hero-search-filter-select" name="marital_status">
                                                                            <option value="">{{ __('label.hero_all') }}</option>
                                                                            @foreach ($maritalConditions as $mc)
                                                                            <option value="{{$mc->id}}" @if(isset($maritalStatus) && $maritalStatus==$mc->id) selected @endif>{{ App::currentLocale() == 'en' ? $mc->title : $mc->title_bn }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="biodata-check-list">
                                                                        <span> {{ __('label.skin_tone') }} </span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="1" @if(isset($skinTone) && in_array(1, $skinTone)) checked @endif name="skin_tone[]"/>
                                                                                    {{ __('label.skin_tone_black') }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="2" @if(isset($skinTone) && in_array(2, $skinTone)) checked @endif name="skin_tone[]"/>
                                                                                    {{ __('label.skin_tone_brown') }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="3" @if(isset($skinTone) && in_array(3, $skinTone)) checked @endif name="skin_tone[]"/>
                                                                                    {{ __('label.skin_tone_bright_brown') }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="4" @if(isset($skinTone) && in_array(4, $skinTone)) checked @endif name="skin_tone[]"/>
                                                                                    {{ __('label.skin_tone_white') }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="5" @if(isset($skinTone) && in_array(5, $skinTone)) checked @endif name="skin_tone[]"/>
                                                                                    {{ __('label.skin_tone_bright_white') }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="biodata-check-list">
                                                                        <span> {{ __('label.blood_group') }} </span>
                                                                        <div class="form-check-group">
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="1" @if(isset($bloodGroup) && in_array(1, $bloodGroup)) checked @endif name="blood_group[]"/>
                                                                                    A+
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="2" @if(isset($bloodGroup) && in_array(2, $bloodGroup)) checked @endif name="blood_group[]"/>
                                                                                    A-
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="3" @if(isset($bloodGroup) && in_array(3, $bloodGroup)) checked @endif name="blood_group[]"/>
                                                                                    B+
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="4" @if(isset($bloodGroup) && in_array(4, $bloodGroup)) checked @endif name="blood_group[]"/>
                                                                                    B-
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="5" @if(isset($bloodGroup) && in_array(5, $bloodGroup)) checked @endif name="blood_group[]"/>
                                                                                    AB+
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="6" @if(isset($bloodGroup) && in_array(6, $bloodGroup)) checked @endif name="blood_group[]"/>
                                                                                    AB-
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="7" @if(isset($bloodGroup) && in_array(7, $bloodGroup)) checked @endif name="blood_group[]"/>
                                                                                    O+
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <label class="biodata-check-box">
                                                                                    <input class="form-check-input" type="checkbox" value="8" @if(isset($bloodGroup) && in_array(8, $bloodGroup)) checked @endif name="blood_group[]"/>
                                                                                    O-
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="form-group age-range range">
                                                                        <label>বয়স</label>
                                                                        <div class="age-filter">
                                                                            <div class="label-input">
                                                                                <input type="text" id="amount-one" name="age" placeholder="Add Your age" />
                                                                            </div>
                                                                            <div class="age-filter-inner">
                                                                                <div id="slider-range-one" class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                                    <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%">
                                                                                    </div>
                                                                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%"></span>
                                                                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%"></span>
                                                                                </div>
                                                                                <div class="age_slider_amount"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
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
                                                                    {{ __('label.address') }}
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseTwo"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingTwo"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="biodata-accordion-body">
                                                                    <div class="form-group">
                                                                        @php
                                                                            $districts = DB::table('districts')->orderBy('id', 'asc')->get();
                                                                        @endphp
                                                                        <label>{{ __('label.hero_permenant_address') }}</label>
                                                                        <select id="permenant_district_id" class="hero-search-filter-select select2" name="district">
                                                                            <option value="">{{ __('label.district') }}</option>
                                                                            @foreach ($districts as $item)
                                                                            <option value="{{$item->id}}" @if(isset($district) && $district == $item->id) selected @endif>{{ App::currentLocale() == 'en' ? $item->name : $item->bn_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>{{ __('label.upazila') }}</label>
                                                                        <select id="permenant_upazila_id" class="hero-search-filter-select select2" name="upazila">
                                                                            <option value="">{{ __('label.upazila') }}</option>
                                                                            @if (isset($district) && $district > 0)
                                                                                @php
                                                                                    $presentUpazilas = DB::table('upazilas')
                                                                                        ->where('district_id', $district)
                                                                                        ->get();
                                                                                @endphp
                                                                                @foreach ($presentUpazilas as $item)
                                                                                    <option value="{{ $item->id }}" @if(isset($upazila) && $upazila == $item->id) selected @endif>
                                                                                        {{ App::currentLocale() == 'en' ? $item->name : $item->bn_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="biodata-filter-btn">
                                                        <button type="submit" class="theme-btn">
                                                            <i class="fi fi-rs-search"></i>খুঁজুন
                                                        </button>
                                                        <a href="{{url('remove/search/filters')}}" class="theme-btn filter-remove">
                                                            <i class="icofont-eraser"></i>ফিল্টার মুছুন
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
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

@section('footer_js')
    <script>
        function alreadyAddedToLikeList() {
            toastr.warning("Already Added in Liked List");
            return false;
        }

        $(document).ready(function() {
            $('#permenant_district_id').on('change', function() {
                var permenantDistrictId = this.value;
                $("#permenant_upazila_id").html('');
                $.ajax({
                    url: "{{ url('/district/wise/upazila') }}",
                    type: "POST",
                    data: {
                        permenant_district_id: permenantDistrictId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#permenant_upazila_id').html(
                            '<option value="">Select Option</option>');
                        $.each(result, function(key, value) {
                            @if (App::currentLocale() == 'en')
                                $("#permenant_upazila_id").append('<option value="' + value.id + '" >' + value.name + '</option>');
                            @else
                                $("#permenant_upazila_id").append('<option value="' + value.id + '">' + value.bn_name + '</option>');
                            @endif
                        });
                    }
                });
            });
        });

        // $(function () {
        //     $("#slider-range-one").slider({
        //         range: true,
        //         min: {{isset($ageArray) ? $ageArray[0] : 0}},
        //         max: {{isset($ageArray) ? $ageArray[1] : 100}},
        //         values: [{{isset($ageArray) ? $ageArray[0] : 0}}, {{isset($ageArray) ? $ageArray[1] : 100}}],
        //         slide: function (event, ui) {
        //             // $("#amount-one").val("" + ui.values[0] + " - " + ui.values[1]);
        //         },
        //     });
        //     $("#amount-one").val(""+$("#slider-range-one").slider("values", 0)+"-"+$("#slider-range-one").slider("values", 1));
        // });

        // $( document ).ready(function() {
        //     $(".ui-slider-handle").first().css("left", "{{isset($ageArray) ? $ageArray[0] : 0}}%");
        //     $(".ui-slider-handle").last().css("left", "{{isset($ageArray) ? $ageArray[1] : 100}}%");
        // });

    </script>
@endsection
