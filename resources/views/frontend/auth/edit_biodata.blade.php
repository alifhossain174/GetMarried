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
                                                সাধারণ তথ্য
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab2" role="tab">
                                                <span>2</span>
                                                ঠিকানা
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab3" role="tab">
                                                <span>3</span>
                                                শিক্ষাগত যোগ্যতা
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab4" role="tab">
                                                <span>4</span>
                                                পারিবারিক তথ্য
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab5" role="tab">
                                                <span>5</span>
                                                ব্যক্তিগত তথ্য
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab6" role="tab">
                                                <span>6</span>
                                                পেশাগত তথ্য
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab7" role="tab">
                                                <span>7</span>
                                                বিবাহ সম্পর্কিত তথ্য
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab9" role="tab">
                                                <span>9</span>
                                                অঙ্গীকারনামা
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab10" role="tab">
                                                <span>10</span>
                                                যোগাযোগ
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
                                                            সাধারণ তথ্য
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
                                                            স্থায়ী ঠিকানা
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
                                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            শিক্ষাগত যোগ্যতা
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
                                                                <label>সর্বোচ্চ শিক্ষাগত যোগ্যতা<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">এস.এস.সি'র নিচে</option>
                                                                    <option value="2">এস.এস.সি</option>
                                                                    <option value="3">এইচ.এস.সি</option>
                                                                    <option value="4">ডিপ্লোমা চলমান</option>
                                                                    <option value="5">ডিপ্লোমা</option>
                                                                    <option value="6">স্নাতক চলমান</option>
                                                                    <option value="7">স্নাতক</option>
                                                                    <option value="8">স্নাতকোত্তর</option>
                                                                    <option value="9">ডক্টরেট</option>
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
                                                <!-- Tab Four -->
                                                <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            পারিবারিক তথ্য
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>পিতার নাম<span>*</span></label>
                                                                <input type="text" name="fathers-name" required />
                                                                <p>* শুধুমাত্র কর্তৃপক্ষের জন্য</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আপনার পিতা কি জীবিত?<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">জী, জীবিত</option>
                                                                    <option value="2">না, মৃত</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>পিতার পেশার বিবরণ<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>
                                                                    <b>শুধু 'চাকরিজীবী' বা 'ব্যবসায়ী' এভাবে
                                                                        লিখবেন না।</b>
                                                                    চাকরিজীবী হলে প্রতিষ্ঠানের ধরণ এবং পদবী, আর
                                                                    ব্যবসায়ী হলে কী ধরণের ব্যবসা করেন/করতেন
                                                                    ইত্যাদি বিস্তারিত লিখবেন।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>মাতার নাম<span>*</span></label>
                                                                <input type="text" name="mothers-name" required />
                                                                <p>* শুধুমাত্র কর্তৃপক্ষের জন্য</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আপনার মাতা কি জীবিত?<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">জী, জীবিত</option>
                                                                    <option value="2">না, মৃত</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>মাতার পেশার বিবরণ<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আপনার কতজন ভাই আছে?<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">ভাই নেই</option>
                                                                    <option value="2">১</option>
                                                                    <option value="3">২</option>
                                                                    <option value="4">৩</option>
                                                                    <option value="5">৪</option>
                                                                    <option value="6">৫</option>
                                                                    <option value="7">৬</option>
                                                                    <option value="8">৭</option>
                                                                    <option value="9">৮</option>
                                                                    <option value="10">৯</option>
                                                                    <option value="11">১০</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>ভাইদের তথ্য<span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                                <p>
                                                                    * শিক্ষাগত যোগ্যতা, বৈবাহিক অবস্থা এবং পেশা
                                                                    লিখবেন। একাধিক ভাই থাকলে কমা দিয়ে নিচের
                                                                    লাইনে লিখবেন।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আপনার কতজন বোন আছে?<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">বোন নেই</option>
                                                                    <option value="2">১</option>
                                                                    <option value="3">২</option>
                                                                    <option value="4">৩</option>
                                                                    <option value="5">৪</option>
                                                                    <option value="6">৫</option>
                                                                    <option value="7">৬</option>
                                                                    <option value="8">৭</option>
                                                                    <option value="9">৮</option>
                                                                    <option value="10">৯</option>
                                                                    <option value="11">১০</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>বোনদের তথ্য<span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                                <p>
                                                                    * শিক্ষাগত যোগ্যতা, বৈবাহিক অবস্থা এবং পেশা
                                                                    লিখবেন। একাধিক ভাই থাকলে কমা দিয়ে নিচের
                                                                    লাইনে লিখবেন।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>চাচা মামাদের পেশা<span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>পারিবারিক অর্থনৈতিক অবস্থা<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">উচ্চবিত্ত</option>
                                                                    <option value="2">উচ্চ মধ্যবিত্ত</option>
                                                                    <option value="3">মধ্যবিত্ত</option>
                                                                    <option value="4">নিম্ন মধ্যবিত্ত</option>
                                                                    <option value="5">নিম্নবিত্ত</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>অর্থনৈতিক অবস্থার বর্ণনা<span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                                <p>
                                                                    বিস্তারিত উল্লেখ করবেন
                                                                    <b>যেমনঃ বসত বাড়ি (ভাড়া নাকি নিজস্ব), জমি বা
                                                                        পারিবারিক ব্যবসা থাকলে তার বিবরণ ইত্যাদি। </b>কুফু
                                                                    মেলাতে অনেকেই এটিকে গুরুত্বপূর্ণ মনে
                                                                    করে।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>পারিবারিক দ্বীনি পরিবেশ কেমন?<span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                                <p>
                                                                    আপনার পরিবারের সদস্যগণের দ্বীন পালন এবং
                                                                    মাহরাম নন-মাহরাম মেনে চলার বিষয়ে লিখবেন।
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tab Five -->
                                                <div class="tab-pane fade" id="tab5" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            ব্যক্তিগত তথ্য
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>ঘরের বাহিরে সাধারণত কি ধরণের পোষাক
                                                                    পরেন?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>
                                                                    * পাত্রীর ক্ষেত্রে বোরকা, হিজাব, নিকাব এবং
                                                                    হাত-পা মোজা পরেন কী না অবশ্যই উল্লেখ করবেন।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>সুন্নতি দাড়ি আছে কি না? কবে থেকে
                                                                    রেখেছেন?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>
                                                                    কত বছর যাবৎ দাড়ি রেখেছেন তা স্পষ্ট করে
                                                                    লিখুন।
                                                                    <b>আপনার যদি বায়োলজিক্যাল কারণে দাড়ি কম
                                                                        উঠে, তাও উল্লেখ করতে হবে।</b><br />
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>টাখনুর উপরে কাপড় পরেন?
                                                                    <span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>প্রতিদিন পাঁচ ওয়াক্ত নামাজ পড়েন কি? কবে
                                                                    থেকে পড়ছেন? <span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>
                                                                    "হ্যাঁ" অথবা "না" দিয়ে স্পষ্ট করে উত্তর
                                                                    লিখুন।
                                                                    <b>কত বছর যাবৎ পাঁচ ওয়াক্ত নামায পড়ছেন, তা
                                                                        অবশ্যই উল্লেখ করতে হবে।</b><br />
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>সাধারণত সপ্তাহে কত ওয়াক্ত নামায আপনার কাযা
                                                                    হয়?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>মাহরাম/নন-মাহরাম মেনে চলেন কি?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>শুদ্ধভাবে কুরআন তিলওয়াত করতে
                                                                    পারেন?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>কোন ফিকহ অনুসরণ করেন?<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">হানাফি</option>
                                                                    <option value="2">মালিকি</option>
                                                                    <option value="3">শাফিঈ</option>
                                                                    <option value="4">হাম্বলি</option>
                                                                    <option value="5">
                                                                        আহলে হাদীস / সালাফি
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>নাটক / সিনেমা / সিরিয়াল / গান এসব দেখেন বা
                                                                    শুনেন?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>দ্বীনের কোন বিশেষ মেহনতে যুক্ত
                                                                    আছেন?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>যেমনঃ তাবলীগ ইত্যাদি।</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>মাজার সম্পর্কে আপনার ধারণা বা বিশ্বাস
                                                                    কি?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আপনার পড়া হয়েছে এমন অন্তত ৩ টি ইসলামি বই এর
                                                                    নাম লিখুন<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আপনার পছন্দের অন্তত ৩ জন আলেমের নাম
                                                                    লিখুন<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আপনার ক্ষেত্রে প্রযোজ্য হয় এমন ক্যাটাগরি
                                                                    সিলেক্ট করুন। (অন্যথায় ঘরটি ফাঁকা
                                                                    রাখুন)<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>
                                                                    উদাহরণঃ আপনি নওমুসলিম হলে, নওমুসলিম
                                                                    ক্যাটাগরি সিলেক্ট করুন। আপনি তাবলীগের সাথে
                                                                    যুক্ত থাকলে, তাবলীগ ক্যাটাগরি সিলেক্ট করুন।
                                                                    এভাবে উল্লিখিত এক বা একাধিক ক্যাটাগরি
                                                                    সিলেক্ট করতে পারবেন।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>নিজের শখ, পছন্দ-অপছন্দ, রুচিবোধ, স্বপ্ন
                                                                    ইত্যাদি বিষয়ে লিখুন <span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                                <p>
                                                                    * যত বিস্তারিত লিখবেন, অপরপক্ষের জন্য আপনার
                                                                    সম্পর্কে জানা সহজ হবে এবং প্রস্তাব পাওয়ার
                                                                    সম্ভাবনা বৃদ্ধি পাবে।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>পাত্রের মোবাইল নাম্বার<span>*</span></label>
                                                                <input type="tel" name="name"
                                                                    placeholder="01700-000000" required />
                                                                <p>
                                                                    বায়োডাটা ভেরিফিকেশনের জন্য পাত্রের ব্যক্তিগত
                                                                    মোবাইল নাম্বার নেয়া হচ্ছে। এটি কর্তৃপক্ষ
                                                                    বাদে কারো কাছে প্রকাশ করা হবে না।
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tab Six -->
                                                <div class="tab-pane fade" id="tab6" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            পেশাগত তথ্য
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>পেশা<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">ইমাম</option>
                                                                    <option value="2">মাদ্রাসা শিক্ষক</option>
                                                                    <option value="3">শিক্ষক</option>
                                                                    <option value="4">ডাক্তার</option>
                                                                    <option value="5">ইঞ্জিনিয়ার</option>
                                                                    <option value="6">ব্যবসায়ী</option>
                                                                    <option value="7">সরকারী চাকুরী</option>
                                                                    <option value="8">বেসরকারী চাকুরী</option>
                                                                    <option value="9">ফ্রিল্যান্সার</option>
                                                                    <option value="10">শিক্ষার্থী</option>
                                                                    <option value="11">প্রবাসী</option>
                                                                    <option value="12">অন্যান্য</option>
                                                                    <option value="13">পেশা নেই</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>পেশার বিস্তারিত বিবরণ<span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                                <p>
                                                                    আপনার কর্মস্থল কোথায়, আপনি কোন প্রতিষ্ঠানে
                                                                    কাজ করছেন, আপনার উপার্জন হালাল কি না ইত্যাদি
                                                                    লিখতে পারেন।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>মাসিক আয়<span>*</span></label>
                                                                <input type="text" name="name"
                                                                    placeholder="২০,০০০ টাকা" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tab Seven -->
                                                <div class="tab-pane fade" id="tab7" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            বিবাহ সম্পর্কিত তথ্য
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>অভিভাবক আপনার বিয়েতে রাজি কি
                                                                    না?<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>বিয়ের পর স্ত্রীকে পর্দায় রাখতে পারবেন?
                                                                    <span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>বিয়ের পর স্ত্রীকে পড়াশোনা করতে দিতে চান?
                                                                    <span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>বিয়ের পর স্ত্রীকে চাকরী করতে দিতে চান?
                                                                    <span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>বিয়ের পর স্ত্রীকে কোথায় নিয়ে থাকবেন?
                                                                    <span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আপনি বা আপনার পরিবার পাত্রীপক্ষের কাছে কোনো
                                                                    উপহার আশা করবেন কি না? <span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>কেন বিয়ে করছেন? বিয়ে সম্পর্কে আপনার ধারণা
                                                                    কি?<span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tab Eight -->
                                                <div class="tab-pane fade" id="tab8" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            প্রত্যাশিত জীবনসঙ্গী
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group age-range range">
                                                                <label>বয়স<span>*</span></label>
                                                                <div class="age-filter">
                                                                    <div class="label-input">
                                                                        <input type="text" id="amount-one"
                                                                            name="age" placeholder="Add Your age" />
                                                                    </div>
                                                                    <div class="age-filter-inner">
                                                                        <div id="slider-range-one"
                                                                            class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                            <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                                                style="left: 0%; width: 100%"></div>
                                                                            <span
                                                                                class="ui-slider-handle ui-state-default ui-corner-all"
                                                                                tabindex="0"
                                                                                style="left: 0%"></span><span
                                                                                class="ui-slider-handle ui-state-default ui-corner-all"
                                                                                tabindex="0" style="left: 100%"></span>
                                                                        </div>
                                                                        <div class="age_slider_amount"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>গাত্রবর্ণ<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">কালো</option>
                                                                    <option value="2">শ্যামলা</option>
                                                                    <option value="3">উজ্জল শ্যামলা</option>
                                                                    <option value="4">ফর্সা</option>
                                                                    <option value="5">উজ্জল ফর্সা</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>উচ্চতা<span>*</span></label>
                                                                <input type="text" name="name"
                                                                    placeholder="৫'১ - ৫'১০" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>শিক্ষাগত যোগ্যতা<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>জেলা<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>
                                                                    <b>'যে কোনো জেলা'</b> লিখবেন না। পরিবারের
                                                                    সাথে পরামর্শ করে নির্দিষ্ট জেলাগুলো উল্লেখ
                                                                    করুন।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>বৈবাহিক অবস্থা<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">অবিবাহিত</option>
                                                                    <option value="2">ডিভোর্সড</option>
                                                                    <option value="3">বিধবা</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>পেশা<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>
                                                                    <b>'যে কোনো'</b> বা <b>'মানানসই'</b> বা
                                                                    <b>'যে কোনো হালাল পেশা'</b> এই বাক্যগুলো
                                                                    লিখা যাবে না।
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>অর্থনৈতিক অবস্থা<span>*</span></label>
                                                                <input type="text" name="name" required />
                                                                <p>
                                                                    <b>'যে কোনো'</b>না লিখে নির্দিষ্টভাবে
                                                                    লিখুন।<br />
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>জীবনসঙ্গীর যেসব বৈশিষ্ট্য বা গুণাবলী
                                                                    প্রত্যাশা করেন<span>*</span></label>
                                                                <textarea name="name" required></textarea>
                                                                <p>
                                                                    আপনার প্রত্যাশা বিস্তারিত লিখতে পারেন। কোন
                                                                    বিশেষ শর্ত থাকলে উল্লেখ করতে পারেন।
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tab Nine -->
                                                <div class="tab-pane fade" id="tab9" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            অঙ্গীকারনামা
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>OrdhekDeen.com ওয়েবসাইটে বায়োডাটা জমা
                                                                    দিচ্ছেন, তা আপনার অভিভাবক জানেন?<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">হ্যাঁ</option>
                                                                    <option value="2">না</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>আল্লাহ'র শপথ করে সাক্ষ্য দিন, যে তথ্যগুলো
                                                                    দিয়েছেন সব সত্য?<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">হ্যাঁ</option>
                                                                    <option value="2">না</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>কোনো মিথ্যা তথ্য প্রদান করলে দুনিয়াবী আইনগত
                                                                    এবং আখিরাতের দায়ভার OrdhekDeen.com কর্তৃপক্ষ
                                                                    নিবে না। আপনি কি সম্মত?<span>*</span></label>
                                                                <select class="hero-search-filter-select select2"
                                                                    name="state" required>
                                                                    <option value="0">নির্বাচন করুন</option>
                                                                    <option value="1">হ্যাঁ</option>
                                                                    <option value="2">না</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tab Ten -->
                                                <div class="tab-pane fade" id="tab10" role="tabpanel">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">যোগাযোগ</h2>
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
