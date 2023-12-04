<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul id="side-menu">

        <li><a href="{{ url('/home') }}"><i data-feather="home"></i><span> Dashboard </span></a></li>

        <li class="menu-title mt-1">Config Modules</li>
        <li>
            <a href="#sidebarPackages" data-bs-toggle="collapse">
                <i data-feather="settings"></i>
                <span> Website Config </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarPackages">
                <ul class="nav-second-level">
                    <li><a href="{{ url('/language/page') }}">Languages</a></li>
                    <li><a href="{{ url('/setup/sms/gateways') }}">SMS Gateways</a></li>
                    <li><a href="{{ url('/setup/payment/gateways') }}">Payment Gateways</a></li>
                    <li><a href="{{ url('/view/pricing/packages') }}">Pricing Packages</a></li>
                </ul>
            </div>
        </li>
        <li><a href="{{ url('/logo/favicon') }}"><i data-feather="image"></i><span> Logo, Icon & Banner </span></a></li>
        <li><a href="{{ url('/website/theme/page') }}"><i class="bi bi-palette" style="font-size: 15px;"></i><span> Site Theme Color </span></a></li>
        <li><a href="{{ url('/social/media/page') }}"><i class="bi bi-link-45deg" style="font-size: 18px;"></i><span> Social Media Links </span></a></li>
        <li><a href="{{ url('/custom/css/js') }}"><i class="bi bi-code-slash" style="font-size: 16px;"></i><span> Custom CSS & JS </span></a></li>
        <li><a href="{{ url('/file-manager') }}"><i data-feather="folder-plus"></i><span> File Manager </span></a></li>
        <li><a href="{{ url('/seo/homepage') }}"><i class="bi bi-search" style="font-size: 15px;"></i><span> Sitemap & SEO </span></a></li>
        <li><a href="{{ url('/google/recaptcha') }}"><i class="bi bi-google" style="font-size: 15px;"></i><span> Google Recaptcha </span></a></li>


        <li class="menu-title mt-2">Functional Modules</li>
        <li><a href="{{ url('view/all/biodatatype') }}"><i data-feather="file-text"></i><span> Biodata Type </span></a>
        </li>
        <li><a href="{{ url('view/all/marital/condition') }}"><i data-feather="users"></i><span> Marital Condition
                </span></a></li>
        <li><a href="{{ url('view/all/question/set') }}"><i class="bi bi-receipt" style="font-size: 16px;"></i><span>
                    Question Set </span></a></li>
        <li><a href="{{ url('view/all/questions') }}"><i class="bi bi-question-circle"
                    style="font-size: 16px;"></i><span> Questions </span></a></li>
        <li>
            <a href="#sidebarBiodata" data-bs-toggle="collapse">
                <i class="bi-file-earmark-text" style="font-size: 16px;"></i>
                <span> Biodatas </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarBiodata">
                <ul class="nav-second-level">
                    <li><a href="{{ url('/view/pending/biodatas') }}">Pending Biodata
                            <span
                                style="color: skyblue">({{ App\Models\BioData::where('status', 0)->count() }})</span></a>
                    </li>
                    <li><a href="{{ url('/view/approved/biodatas') }}">Approved Biodata <span
                                style="color: #00bd00">({{ App\Models\BioData::where('status', 1)->count() }})</span></a>
                    </li>
                    <li><a href="{{ url('/view/blocked/biodatas') }}">Blocked Biodata <span
                                style="color: red">({{ App\Models\BioData::where('status', 2)->count() }})</span></a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="menu-title mt-2">Website Content Modules</li>
        <li><a href="{{ url('homepage/banner') }}"><i data-feather="airplay"></i><span> Homepage Banner </span></a>
        </li>
        <li><a href="{{ url('homepage/biodata') }}"><i data-feather="columns"></i><span> Homepage Biodata </span></a>
        </li>
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
        <li><a href="{{ url('mobile/app/section') }}"><i data-feather="smartphone"></i><span> Mobile App Section
                </span></a></li>
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

        <li><a href="{{ url('contact/us/page') }}"><i data-feather="phone-call"></i><span> Contact Us Page
                </span></a></li>


        <li class="menu-title mt-2">CRM Modules</li>
        <li><a href="{{ url('contact/requests') }}"><i data-feather="phone-incoming"></i><span> Contact Requests
                </span></a></li>


        <li class="menu-title mt-2">User Role Permission</li>
        <li><a href="{{ url('/view/system/users') }}"><i data-feather="users"></i><span>User Management</span></a>
        </li>
        <li><a href="{{ url('/view/permission/routes') }}"><i data-feather="git-merge"></i><span>Permission
                    Routes</span></a></li>
        <li><a href="{{ url('/view/user/roles') }}"><i data-feather="user-plus"></i><span>User Roles</span></a></li>
        <li><a href="{{ url('/view/user/role/permission') }}"><i data-feather="user-check"></i><span>Assign Role
                    Permission</span></a></li>


        <hr>
        <li><a href="{{ url('change/password/page') }}"><i data-feather="key"></i><span> Change Password </span></a>
        </li>
        <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    data-feather="log-out"></i><span> Logout </span></a></li>

    </ul>

</div>
<!-- End Sidebar -->
