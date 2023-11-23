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
                                <h3 class="user-d-breadcrumbs-title">{{__('message.user_checked_biodata_report_page')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-xl-5 col-md-5 col-12">
                            <div class="user-d-create-report-widget">
                                <form action="#" method="post" class="create-report-form edit-biodata-form-data">
                                    <div class="form-group">
                                        <label>{{__('label.form_biodata_for_report')}}</label>
                                        <input type="text" name="biodata-number" placeholder="10370" value="10370" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('label.form_biodata_report_reason')}}</label>
                                        <select class="select2 hero-search-filter-select" required>
                                            <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                            <option value="1">যোগাযোগের তথ্য সঠিক নয়</option>
                                            <option value="2">বায়োডাটাতে ভুল তথ্য দেওয়া আছে</option>
                                            <option value="3">অন্যান্য</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('label.form_biodata_report_mobile_no')}}</label>
                                        <input type="tel" name="mobile-number" placeholder="আপনার মোবাইল নং লিখুন" required />
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('label.form_biodata_report_message')}}</label>
                                        <textarea name="complain" placeholder="আপনার অভিযোগটি বিস্তারিতভাবে লিখুন" required></textarea>
                                    </div>
                                    <div class="create-report-form-bottom">
                                        <div class="create-report-form-attachment">
                                            <div class="form-group">
                                                <label>{{__('label.form_biodata_report_attachment')}}</label>
                                                <div class="complain_attachment-file">
                                                    <input type="file" name="complain_attachment" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create-report-form-btn">
                                            <button type="submit" class="theme-btn secondary">
                                                {{__('label.form_biodata_report_submit')}}
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
