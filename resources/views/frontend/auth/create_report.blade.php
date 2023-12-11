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
                                <h3 class="user-d-breadcrumbs-title">{{ __('message.user_checked_biodata_report_page') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-xl-5 col-md-5 col-12">
                            <div class="user-d-create-report-widget">
                                <form action="{{ url('submit/biodata/complain') }}" method="post"
                                    class="create-report-form edit-biodata-form-data" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="biodata_slug" value="{{ $biodata->slug }}">
                                    <div class="form-group">
                                        <label>{{ __('label.form_biodata_for_report') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="biodata-number"
                                            style="color: #1e1e1e; background: #f0f0f0;" value="{{ $biodata->biodata_no }}"
                                            readonly required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('label.form_biodata_report_reason') }}<span
                                                class="text-danger">*</span></label>
                                        <select
                                            class="select2 hero-search-filter-select @error('reason') is-invalid @enderror"
                                            name="reason" required>
                                            <option value="">{{ __('label.form_biodata_report_select_option') }}
                                            </option>
                                            <option value="1">{{ __('label.complain_reason_wrong_contact') }}
                                            </option>
                                            <option value="2">{{ __('label.complain_reason_wrong_bio_info') }}</option>
                                            <option value="3">{{ __('label.complain_reason_wrong_others') }}</option>
                                        </select>
                                        @error('reason')
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('label.form_biodata_report_mobile_no') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="tel" name="contact_no" style="color: #1e1e1e;"
                                            class="@error('contact_no') is-invalid @enderror"
                                            placeholder="{{ __('label.complain_reason_mobile_no') }}" required />
                                        @error('contact_no')
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('label.form_biodata_report_message') }}</label>
                                        <textarea name="details" style="color: #1e1e1e;" placeholder="{{ __('label.complain_reason_details') }}"></textarea>
                                    </div>
                                    <div class="create-report-form-bottom">
                                        <div class="create-report-form-attachment">
                                            <div class="form-group">
                                                <label>{{ __('label.form_biodata_report_attachment') }}</label>
                                                <div class="complain_attachment-file">
                                                    <input type="file" name="attachment" accept="image/*"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create-report-form-btn">
                                            <button type="submit" class="theme-btn secondary">
                                                {{ __('label.form_biodata_report_submit') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
