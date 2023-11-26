<!-- Dashboard Sidebar -->
<div class="user-d-sidebar">
    <a href="#" class="sidebar-trigger"></a>
    <div class="user-d-sidebar-info">
        <img src="{{ url('frontend_assets') }}/assets/images/icons/user.svg" alt="#" />
        <div class="user-d-bio-status-wrap">
            <h3>{{__('label.user_menu_biodata_progress')}}</h3>
            <div class="user-d-bio-status">
                <span class="user-d-complete">Complete</span>
                <!-- <span class="user-d-incomplete">Incomplete</span> -->
            </div>
        </div>
        <div class="user-d-preview-biodata-link">
            <a href="{{ url('user/biodata/preview') }}" class="theme-btn">{{__('label.user_menu_my_biodata')}}</a>
        </div>
    </div>
    <nav class="user-d-nav">
        <ul>
            <li class="{{ (Request::path() == 'user/dashboard') ? 'active' : ''}}">
                <a href="{{ url('user/dashboard') }}"><i class="fi fi-rs-apps"></i>{{__('label.user_menu_dashboard')}}</a>
            </li>
            <li class="{{ (Request::path() == 'user/edit/biodata') ? 'active' : ''}}">
                <a href="{{url('user/edit/biodata')}}"><i class="fi fi-rr-edit"></i>{{__('label.user_menu_edit_biodata')}}</a>
            </li>
            <li class="{{ (Request::path() == 'user/short/list') ? 'active' : ''}}">
                <a href="{{url('user/short/list')}}"><i class="fi fi-rs-heart"></i>{{__('label.user_menu_short_list')}}</a>
            </li>
            <li class="{{ (Request::path() == 'user/ignore/list') ? 'active' : ''}}">
                <a href="{{url('user/ignore/list')}}"><i class="fi fi-br-ban"></i>{{__('label.user_menu_ignore_list')}}</a>
            </li>
            <li class="{{ (Request::path() == 'user/checked/biodata') ? 'active' : ''}}">
                <a href="{{url('user/checked/biodata')}}"><i class="fi fi-rr-following"></i>{{__('label.user_menu_checked_biodata')}}</a>
            </li>
            <li class="{{ (Request::path()=='user/my/purchased') || (Request::path()=='user/connection') || (Request::path()=='user/payment/process') ? 'active' : ''}}">
                <a href="{{url('user/my/purchased')}}"><i class="fi fi-rr-shopping-bag"></i>{{__('label.user_menu_purchased')}}</a>
            </li>
            <li class="{{ (Request::path() == 'user/support/report') || (Request::path() == 'user/report/conversation') || (Request::path() == 'user/create/report') ? 'active' : ''}}">
                <a href="{{url('user/support/report')}}"><i class="fi-rs-flag"></i>{{__('label.user_menu_support_report')}}</a>
            </li>
            <li class="{{ (Request::path() == 'user/settings') ? 'active' : ''}}">
                <a href="{{ url('user/settings') }}"><i class="fi fi-rr-settings"></i>{{__('label.user_menu_settings')}}</a>
            </li>
            <li>
                <a href="{{ url('user/login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fi fi-rs-sign-out-alt"></i>{{__('label.user_menu_logout')}}</a>
            </li>
        </ul>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>


