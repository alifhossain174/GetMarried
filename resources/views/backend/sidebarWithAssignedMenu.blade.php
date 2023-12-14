<!-- Left Menu Start -->
<?php
    function checkAuth($routes){
        if(App\Models\UserRolePermission::where('user_id', Auth::user()->id)->where('route', 'like', '%'.$routes.'%')->exists()){
            return true;
        } else {
            return false;
        }
    }

    $softwareConfigMenu = App\Models\UserRolePermission::where('user_id', Auth::user()->id)
                                                    ->where('route', 'like', '%language/page%')
                                                    ->orWhere('route', 'like', '%setup/sms/gateways%')
                                                    ->orWhere('route', 'like', '%setup/payment/gateways%')
                                                    ->orWhere('route', 'like', '%view/pricing/packages%')
                                                    ->orWhere('route', 'like', '%view/payment/histories%')
                                                    ->get();

    $biodataMenu = App\Models\UserRolePermission::where('user_id', Auth::user()->id)
                                                    ->where('route', 'like', '%view/pending/biodatas%')
                                                    ->orWhere('route', 'like', '%view/approved/biodatas%')
                                                    ->orWhere('route', 'like', '%view/blocked/biodatas%')
                                                    ->orWhere('route', 'like', '%view/biodata/delete/requests%')
                                                    ->get();

    $biodataComplainMenu = App\Models\UserRolePermission::where('user_id', Auth::user()->id)
                                                    ->where('route', 'like', '%view/pending/biodata/complains%')
                                                    ->orWhere('route', 'like', '%view/running/biodata/complains%')
                                                    ->orWhere('route', 'like', '%view/complete/biodata/complains%')
                                                    ->orWhere('route', 'like', '%view/cancelled/biodata/complains%')
                                                    ->get();

?>

