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
    <title>User Dashboard</title>

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
                        <a href="../index.html"><img src="{{url('frontend_assets')}}/assets/images/logo.svg" alt="#" /></a>
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
                            <li>
                                <a href="../index.html">হোম</a>
                            </li>
                            <li>
                                <a href="../about.html">আমাদের সম্পর্কে</a>
                            </li>
                            <li class="active">
                                <a href="../faq.html">জিজ্ঞাসা </a>
                            </li>
                            <li>
                                <a href="../direction.html">নির্দেশনা </a>
                            </li>
                            <li>
                                <a href="../contact.html">যোগাযোগ </a>
                            </li>
                            <!-- <li>
                  <a class="menu-arrow" href="#">Projects</a>
                  <ul class="sub-menu">
                    <li>
                      <a href="projects.html">Portfolio One</a>
                    </li>
                    <li>
                      <a href="projects-2.html">Portfolio Two</a>
                    </li>
                    <li>
                      <a href="project-details.html">Portfolio Details</a>
                    </li>
                  </ul>
                </li> -->
                        </ul>
                    </nav>
                    <!-- offcanvas-menu end -->
                    <div class="mobile-menu-modal-main-bottom">
                        <!-- offcanvas-menu end -->
                        <div class="mobile-menu-modal-bottom header-menu-btn">
                            <a href="../login.html" class="theme-btn">লগইন</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu Modal -->

    <!-- Header Area -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-inner">
                        <div class="header-logo">
                            <a href="../index.html"><img src="{{url('frontend_assets')}}/assets/images/logo.svg" alt="#" /></a>
                        </div>
                        <div class="header-menu">
                            <nav class="navigation">
                                <ul class="header-menu-list">
                                    <li>
                                        <a href="../index.html">হোম</a>
                                    </li>
                                    <li>
                                        <a href="../about.html">আমাদের সম্পর্কে</a>
                                    </li>
                                    <li>
                                        <a href="../faq.html">জিজ্ঞাসা</a>
                                    </li>
                                    <li>
                                        <a href="../direction.html">নির্দেশনা</a>
                                    </li>
                                    <li>
                                        <a href="../contact.html">যোগাযোগ</a>
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
                                <a href="../login.html" class="theme-btn">লগইন</a>
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
                                <a href="dashboard.html"><i class="fi fi-rs-apps"></i>ড্যাশবোর্ড</a>
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
                                <a href="setting.html"><i class="fi fi-rr-settings"></i>সেটিংস</a>
                            </li>
                            <li>
                                <a href="../login.html"><i class="fi fi-rs-sign-out-alt"></i>লগআউট</a>
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

    <!-- Footer Area -->
    <footer class="footer-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-xl-7 col-12">
                    <div class="footer-menu">
                        <ul class="footer-menu-list">
                            <li><a href="../about.html">আমাদের সম্পর্কে</a></li>
                            <li><a href="../faq.html">জিজ্ঞাসা</a></li>
                            <li><a href="../direction.html">নির্দেশনা</a></li>
                            <li><a href="../contact.html">যোগাযোগ</a></li>
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
                            <li><a href="../privacy-policy.html">Privacy Notice</a></li>
                            <li>
                                <a href="../terms-condition.html">Terms & Conditions</a>
                            </li>
                            <li><a href="../refund-policy.html">Refund Policy</a></li>
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
