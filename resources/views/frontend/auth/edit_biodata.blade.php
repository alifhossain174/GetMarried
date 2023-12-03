@extends('frontend.master')


@section('header_css')
    <style>
        input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea{
            color: #1e1e1e;
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
                                <h3 class="user-d-breadcrumbs-title">{{__('label.user_menu_edit_biodata')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="user-d-edit-biodata">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-9 col-12">
                                <div class="user-d-edit-biodata-details">
                                    <!-- Tab Menu -->
                                    <div class="user-d-edit-biodata-tab-menu">
                                        <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item active" data-bs-toggle="list" href="#tab1" id="tabButton1" role="tab">
                                                <span>1</span>
                                                {{__('label.general_info')}}
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab2" id="tabButton2" role="tab">
                                                <span>2</span>
                                                {{__('label.address')}}
                                            </a>

                                            @php $sl=3; @endphp
                                            @foreach ($questionSets as $set)
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab{{$sl}}" id="tabButton{{$sl}}" role="tab">
                                                <span>{{$sl++}}</span>
                                                {{ App::currentLocale() == 'en' ? $set->title : $set->title_bn }}
                                            </a>
                                            @endforeach

                                            <a class="list-group-item" data-bs-toggle="list" href="#tab{{$sl}}" id="tabButton{{$sl}}" role="tab">
                                                <span>10</span>
                                                {{__('label.contact')}}
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tab Details -->
                                    <div class="user-d-edit-biodata-tab-details">

                                        <div class="tab-content" id="nav-tabContent">

                                            <!-- Tab One -->
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                <div class="edit-biodata-form-widget">
                                                    <h2 class="edit-biodata-form-title">
                                                        {{__('label.general_info')}}
                                                    </h2>
                                                    <div class="edit-biodata-form-data">
                                                        <form action="" method="">
                                                            <div class="form-group">
                                                                <label>{{__('label.biodata_type')}}<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" id="biodata_type_id" name="biodata_type_id" required>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    @foreach ($biodataTypes as $type)
                                                                    <option value="{{$type->id}}" @if($biodata && $biodata->biodata_type_id == $type->id) selected @endif>{{ App::currentLocale() == 'en' ? $type->title : $type->title_bn }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.hero_marital_status')}}<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" id="marital_condition_id" name="marital_condition_id" required>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    @foreach ($maritalConditions as $condition)
                                                                    <option value="{{$condition->id}}" @if($biodata && $biodata->marital_condition_id == $condition->id) selected @endif>{{ App::currentLocale() == 'en' ? $condition->title : $condition->title_bn }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.date_of_birth')}}<span>*</span></label>
                                                                <input type="date" id="birth_date" name="birth_date" value="{{$biodata ? $biodata->birth_date : ''}}" placeholder="dd/mm/yyyy" required />
                                                                <p>{{__('label.date_of_birth_hints')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.height')}}<span>*</span></label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <select class="select2 hero-search-filter-select" id="height_foot" name="height_foot" required>
                                                                            <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                            <option value="2" @if($biodata && $biodata->height_foot == 2) selected @endif>2′</option>
                                                                            <option value="3" @if($biodata && $biodata->height_foot == 3) selected @endif>3′</option>
                                                                            <option value="4" @if($biodata && $biodata->height_foot == 4) selected @endif>4′</option>
                                                                            <option value="5" @if($biodata && $biodata->height_foot == 5) selected @endif>5′</option>
                                                                            <option value="6" @if($biodata && $biodata->height_foot == 6) selected @endif>6′</option>
                                                                            <option value="7" @if($biodata && $biodata->height_foot == 7) selected @endif>7′</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <select class="select2 hero-search-filter-select" id="height_inch" name="height_inch" required>
                                                                            <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                            <option value="1" @if($biodata && $biodata->height_inch == 1) selected @endif>1″</option>
                                                                            <option value="2" @if($biodata && $biodata->height_inch == 2) selected @endif>2″</option>
                                                                            <option value="3" @if($biodata && $biodata->height_inch == 3) selected @endif>3″</option>
                                                                            <option value="4" @if($biodata && $biodata->height_inch == 4) selected @endif>4″</option>
                                                                            <option value="5" @if($biodata && $biodata->height_inch == 5) selected @endif>5″</option>
                                                                            <option value="6" @if($biodata && $biodata->height_inch == 6) selected @endif>6″</option>
                                                                            <option value="7" @if($biodata && $biodata->height_inch == 7) selected @endif>7″</option>
                                                                            <option value="8" @if($biodata && $biodata->height_inch == 8) selected @endif>8″</option>
                                                                            <option value="9" @if($biodata && $biodata->height_inch == 9) selected @endif>9″</option>
                                                                            <option value="10" @if($biodata && $biodata->height_inch == 10) selected @endif>10″</option>
                                                                            <option value="11" @if($biodata && $biodata->height_inch == 11) selected @endif>11″</option>
                                                                            <option value="12" @if($biodata && $biodata->height_inch == 12) selected @endif>12″</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.skin_tone')}}<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" id="skin_tone" name="skin_tone" required>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    <option value="1" @if($biodata && $biodata->skin_tone == 1) selected @endif>{{__('label.skin_tone_black')}}</option>
                                                                    <option value="2" @if($biodata && $biodata->skin_tone == 2) selected @endif>{{__('label.skin_tone_brown')}}</option>
                                                                    <option value="3" @if($biodata && $biodata->skin_tone == 3) selected @endif>{{__('label.skin_tone_bright_brown')}}</option>
                                                                    <option value="4" @if($biodata && $biodata->skin_tone == 4) selected @endif>{{__('label.skin_tone_white')}}</option>
                                                                    <option value="5" @if($biodata && $biodata->skin_tone == 5) selected @endif>{{__('label.skin_tone_bright_white')}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.weight')}}<span>*</span></label>
                                                                <input type="text" id="weight" name="weight" value="{{$biodata ? $biodata->weight : ''}}" placeholder="{{__('label.your_weight')}}" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.blood_group')}}<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" id="blood_group" name="blood_group" required>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    <option value="1" @if($biodata && $biodata->blood_group == 1) selected @endif>A+</option>
                                                                    <option value="2" @if($biodata && $biodata->blood_group == 2) selected @endif>A-</option>
                                                                    <option value="3" @if($biodata && $biodata->blood_group == 3) selected @endif>B+</option>
                                                                    <option value="4" @if($biodata && $biodata->blood_group == 4) selected @endif>B-</option>
                                                                    <option value="5" @if($biodata && $biodata->blood_group == 5) selected @endif>AB+</option>
                                                                    <option value="6" @if($biodata && $biodata->blood_group == 6) selected @endif>AB-</option>
                                                                    <option value="7" @if($biodata && $biodata->blood_group == 7) selected @endif>O+</option>
                                                                    <option value="8" @if($biodata && $biodata->blood_group == 8) selected @endif>O-</option>
                                                                    <option value="9" @if($biodata && $biodata->blood_group == 9) selected @endif>{{__('label.dont_know')}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.nationality')}}<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" id="nationality" name="nationality" required>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    @foreach ($nationalities as $nationality)
                                                                    <option value="{{$nationality->id}}" @if($biodata && $biodata->nationality == $nationality->id) selected @endif>{{$nationality->nationality}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="user-d-edit-biodata-form-button" style="margin-top: 40px;">
                                                                {{-- <button type="button" class="theme-btn secondary">Back</button> --}}
                                                                <button type="button" onclick="saveGeneralInfo()" class="theme-btn">
                                                                    <img id="loader" src="{{url('frontend_assets')}}/assets/images/loader.gif" style="display:none; width: 20px; margin-right: 5px;">Save & Next
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tab Two -->
                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                <form action="" method="">
                                                    <div class="edit-biodata-form-widget">
                                                        <h2 class="edit-biodata-form-title">
                                                            {{__('label.address')}}
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>{{__('label.district')}}<span>*</span></label>
                                                                <select class="hero-search-filter-select select2" name="permenant_district_id" id="permenant_district_id" required>
                                                                    <option value="">{{__('label.hero_all_district')}}</option>
                                                                    @foreach ($districts as $district)
                                                                    <option value="{{$district->id}}" @if($biodata && $biodata->permenant_district_id == $district->id) selected @endif>{{ App::currentLocale() == 'en' ? $district->name : $district->bn_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.upazila')}}<span>*</span></label>
                                                                <select class="hero-search-filter-select select2" name="permenant_upazila_id" id="permenant_upazila_id" required>
                                                                    <option value="">{{__('label.all_upazila')}}</option>
                                                                    @if($biodata && $biodata->permenant_upazila_id > 0 && $biodata->permenant_district_id > 0)
                                                                        @php
                                                                            $permenantUpazilas = DB::table('upazilas')->where('district_id', $biodata->permenant_district_id)->get();
                                                                        @endphp
                                                                        @foreach ($permenantUpazilas as $upazila)
                                                                        <option value="{{$upazila->id}}" @if($biodata->permenant_upazila_id == $upazila->id) selected @endif>{{ App::currentLocale() == 'en' ? $upazila->name : $upazila->bn_name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.area_name')}}<span>*</span></label>
                                                                <input type="text" name="permenant_address" id="permenant_address" value="{{$biodata ? $biodata->permenant_address : ''}}" required />
                                                                <p>{{__('label.area_name_hints')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="edit-biodata-form-widget" style="margin-top: 24px">
                                                        <h2 class="edit-biodata-form-title">
                                                            {{__('label.present_address')}}
                                                        </h2>
                                                        <div class="edit-biodata-form-data">
                                                            <div class="form-group">
                                                                <label>{{__('label.district')}}<span>*</span></label>
                                                                <select class="hero-search-filter-select select2" name="present_district_id" id="present_district_id" required>
                                                                    <option value="">{{__('label.hero_all_district')}}</option>
                                                                    @foreach ($districts as $district)
                                                                    <option value="{{$district->id}}" @if($biodata && $biodata->present_district_id == $district->id) selected @endif>{{ App::currentLocale() == 'en' ? $district->name : $district->bn_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.upazila')}}<span>*</span></label>
                                                                <select class="hero-search-filter-select select2" name="present_upazila_id" id="present_upazila_id" required>
                                                                    <option value="">{{__('label.all_upazila')}}</option>
                                                                    @if($biodata && $biodata->present_upazila_id > 0 && $biodata->present_district_id > 0)
                                                                        @php
                                                                            $presentUpazilas = DB::table('upazilas')->where('district_id', $biodata->present_district_id)->get();
                                                                        @endphp
                                                                        @foreach ($presentUpazilas as $upazila)
                                                                        <option value="{{$upazila->id}}" @if($biodata->present_upazila_id == $upazila->id) selected @endif>{{ App::currentLocale() == 'en' ? $upazila->name : $upazila->bn_name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.area_name')}}<span>*</span></label>
                                                                <input type="text" name="present_address" id="present_address" value="{{$biodata ? $biodata->present_address : ''}}" required />
                                                                <p>{{__('label.area_name_hints')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="user-d-edit-biodata-form-button">
                                                        <button type="button" onclick="goToPrevTab(2)" class="theme-btn secondary">Back</button>
                                                        <button type="button" onclick="saveAddress()" class="theme-btn">
                                                            <img id="loader2" src="{{url('frontend_assets')}}/assets/images/loader.gif" style="display:none; width: 20px; margin-right: 5px;">Save & Next
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>


                                            <!-- Tab Three -->
                                            @php $sl=3; @endphp
                                            @foreach ($questionSets as $set)
                                            @php
                                                $questions = DB::table('questions')->where('question_set_id', $set->id)->where('status', 1)->orderBy('serial', 'asc')->get();
                                            @endphp
                                            <div class="tab-pane fade" id="tab{{$sl}}" role="tabpanel">
                                                <div class="edit-biodata-form-widget">
                                                    <h2 class="edit-biodata-form-title">
                                                        {{ App::currentLocale() == 'en' ? $set->title : $set->title_bn }}
                                                    </h2>
                                                    <div class="edit-biodata-form-data">
                                                        <form id="productForm{{$sl}}" name="productForm{{$sl}}" action="" method="">
                                                            @foreach ($questions as $question)
                                                            @php
                                                                if($question->type == 2){
                                                                    $options = DB::table('m_c_q_s')->where('question_id', $question->id)->where('status', 1)->orderBy('serial', 'asc')->get();
                                                                }
                                                            @endphp
                                                            <input type="hidden" name="question_set_id[]" value="{{$set->id}}">
                                                            <div class="form-group">
                                                                <label>{{ App::currentLocale() == 'en' ? $question->question : $question->question_bn }} @if($question->required)<span>*</span>@endif</label>
                                                                <input type="hidden" name="question[]" value="{{$question->id}}">

                                                                @php
                                                                    $questionAnswer = DB::table('biodata_question_answers')->where('user_id', Auth::user()->id)->where('question_id', $question->id)->first();
                                                                @endphp

                                                                @if($question->type == 1)
                                                                <textarea class="answer" name="answer[]" @if($question->required) required @endif>{{$questionAnswer ? $questionAnswer->answer : ''}}</textarea>
                                                                @elseif($question->type == 2)
                                                                <select class="hero-search-filter-select select2 answer" name="answer[]" @if($question->required) required @endif>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    @foreach ($options as $option)
                                                                    <option value="{{$option->id}}" @if($questionAnswer && $questionAnswer->answer == $option->id) selected @endif>{{ App::currentLocale() == 'en' ? $option->option : $option->option_bn }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @else
                                                                <input type="text" class="answer" name="answer[]" value="{{$questionAnswer ? $questionAnswer->answer : ''}}" @if($question->required) required @endif>
                                                                @endif

                                                                @if($question->required)
                                                                <p>{{ App::currentLocale() == 'en' ? $question->hints : $question->hints_bn }}</p>
                                                                @endif

                                                            </div>
                                                            @endforeach

                                                            <div class="user-d-edit-biodata-form-button">
                                                                <button type="button" onclick="goToPrevTab({{$sl}})" class="theme-btn secondary">Back</button>
                                                                <button type="button" onclick="saveBioDataInfo({{$sl}})" class="theme-btn">
                                                                    <img id="loader{{$sl}}" src="{{url('frontend_assets')}}/assets/images/loader.gif" style="display:none; width: 20px; margin-right: 5px;"> Save & Next
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $sl++; @endphp
                                            @endforeach


                                            <!-- Last Tab -->
                                            <div class="tab-pane fade" id="tab{{$sl}}" role="tabpanel">
                                                <div class="edit-biodata-form-widget">
                                                    <h2 class="edit-biodata-form-title">{{__('label.contact')}}</h2>
                                                    <div class="edit-biodata-form-data">
                                                        <form action="" method="">
                                                            <div class="form-group">
                                                                <label>{{__('label.candidate_name')}}<span>*</span></label>
                                                                <input type="text" name="candidate_name" value="{{$biodata ? $biodata->name : ''}}" id="candidate_name" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.candidate_image')}}<span>*</span></label>
                                                                <div class="upload-img-input">
                                                                    <div class="library-photo-input">
                                                                        <input type="file" accept="image/*" id="library-photo-input" class="hidden" name="image" onchange="uploadLibraryPhoto()" />
                                                                        <label for="library-photo-input">
                                                                            <i class="fi fi-rr-upload"></i> <span>Upload photo</span>
                                                                        </label>
                                                                    </div>
                                                                    <div style="position: relative">
                                                                        <div class="remove-icon" id="remove-icon" @if($biodata && file_exists(public_path($biodata->image))) style="display: block" @else style="display: none" @endif onclick="removeImage()">
                                                                            <i class="fi fi-rr-cross"></i>
                                                                        </div>
                                                                        <img id="uploaded-image" @if($biodata && file_exists(public_path($biodata->image))) src="{{url($biodata->image)}}" style="display: block" @else style="display: none" @endif />
                                                                    </div>
                                                                </div>
                                                                <p>{{__('label.candidate_image_hints')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.gurdians_contact')}}<span>*</span></label>
                                                                <input type="tel" name="gurdians_mobile_no" id="gurdians_mobile_no" value="{{$biodata ? $biodata->gurdians_mobile_no : ''}}" placeholder="01700-000000" required />
                                                                <p>{{__('label.gurdians_contact_hints')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.relation_with_girdian')}}<span>*</span></label>
                                                                <input type="text" name="relation_with_gurdian" id="relation_with_gurdian" value="{{$biodata ? $biodata->relation_with_gurdian : ''}}" placeholder="" required />
                                                                <p>{{__('label.relation_with_girdian_hints')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.biodata_email')}}<span>*</span></label>
                                                                <input type="text" name="email" id="email" value="{{$biodata ? $biodata->email : ''}}" placeholder="your-email@gmail.com" required />
                                                                <p>{{__('label.biodata_email_hints')}}</p>
                                                            </div>

                                                            <div class="user-d-edit-biodata-form-button">
                                                                <button type="button" onclick="goToPrevTab({{$sl}})" class="theme-btn secondary">Back</button>
                                                                <button type="button" onclick="saveContactInfo({{$sl}})" class="theme-btn">
                                                                    <img id="loader{{$sl}}" src="{{url('frontend_assets')}}/assets/images/loader.gif" style="display:none; width: 20px; margin-right: 5px;">Submit Biodata
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- End Tab Details -->
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function saveGeneralInfo(){

            if(!$("#biodata_type_id").val() || !$("#marital_condition_id").val() || !$("#birth_date").val() || !$("#height_foot").val() || !$("#height_inch").val() || !$("#skin_tone").val() || !$("#weight").val() || !$("#blood_group").val() || !$("#nationality").val()){
                toastr.error("Please fill up the required fields", "Failed to Save Info");
                return false;
            }

            var formData = new FormData();
            formData.append("biodata_type_id", $("#biodata_type_id").val());
            formData.append("marital_condition_id", $("#marital_condition_id").val());
            formData.append("birth_date", $("#birth_date").val());
            formData.append("height_foot", $("#height_foot").val());
            formData.append("height_inch", $("#height_inch").val());
            formData.append("skin_tone", $("#skin_tone").val());
            formData.append("weight", $("#weight").val());
            formData.append("blood_group", $("#blood_group").val());
            formData.append("nationality", $("#nationality").val());

            $("#loader").show();
            $.ajax({
                data: formData,
                url: "{{ url('save/general/info/biodata') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    toastr.success("Information Saved", "Created Successfully");
                    $("#loader").hide();

                    $('#tabButton1').removeClass('active');
                    $('#tab1').removeClass('active show');

                    $('#tabButton2').addClass('active');
                    $('#tab2').addClass('active show');

                    return false;
                },
                error: function (data) {
                    console.log('Error:', data);
                    toastr.error("Failed to Save Data", "Something Went Wrong");
                    return false;
                }
            });
        }

        function saveAddress(){

            if(!$("#permenant_district_id").val() || !$("#permenant_upazila_id").val() || !$("#permenant_address").val() || !$("#present_district_id").val() || !$("#present_upazila_id").val() || !$("#present_address").val()){
                toastr.error("Please fill up the required fields", "Failed to Save Info");
                return false;
            }

            var formData = new FormData();
            formData.append("permenant_district_id", $("#permenant_district_id").val());
            formData.append("permenant_upazila_id", $("#permenant_upazila_id").val());
            formData.append("permenant_address", $("#permenant_address").val());
            formData.append("present_district_id", $("#present_district_id").val());
            formData.append("present_upazila_id", $("#present_upazila_id").val());
            formData.append("present_address", $("#present_address").val());

            $("#loader2").show();
            $.ajax({
                data: formData,
                url: "{{ url('save/address/biodata') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    toastr.success("Information Saved", "Created Successfully");
                    $("#loader2").hide();

                    $('#tabButton2').removeClass('active');
                    $('#tab2').removeClass('active show');

                    $('#tabButton3').addClass('active');
                    $('#tab3').addClass('active show');

                    return false;
                },
                error: function (data) {
                    console.log('Error:', data);
                    toastr.error("Failed to Save Data", "Something Went Wrong");
                    return false;
                }
            });
        }

        function saveBioDataInfo(crntTab){

            // input field validation start
            var selectFields = Number($('#productForm'+crntTab+' select.answer').length);
            var inputFields = Number($('#productForm'+crntTab+' input.answer').length);
            var textareaFields = Number($('#productForm'+crntTab+' textarea.answer').length);
            var totalFields = selectFields+inputFields+textareaFields;

            for(var i=0; i<totalFields; i++){
                var selectElem = $('#productForm'+crntTab+' select.answer')[i];
                var inputElem = $('#productForm'+crntTab+' input.answer')[i];
                var textareaElem = $('#productForm'+crntTab+' textarea.answer')[i];

                if((selectElem && selectElem.hasAttribute('required') && selectElem.value == '') || (inputElem && inputElem.hasAttribute('required') && inputElem.value == '') || (textareaElem && textareaElem.hasAttribute('required') && textareaElem.value == '')){
                    toastr.error("Please fill up the required fields", "Failed to Save Info");
                    return false;
                }
            }
            // input field validation end


            $("#loader"+crntTab).show();
            $.ajax({
                data: $('#productForm'+crntTab).serialize(),
                url: "{{ url('save/biodata/info') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $("#loader"+crntTab).hide();
                    var currentTab = crntTab;
                    var nextTab = Number(crntTab) + 1;

                    $('#tabButton'+nextTab).addClass('active');
                    $('#tab'+nextTab).addClass('active show');

                    $('#tabButton'+currentTab).removeClass('active');
                    $('#tab'+currentTab).removeClass('active show');

                    toastr.success("Information Saved", "Saved Successfully");
                    return false;
                },
                error: function (data) {
                    console.log('Error:', data);
                    toastr.error("Failed to Save Data", "Something Went Wrong");
                    return false;
                }
            });

        }

        function saveContactInfo(crntTab){

            if(!$("#candidate_name").val() || !$("#gurdians_mobile_no").val() || !$("#relation_with_gurdian").val() || !$("#email").val()){
                toastr.error("Please fill up the required fields", "Failed to Save Info");
                return false;
            }

            var formData = new FormData();
            formData.append("candidate_name", $("#candidate_name").val());
            formData.append("gurdians_mobile_no", $("#gurdians_mobile_no").val());
            formData.append("relation_with_gurdian", $("#relation_with_gurdian").val());
            formData.append("email", $("#email").val());
            formData.append('image', $("#library-photo-input")[0].files[0]);

            $("#loader"+crntTab).show();
            $.ajax({
                data: formData,
                url: "{{ url('save/contact/info/biodata') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    toastr.success("Biodata Submitted for Approval", "Congrats!");
                    $("#loader"+crntTab).hide();

                    return false;
                },
                error: function (data) {
                    console.log('Error:', data);
                    toastr.error("Failed to Save Data", "Something Went Wrong");
                    return false;
                }
            });

        }

        function goToPrevTab(crntTab){
            var currentTab = crntTab;
            var prevTab = Number(crntTab) - 1;

            $('#tabButton'+prevTab).addClass('active');
            $('#tab'+prevTab).addClass('active show');

            $('#tabButton'+currentTab).removeClass('active');
            $('#tab'+currentTab).removeClass('active show');
        }

        // dependency dropdown
        $(document).ready(function () {
            $('#permenant_district_id').on('change', function () {
                var permenantDistrictId = this.value;
                $("#permenant_upazila_id").html('');
                $.ajax({
                    url: "{{url('/district/wise/upazila')}}",
                    type: "POST",
                    data: {
                        permenant_district_id: permenantDistrictId,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#permenant_upazila_id').html('<option value="">Select Option</option>');
                        $.each(result, function (key, value) {
                            @if(App::currentLocale() == 'en')
                            $("#permenant_upazila_id").append('<option value="' + value.id + '" @if($biodata && $biodata->permenant_upazila_id == "'+value.id+'") selected @endif>' + value.name + '</option>');
                            @else
                            $("#permenant_upazila_id").append('<option value="' + value.id + '" @if($biodata && $biodata->permenant_upazila_id == "'+value.id+'") selected @endif>' + value.bn_name + '</option>');
                            @endif
                        });
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#present_district_id').on('change', function () {
                var permenantDistrictId = this.value;
                $("#present_upazila_id").html('');
                $.ajax({
                    url: "{{url('/district/wise/upazila')}}",
                    type: "POST",
                    data: {
                        permenant_district_id: permenantDistrictId,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#present_upazila_id').html('<option value="">Select Option</option>');
                        $.each(result, function (key, value) {
                            @if(App::currentLocale() == 'en')
                            $("#present_upazila_id").append('<option value="' + value.id + '" @if($biodata && $biodata->present_upazila_id == "'+value.id+'") selected @endif>' + value.name + '</option>');
                            @else
                            $("#present_upazila_id").append('<option value="' + value.id + '" @if($biodata && $biodata->present_upazila_id == "'+value.id+'") selected @endif>' + value.bn_name + '</option>');
                            @endif
                        });
                    }
                });
            });
        });


        function uploadLibraryPhoto() {
            // Get the file that the user selected.
            const fileInput = document.getElementById("library-photo-input");
            const file = fileInput.files[0];

            // Check if a file was selected
            if (file) {
            // Create a new FileReader
            const reader = new FileReader();

            // Set up the onload event handler for the reader
            reader.onload = function () {
                // Get the element where you want to display the uploaded image.
                const imageElement = document.getElementById("uploaded-image");
                // Get the remove icon element
                const removeIcon = document.getElementById("remove-icon");
                // Set the source of the image element to the data URL from the FileReader.
                imageElement.src = reader.result;
                // Show the image element.
                imageElement.style.display = "block";
                // Show the remove icon.
                removeIcon.style.display = "block";
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            // Get the image element
            const imageElement = document.getElementById("uploaded-image");
            // Get the remove icon element
            const removeIcon = document.getElementById("remove-icon");
            // Hide the image element
            imageElement.style.display = "none";
            // Clear the source (removes the image)
            imageElement.src = "";
            // Hide the remove icon again
            removeIcon.style.display = "none";
            // Reset the file input
            const fileInput = document.getElementById("library-photo-input");
            fileInput.value = "";
        }
    </script>
@endsection
