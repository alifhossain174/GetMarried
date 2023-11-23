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
                                <h3 class="user-d-breadcrumbs-title">রিপোর্ট কনভারসেশন</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-6 col-md-10 col-12">
                            <div class="report-conversation-widget">
                                <div class="report-conversation-top">
                                    <h3 class="report-conversation-title">
                                        রিপোর্ট আইডি: <span>od-51561-65362671aa356</span>
                                    </h3>
                                    <div class="report-bottom-head">
                                        <p>রিপোর্ট স্ট্যাটাস: <span>OPEN</span></p>
                                        <p>তারিখ: <span>23/10/2023</span></p>
                                    </div>
                                    <form class="report-conversation-form" action="#" method="post">
                                        <div class="report-form-group-cotainer">
                                            <div class="form-group">
                                                <textarea placeholder="এখানে লিখুন.." name="complain" required></textarea>
                                            </div>
                                        </div>
                                        <div class="create-report-form-bottom">
                                            <div class="create-report-form-attachment">
                                                <div class="form-group">
                                                    <label>অ্যাটাচমেন্ট</label>
                                                    <div class="complain_attachment-file">
                                                        <input type="file" name="complain_attachment" multiple />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="create-report-form-btn">
                                                <button type="submit" class="theme-btn secondary">
                                                    পাঠান
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="report-conversation-chat">
                                    <ul>
                                        <li class="report-conversation-client">
                                            <div class="info">
                                                <div class="avatar">
                                                    <img src="{{url('frontend_assets')}}/assets/images/icons/man.svg" alt="Avatar" />
                                                </div>
                                                <div class="details">
                                                    <h3>Jahedul Islam</h3>
                                                    <p>2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p>
                                                    amar report ti bhule giyece. ata grohon korar dorkar
                                                    nei.
                                                </p>
                                            </div>
                                            <div class="image">
                                                <a href="{{url('frontend_assets')}}/assets/images/app-download-img.png" class="single-img"
                                                    target="_blank">
                                                    <img src="{{url('frontend_assets')}}/assets/images/app-download-img.png" alt="#" />
                                                </a>
                                                <a href="{{url('frontend_assets')}}/assets/images/app-download-img.png" class="single-img"
                                                    target="_blank">
                                                    <img src="{{url('frontend_assets')}}/assets/images/app-download-img.png" alt="#" />
                                                </a>
                                            </div>
                                        </li>
                                        <li class="report-conversation-admin">
                                            <div class="info">
                                                <div class="avatar">
                                                    <img src="{{url('frontend_assets')}}/assets/images/icons/man.svg" alt="Male-Avatar" />
                                                </div>
                                                <div class="details">
                                                    <h3>Admin</h3>
                                                    <p>2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p>
                                                    আসসালামু আলাইকুম, আপনার অভিযোগটি গ্রহণ করা হয়েছে।
                                                    অভিযোগটি দ্রুতই সমাধান করা হবে, ইন শা আল্লা
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
