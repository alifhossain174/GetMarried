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
                                                    ->where('route', 'like', '%view/all/class%')
                                                    ->orWhere('route', 'like', '%view/all/sections%')
                                                    ->get();

?>

<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul id="side-menu">

        @if(checkAuth("home"))<li><a href="{{url('/home')}}"><i data-feather="home"></i><span> Dashboard </span></a></li>@endif

        @if(($softwareConfigMenu && count($softwareConfigMenu) > 0) || checkAuth("logo/favicon") || checkAuth("website/theme/page") || checkAuth("social/media/page") || checkAuth("custom/css/js") || checkAuth("file-manager") || checkAuth("seo/homepage"))
        <li class="menu-title mt-1">Config Modules</li>
        @endif

        @if ($softwareConfigMenu && count($softwareConfigMenu) > 0)
        <li>
            <a href="#sidebarPackages" data-bs-toggle="collapse">
                <i data-feather="settings"></i>
                <span> Software Config </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarPackages">
                <ul class="nav-second-level">
                    @if(checkAuth("view/all/class"))<li><a href="{{url('/view/all/class')}}">Class</a></li>@endif
                </ul>
            </div>
        </li>
        @endif
        @if(checkAuth("logo/favicon"))<li><a href="{{url('/logo/favicon')}}"><i data-feather="image"></i><span> Logo & Favicon </span></a></li>@endif
        @if(checkAuth("website/theme/page"))<li><a href="{{url('/website/theme/page')}}"><i class="bi bi-palette" style="font-size: 15px;"></i><span> Website Theme Color </span></a></li>@endif
        @if(checkAuth("social/media/page"))<li><a href="{{url('/social/media/page')}}"><i class="bi bi-link-45deg" style="font-size: 18px;"></i><span> Social Media Links </span></a></li>@endif
        @if(checkAuth("custom/css/js"))<li><a href="{{url('/custom/css/js')}}"><i class="bi bi-code-slash" style="font-size: 16px;"></i><span> Custom CSS & JS </span></a></li>@endif
        @if(checkAuth("file-manager"))<li><a href="{{url('/file-manager')}}"><i data-feather="folder-plus"></i><span> File Manager </span></a></li>@endif
        @if(checkAuth("seo/homepage"))<li><a href="{{url('/seo/homepage')}}"><i class="bi bi-search" style="font-size: 15px;"></i><span> Sitemap & SEO </span></a></li>@endif
        @if(checkAuth("google/recaptcha"))<li><a href="{{url('/google/recaptcha')}}"><i class="bi bi-google" style="font-size: 15px;"></i><span> Google Recaptcha </span></a></li>@endif


        @if(checkAuth("contact/us/page"))
        <li class="menu-title mt-2">Website Content Modules</li>
        @endif
        @if(checkAuth("contact/us/page"))<li><a href="{{url('contact/us/page')}}"><i data-feather="phone-call"></i><span> Contact Us Page </span></a></li>@endif


        @if(checkAuth("contact/requests")) <li class="menu-title mt-2">CRM Modules</li> @endif
        @if(checkAuth("contact/requests")) <li><a href="{{url('contact/requests')}}"><i data-feather="phone-incoming"></i><span> Contact Requests </span></a></li>@endif

        @if(checkAuth("view/permission/routes") || checkAuth("view/user/roles") || checkAuth("view/user/role/permission") || checkAuth("view/system/users"))<li class="menu-title mt-2">User Role Permission</li>@endif
        @if(checkAuth("view/system/users")) <li><a href="{{url('/view/system/users')}}"><i data-feather="users"></i><span>User Management</span></a></li> @endif
        @if(checkAuth("view/permission/routes")) <li><a href="{{url('/view/permission/routes')}}"><i data-feather="git-merge"></i><span>Permission Routes</span></a></li> @endif
        @if(checkAuth("view/user/roles")) <li><a href="{{url('/view/user/roles')}}"><i data-feather="user-plus"></i><span>User Roles</span></a></li> @endif
        @if(checkAuth("view/user/role/permission")) <li><a href="{{url('/view/user/role/permission')}}"><i data-feather="user-check"></i><span>Assign Role Permission</span></a></li> @endif


        <hr>
        <li><a href="{{url('change/password/page')}}"><i data-feather="key"></i><span> Change Password </span></a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-out"></i><span> Logout </span></a></li>

    </ul>

</div>
<!-- End Sidebar -->
