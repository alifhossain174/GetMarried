<!DOCTYPE html>
<html lang="en">

@php
    $logoFavicon = App\Models\LogoFavicon::where('id', 1)->first();
@endphp

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="School - Getup Ltd." name="description" />
    <meta content="Getup" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    @if ($logoFavicon->favicon && file_exists(public_path($logoFavicon->favicon)))
        <link rel="shortcut icon" href="{{ url($logoFavicon->favicon) }}" />
    @else
        <link rel="shortcut icon" href="{{ url('frontend_assets') }}/images/favicon.svg" />
    @endif

    <link href="{{ url('backend_assets') }}/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ url('backend_assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="{{ url('backend_assets') }}/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{ url('backend_assets') }}/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />
    <link href="{{ url('backend_assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend_assets') }}/css/toastr.min.css" rel="stylesheet" type="text/css" />

    <style>
        .btn-sm {
            padding: .20rem .5rem !important;
        }

        .select2-container {
            z-index: 9999;
        }

        /* css for dashboard customization */
        .left-side-menu {
            /* background-color: #1A507B !important; */
            background-color: #093659 !important;
        }

        #sidebar-menu>ul>li>a {
            color: whitesmoke !important;
            transition: all .1s linear;
        }

        #sidebar-menu>ul>li>a:hover {
            color: goldenrod !important;
        }

        .nav-second-level li a {
            color: #ccc !important;
            padding: 6px 25px !important;
            transition: all .1s linear;
        }

        .nav-second-level li a:hover {
            color: goldenrod !important;
        }

        #sidebar-menu>ul>li>a.active {
            color: goldenrod !important;
            text-shadow: 1px 1px 2px black;
        }

        ul.nav-second-level li.menuitem-active a {
            color: goldenrod !important;
            text-shadow: 1px 1px 2px black;
        }

        #sidebar-menu .menu-title {
            color: aqua !important;
        }

        #side-menu hr {
            color: #c0c6d352
        }

        #sidebar-menu .menu-title::before {
            background: #c9ced96b;
        }

        /* css for dashboard customization */


        /* datatable css start*/
        tfoot {
            display: table-header-group !important;
        }

        .dataTables_wrapper .dataTables_length select {
            padding: 1px 5px !important;
        }

        .dataTables_wrapper .dataTables_filter input {
            padding: 2px 5px !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 3px 8px !important;
            border-radius: 4px !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: rgb(207, 207, 207) !important;
            color: white !important;
            border: 1px solid gray !important;
        }

        .dataTables_wrapper .dataTables_paginate ul.pagination li.active {
            background: #5369f8 !important;
            color: white !important;
            border: 1px solid #5369f8 !important;
        }

        .dataTables_wrapper .dataTables_paginate ul.pagination li.active a {
            color: white;
        }

        #DataTables_Table_0_filter {
            margin-bottom: 5px;
        }

        /* datatable css end*/
    </style>

    @yield('header_css')
    @yield('header_js')
</head>

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="dropdown d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ url('/') }}" target="_blank"
                            style="min-width: 32px; display: block; line-height: 30px; margin-top: 20px;border-radius: 4px; background: #06B8AC; color: white; font-size: 13px; font-weight: 500;">
                            <i class="bi bi-cursor" style="margin-right: 2px; font-size: 14px;"></i> Visit Site
                        </a>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="fullscreen" href="#">
                            <i data-feather="maximize"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ url('backend_assets') }}/images/users/avatar-1.gif" alt="user-image"
                                class="rounded-circle">
                            <span class="pro-user-name ms-1">
                                {{ Auth::user()->name }} <i class="uil uil-angle-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <a href="{{ url('change/password/page') }}" class="dropdown-item notify-item">
                                <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Change Password</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ url('/home') }}" class="logo logo-dark">
                        <span class="logo-sm text-left">
                            <span class="logo-lg-text-dark">
                                @if ($logoFavicon->favicon && file_exists(public_path($logoFavicon->favicon)))
                                    <img src="{{ url($logoFavicon->favicon) }}" style="width: 90%; max-height: 60px;" alt="Logo" />
                                @endif
                            </span>
                        </span>
                        <span class="logo-lg text-center">
                            @if ($logoFavicon->logo && file_exists(public_path($logoFavicon->logo)))
                                <img src="{{ url($logoFavicon->logo) }}" style="width: 90%; max-height: 40px;" alt="Logo" />
                            @else
                                <img src="{{ url('backend_assets') }}/images/logo.svg" style="width: 90%; max-height: 40px;" alt="Logo" />
                            @endif
                        </span>
                    </a>

                    <a href="{{ url('/home') }}" class="logo logo-light">
                        <span class="logo-sm">
                            {{-- <img src="{{url('backend_assets')}}/images/logo-sm.png" alt="" height="24"> --}}
                        </span>
                        <span class="logo-lg">
                            {{-- <img src="{{url('backend_assets')}}/images/logo-light.png" alt="" height="24"> --}}
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile">
                            <i data-feather="menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                            data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ url('backend_assets') }}/images/users/avatar-1.gif" alt="user-img"
                        title="Mat Helme" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                            data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu user-pro-dropdown">
                            <a href="pages-profile.html" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                            </a>
                            <a href="{{ url('change/password/page') }}" class="dropdown-item notify-item">
                                <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Change Password</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted">Admin Head</p>
                </div>


                {{-- @include('backend.sidebar') --}}
                @if (Auth::user()->user_type == 1)
                    @include('backend.sidebar')
                @else
                    @include('backend.sidebarWithAssignedMenu')
                @endif


                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy;
                            Get Married
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                Developed By <a href="https://getup.com.bd/">Getup Ltd.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Vendor js -->
    <script src="{{ url('backend_assets') }}/js/vendor.min.js"></script>
    <script src="{{ url('backend_assets') }}/libs/moment/min/moment.min.js"></script>
    <script src="{{ url('backend_assets') }}/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{ url('backend_assets') }}/js/app.min.js"></script>

    <script>
        const handleScroll = () => {
            var Sidebar = document.querySelector('.simplebar-content-wrapper')
            var scrollPosition = Sidebar.scrollTop;
            localStorage.setItem('scroll_nav', scrollPosition);
        }
        document.addEventListener('DOMContentLoaded', function() {
            var Sidebar = document.querySelector('.simplebar-content-wrapper');
            const Location = window.location.pathname;
            Sidebar.onscroll = handleScroll;

            let scroll_nav = localStorage.getItem('scroll_nav');
            if (scroll_nav && Location != '/dashboard') {
                Sidebar.scrollTop = scroll_nav;
            } else {
                Sidebar.scrollTop = 0;
                localStorage.setItem('scroll_nav', 0);
            }
        });
    </script>

    @yield('footer_js')

    <script src="{{ url('backend_assets') }}/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

</body>

</html>