<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul id="side-menu">

        @if(checkAuth("home"))<li><a href="{{url('/home')}}"><i data-feather="home"></i><span> Dashboard </span></a></li>@endif


        {{-- Software Condig Module --}}
        @if(($softwareConfigMenu && count($softwareConfigMenu) > 0) || checkAuth("language/page") || checkAuth("setup/sms/gateways") || checkAuth("setup/payment/gateways") || checkAuth("view/pricing/packages") || checkAuth("view/payment/histories"))<li class="menu-title mt-1">Config Modules</li>@endif
        @if ($softwareConfigMenu && count($softwareConfigMenu) > 0)
        <li>
            <a href="#sidebarPackages" data-bs-toggle="collapse">
                <i data-feather="settings"></i>
                <span> Website Config </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarPackages">
                <ul class="nav-second-level">
                    @if(checkAuth("language/page")) <li><a href="{{ url('/language/page') }}">Languages</a></li> @endif
                    @if(checkAuth("setup/sms/gateways")) <li><a href="{{ url('/setup/sms/gateways') }}">SMS Gateways</a></li> @endif
                    @if(checkAuth("setup/payment/gateways")) <li><a href="{{ url('/setup/payment/gateways') }}">Payment Gateways</a></li> @endif
                    @if(checkAuth("view/pricing/packages")) <li><a href="{{ url('/view/pricing/packages') }}">Pricing Packages</a></li> @endif
                    @if(checkAuth("view/payment/histories")) <li><a href="{{ url('/view/payment/histories') }}">Payment Histories</a></li> @endif
                </ul>
            </div>
        </li>
        @endif

        @if(checkAuth("logo/favicon"))<li><a href="{{ url('/logo/favicon') }}"><i data-feather="image"></i><span> Logo, Icon & Banner </span></a></li>@endif
        @if(checkAuth("website/theme/page"))<li><a href="{{ url('/website/theme/page') }}"><i class="bi bi-palette" style="font-size: 15px;"></i><span> Site Theme Color </span></a></li>@endif
        @if(checkAuth("social/media/page"))<li><a href="{{ url('/social/media/page') }}"><i class="bi bi-link-45deg" style="font-size: 18px;"></i><span> Social Media Links </span></a></li>@endif
        @if(checkAuth("custom/css/js"))<li><a href="{{ url('/custom/css/js') }}"><i class="bi bi-code-slash" style="font-size: 16px;"></i><span> Custom CSS & JS </span></a></li>@endif
        @if(checkAuth("file-manager"))<li><a href="{{ url('/file-manager') }}"><i data-feather="folder-plus"></i><span> File Manager </span></a></li>@endif
        @if(checkAuth("seo/homepage"))<li><a href="{{ url('/seo/homepage') }}"><i class="bi bi-search" style="font-size: 15px;"></i><span> Sitemap & SEO </span></a></li>@endif
        @if(checkAuth("google/recaptcha"))<li><a href="{{ url('/google/recaptcha') }}"><i class="bi bi-google" style="font-size: 15px;"></i><span> Google Recaptcha </span></a></li>@endif
        @if(checkAuth("view/all/customers"))<li><a href="{{ url('/view/all/customers') }}"><i data-feather="users"></i><span> Registered Customers </span></a></li>@endif
        @if(checkAuth("view/all/upazilas"))<li><a href="{{ url('/view/all/upazilas') }}"><i class="bi bi-pin-map" style="font-size: 15px;"></i><span> Upazila & Thana </span></a></li>@endif


        {{-- Functional Module --}}
        @if (($biodataComplainMenu && count($biodataComplainMenu) > 0) || ($biodataMenu && count($biodataMenu) > 0) || checkAuth("view/all/biodatatype") || checkAuth("view/all/marital/condition") || checkAuth("view/all/question/set") || checkAuth("view/all/questions") || checkAuth("view/biodata/visits") || checkAuth("view/biodata/likes/dislikes") || checkAuth("view/biodata/paid/views"))<li class="menu-title mt-2">Functional Modules</li>@endif
        @if(checkAuth("view/all/biodatatype"))<li><a href="{{ url('view/all/biodatatype') }}"><i data-feather="file-text"></i><span> Biodata Type </span></a></li>@endif
        @if(checkAuth("view/all/marital/condition"))<li><a href="{{ url('view/all/marital/condition') }}"><i data-feather="users"></i><span> Marital Condition </span></a></li>@endif
        @if(checkAuth("view/all/question/set"))<li><a href="{{ url('view/all/question/set') }}"><i class="bi bi-receipt" style="font-size: 16px;"></i><span> Question Set </span></a></li>@endif
        @if(checkAuth("view/all/questions"))<li><a href="{{ url('view/all/questions') }}"><i class="bi bi-question-circle" style="font-size: 16px;"></i><span> Questions </span></a></li>@endif

        @if ($biodataMenu && count($biodataMenu) > 0)
        <li>
            <a href="#sidebarBiodata" data-bs-toggle="collapse">
                <i class="bi-file-earmark-text" style="font-size: 16px;"></i>
                <span> Biodatas </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarBiodata">
                <ul class="nav-second-level">
                    @if(checkAuth("view/pending/biodatas"))<li><a href="{{ url('/view/pending/biodatas') }}">Pending Biodata <span style="color: skyblue">({{ App\Models\BioData::where('status', 0)->count() }})</span></a></li>@endif
                    @if(checkAuth("view/approved/biodatas"))<li><a href="{{ url('/view/approved/biodatas') }}">Approved Biodata <span style="color: #00bd00">({{ App\Models\BioData::where('status', 1)->count() }})</span></a></li>@endif
                    @if(checkAuth("view/blocked/biodatas"))<li><a href="{{ url('/view/blocked/biodatas') }}">Blocked Biodata <span style="color: goldenrod">({{ App\Models\BioData::where('status', 2)->count() }})</span></a></li>@endif
                    @if(checkAuth("view/biodata/delete/requests"))<li><a href="{{ url('/view/biodata/delete/requests') }}">Delete Requests <span style="color: red">({{ App\Models\BioData::where('delete_request', 1)->count() }})</span></a></li>@endif
                </ul>
            </div>
        </li>
        @endif

        @if(checkAuth("view/biodata/visits"))<li><a href="{{ url('view/biodata/visits') }}"><i class="bi-clock-history" style="font-size: 16px;"></i><span>Biodata Visit Histories </span></a></li>@endif
        @if(checkAuth("view/biodata/likes/dislikes"))<li><a href="{{ url('view/biodata/likes/dislikes') }}"><i class="bi-hand-thumbs-up" style="font-size: 16px;"></i><span>Biodata Likes/Dislikes </span></a></li>@endif
        @if(checkAuth("view/biodata/paid/views"))<li><a href="{{ url('view/biodata/paid/views') }}"><i class="bi-cash-coin" style="font-size: 16px;"></i><span> Biodata Paid Views </span></a></li>@endif

        @if ($biodataComplainMenu && count($biodataComplainMenu) > 0)
        <li>
            <a href="#sidebarBiodataComplain" data-bs-toggle="collapse">
                <i data-feather="alert-triangle"></i>
                <span> Biodata Complains </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarBiodataComplain">
                <ul class="nav-second-level">
                    @if(checkAuth("view/pending/biodata/complains"))<li><a href="{{ url('/view/pending/biodata/complains') }}">Pending Complains <span style="color: skyblue">({{ App\Models\BiodataComplain::where('status', 0)->count() }})</span></a></li>@endif
                    @if(checkAuth("view/running/biodata/complains"))<li><a href="{{ url('/view/running/biodata/complains') }}">Running Complains <span style="color: goldenrod">({{ App\Models\BiodataComplain::where('status', 1)->count() }})</span></a></li>@endif
                    @if(checkAuth("view/complete/biodata/complains"))<li><a href="{{ url('/view/complete/biodata/complains') }}">Complete Complains <span style="color: #00bd00">({{ App\Models\BiodataComplain::where('status', 2)->count() }})</span></a></li>@endif
                    @if(checkAuth("view/cancelled/biodata/complains"))<li><a href="{{ url('/view/cancelled/biodata/complains') }}">Cancelled Complains <span style="color: red">({{ App\Models\BiodataComplain::where('status', 3)->count() }})</span></a></li>@endif
                </ul>
            </div>
        </li>
        @endif



        <li class="menu-title mt-2">Website Content Modules</li>
        @if(checkAuth("homepage/banner"))<li><a href="{{ url('homepage/banner') }}"><i data-feather="airplay"></i><span> Homepage Banner </span></a></li>@endif
        @if(checkAuth("homepage/biodata"))<li><a href="{{ url('homepage/biodata') }}"><i data-feather="columns"></i><span> Homepage Biodata </span></a></li>@endif
        <li>
            <a href="#sidebarHomePageStatistics" data-bs-toggle="collapse">
                <i data-feather="bar-chart-2"></i>
                <span> Homepage Statistics </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarHomePageStatistics">
                <ul class="nav-second-level">
                    <li><a href="{{ url('/homepage/statistics/config') }}">Section Config</a></li>
                    <li><a href="{{ url('/view/homepage/statistics') }}">Manage Statistics</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarHowItWorks" data-bs-toggle="collapse">
                <i data-feather="command"></i>
                <span> How It Works </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarHowItWorks">
                <ul class="nav-second-level">
                    <li><a href="{{ url('/how/it/works/config') }}">Section Config</a></li>
                    <li><a href="{{ url('/view/how/it/works') }}">Manage Work Procedure</a></li>
                </ul>
            </div>
        </li>
        <li><a href="{{ url('mobile/app/section') }}"><i data-feather="smartphone"></i><span> Mobile App Section</span></a></li>
        <li>
            <a href="#sidebarAboutUs" data-bs-toggle="collapse">
                <i class="bi bi-card-text" style="font-size: 15px;"></i>
                <span> About Us </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarAboutUs">
                <ul class="nav-second-level">
                    <li><a href="{{ url('/about/us/page/title') }}">Page Title</a></li>
                    <li><a href="{{ url('/about/us/page') }}">About Us</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarTermsPolicies" data-bs-toggle="collapse">
                <i data-feather="alert-triangle"></i>
                <span> Terms & Policies </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarTermsPolicies">
                <ul class="nav-second-level">
                    <li><a href="{{ url('/terms-conditions') }}">Terms & Conditions</a></li>
                    <li><a href="{{ url('/privacy-policies') }}">Privacy Policies</a></li>
                    <li><a href="{{ url('/refund-policies') }}">Refund Policies</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarFaq" data-bs-toggle="collapse">
                <i class="bi bi-question-circle" style="font-size: 15px;"></i>
                <span> FAQ </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarFaq">
                <ul class="nav-second-level">
                    <li><a href="{{ url('/faq/config') }}">Page Title</a></li>
                    <li><a href="{{ url('add/new/faq') }}">Add New FAQ</a></li>
                    <li><a href="{{ url('view/all/faqs') }}">View All FAQ</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarInstruction" data-bs-toggle="collapse">
                <i class="bi bi-info-circle" style="font-size: 15px;"></i>
                <span> Instructions </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarInstruction">
                <ul class="nav-second-level">
                    <li><a href="{{ url('/instruction/config') }}">Page Title</a></li>
                    <li><a href="{{ url('add/new/instruction') }}">Add New Instruction</a></li>
                    <li><a href="{{ url('view/all/instructions') }}">View All Instruction</a></li>
                </ul>
            </div>
        </li>
        <li><a href="{{ url('contact/us/page') }}"><i data-feather="phone-call"></i><span> Contact Us Page</span></a></li>


        @if(checkAuth("contact/requests"))<li class="menu-title mt-2">CRM Modules</li>@endif
        @if(checkAuth("contact/requests"))<li><a href="{{ url('contact/requests') }}"><i data-feather="phone-incoming"></i><span> Contact Requests</span></a></li>@endif


        @if(checkAuth("view/system/users") || checkAuth("view/permission/routes") || checkAuth("view/user/roles") || checkAuth("view/user/role/permission"))<li class="menu-title mt-2">User Role Permission</li>@endif
        @if(checkAuth("view/system/users"))<li><a href="{{ url('/view/system/users') }}"><i data-feather="users"></i><span>User Management</span></a></li>@endif
        @if(checkAuth("view/permission/routes"))<li><a href="{{ url('/view/permission/routes') }}"><i data-feather="git-merge"></i><span>Permission Routes</span></a></li>@endif
        @if(checkAuth("view/user/roles"))<li><a href="{{ url('/view/user/roles') }}"><i data-feather="user-plus"></i><span>User Roles</span></a></li>@endif
        @if(checkAuth("view/user/role/permission"))<li><a href="{{ url('/view/user/role/permission') }}"><i data-feather="user-check"></i><span>Assign Role Permission</span></a></li>@endif

        <hr>
        @if(checkAuth("change/password/page"))<li><a href="{{ url('change/password/page') }}"><i data-feather="key"></i><span> Change Password </span></a></li>@endif
        @if(checkAuth("logout"))<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-out"></i><span> Logout </span></a></li>@endif

    </ul>

</div>
<!-- End Sidebar -->
