@extends('frontend.master')

@push('site-seo')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
        $homePageSeo = App\Models\Seo::where('id', 1)->first();
    @endphp
    <meta name="title" content="{{ $homePageSeo->meta_title }}" />
    <meta name="description" content="{{ $homePageSeo->meta_description }}" />
    <meta name="keywords" content="{{ str_replace(',', ', ', $homePageSeo->meta_keywords) }}" />
@endpush

@section('content')
    <!-- Biodata Details Area -->
    <section class="biodata-details-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10 col-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-xl-4 col-md-8 col-12">
                            <div class="biodata-general-widget">
                                <div class="biodata-general-widget-box">
                                    <div class="biodata-general-head">
                                        <div class="biodata-general-img">

                                            @if ($biodata && $biodata->biodata_type_id == 1 && $biodata->show_image != 1)
                                                <img src="{{ url('frontend_assets') }}/assets/images/icons/man.svg" alt="Image" />
                                            @elseif ($biodata && $biodata->biodata_type_id == 2 && $biodata->show_image != 1)
                                                <img src="{{ url('frontend_assets') }}/assets/images/icons/woman.svg" alt="Image" />
                                            @else
                                                @if($biodata->show_image && file_exists(public_path($biodata->image)))
                                                    <img src="{{ url($biodata->image) }}" alt="Image" />
                                                @endif
                                            @endif

                                        </div>
                                        <div class="biodata-general-head-info">
                                            <h4 style="font-size: 22px;">{{ __('label.biodata_no') }}:
                                                <span>{{ $biodata ? $biodata->biodata_no : '' }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="biodata-general-content">
                                        <div class="biodata-general-each-item">
                                            <label>{{ __('label.biodata_type') }}</label>
                                            <p>{{ $biodata ? (App::currentLocale() == 'en' ? $biodata->biodata_type : $biodata->biodata_type_bn) : '' }}
                                            </p>
                                        </div>
                                        <div class="biodata-general-each-item">
                                            <label>{{ __('label.hero_marital_status') }}</label>
                                            <p>{{ $biodata ? (App::currentLocale() == 'en' ? $biodata->marital_condition : $biodata->marital_condition_bn) : '' }}
                                            </p>
                                        </div>
                                        <div class="biodata-general-each-item">
                                            <label>{{ __('label.date_of_birth') }}</label>
                                            <p>{{ $biodata ? date('F, Y', strtotime($biodata->birth_date)) : '' }}
                                            </p>
                                        </div>
                                        <div class="biodata-general-each-item">
                                            <label>{{ __('label.height') }}</label>
                                            <p>{{ $biodata ? (App::currentLocale() == 'en' ? $biodata->height_foot . '′' : $numto->bnNum($biodata->height_foot) . '′') : '' }}
                                                {{ $biodata ? (App::currentLocale() == 'en' ? $biodata->height_inch . '″' : $numto->bnNum($biodata->height_inch) . '″') : '' }}
                                            </p>
                                        </div>
                                        <div class="biodata-general-each-item">
                                            <label>{{ __('label.skin_tone') }}</label>
                                            <p>
                                                @if ($biodata && $biodata->skin_tone == 1)
                                                    {{ __('label.skin_tone_black') }}
                                                @elseif ($biodata && $biodata->skin_tone == 2)
                                                    {{ __('label.skin_tone_brown') }}
                                                @elseif ($biodata && $biodata->skin_tone == 3)
                                                    {{ __('label.skin_tone_bright_brown') }}
                                                @elseif ($biodata && $biodata->skin_tone == 4)
                                                    {{ __('label.skin_tone_white') }}
                                                @elseif ($biodata && $biodata->skin_tone == 5)
                                                    {{ __('label.skin_tone_bright_white') }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="biodata-general-each-item">
                                            <label>{{ __('label.weight') }}</label>
                                            <p>{{ $biodata ? $biodata->weight : '' }}</p>
                                        </div>
                                        <div class="biodata-general-each-item">
                                            <label>{{ __('label.blood_group') }}</label>
                                            <p>
                                                @if ($biodata && $biodata->blood_group == 1)
                                                    A+
                                                @elseif ($biodata && $biodata->blood_group == 2)
                                                    A-
                                                @elseif ($biodata && $biodata->blood_group == 3)
                                                    B+
                                                @elseif ($biodata && $biodata->blood_group == 4)
                                                    B-
                                                @elseif ($biodata && $biodata->blood_group == 5)
                                                    AB+
                                                @elseif ($biodata && $biodata->blood_group == 6)
                                                    AB-
                                                @elseif ($biodata && $biodata->blood_group == 7)
                                                    O+
                                                @elseif ($biodata && $biodata->blood_group == 8)
                                                    O-
                                                @endif
                                            </p>
                                        </div>
                                        <div class="biodata-general-each-item">
                                            <label>{{ __('label.nationality') }}</label>
                                            <p>{{ $biodata ? $biodata->nationality_label : '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="biodata-general-links">
                                    <div class="biodata-general-btn">

                                        {{-- liked route --}}
                                        @auth
                                            @php
                                                $isLiked = App\Models\SavedBiodata::where([['user_id', Auth::user()->id], ['biodata_id', $biodata->id], ['status', 1]])->first();
                                            @endphp
                                            @if ($isLiked)
                                                <a href="javascript:void(0)" onclick="alreadyAddedToLikeList()"
                                                    @if ($isLiked) style="background: var(--success-color); color: white" @endif
                                                    class="theme-btn shortlist-btn"><i
                                                        class="fi fi-rr-star"></i>{{ __('label.short_list') }}</a>
                                            @else
                                                <a href="{{ url('add/to/liked/list') }}/{{ $biodata->slug }}"
                                                    class="theme-btn shortlist-btn"><i
                                                        class="fi fi-rr-star"></i>{{ __('label.short_list') }}</a>
                                            @endif
                                        @else
                                            <a href="{{ url('add/to/liked/list') }}/{{ $biodata->slug }}"
                                                class="theme-btn shortlist-btn"><i
                                                    class="fi fi-rr-star"></i>{{ __('label.short_list') }}</a>
                                        @endauth

                                        {{-- disliked route --}}
                                        @auth
                                            @php
                                                $isDisliked = App\Models\SavedBiodata::where([['user_id', Auth::user()->id], ['biodata_id', $biodata->id], ['status', 2]])->first();
                                            @endphp
                                            @if ($isDisliked)
                                                <a href="javascript:void(0)" onclick="alreadyAddedToDislikeList()"
                                                    @if ($isDisliked) style="background: var(--primary-color); color: white; border: 1px solid var(--primary-color);" @endif
                                                    class="theme-btn shortlist-btn"><i
                                                        class="fi fi-br-ban"></i>{{ __('label.ignore') }}</a>
                                            @else
                                                <a href="{{ url('add/to/disliked/list') }}/{{ $biodata->slug }}"
                                                    class="theme-btn ignore-btn"><i
                                                        class="fi fi-br-ban"></i>{{ __('label.ignore') }}</a>
                                            @endif
                                        @else
                                            <a href="{{ url('add/to/disliked/list') }}/{{ $biodata->slug }}"
                                                class="theme-btn ignore-btn"><i
                                                    class="fi fi-br-ban"></i>{{ __('label.ignore') }}</a>
                                        @endauth


                                    </div>
                                    <a href="javascript:void(0)" onclick="copyToClipboard('{{ $biodata->slug }}')"
                                        class="theme-btn copy-btn"><i class="fi fi-rr-duplicate"></i>Copy Biodata Link</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-8 col-12">
                            <div class="biodata-details-main">

                                <!-- Single Biodata Details (address) -->
                                <div class="single-biodata-details">
                                    <h4>{{ __('label.address') }}</h4>
                                    <div class="biodata-details-info-group">
                                        <!-- Single Bio Info Item -->
                                        <div class="biodata-details-info-item">
                                            <label>{{ __('label.district') }}</label>
                                            <p>
                                                <span>{{ $biodata ? (App::currentLocale() == 'en' ? $biodata->permenant_district_name : $biodata->permenant_district_name_bn) : '' }}</span>
                                            </p>
                                        </div>
                                        <div class="biodata-details-info-item">
                                            <label>{{ __('label.upazila') }}</label>
                                            <p>
                                                <span>{{ $biodata ? (App::currentLocale() == 'en' ? $biodata->permenant_upazila_name : $biodata->permenant_upazila_name_bn) : '' }}</span>
                                            </p>
                                        </div>
                                        <div class="biodata-details-info-item">
                                            <label>{{ __('label.area_name') }}</label>
                                            <p>
                                                <span>{{ $biodata ? $biodata->permenant_address : '' }}</span>
                                            </p>
                                        </div>
                                        <div class="biodata-details-info-item">
                                            <label>{{ __('label.district') }}
                                                ({{ __('label.present_address') }})</label>
                                            <p>
                                                <span>{{ $biodata ? (App::currentLocale() == 'en' ? $biodata->present_district_name : $biodata->present_district_name_bn) : '' }}</span>
                                            </p>
                                        </div>
                                        <div class="biodata-details-info-item">
                                            <label>{{ __('label.upazila') }}
                                                ({{ __('label.present_address') }})</label>
                                            <p>
                                                <span>{{ $biodata ? (App::currentLocale() == 'en' ? $biodata->present_upazila_name : $biodata->present_upazila_name_bn) : '' }}</span>
                                            </p>
                                        </div>
                                        <div class="biodata-details-info-item">
                                            <label>{{ __('label.area_name') }}
                                                ({{ __('label.present_address') }})</label>
                                            <p>
                                                <span>{{ $biodata ? $biodata->present_address : '' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Biodata Details -->
                                @foreach ($questionSets as $set)
                                    <div class="single-biodata-details">
                                        <h4>{{ App::currentLocale() == 'en' ? $set->title : $set->title_bn }}
                                        </h4>
                                        <div class="biodata-details-info-group">
                                            @php
                                                $questions = DB::table('questions')
                                                    ->where('question_set_id', $set->id)
                                                    ->where('status', 1)
                                                    ->orderBy('serial', 'asc')
                                                    ->get();
                                            @endphp
                                            <!-- Single Bio Info Item -->
                                            @foreach ($questions as $question)
                                                @php
                                                    $questionAnswer = DB::table('biodata_question_answers')
                                                        ->where('user_id', $biodata->user_id)
                                                        ->where('question_id', $question->id)
                                                        ->first();
                                                @endphp
                                                <div class="biodata-details-info-item">
                                                    <label>{{ App::currentLocale() == 'en' ? $question->question : $question->question_bn }}</label>

                                                    @if ($questionAnswer && $question->type == 2)
                                                        @php
                                                            $option = App\Models\MCQ::where('id', $questionAnswer->answer)->first();
                                                        @endphp
                                                        <p>
                                                            <span>{{ App::currentLocale() == 'en' ? $option->option : $option->option_bn }}</span>
                                                        </p>
                                                    @else
                                                        <p>
                                                            <span>{{ $questionAnswer ? $questionAnswer->answer : '' }}</span>
                                                        </p>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Single Biodata Details (contact) -->
                                @auth
                                    @php
                                        $paidForBiodata = App\Models\PaidView::where('user_id', Auth::user()->id)->where('biodata_id', $biodata->id)->first();
                                    @endphp
                                @else
                                    @php
                                        $paidForBiodata = '';
                                    @endphp
                                @endauth


                                @auth
                                    @if($paidForBiodata == '')
                                    <div class="single-biodata-details">
                                        <h4>{{__('label.contact')}}</h4>
                                        <div class="biodata-details-info-group single-biodata-contact">
                                            <p>
                                                {{__('message.biodata_details_contact_msg')}}
                                            </p>
                                            <span>
                                                {{__('message.biodata_details_contact_msg2')}}
                                            </span>
                                            <div class="biodata-details-contact-link">
                                                <a href="{{url('view/biodata/contact/info')}}/{{$biodata->slug}}" class="theme-btn">{{__('label.biodata_details_contact_view_btn')}}</a>
                                                <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" target="_blank" class="theme-btn tutorial-btn popup-video"><i class="icofont-youtube-play"></i>{{__('label.biodata_details_contact_view_btn2')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    {{-- show actual info --}}
                                    <div class="single-biodata-details">
                                        <h4>{{ __('label.contact') }}</h4>
                                        <div class="biodata-details-info-group">
                                            <!-- Single Bio Info Item -->
                                            <div class="biodata-details-info-item">
                                                <label>{{ __('label.candidate_name') }}</label>
                                                <p>
                                                    <span>{{ $biodata ? $biodata->name : '' }}</span>
                                                </p>
                                            </div>
                                            <div class="biodata-details-info-item">
                                                <label>{{ __('label.candidate_contact_no') }}</label>
                                                <p>
                                                    <span>{{ $biodata ? $biodata->contact_no : '' }}</span>
                                                </p>
                                            </div>
                                            <div class="biodata-details-info-item">
                                                <label>{{ __('label.gurdians_contact') }}</label>
                                                <p>
                                                    <span>{{ $biodata ? $biodata->gurdians_mobile_no : '' }}</span>
                                                </p>
                                            </div>
                                            <div class="biodata-details-info-item">
                                                <label>{{ __('label.relation_with_girdian') }}</label>
                                                <p>
                                                    <span>{{ $biodata ? $biodata->relation_with_gurdian : '' }}</span>
                                                </p>
                                            </div>
                                            <div class="biodata-details-info-item">
                                                <label>{{ __('label.biodata_email') }}</label>
                                                <p>
                                                    <span>{{ $biodata ? $biodata->email : '' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @else
                                    <div class="single-biodata-details">
                                        <h4>{{__('label.contact')}}</h4>
                                        <div class="biodata-details-info-group single-biodata-contact">
                                            <p>
                                                {{__('message.biodata_details_contact_msg')}}
                                            </p>
                                            <span>
                                                {{__('message.biodata_details_contact_msg2')}}
                                            </span>
                                            <div class="biodata-details-contact-link">
                                                <a href="{{url('view/biodata/contact/info')}}/{{$biodata->slug}}" class="theme-btn">{{__('label.biodata_details_contact_view_btn')}}</a>
                                                <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" target="_blank" class="theme-btn tutorial-btn popup-video"><i class="icofont-youtube-play"></i>{{__('label.biodata_details_contact_view_btn2')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endauth



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Biodata Details Area -->
@endsection

@section('footer_js')
    <script>
        function alreadyAddedToLikeList() {
            toastr.warning("Already Added in Liked List");
            return false;
        }

        function alreadyAddedToDislikeList() {
            toastr.warning("Already Added in Disliked List");
            return false;
        }

        function copyToClipboard(slug) {
            var baseUrl = window.location.origin;
            navigator.clipboard.writeText(baseUrl + '/biodata/details/' + slug);
            toastr.success("Copied to Clipboard");
            return false;
        }
    </script>
@endsection
