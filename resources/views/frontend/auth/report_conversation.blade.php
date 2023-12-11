@extends('frontend.master')

@php
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
@endphp

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
                                <h3 class="user-d-breadcrumbs-title">{{__('label.user_menu_report_conversation')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-6 col-md-10 col-12">
                            <div class="report-conversation-widget">
                                <div class="report-conversation-top">
                                    <h3 class="report-conversation-title">
                                        {{__('label.user_menu_report_id')}}: <span>{{$complain->complain_no}}</span>
                                    </h3>
                                    <div class="report-bottom-head">
                                        <p>{{__('label.user_menu_report_status')}}:

                                            @if($complain->status == 0)
                                            <span>Open</span>
                                            @elseif($complain->status == 1)
                                            <span>In Progress</span>
                                            @elseif($complain->status == 2)
                                            <span style="color: green">Complete</span>
                                            @else
                                            <span style="color: #d00">Cancelled</span>
                                            @endif

                                        </p>
                                        <p>{{__('label.user_menu_report_date')}}: <span>{{date("d/m/Y")}}</span></p>
                                    </div>
                                    <form class="report-conversation-form" action="{{url('send/complain/message')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="complain_slug" value="{{$complain->slug}}">
                                        <div class="report-form-group-cotainer">
                                            <div class="form-group">
                                                <textarea placeholder="{{__('label.user_menu_report_write_here')}}.." name="message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="create-report-form-bottom">
                                            <div class="create-report-form-attachment">
                                                <div class="form-group">
                                                    <label>{{__('label.user_menu_report_attachment')}}</label>
                                                    <div class="complain_attachment-file">
                                                        <input type="file" name="attachment"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="create-report-form-btn">
                                                <button type="submit" class="theme-btn secondary">
                                                    {{__('label.user_menu_report_send')}}
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
                                                    <h3>{{Auth::user()->name}}</h3>
                                                    <p>{{time_elapsed_string($complain->created_at)}}</p>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p>
                                                    {{$complain->details}}
                                                </p>
                                            </div>
                                            <div class="image">
                                                <a href="{{url('frontend_assets')}}/assets/images/app-download-img.png" class="single-img" target="_blank" download style="font-size: 13px; padding: 0px 10px; border-radius: 4px; background: var(--secondary-color); color: #fff; font-weight: 500;">
                                                    Download Attachment
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
                                            <div class="image">
                                                <a href="{{url('frontend_assets')}}/assets/images/app-download-img.png" class="single-img" target="_blank" download style="font-size: 13px; padding: 0px 10px; border: 1px solid #1e1e1e; border-radius: 4px; background: #f2edf6; font-weight: 500;">
                                                    Download Attachment
                                                </a>
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
