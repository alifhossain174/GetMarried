@extends('frontend.master')

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
                                <h3 class="user-d-breadcrumbs-title">{{__('label.user_menu_edit_biodata')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="user-d-edit-biodata">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-9 col-12">
                                <div class="user-d-edit-biodata-details">
                                    <!-- Tab Menu -->
                                    <div class="user-d-edit-biodata-tab-menu">
                                        <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item active" data-bs-toggle="list" href="#tab1"
                                                role="tab">
                                                <span>1</span>
                                                {{__('label.general_info')}}
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab2" role="tab">
                                                <span>2</span>
                                                {{__('label.address')}}
                                            </a>

                                            @php $sl=3; @endphp
                                            @foreach ($questionSets as $set)
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab{{$sl}}" role="tab">
                                                <span>{{$sl++}}</span>
                                                {{ App::currentLocale() == 'en' ? $set->title : $set->title_bn }}
                                            </a>
                                            @endforeach

                                            <a class="list-group-item" data-bs-toggle="list" href="#tab10" role="tab">
                                                <span>10</span>
                                                {{__('label.contact')}}
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Tab Details -->
                                    <div class="user-d-edit-biodata-tab-details">
                                        <form class="user-d-edit-biodata-form" action="#" method="post">
                                            <div class="tab-content" id="nav-tabContent">
                                                <!-- Tab One -->
                                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            {{__('label.general_info')}}
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>বায়োডাটার ধরন<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">পাত্রের বায়োডাটা</option>
                                                                    <option value="2">পাত্রীর বায়োডাটা</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>বৈবাহিক অবস্থা<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">অবিবাহিত</option>
                                                                    <option value="2">বিবাহিত</option>
                                                                    <option value="3">ডিভোর্সড</option>
                                                                    <option value="4">বিধবা</option>
                                                                    <option value="5">বিপত্নীক</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>জন্মসন<span>*</span></label>
                                                                <input type="date" name="date-picker"
                                                                    placeholder="dd/mm/yyyy" required />
                                                                <p>
                                                                    * অবশ্যই আসল জন্মসন দিবেন। NID বা
                                                                    জন্মনিবন্ধনে কমানো বয়স থাকলে সেটা দিবেন না।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>উচ্চতা<span>*</span></label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <select class="select2 hero-search-filter-select"
                                                                            required>
                                                                            <option value="0">ফুট</option>
                                                                            <option value="1">৪ ফুটের কম</option>
                                                                            <option value="2">৪′</option>
                                                                            <option value="3">৫′</option>
                                                                            <option value="4">৬′</option>
                                                                            <option value="5">৭′</option>
                                                                            <option value="6">৭ ফুটের বেশি</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <select class="select2 hero-search-filter-select"
                                                                            required>
                                                                            <option value="0">ইঞ্চি</option>
                                                                            <option value="1">১″</option>
                                                                            <option value="2">২″</option>
                                                                            <option value="3">৩″</option>
                                                                            <option value="4">৪″</option>
                                                                            <option value="5">৫″</option>
                                                                            <option value="6">৬″</option>
                                                                            <option value="7">৭″</option>
                                                                            <option value="8">৮″</option>
                                                                            <option value="9">৯″</option>
                                                                            <option value="10">১০″</option>
                                                                            <option value="11">১১″</option>
                                                                            <option value="12">১২″</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>গাত্রবর্ণ<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">কালো</option>
                                                                    <option value="2">শ্যামলা</option>
                                                                    <option value="3">উজ্জ্বল শ্যামলা</option>
                                                                    <option value="4">ফর্সা</option>
                                                                    <option value="5">উজ্জ্বল ফর্সা</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>ওজন<span>*</span></label>
                                                                <input type="text" name="weight"
                                                                    placeholder="আপনার ওজন" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>রক্তের গ্রুপ<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">A+</option>
                                                                    <option value="2">A-</option>
                                                                    <option value="3">B+</option>
                                                                    <option value="4">B-</option>
                                                                    <option value="5">AB+</option>
                                                                    <option value="6">AB-</option>
                                                                    <option value="7">O+</option>
                                                                    <option value="8">O-</option>
                                                                    <option value="9">জানা নেই</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>জাতীয়তা<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">বাংলাদেশী</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tab Two -->
                                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            {{__('label.address')}}
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>জেলা<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
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
                                                                <label>উপজেলা<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
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
                                                            <div class="form-group">
                                                                <label>এলাকার নাম<span>*</span></label>
                                                                <input type="text" name="area-name" required />
                                                                <p>
                                                                    * বাসার নাম্বার না লিখে শুধু গ্রাম বা এলাকার
                                                                    নাম লিখুন। যেমন- মিরপুর ১০, বাঘমারা।
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="edit-biodata-form-widget" style="margin-top: 24px">
                                                        <h2 class="edit-biodata-form-title">
                                                            বর্তমান ঠিকানা
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>জেলা<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
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
                                                                <label>উপজেলা<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
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
                                                            <div class="form-group">
                                                                <label>এলাকার নাম<span>*</span></label>
                                                                <input type="text" name="area-name" required />
                                                                <p>
                                                                    * বাসার নাম্বার না লিখে শুধু গ্রাম বা এলাকার
                                                                    নাম লিখুন। যেমন- মিরপুর ১০, বাঘমারা।
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Tab Three -->
                                                @php $sl=3; @endphp
                                                @foreach ($questionSets as $set)
                                                <div class="tab-pane fade" id="tab{{$sl++}}" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            {{ App::currentLocale() == 'en' ? $set->title : $set->title_bn }}
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>আপনার শিক্ষা মাধ্যম<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">জেনারেল</option>
                                                                    <option value="2">কওমি</option>
                                                                    <option value="3">আলিয়া</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>অন্যান্য শিক্ষাগত যোগ্যতা
                                                                    <span>*</span></label>
                                                                <textarea name="educational-skill" required></textarea>
                                                                <p>
                                                                    * শিক্ষাপ্রতিষ্ঠানের নাম, বিষয়, পাসের সন সহ
                                                                    বিস্তারিত লিখবেন। কিছু না থাকলে ঘরটি ফাঁকা
                                                                    রাখবেন।
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                                <!-- Tab Ten -->
                                                <div class="tab-pane fade" id="tab10" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">{{__('label.contact')}}</h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>পাত্র/ পাত্রীর নাম<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>পাত্র/ পাত্রীর ছবি<span>*</span></label>
                                                                <div class="upload-img-input">
                                                                    <div class="library-photo-input">
                                                                        <input type="file" accept="image/*"
                                                                            id="library-photo-input" class="hidden"
                                                                            onchange="uploadLibraryPhoto()" />
                                                                        <label for="library-photo-input">
                                                                            <i class="fi fi-rr-upload"></i>
                                                                            <span>Upload photo</span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="position: relative">
                                                                        <div class="remove-icon" id="remove-icon"
                                                                            style="display: none" onclick="removeImage()">
                                                                            <i class="fi fi-rr-cross"></i>
                                                                        </div>
                                                                        <img id="uploaded-image" style="display: none" />
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    আপনার ছবি সাদিকরুন কর্তৃপক্ষ বাদে অন্য কারো
                                                                    কাছে প্রকাশ করা হবে না। ছবিটি নেয়া হচ্ছে
                                                                    শুধুমাত্র আইডেন্টিটি ভেরিফিকেশনের জন্য।
                                                                    সাম্প্রতিক সময়ে তোলা একটি ছবি আপলোড করুন
                                                                    যেখানে চেহারা স্পষ্টভাবে বোঝা যায়।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>অভিভাবকের মোবাইল নাম্বার<span>*</span></label>
                                                                <input type="tel" name="name"
                                                                    placeholder="01700-000000" required />
                                                                <p>
                                                                    কেউ আপনার অভিভাবকের সাথে যোগাযোগ করতে চাইলে
                                                                    এই নাম্বারটি দেয়া হবে। এই নাম্বারে কল দিয়ে
                                                                    ভেরিফাই করার পর বায়োডাটা এপ্রুভ করা হবে।
                                                                    এখানে
                                                                    <b>
                                                                        বন্ধু, কলিগ, কাজিন বা পাত্রপাত্রীর নিজের
                                                                        নাম্বার
                                                                    </b>
                                                                    লিখলে বায়োডাটা
                                                                    <b> স্থায়ীভাবে ব্যান করা হবে।</b>
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>অভিভাবকের সাথে সম্পর্ক<span>*</span></label>
                                                                <input type="text" name="name" placeholder="বাবা"
                                                                    required />
                                                                <p>
                                                                    উক্ত অভিভাবক আপনার সম্পর্কে কি হয় তা লিখুন।
                                                                    যেমনঃ বাবা।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>বায়োডাটা গ্রহণের ই-মেইল<span>*</span></label>
                                                                <input type="email" name="name"
                                                                    placeholder="your-email@gmail.com" required />
                                                                <p>
                                                                    অনাকাঙ্ক্ষিত ঘটনা এড়াতে, সম্ভব হলে অভিভাবকের
                                                                    মেইল এড্রেস লিখুন।
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-d-edit-biodata-form-button">
                                                <button type="button" class="theme-btn secondary">
                                                    Back
                                                </button>
                                                <button type="submit" class="theme-btn">
                                                    Save & Next
                                                </button>
                                            </div>
                                        </form>
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
@endsection
