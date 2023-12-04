@extends('frontend.master')

@section('content')

    <!-- User Dashboard Area -->
    <section class="user-dashboard-area">
        <div class="user-d-container">
            <div class="user-d-row">
                <a href="#" class="sidebar-trigger trigger-fixed"></a>

                @include('frontend.auth.sideMenu')

                <!-- Dashboard Content -->
                <div class="user-d-content">
                    <div class="row">
                        <!-- Single Card One -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <a class="user-d-home-card card-1" href="{{url('user/short/list')}}">
                                <div class="user-d-home-card-icon">
                                    <i class="fi fi-rs-heart"></i>
                                </div>
                                <div class="user-d-home-card-info">
                                    <h4><span class="counter">24</span></h4>
                                    <h5>{{__('message.user_dashboard_liked_list')}}</h5>
                                    <p>{{__('message.user_dashboard_liked_list_msg')}}</p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Card Two -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <a class="user-d-home-card card-2" href="{{url('user/ignore/list')}}">
                                <div class="user-d-home-card-icon">
                                    <i class="fi fi-br-ban"></i>
                                </div>
                                <div class="user-d-home-card-info">
                                    <h4><span class="counter">5</span></h4>
                                    <h5>{{__('message.user_dashboard_disliked_list')}}</h5>
                                    <p>{{__('message.user_dashboard_disliked_list_msg')}}</p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Card Three -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <a class="user-d-home-card card-3" href="{{url('user/my/purchased')}}">
                                <div class="user-d-home-card-icon">
                                    <i class="fi fi-rr-shopping-bag"></i>
                                </div>
                                <div class="user-d-home-card-info">
                                    <h4><span class="counter">0</span></h4>
                                    <h5>{{__('message.user_dashboard_my_purchases')}}</h5>
                                    <p>{{__('message.user_dashboard_my_purchases_msg')}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Single Card One -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="user-d-home-card-2">
                                <div class="user-d-home-card-2-content">
                                    <span class="counter">{{Auth::user()->connections}}</span>
                                    <h3>{{__('message.user_dashboard_remaining_connection')}}</h3>
                                    <p>
                                        {{__('message.user_dashboard_remaining_connection_msg')}}
                                    </p>
                                    <div class="user-d-home-card-2-content-btn">
                                        <a href="{{url('user/connection')}}" class="theme-btn secondary">{{__('message.user_dashboard_remaining_connection_btn')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Card One -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="user-d-home-card-2">
                                <div class="user-d-home-card-2-content">
                                    <span class="counter">100</span>
                                    <h3>{{__('message.user_dashboard_biodata_visited')}}</h3>
                                    <p>{{__('message.user_dashboard_biodata_visited_msg')}}</p>
                                    <div class="user-d-visited-graph">
                                        <div class="visited-graph-item">
                                            <label>{{__('message.user_dashboard_biodata_visited_last_30')}}</label>
                                            <span>34</span>
                                        </div>
                                        <div class="visited-graph-item">
                                            <label>{{__('message.user_dashboard_biodata_visited_last_7')}}</label>
                                            <span>29</span>
                                        </div>
                                        <div class="visited-graph-item">
                                            <label>{{__('message.user_dashboard_biodata_visited_today')}}</label>
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
                                    <h3>{{__('message.user_dashboard_biodata_liked')}}</h3>
                                    <p>{{__('message.user_dashboard_biodata_liked_msg')}}</p>
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
