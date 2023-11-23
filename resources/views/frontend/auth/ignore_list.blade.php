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
                                <h3 class="user-d-breadcrumbs-title">{{__('label.user_menu_ignore_list')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="user-d-list-items shortlist">
                                <div class="user-d-list-item list-head">
                                    <h4>#</h4>
                                    <h4>{{__('message.user_ignore_list_biodata_no')}}</h4>
                                    <h4>{{__('message.user_ignore_list_birth_date')}}</h4>
                                    <h4>{{__('message.user_ignore_list_address')}}</h4>
                                    <h4>{{__('message.user_ignore_list_option')}}</h4>
                                </div>
                                <!-- Single List Data -->
                                <div class="user-d-list-item">
                                    <div>
                                        <p>1</p>
                                    </div>
                                    <div>
                                        <a href="#" target="_blank" class="bio-num">10912</a>
                                    </div>
                                    <div>
                                        <p>July, 1994</p>
                                    </div>
                                    <div>
                                        <p>সাতক্ষীরা সদর, সাতক্ষীরা, খুলনা, বাংলাদেশ</p>
                                    </div>
                                    <div class="user-d-list-item-option">
                                        <a class="user-d-link" href="#" target="_blank"><i
                                                class="fi fi-rs-link"></i></a>
                                        <a class="user-d-delete user-d-delete-from-shortlist" data-id="53828"
                                            href="#"><i class="fi fi-rr-trash"></i></a>
                                    </div>
                                </div>
                                <!-- Single List Data -->
                                <div class="user-d-list-item">
                                    <div>
                                        <p>2</p>
                                    </div>
                                    <div>
                                        <a href="#" target="_blank" class="bio-num">10912</a>
                                    </div>
                                    <div>
                                        <p>July, 1994</p>
                                    </div>
                                    <div>
                                        <p>সাতক্ষীরা সদর, সাতক্ষীরা, খুলনা, বাংলাদেশ</p>
                                    </div>
                                    <div class="user-d-list-item-option">
                                        <a class="user-d-link" href="#" target="_blank"><i
                                                class="fi fi-rs-link"></i></a>
                                        <a class="user-d-delete user-d-delete-from-shortlist" data-id="53828"
                                            href="#"><i class="fi fi-rr-trash"></i></a>
                                    </div>
                                </div>
                                <!-- Single List Data -->
                                <div class="user-d-list-item">
                                    <div>
                                        <p>3</p>
                                    </div>
                                    <div>
                                        <a href="#" target="_blank" class="bio-num">10912</a>
                                    </div>
                                    <div>
                                        <p>July, 1994</p>
                                    </div>
                                    <div>
                                        <p>সাতক্ষীরা সদর, সাতক্ষীরা, খুলনা, বাংলাদেশ</p>
                                    </div>
                                    <div class="user-d-list-item-option">
                                        <a class="user-d-link" href="#" target="_blank"><i
                                                class="fi fi-rs-link"></i></a>
                                        <a class="user-d-delete user-d-delete-from-shortlist" data-id="53828"
                                            href="#"><i class="fi fi-rr-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
