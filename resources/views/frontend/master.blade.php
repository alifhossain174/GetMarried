<!DOCTYPE html>
<html class="no-js" lang="ZXX">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="Site keywords here" />
    <meta name="description" content="Matrimonial Website HTML" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Site Title -->
    <title>Matrimonial Website HTML</title>
    <link rel="icon" href="{{url('frontend_assets')}}/assets/images/favicon.svg" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/assets/plugins/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/assets/plugins/css/animate.min.css" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/assets/plugins/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/assets/plugins/css/maginific-popup.min.css" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/assets/plugins/css/fancybox.css" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/assets/plugins/css/select2.css" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/assets/plugins/css/icofont.css" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/assets/plugins/css/uicons.css" />
    <link rel="stylesheet" href="{{url('frontend_assets')}}/style.css" />

    <style>
        .no_sticky{
            position: relative !important;
        }
    </style>
</head>

<body>

    <!-- Back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top end -->

    <!-- Mobile Menu Modal -->
    <div class="modal mobile-menu-modal offcanvas-modal fade" id="offcanvas-modal">
        <div class="modal-dialog offcanvas-dialog">
            <div class="modal-content">
                <div class="modal-header offcanvas-header">
                    <!-- offcanvas-logo-start -->
                    <div class="offcanvas-logo">
                        <a href="{{url('/')}}"><img src="{{url('frontend_assets')}}/assets/images/logo.svg" alt="#" /></a>
                    </div>
                    <!-- offcanvas-logo-end -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fi fi-ss-cross"></i>
                    </button>
                </div>
                <div class="mobile-menu-modal-main-body">
                    <!-- offcanvas-menu start -->
                    <nav id="offcanvas-menu" class="navigation offcanvas-menu">
                        <ul id="nav mobile-nav" class="list-none offcanvas-men-list">
                            <li class="active">
                                <a href="{{url('/')}}">হোম</a>
                            </li>
                            <li>
                                <a href="{{url('/about')}}">আমাদের সম্পর্কে</a>
                            </li>
                            <li>
                                <a href="{{url('/faq')}}">জিজ্ঞাসা </a>
                            </li>
                            <li>
                                <a href="{{url('/direction')}}">নির্দেশনা </a>
                            </li>
                            <li>
                                <a href="{{url('/contact')}}">যোগাযোগ </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- offcanvas-menu end -->
                    <div class="mobile-menu-modal-main-bottom">
                        <!-- offcanvas-menu end -->
                        <div class="mobile-menu-modal-bottom header-menu-btn">
                            <a href="{{url('/user-login')}}" class="theme-btn">লগইন</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu Modal -->

    <!-- Header Area -->
    <header id="active-sticky" class="header-area @if(request()->route()->uri == 'user-login' || request()->route()->uri == 'user-register') no_sticky @endif">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-inner">
                        <div class="header-logo">
                            <a href="{{url('/')}}"><img src="{{url('frontend_assets')}}/assets/images/logo.svg" alt="#" /></a>
                        </div>
                        <div class="header-menu">
                            <nav class="navigation">
                                <ul class="header-menu-list">
                                    <li class="active">
                                        <a href="{{url('/')}}">হোম</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/about')}}">আমাদের সম্পর্কে</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/faq')}}">জিজ্ঞাসা</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/direction')}}">নির্দেশনা</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/contact')}}">যোগাযোগ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <!-- Language Change Switch -->
                            <div class="header-languague-switch">
                                <div class="language-change-toggle theme-switch" onclick="languageToggle()"></div>
                            </div>
                            <div class="header-login">
                                <a href="{{url('/user-login')}}" class="theme-btn">লগইন</a>
                            </div>
                            <!-- Mobile Menu Button -->
                            <button type="button" class="mobile-menu-offcanvas-toggler" data-bs-toggle="modal"
                                data-bs-target="#offcanvas-modal">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                            <!-- End Mobile Menu Button -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Area -->


    @yield('content')


    <!-- Footer Area -->
    <footer class="footer-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-xl-7 col-12">
                    <div class="footer-menu">
                        <ul class="footer-menu-list">
                            <li><a href="{{url('/about')}}">আমাদের সম্পর্কে</a></li>
                            <li><a href="{{url('/faq')}}">জিজ্ঞাসা</a></li>
                            <li><a href="{{url('/direction')}}">নির্দেশনা</a></li>
                            <li><a href="{{url('/contact')}}">যোগাযোগ</a></li>
                        </ul>
                    </div>
                    <p class="footer-copyright-text">
                        © 2023 All Rights Reserved | Design & Developed by
                        <a href="#" target="_blank">GetUp</a>
                        | Powered by <a href="#" target="_blank">Shadikorun</a>
                    </p>
                </div>
                <div class="col-lg-12 col-xl-5 col-12">
                    <div class="footer-menu style-2">
                        <ul class="footer-menu-list">
                            <li><a href="privacy-policy.html">Privacy Notice</a></li>
                            <li><a href="terms-condition.html">Terms & Conditions</a></li>
                            <li><a href="refund-policy.html">Refund Policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-social">
                        <ul class="footer-social-list">
                            <li>
                                <a target="_blank" href="#">
                                    <i class="icofont-facebook"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <i class="icofont-instagram"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <i class="icofont-twitter"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <i class="icofont-youtube-play"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-sslcommerze-img">
                        <img src="{{url('frontend_assets')}}/assets/images/sslcommraze-img.svg" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <script src="{{url('frontend_assets')}}/assets/plugins/js/jquery.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/jquery-migrate.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/modernizer.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/bootstrap.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/owl.carousel.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/magnific-popup.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/backToTop.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/wow.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/jquery-fancybox.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/jquery.counterup.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/waypoints.min.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/select2.js"></script>
    <script src="{{url('frontend_assets')}}/assets/plugins/js/active.js"></script>
</body>

</html>
