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
                                <h3 class="user-d-breadcrumbs-title">{{ __('label.user_menu_short_list') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-list-items shortlist">
                                <div class="user-d-list-item list-head">
                                    <h4>#</h4>
                                    <h4>{{ __('message.user_ignore_list_biodata_no') }}</h4>
                                    <h4>{{ __('message.user_ignore_list_birth_date') }}</h4>
                                    <h4>{{ __('message.user_ignore_list_address') }}</h4>
                                    <h4>{{ __('message.user_ignore_list_option') }}</h4>
                                </div>

                                <!-- Single List Data -->
                                @foreach ($data as $index => $item)
                                    <div class="user-d-list-item">
                                        <div>
                                            <p>{{ $index + $data->firstItem() }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ url('biodata/details') }}/{{ $item->biodata_slug }}" target="_blank"
                                                class="bio-num">{{ $item->biodata_no }}</a>
                                        </div>
                                        <div>
                                            <p>{{ date('F, Y', strtotime($item->birth_date)) }}</p>
                                        </div>
                                        <div>
                                            <p>{{ $item->district_name }}, {{ $item->upazila_name }},
                                                {{ $item->permenant_address }}</p>
                                        </div>
                                        <div class="user-d-list-item-option">
                                            <a class="user-d-link" href="javascript:void(0)"
                                                onclick="copyToClipboard('{{ $item->biodata_slug }}')"><i
                                                    class="fi fi-rs-link"></i></a>
                                            <a class="user-d-delete user-d-delete-from-shortlist"
                                                href="{{ url('remove/liked/biodata') }}/{{ $item->slug }}"><i
                                                    class="fi fi-rr-trash"></i></a>
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

@section('footer_js')
    <script>
        function copyToClipboard(slug) {
            var baseUrl = window.location.origin;
            navigator.clipboard.writeText(baseUrl + '/biodata/details/' + slug);
            toastr.success("Copied to Clipboard");
            return false;
        }
    </script>
@endsection
