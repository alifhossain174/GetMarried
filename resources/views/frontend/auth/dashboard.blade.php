@extends('frontend.auth.master')

@section('content')
    <!-- User Dashboard Area -->
    <section class="user-dashboard-area">
        <div class="user-d-container">
            <div class="user-d-row">
                <a href="#" class="sidebar-trigger trigger-fixed"></a>
                <!-- Dashboard Sidebar -->
                <div class="user-d-sidebar">
                    <a href="#" class="sidebar-trigger"></a>
                    <div class="user-d-sidebar-info">
                        <img src="{{url('frontend_assets')}}/assets/images/icons/user.svg" alt="#" />
                        <div class="user-d-bio-status-wrap">
                            <h3>বায়োডাটার অবস্থা</h3>
                            <div class="user-d-bio-status">
                                <span class="user-d-complete">Complete</span>
                                <!-- <span class="user-d-incomplete">Incomplete</span> -->
                            </div>
                        </div>
                        <div class="user-d-preview-biodata-link">
                            <a href="preview-biodata.html" class="theme-btn">আমার বায়োডাটা</a>
                        </div>
                    </div>
                    <nav class="user-d-nav">
                        <ul>
                            <li class="active">
                                <a href="{{url('user/dashboard')}}"><i class="fi fi-rs-apps"></i>ড্যাশবোর্ড</a>
                            </li>
                            <li>
                                <a href="edit-biodata.html"><i class="fi fi-rr-edit"></i>বায়োডাটা এডিট করুন</a>
                            </li>
                            <li>
                                <a href="short-list.html"><i class="fi fi-rs-heart"></i>পছন্দের তালিকা</a>
                            </li>
                            <li>
                                <a href="ignore-list.html"><i class="fi fi-br-ban"></i>অপছন্দের তালিকা</a>
                            </li>
                            <li>
                                <a href="checked-biodata.html"><i class="fi fi-rr-following"></i>বায়োডাটা দেখেছেন</a>
                            </li>
                            <li>
                                <a href="my-purchased.html"><i class="fi fi-rr-shopping-bag"></i>আমার ক্রয়সমূহ</a>
                            </li>
                            <li>
                                <a href="support-report.html"><i class="fi-rs-flag"></i>সাপোর্ট & রিপোর্ট</a>
                            </li>
                            <li>
                                <a href="{{url('user/settings')}}"><i class="fi fi-rr-settings"></i>সেটিংস</a>
                            </li>
                            <li>
                                <a href="{{url('user/login')}}"><i class="fi fi-rs-sign-out-alt"></i>লগআউট</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Dashboard Content -->
                <div class="user-d-content">
                    <div class="row">
                        <!-- Single Card One -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <a class="user-d-home-card card-1" href="short-list.html">
                                <div class="user-d-home-card-icon">
                                    <i class="fi fi-rs-heart"></i>
                                </div>
                                <div class="user-d-home-card-info">
                                    <h4><span class="counter">24</span></h4>
                                    <h5>পছন্দের তালিকা</h5>
                                    <p>আপনার পছন্দের তালিকাভুক্ত বায়োডাটা সমূহ।</p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Card Two -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <a class="user-d-home-card card-2" href="ignore-list.html">
                                <div class="user-d-home-card-icon">
                                    <i class="fi fi-br-ban"></i>
                                </div>
                                <div class="user-d-home-card-info">
                                    <h4><span class="counter">5</span></h4>
                                    <h5>অপছন্দের তালিকা</h5>
                                    <p>আপনার অপছন্দের তালিকাভুক্ত বায়োডাটা সমূহ।</p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Card Three -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <a class="user-d-home-card card-3" href="my-purchased.html">
                                <div class="user-d-home-card-icon">
                                    <i class="fi fi-rr-shopping-bag"></i>
                                </div>
                                <div class="user-d-home-card-info">
                                    <h4><span class="counter">0</span></h4>
                                    <h5>আমার ক্রয়সমূহ</h5>
                                    <p>আপনার ক্রয় সংক্রান্ত সমস্ত তথ্য।</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Single Card One -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="user-d-home-card-2">
                                <div class="user-d-home-card-2-content">
                                    <span class="counter">2</span>
                                    <h3>কানেকশন রয়েছে</h3>
                                    <p>
                                        প্রতিটি বায়োডাটার যোগাযোগের তথ্য দেখতে ১টি কানেকশন
                                        প্রয়োজন।
                                    </p>
                                    <div class="user-d-home-card-2-content-btn">
                                        <a href="connection.html" class="theme-btn secondary">কানেকশন কিনুন</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Card One -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="user-d-home-card-2">
                                <div class="user-d-home-card-2-content">
                                    <span class="counter">100</span>
                                    <h3>বায়োডাটা ভিজিট সংখ্যা</h3>
                                    <p>আপনার বায়োডাটা যতবার ভিজিট করা হয়েছে।</p>
                                    <div class="user-d-visited-graph">
                                        <div class="visited-graph-item">
                                            <label>শেষ ৩০ দিন</label>
                                            <span>34</span>
                                        </div>
                                        <div class="visited-graph-item">
                                            <label>শেষ ৭ দিন</label>
                                            <span>29</span>
                                        </div>
                                        <div class="visited-graph-item">
                                            <label>আজকে</label>
                                            <span>37</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Card One -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="user-d-home-card-2">
                                <div class="user-d-home-card-2-content">
                                    <span class="counter">4</span>
                                    <h3>আপনার বায়োডাটা পছন্দের তালিকাভুক্ত হয়েছে</h3>
                                    <p>এত জন আপনার বায়োডাটা পছন্দের তালিকায় রেখেছেন।</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User Dashboard Area -->
@endsection
