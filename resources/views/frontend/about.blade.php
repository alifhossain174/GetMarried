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
                        <h3 class="breadcrumbs-title">আমাদের সম্পর্কে</h3>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{url('/')}}">হোম</a><i class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active"><a href="{{url('/about')}}">আমাদের সম্পর্কে</a></li>
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
                        <div class="about-us-single-img">
                            <img src="{{url('frontend_assets')}}/assets/images/about/img-1.jpg" alt="" />
                        </div>
                        <!-- Single Slider -->
                        <div class="about-us-single-img">
                            <img src="{{url('frontend_assets')}}/assets/images/about/img-2.jpg" alt="" />
                        </div>
                        <!-- Single Slider -->
                        <div class="about-us-single-img">
                            <img src="{{url('frontend_assets')}}/assets/images/about/img-3.jpg" alt="" />
                        </div>
                    </div>
                    <div class="about-us-content">
                        <h4>আমাদের সম্পর্কে জানুন</h4>
                        <p>
                            নিশ্চই সকল প্রশংসা আল্লাহর। আমরা তার কাছে আমাদের অন্তরের অনিষ্ট
                            ও আমাদের কাজের অনিষ্ট থেকে আশ্রয় প্রার্থনা করি। দুরুদ ও সালাম
                            বর্ষিত হোক রাসুল (ﷺ) এর উপর।<br /><br />
                            বিয়ে মহান আল্লাহপ্রদত্ত বিশেষ এক নিয়ামত ও রাসুল (ﷺ) এর একটি
                            গুরুত্বপূর্ণ সুন্নাহ্। কুরআন ও হাদিসে বিয়েকে পবিত্রতার মাধ্যম,
                            দ্বীনের অর্ধেক ও আর্থিক সচ্ছলতার উপায় হিসেবে উল্লেখ করেছেন।
                            অপরদিকে পাশ্চাত্যবাদের তথাকথিত নারী-পুরুষের সমতাবিধানের এই
                            অসুস্থ প্রতিযোগিতার পিছনে ছুটতে গিয়ে সমাজে নৈতিক অবক্ষয় ঘটছে।
                            শিক্ষা, চাকরিতে, বিয়েতে পাশ্চাত্যের সভ্যতাবিবর্জিত অপসংস্কৃতির
                            অনুপ্রবেশের মূল কারন ইসলামি শার'ঈ বিধান অনুযায়ী না চলা ও
                            পরিপূর্ণ দ্বীনি শিক্ষার অভাব। এর ফলশ্রুতিতে বিয়ে হয়েছে কঠিন আর
                            যিনা-ব্যভিচার, পরকীয়া, ধর্ষন, আত্মহত্যাসহ বিভিন্ন অবক্ষয়ে সমাজ
                            ভারাক্রান্ত।<br /><br />অন্যদিকে যারা এই ভয়াবহ ফিতনার যুগে
                            স্রোতের প্রতিকূলে গিয়ে সুন্নাহ আঁকড়ে ধরার জন্য পরিবার ও সামাজিক
                            তথাকথিত রীতিনীতির বিরুদ্ধে সংগ্রাম করছেন তাদের জন্য দ্বীনদার
                            জীবনসঙ্গী খুঁজে পাওয়াটা যেন অনেক কঠিন হয়ে গিয়েছে। এ সমস্যা
                            সমাধানের জন্যই আমরা ক'জন গুনাহগার বান্দা এমন একটা বাংলাদেশি
                            ম্যাট্রিমনি প্লাটফর্মের স্বপ্ন দেখেছিলাম। ফলশ্রুতিতে ১ জানুয়ারি
                            ২০২১ সাদিকরুন ডটকম যাত্রা শুরু হয়। আল্লাহ'র বিশেষ বরকতে
                            সাদিকরুনের মাধ্যমে খোঁজ পেয়ে ইতিমধ্যে শত শত বিবাহ সম্পন্ন হয়েছে,
                            আলহামদুলিল্লাহ। <br /><br />আমাদের লক্ষ্য হচ্ছে, এ ওয়েবসাইটের
                            মাধ্যমে বিয়ের জন্য শারীয়াসম্মত ইসলামিক ম্যাট্রিমনি প্লাটফর্ম গড়ে
                            তোলা যার মাধ্যমে দ্বীনদার পাত্রপাত্রী সন্ধান সহজ করা। জাহেলী
                            সমাজের সকল অপসংস্কৃতি ভেঙ্গে যিনা-ব্যভিচার বন্ধ করে বিবাহে
                            উৎসাহিত করা, পাত্রীর পরিবারের জন্য চিরঅভিশাপ- যৌতুকের বিরুদ্ধে
                            সবাইকে সচেতন করা এবং নগদ মোহরানায় সুন্নাহ সম্মত বিয়েকে প্রচলিত
                            করা।<br /><br />পরিকল্পনা রয়েছে যা নিয়ে আমরা প্রতিনিয়ত গবেষণা
                            করছি। সকল মুসলিম ভাইবোনদের কাছে এ খেদমত দক্ষতার সাথে অতি শীঘ্রই
                            পৌঁছে দিতে চেষ্টা চালিয়ে যাচ্ছি। আল্লাহ আমাদের নিয়্যত পবিত্র
                            রাখুন, আমাদের সকল নেককাজ সহজ করুন এবং বারকাহ দান করুন। আমিন।
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Area -->
@endsection
