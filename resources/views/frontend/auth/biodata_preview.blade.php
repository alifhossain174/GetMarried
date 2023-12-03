@extends('frontend.master')

@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@section('content')
    <section class="user-dashboard-area">
        <div class="user-d-container">
            <div class="user-d-row">
                <a href="#" class="sidebar-trigger trigger-fixed"></a>

                @include('frontend.auth.sideMenu')

                <!-- Dashboard Content -->
                <div class="user-d-content">
                    <div class="preview-biodata-area">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="preview-biodata-head">
                                        <h3>{{__('label.biodata_preview_label')}}</h3>
                                        <a href="{{url('user/edit/biodata')}}" class="theme-btn secondary">{{__('label.edit_more')}}</a>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-8 col-12">
                                        <div class="biodata-general-widget" style="position: relative; top: 0">
                                            <div class="biodata-general-widget-box">
                                                <div class="biodata-general-head">
                                                    <div class="biodata-general-img">
                                                        @if($biodata && $biodata->biodata_type_id == 1)
                                                        <img src="{{url('frontend_assets')}}/assets/images/icons/man.svg" alt="Image" />
                                                        @elseif ($biodata && $biodata->biodata_type_id == 2)
                                                        <img src="{{url('frontend_assets')}}/assets/images/icons/woman.svg" alt="Image" />
                                                        @else
                                                        <img src="{{url('frontend_assets')}}/assets/images/icons/man.svg" alt="Image" />
                                                        @endif
                                                    </div>
                                                    <div class="biodata-general-head-info">
                                                        <h4>{{__('label.biodata_no')}}: <span>{{$biodata ? $biodata->biodata_no : ''}}</span></h4>
                                                    </div>
                                                </div>
                                                <div class="biodata-general-content">
                                                    <div class="biodata-general-each-item">
                                                        <label>{{__('label.biodata_type')}}</label>
                                                        <p>{{$biodata ? (App::currentLocale() == 'en' ? $biodata->biodata_type : $biodata->biodata_type_bn) : ''}}</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>{{__('label.hero_marital_status')}}</label>
                                                        <p>{{$biodata ? (App::currentLocale() == 'en' ? $biodata->marital_condition : $biodata->marital_condition_bn) : ''}}</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>{{__('label.date_of_birth')}}</label>
                                                        <p>{{$biodata ? date("F, Y", strtotime($biodata->created_at)) : ''}}</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>{{__('label.height')}}</label>
                                                        <p>{{$biodata ? (App::currentLocale() == 'en' ? $biodata->height_foot."′" : $numto->bnNum($biodata->height_foot)."′") : ''}} {{$biodata ? (App::currentLocale() == 'en' ? $biodata->height_inch."″" : $numto->bnNum($biodata->height_inch)."″") : ''}}</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>{{__('label.skin_tone')}}</label>
                                                        <p>
                                                            @if ($biodata && $biodata->skin_tone == 1)
                                                            {{__('label.skin_tone_black')}}
                                                            @elseif ($biodata && $biodata->skin_tone == 2)
                                                            {{__('label.skin_tone_brown')}}
                                                            @elseif ($biodata && $biodata->skin_tone == 3)
                                                            {{__('label.skin_tone_bright_brown')}}
                                                            @elseif ($biodata && $biodata->skin_tone == 4)
                                                            {{__('label.skin_tone_white')}}
                                                            @elseif ($biodata && $biodata->skin_tone == 5)
                                                            {{__('label.skin_tone_bright_white')}}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>{{__('label.weight')}}</label>
                                                        <p>{{$biodata ? $biodata->weight : ''}}</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>{{__('label.blood_group')}}</label>
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
                                                        <label>{{__('label.nationality')}}</label>
                                                        <p>{{$biodata ? $biodata->nationality_label : ''}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="biodata-general-links">
                                                @if($biodata)
                                                <a href="javascript:void(0)" onclick="copyToClipboard('{{$biodata->slug}}')" class="theme-btn copy-btn">
                                                    <i class="fi fi-rr-duplicate"></i>Copy Biodata Link
                                                </a>
                                                @endif
                                                {{-- <div class="alert alert-success align-items-center text-center p-1 mt-3" id="copyClipboardMsg" role="alert">
                                                    ✓ Successfully Copied to the Clipboard
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="biodata-details-main">

                                            <div class="single-biodata-details">
                                                <h4>{{__('label.address')}}</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.district')}}</label>
                                                        <p>
                                                            <span>{{$biodata ? (App::currentLocale() == 'en' ? $biodata->permenant_district_name : $biodata->permenant_district_name_bn) : ''}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.upazila')}}</label>
                                                        <p>
                                                            <span>{{$biodata ? (App::currentLocale() == 'en' ? $biodata->permenant_upazila_name : $biodata->permenant_upazila_name_bn) : ''}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.area_name')}}</label>
                                                        <p>
                                                            <span>{{$biodata ? $biodata->permenant_address : ''}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.district')}} ({{__('label.present_address')}})</label>
                                                        <p>
                                                            <span>{{$biodata ? (App::currentLocale() == 'en' ? $biodata->present_district_name : $biodata->present_district_name_bn) : ''}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.upazila')}} ({{__('label.present_address')}})</label>
                                                        <p>
                                                            <span>{{$biodata ? (App::currentLocale() == 'en' ? $biodata->present_upazila_name : $biodata->present_upazila_name_bn) : ''}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.area_name')}} ({{__('label.present_address')}})</label>
                                                        <p>
                                                            <span>{{$biodata ? $biodata->present_address : ''}}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Biodata Details -->
                                            @foreach ($questionSets as $set)
                                            <div class="single-biodata-details">
                                                <h4>{{App::currentLocale() == 'en' ? $set->title : $set->title_bn}}</h4>
                                                <div class="biodata-details-info-group">
                                                    @php
                                                        $questions = DB::table('questions')->where('question_set_id', $set->id)->where('status', 1)->orderBy('serial', 'asc')->get();
                                                    @endphp
                                                    <!-- Single Bio Info Item -->
                                                    @foreach ($questions as $question)

                                                    @php
                                                        $questionAnswer = DB::table('biodata_question_answers')->where('user_id', Auth::user()->id)->where('question_id', $question->id)->first();
                                                    @endphp
                                                    <div class="biodata-details-info-item">
                                                        <label>{{ App::currentLocale() == 'en' ? $question->question : $question->question_bn }}</label>
                                                        @if($question->type == 2)
                                                        @php
                                                            $option = App\Models\MCQ::where('id', $questionAnswer->answer)->first();
                                                        @endphp
                                                        <p>
                                                            <span>{{App::currentLocale() == 'en' ? $option->option : $option->option_bn}}</span>
                                                        </p>
                                                        @else
                                                        <p>
                                                            <span>{{$questionAnswer ? $questionAnswer->answer : ''}}</span>
                                                        </p>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach

                                            <div class="single-biodata-details">
                                                <h4>{{__('label.contact')}}</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.candidate_name')}}</label>
                                                        <p>
                                                            <span>{{$biodata ? $biodata->name : ''}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.gurdians_contact')}}</label>
                                                        <p>
                                                            <span>{{$biodata ? $biodata->gurdians_mobile_no : ''}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.relation_with_girdian')}}</label>
                                                        <p>
                                                            <span>{{$biodata ? $biodata->relation_with_gurdian : ''}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="biodata-details-info-item">
                                                        <label>{{__('label.biodata_email')}}</label>
                                                        <p>
                                                            <span>{{$biodata ? $biodata->email : ''}}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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

@section('footer_js')
    <script>
        function copyToClipboard(slug){
            var baseUrl = window.location.origin;
            navigator.clipboard.writeText(baseUrl+'/biodata/detail/'+slug);
            toastr.success("Copied to Clipboard");
            return false;
        }
    </script>
@endsection
