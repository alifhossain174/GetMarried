@extends('frontend.master')

@section('header_css')
    <style>
        .active>.page-link,
        .page-link.active {
            background-color: var(--secondary-color) !important;
            border-color: var(--secondary-color) !important;
        }

        .page-link {
            color: var(--primary-color);
        }
    </style>
@endsection

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
                                <h3 class="user-d-breadcrumbs-title">{{ __('label.user_menu_checked_biodata') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-list-widget">
                                <h4 class="user-d-list-item-title">
                                    {{ __('message.user_checked_biodata_till_now') }}
                                    <span>{{ App\Models\PaidView::where('user_id', Auth::user()->id)->count() }}</span>
                                </h4>
                                <div class="user-d-list-items myPurchased">
                                    <div class="user-d-list-item list-head">
                                        <h4>#</h4>
                                        <h4>{{ __('message.user_checked_biodata_no') }}</h4>
                                        <h4>{{ __('message.user_checked_biodata_date') }}</h4>
                                        <h4>{{ __('message.user_checked_biodata_option') }}</h4>
                                    </div>
                                    <!-- Single List Data -->
                                    @foreach ($data as $index => $item)
                                        <div class="user-d-list-item">
                                            <div>
                                                <p>{{ $index + $data->firstItem() }}</p>
                                            </div>
                                            <div>
                                                <a href="{{ url('biodata/details') }}/{{ $item->biodata_slug }}"
                                                    target="_blank" class="bio-num">{{ $item->biodata_no }}</a>
                                            </div>
                                            <div>
                                                <p>{{ date('h:i:s a M d, Y', strtotime($item->created_at)) }}</p>
                                            </div>
                                            <div class="user-d-list-item-option">
                                                @if (!App\Models\BiodataComplain::where('biodata_id', $item->biodata_id)->where('submitted_by', Auth::user()->id)->exists())
                                                    <a class="create-report-btn"
                                                        href="{{ url('user/create/report') }}/{{ $item->biodata_slug }}">{{ __('message.user_checked_biodata_report_now') }}</a>
                                                @else
                                                    <a href="javascript:void(0)" class="create-report-btn"
                                                        style="background: var(--success-color) !important;">{{ __('message.user_checked_biodata_already_reported') }}</a>
                                                @endif
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
        </div>
    </section>
@endsection
