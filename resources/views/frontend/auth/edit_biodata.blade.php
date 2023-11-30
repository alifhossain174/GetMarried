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
                                            <a class="list-group-item active" data-bs-toggle="list" href="#tab1" role="tab">
                                                <span>1</span>
                                                {{__('label.general_info')}}
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab2" role="tab">
                                                <span>2</span>
                                                {{__('label.address')}}
                                            </a>

                                            @php $sl=3; @endphp
                                            @foreach ($questionSets as $set)
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab{{$sl}}" role="tab">
                                                <span>{{$sl++}}</span>
                                                {{ App::currentLocale() == 'en' ? $set->title : $set->title_bn }}
                                            </a>
                                            @endforeach

                                            <a class="list-group-item" data-bs-toggle="list" href="#tab10" role="tab">
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
                                                                <input type="date" id="birth_date" name="birth_date" placeholder="dd/mm/yyyy" required />
                                                                <p>{{__('label.date_of_birth_hints')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.height')}}<span>*</span></label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <select class="select2 hero-search-filter-select" id="height_foot" name="height_foot" required>
                                                                            <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                            <option value="2">2′</option>
                                                                            <option value="3">3′</option>
                                                                            <option value="4">4′</option>
                                                                            <option value="5">5′</option>
                                                                            <option value="6">6′</option>
                                                                            <option value="7">7′</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <select class="select2 hero-search-filter-select" id="height_inch" name="height_inch" required>
                                                                            <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                            <option value="1">1″</option>
                                                                            <option value="2">2″</option>
                                                                            <option value="3">3″</option>
                                                                            <option value="4">4″</option>
                                                                            <option value="5">5″</option>
                                                                            <option value="6">6″</option>
                                                                            <option value="7">7″</option>
                                                                            <option value="8">8″</option>
                                                                            <option value="9">9″</option>
                                                                            <option value="10">10″</option>
                                                                            <option value="11">11″</option>
                                                                            <option value="12">12″</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.skin_tone')}}<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" id="skin_tone" name="skin_tone" required>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    <option value="1">{{__('label.skin_tone_black')}}</option>
                                                                    <option value="2">{{__('label.skin_tone_brown')}}</option>
                                                                    <option value="3">{{__('label.skin_tone_bright_brown')}}</option>
                                                                    <option value="4">{{__('label.skin_tone_white')}}</option>
                                                                    <option value="5">{{__('label.skin_tone_bright_white')}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.weight')}}<span>*</span></label>
                                                                <input type="text" id="weight" name="weight" placeholder="{{__('label.your_weight')}}" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.blood_group')}}<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" id="blood_group" name="blood_group" required>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    <option value="1">A+</option>
                                                                    <option value="2">A-</option>
                                                                    <option value="3">B+</option>
                                                                    <option value="4">B-</option>
                                                                    <option value="5">AB+</option>
                                                                    <option value="6">AB-</option>
                                                                    <option value="7">O+</option>
                                                                    <option value="8">O-</option>
                                                                    <option value="9">{{__('label.dont_know')}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.nationality')}}<span>*</span></label>
                                                                <select class="select2 hero-search-filter-select" id="nationality" name="nationality" required>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    @foreach ($nationalities as $nationality)
                                                                    <option value="{{$nationality->id}}">{{$nationality->nationality}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="user-d-edit-biodata-form-button" style="margin-top: 40px;">
                                                                {{-- <button type="button" class="theme-btn secondary">Back</button> --}}
                                                                <button type="button" onclick="saveGeneralInfo()" class="theme-btn">Save & Next</button>
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
                                                                <select class="hero-search-filter-select select2" name="permenant_district_id" required>
                                                                    <option value="">{{__('label.hero_all_district')}}</option>
                                                                    @foreach ($districts as $district)
                                                                    <option value="{{$district->id}}">{{ App::currentLocale() == 'en' ? $district->name : $district->bn_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.upazila')}}<span>*</span></label>
                                                                <select class="hero-search-filter-select select2" name="permenant_upazila_id" required>
                                                                    <option value="">{{__('label.all_upazila')}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.area_name')}}<span>*</span></label>
                                                                <input type="text" name="permenant_address" required />
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
                                                                <select class="hero-search-filter-select select2" name="present_district_id" required>
                                                                    <option value="">{{__('label.hero_all_district')}}</option>
                                                                    @foreach ($districts as $district)
                                                                    <option value="{{$district->id}}">{{ App::currentLocale() == 'en' ? $district->name : $district->bn_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.upazila')}}<span>*</span></label>
                                                                <select class="hero-search-filter-select select2" name="present_upazila_id" required>
                                                                    <option value="">{{__('label.all_upazila')}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.area_name')}}<span>*</span></label>
                                                                <input type="text" name="present_address" required />
                                                                <p>{{__('label.area_name_hints')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="user-d-edit-biodata-form-button">
                                                        <button type="button" class="theme-btn secondary">Back</button>
                                                        <button type="submit" class="theme-btn">Save & Next</button>
                                                    </div>
                                                </form>
                                            </div>


                                            <!-- Tab Three -->
                                            @php $sl=3; @endphp
                                            @foreach ($questionSets as $set)
                                            @php
                                                $questions = DB::table('questions')->where('question_set_id', $set->id)->where('status', 1)->orderBy('serial', 'asc')->get();
                                            @endphp
                                            <div class="tab-pane fade" id="tab{{$sl++}}" role="tabpanel">
                                                <div class="edit-biodata-form-widget">
                                                    <h2 class="edit-biodata-form-title">
                                                        {{ App::currentLocale() == 'en' ? $set->title : $set->title_bn }}
                                                    </h2>
                                                    <div class="edit-biodata-form-data">
                                                        <form action="" method="">
                                                            @foreach ($questions as $question)
                                                            @php
                                                                if($question->type == 2){
                                                                    $options = DB::table('m_c_q_s')->where('question_id', $question->id)->where('status', 1)->orderBy('serial', 'asc')->get();
                                                                }
                                                            @endphp
                                                            <div class="form-group">
                                                                <label>{{ App::currentLocale() == 'en' ? $question->question : $question->question_bn }} @if($question->required)<span>*</span>@endif</label>
                                                                <input type="hidden" name="question[]" value="{{$question->id}}">

                                                                @if($question->type == 1)
                                                                <textarea name="answer[]" @if($question->required) required @endif></textarea>
                                                                @elseif($question->type == 2)
                                                                <select class="hero-search-filter-select select2" name="answer[]" @if($question->required) required @endif>
                                                                    <option value="">{{__('label.form_biodata_report_select_option')}}</option>
                                                                    @foreach ($options as $option)
                                                                    <option value="{{$option->id}}">{{ App::currentLocale() == 'en' ? $option->option : $option->option_bn }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @else
                                                                <input type="text" name="asnser[]" @if($question->required) required @endif>
                                                                @endif

                                                                @if($question->required)
                                                                <p>{{ App::currentLocale() == 'en' ? $question->hints : $question->hints_bn }}</p>
                                                                @endif

                                                            </div>
                                                            @endforeach

                                                            <div class="user-d-edit-biodata-form-button">
                                                                <button type="button" class="theme-btn secondary">Back</button>
                                                                <button type="submit" class="theme-btn">Save & Next</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach


                                            <!-- Tab Ten -->
                                            <div class="tab-pane fade" id="tab10" role="tabpanel">
                                                <div class="edit-biodata-form-widget">
                                                    <h2 class="edit-biodata-form-title">{{__('label.contact')}}</h2>
                                                    <div class="edit-biodata-form-data">
                                                        <form action="" method="">
                                                            <div class="form-group">
                                                                <label>{{__('label.candidate_name')}}<span>*</span></label>
                                                                <input type="text" name="name" required />
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
                                                                        <div class="remove-icon" id="remove-icon" style="display: none" onclick="removeImage()">
                                                                            <i class="fi fi-rr-cross"></i>
                                                                        </div>
                                                                        <img id="uploaded-image" style="display: none" />
                                                                    </div>
                                                                </div>
                                                                <p>{{__('label.candidate_image_hints')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.gurdians_contact')}}<span>*</span></label>
                                                                <input type="tel" name="gurdians_mobile_no" placeholder="01700-000000" required />
                                                                <p>{{__('label.gurdians_contact_hints')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.relation_with_girdian')}}<span>*</span></label>
                                                                <input type="text" name="relation_with_gurdian" placeholder="" required />
                                                                <p>{{__('label.relation_with_girdian_hints')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('label.biodata_email')}}<span>*</span></label>
                                                                <input type="email" name="email" placeholder="your-email@gmail.com" required />
                                                                <p>{{__('label.biodata_email_hints')}}</p>
                                                            </div>

                                                            <div class="user-d-edit-biodata-form-button">
                                                                <button type="button" class="theme-btn secondary">Back</button>
                                                                <button type="submit" class="theme-btn">Save & Next</button>
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
                toastr.error("All the Fields are Required", "Please fill up all the Fields");
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

            $.ajax({
                data: formData,
                url: "{{ url('save/general/info/biodata') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#saveBtn').html('Save');
                    $('#productForm2').trigger("reset");
                    $('#exampleModal2').modal('hide');
                    toastr.success("Data Saved", "Created Successfully");
                    return false;
                },
                error: function (data) {
                    console.log('Error:', data);
                    toastr.error("Failed to Save Data", "Something Went Wrong");
                    return false;
                }
            });
        }
    </script>
@endsection
