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
                                <h3 class="user-d-breadcrumbs-title">{{ __('label.user_menu_support_report') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-list-items myPurchased-package" style="margin-top: 32px">
                                <div class="user-d-list-item list-head">
                                    <h4>#</h4>
                                    <h4>{{ __('message.user_support_report_id') }}</h4>
                                    <h4>{{ __('message.user_support_report_biodata_no') }}</h4>
                                    <h4>{{ __('message.user_support_report_status') }}</h4>
                                    <h4>{{ __('message.user_support_report_date') }}</h4>
                                    <h4>{{ __('message.user_support_report_new_answer') }}</h4>
                                    <h4>{{ __('message.user_support_report_option') }}</h4>
                                </div>

                                <!-- Single List Data -->
                                @foreach ($data as $index => $item)
                                    <div class="user-d-list-item">
                                        <div>
                                            <p>{{ $index + $data->firstItem() }}</p>
                                        </div>
                                        <div>
                                            <p>{{ $item->complain_no }}</p>
                                        </div>
                                        <div>
                                            <p>{{ $item->biodata_no }}</p>
                                        </div>
                                        <div>
                                            @if ($item->status == 0)
                                                <p class="status">OPEN</p>
                                            @elseif($item->status == 1)
                                                <p class="status" style="color: blue">In Progress</p>
                                            @elseif($item->status == 2)
                                                <p class="status" style="color: green">Complete</p>
                                            @else
                                                <p class="status" style="color: red">Cancelled</p>
                                            @endif
                                        </div>
                                        <div>
                                            <p>{{ date('d/m/Y h:i:s a', strtotime($item->created_at)) }}</p>
                                        </div>
                                        <div>
                                            <p>0</p>
                                        </div>
                                        <div>
                                            <a class="create-report-btn"
                                                href="{{ url('user/report/conversation') }}">{{ __('message.user_support_report_details') }}</a>
                                        </div>
                                    </div>
                                @endforeach

                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
