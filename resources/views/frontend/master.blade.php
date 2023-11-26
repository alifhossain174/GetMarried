<!DOCTYPE html>
<html class="no-js" lang="en">

@php
    $logoFavicon = App\Models\LogoFavicon::where('id', 1)->first();
    $websiteThemeColor = App\Models\WesbiteThemeColor::where('id', 1)->first();
    $socialMediaLinks = App\Models\SocialMediaLinks::where('id', 1)->first();
    $customCssJs = App\Models\CustomCssJs::where('id', 1)->first();
@endphp

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @stack('site-seo')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Site Title -->
    <title>{{ $logoFavicon->tab_title }}</title>
    @if ($logoFavicon->favicon && file_exists(public_path($logoFavicon->favicon)))
        <link rel="icon" href="{{ url($logoFavicon->favicon) }}" />
    @else
        <link rel="icon" href="{{ url('frontend_assets') }}/assets/images/favicon.svg" />
    @endif

    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/animate.min.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/maginific-popup.min.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/fancybox.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/select2.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/icofont.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/assets/plugins/css/uicons.css" />
    <link rel="stylesheet" href="{{ url('backend_assets') }}/css/toastr.min.css" />
    <link rel="stylesheet" href="{{ url('frontend_assets') }}/style.css" />

    @yield('header_css')

    <style>
        .no_sticky {
            position: relative !important;
        }

        /* Language Chaneg Toggle Switch */
        .header-languague-switch {
            position: relative;
        }

        .language-change-toggle {
            width: 64px;
            height: 32px;
            background: var(--primary-color);
            border-radius: 16px;
            cursor: pointer;
        }

        .language-change-toggle::before {
            position: absolute;
            content: "BN";
            font-size: 12px;
            color: var(--hints-color);
            right: 0;
            width: 26px;
            height: 26px;
            background: var(--white-color);
            border-radius: 100%;
            line-height: 26px;
            font-weight: 600;
            text-align: center;
            top: 3px;
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
            -webkit-transform: translateX(-3px);
            transform: translateX(-3px);
        }

        .language-change .language-change-toggle {
            background: var(--secondary-color);
        }

        .language-change .language-change-toggle::before {
            content: "EN";
            -webkit-transform: translateX(-27px);
            transform: translateX(-34px);
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        /* dynamically setting up color variable */
        :root {
            --primary-color: {{ $websiteThemeColor->primary_color }};
            --secondary-color: {{ $websiteThemeColor->secondary_color }};
            --tertiary-color: {{ $websiteThemeColor->tertiary_color }};
            --white-color: {{ $websiteThemeColor->white_color_1 }};
            --white-color-2: {{ $websiteThemeColor->white_color_2 }};
            --title-color: {{ $websiteThemeColor->title_color }};
            --paragraph-color: {{ $websiteThemeColor->paragraph_color }};
            --hints-color: {{ $websiteThemeColor->hints_color }};
            --border-color: {{ $websiteThemeColor->border_color }};
        }

        {!! $customCssJs->custom_css !!}
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
                        <a href="{{ url('/') }}"><img src="{{ url('frontend_assets') }}/assets/images/logo.svg"
                                alt="#" /></a>
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
                                <a href="{{ url('/') }}">{{ __('label.menu_home') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/about') }}">{{ __('label.menu_about_us') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/faq') }}">{{ __('label.menu_question') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/direction') }}">{{ __('label.menu_instructions') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/contact') }}">{{ __('label.menu_contact_us') }}</a>
                            </li>
                        </ul>
                    </nav>

                    <!-- offcanvas-menu end -->
                    <div class="mobile-menu-modal-main-bottom">
                        <!-- offcanvas-menu end -->
                        <div class="mobile-menu-modal-bottom header-menu-btn">
                            <a href="{{ url('/user/login') }}" class="theme-btn">{{ __('label.menu_login') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu Modal -->


    <!-- Header Area -->
    <header id="active-sticky" class="header-area @if (str_contains(request()->route()->uri, 'user') || str_contains(request()->route()->uri, 'email/verify')) no_sticky @endif">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-inner">
                        <div class="header-logo">
                            @if ($logoFavicon && file_exists(public_path($logoFavicon->logo)))
                                <a href="{{ url('/') }}"><img src="{{ url($logoFavicon->logo) }}"
                                        alt="Image" /></a>
                            @else
                                <a href="{{ url('/') }}"><img
                                        src="{{ url('frontend_assets') }}/assets/images/logo.svg" alt="#" /></a>
                            @endif
                        </div>
                        <div class="header-menu">
                            <nav class="navigation">
                                <ul class="header-menu-list">
                                    <li @if (Request::path() == '/') class="active" @endif>
                                        <a href="{{ url('/') }}">{{ __('label.menu_home') }}</a>
                                    </li>
                                    <li @if (Request::path() == 'about') class="active" @endif>
                                        <a href="{{ url('/about') }}">{{ __('label.menu_about_us') }}</a>
                                    </li>
                                    <li @if (Request::path() == 'faq') class="active" @endif>
                                        <a href="{{ url('/faq') }}">{{ __('label.menu_question') }}</a>
                                    </li>
                                    <li @if (Request::path() == 'direction') class="active" @endif>
                                        <a href="{{ url('/direction') }}">{{ __('label.menu_instructions') }}</a>
                                    </li>
                                    <li @if (Request::path() == 'contact') class="active" @endif>
                                        <a href="{{ url('/contact') }}">{{ __('label.menu_contact_us') }}</a>
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
                                @guest
                                <a href="{{ url('/user/login') }}" class="theme-btn">{{ __('label.menu_login') }}</a>
                                @endguest

                                @auth
                                    @if(Auth::user()->user_type == 3)
                                        <a href="{{ url('/user/dashboard') }}" class="theme-btn">{{ __('label.menu_user_dashboard') }}</a>
                                    @else
                                        <a href="{{ url('/home') }}" class="theme-btn">{{ __('label.menu_user_dashboard') }}</a>
                                    @endif
                                @endauth
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
                            <li><a href="{{ url('/about') }}">{{ __('label.menu_about_us') }}</a></li>
                            <li><a href="{{ url('/faq') }}">{{ __('label.menu_question') }}</a></li>
                            <li><a href="{{ url('/direction') }}">{{ __('label.menu_instructions') }}</a></li>
                            <li><a href="{{ url('/contact') }}">{{ __('label.menu_contact_us') }}</a></li>
                        </ul>
                    </div>
                    <p class="footer-copyright-text">
                        © {{ date('Y') }} All Rights Reserved | Design & Developed by
                        <a href="https://getup.com.bd" target="_blank">GetUp</a>
                        | Powered by <a href="{{ url('/') }}"
                            target="_blank">{{ $logoFavicon ? $logoFavicon->tab_title : '' }}</a>
                    </p>
                </div>
                <div class="col-lg-12 col-xl-5 col-12">
                    <div class="footer-menu style-2">
                        <ul class="footer-menu-list">
                            <li><a href="{{ url('privacy-policy') }}">{{ __('label.menu_privacy_policy') }}</a></li>
                            <li><a href="{{ url('terms-condition') }}">{{ __('label.menu_terms_condition') }}</a>
                            </li>
                            <li><a href="{{ url('refund-policy') }}">{{ __('label.menu_refund_policy') }}</a></li>
                        </ul>
                    </div>
                    <div class="footer-social">
                        <ul class="footer-social-list">
                            @if ($socialMediaLinks->facebook)
                                <li>
                                    <a href="{{ $socialMediaLinks->facebook }}" target="_blank">
                                        <i class="icofont-facebook"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($socialMediaLinks->messenger)
                                <li>
                                    <a href="{{ $socialMediaLinks->messenger }}" target="_blank">
                                        <i class="icofont-facebook-messenger"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($socialMediaLinks->twitter)
                                <li>
                                    <a href="{{ $socialMediaLinks->twitter }}" target="_blank">
                                        <i class="icofont-twitter"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($socialMediaLinks->instagram)
                                <li>
                                    <a href="{{ $socialMediaLinks->instagram }}" target="_blank">
                                        <i class="icofont-instagram"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($socialMediaLinks->linkedin)
                                <li>
                                    <a href="{{ $socialMediaLinks->linkedin }}" target="_blank">
                                        <i class="icofont-linkedin"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($socialMediaLinks->whatsapp)
                                <li>
                                    <a href="{{ $socialMediaLinks->whatsapp }}" target="_blank">
                                        <i class="icofont-brand-whatsapp"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($socialMediaLinks->telegram)
                                <li>
                                    <a href="{{ $socialMediaLinks->telegram }}" target="_blank">
                                        <i class="icofont-telegram"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($socialMediaLinks->youtube)
                                <li>
                                    <a href="{{ $socialMediaLinks->youtube }}" target="_blank">
                                        <i class="icofont-youtube-play"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            @if ($logoFavicon->payment_banner && file_exists(public_path($logoFavicon->payment_banner)))
                <div class="row">
                    <div class="col-12">
                        <div class="footer-sslcommerze-img">
                            <img src="{{ url($logoFavicon->payment_banner) }}" alt="Payment Banner" />
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </footer>
    <!-- End Footer Area -->

    <script src="{{ url('frontend_assets') }}/assets/plugins/js/jquery.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/jquery-ui.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/jquery-migrate.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/modernizer.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/bootstrap.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/owl.carousel.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/magnific-popup.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/backToTop.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/wow.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/jquery-fancybox.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/jquery.counterup.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/waypoints.min.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/select2.js"></script>
    <script src="{{ url('frontend_assets') }}/assets/plugins/js/active.js"></script>

    @if (App::currentLocale() == 'en')
        <script>
            let element = document.body;
            element.classList.toggle("language-change");

            let systemChange = localStorage.getItem("systemChange");
            if (systemChange && systemChange === "language-change") {
                localStorage.setItem("systemChange", "");
            } else {
                localStorage.setItem("systemChange", "language-change");
            }
        </script>
    @endif

    <script>
        function languageToggle() {

            let element = document.body;
            element.classList.toggle("language-change");

            let systemChange = localStorage.getItem("systemChange");
            if (systemChange && systemChange === "language-change") {
                localStorage.setItem("systemChange", "");
            } else {
                localStorage.setItem("systemChange", "language-change");
            }

            $.ajax({
                type: "GET",
                url: "{{ url('change/lang') }}",
                success: function(data) {
                    console.log("Language Changed Successfully");
                    location.reload(true);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        }
    </script>

    @yield('footer_js')

    <script>
        {!! $customCssJs->custom_js !!}
    </script>

    <script src="{{ url('backend_assets') }}/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
