@extends('backend.master')

@section('header_css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">School Information</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Content Modules</a></li>
                        <li class="breadcrumb-item active">School Information</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pb-4">
                    <form class="form-horizontal" action="{{url('update/school/info')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h5 class="header-title mb-1 mt-0 badge badge-soft-secondary">Basic Info</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="page_title" class="col-form-label">Page Title<span class="text-danger">*</span> :</label>
                                    <input type="text" name="page_title" value="{{$data->page_title}}" class="form-control" id="page_title" placeholder="Page Title" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="school_eiin" class="col-form-label">School EIIN :</label>
                                    <input type="text" name="school_eiin" value="{{$data->school_eiin}}" class="form-control" id="school_eiin" placeholder="School EIIN">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="school_code" class="col-form-label">School Code :</label>
                                    <input type="text" name="school_code" value="{{$data->school_code}}" class="form-control" id="school_code" placeholder="School Code">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="school_reg_no" class="col-form-label">School Reg No :</label>
                                    <input type="text" name="school_reg_no" value="{{$data->school_reg_no}}" class="form-control" id="school_reg_no" placeholder="School Reg No">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="school_name_bn" class="col-form-label">School Name (Bangla) :</label>
                                    <input type="text" name="school_name_bn" value="{{$data->school_name_bn}}" class="form-control" id="school_name_bn" placeholder="School Name in Bangla">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="school_name_en" class="col-form-label">School Name (English)<span class="text-danger">*</span> :</label>
                                    <input type="text" name="school_name_en" value="{{$data->school_name_en}}" class="form-control" id="school_name_en" placeholder="School Name in English" required>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h5 class="header-title mb-1 mt-0 badge badge-soft-secondary">Address</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="address" class="col-form-label">School Address<span class="text-danger">*</span> :</label>
                                    <input type="text" name="address" value="{{$data->address}}" class="form-control" id="address" placeholder="School Address" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="word_no" class="col-form-label">Word No :</label>
                                    <input type="text" name="word_no" value="{{$data->word_no}}" class="form-control" id="word_no" placeholder="Word No">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="union_city_corporation" class="col-form-label">Union/City Corporation :</label>
                                    <input type="text" name="union_city_corporation" value="{{$data->union_city_corporation}}" class="form-control" id="union_city_corporation" placeholder="Union/City Corporation">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="post_office" class="col-form-label">Post Office :</label>
                                    <input type="text" name="post_office" value="{{$data->post_office}}" class="form-control" id="post_office" placeholder="Post Office">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="police_station" class="col-form-label">Police Station :</label>
                                    <input type="text" name="police_station" value="{{$data->police_station}}" class="form-control" id="police_station" placeholder="Police Station">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="division" class="col-form-label">Division<span class="text-danger">*</span> :</label>
                                    <input type="text" name="division" value="{{$data->division}}" class="form-control" id="division" placeholder="Division" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="district" class="col-form-label">District<span class="text-danger">*</span> :</label>
                                    <input type="text" name="district" value="{{$data->address}}" class="form-control" id="address" placeholder="School Address" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="upazila" class="col-form-label">Upazilla :</label>
                                    <input type="text" name="upazila" value="{{$data->upazila}}" class="form-control" id="upazila" placeholder="Upazilla">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h5 class="header-title mb-1 mt-0 badge badge-soft-secondary">Extra Info</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="contact_no" class="col-form-label">Contact No<span class="text-danger">*</span> :</label>
                                    <input type="text" name="contact_no" value="{{$data->contact_no}}" class="form-control" id="contact_no" placeholder="Contact No" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="email" class="col-form-label">Email :</label>
                                    <input type="text" name="email" value="{{$data->email}}" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="website" class="col-form-label">Website :</label>
                                    <input type="text" name="website" value="{{$data->website}}" class="form-control" id="website" placeholder="https://">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="current_students" class="col-form-label">Current Students :</label>
                                    <input type="text" name="current_students" value="{{$data->current_students}}" class="form-control" id="current_students" placeholder="1000">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_shifts" class="col-form-label">Total Shifts :</label>
                                    <input type="text" name="total_shifts" value="{{$data->total_shifts}}" class="form-control" id="total_shifts" placeholder="2 Shifts">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="school_type" class="col-form-label">School Type :</label>
                                    <input type="text" name="school_type" value="{{$data->school_type}}" class="form-control" id="school_type" placeholder="Boys & Girls">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="school_programme" class="col-form-label">School Programme :</label>
                                    <input type="text" name="school_programme" value="{{$data->school_programme}}" class="form-control" id="school_programme" placeholder="Day Shift: Boys; Morning Shift: Girls">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_area" class="col-form-label">Total Land Area :</label>
                                    <input type="text" name="total_area" value="{{$data->total_area}}" class="form-control" id="total_area" placeholder="Total Land Area">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_buildings" class="col-form-label">Total Buildings :</label>
                                    <input type="text" name="total_buildings" value="{{$data->total_buildings}}" class="form-control" id="total_buildings" placeholder="Total Buildings">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_classrooms" class="col-form-label">Total Classrooms :</label>
                                    <input type="text" name="total_classrooms" value="{{$data->total_classrooms}}" class="form-control" id="total_classrooms" placeholder="Total Classrooms">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_multimedia_classrooms" class="col-form-label">Total Multimedia Classrooms :</label>
                                    <input type="text" name="total_multimedia_classrooms" value="{{$data->total_multimedia_classrooms}}" class="form-control" id="total_multimedia_classrooms" placeholder="Total Multimedia Classrooms">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_ict_labs" class="col-form-label">Total ICT Labs :</label>
                                    <input type="text" name="total_ict_labs" value="{{$data->total_ict_labs}}" class="form-control" id="total_ict_labs" placeholder="Total ICT Labs">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_science_labs" class="col-form-label">Total Science Labs :</label>
                                    <input type="text" name="total_science_labs" value="{{$data->total_science_labs}}" class="form-control" id="total_science_labs" placeholder="Total Science Labs">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_library_rooms" class="col-form-label">Total Library Rooms :</label>
                                    <input type="text" name="total_library_rooms" value="{{$data->total_library_rooms}}" class="form-control" id="total_library_rooms" placeholder="Total Library Rooms">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="total_auditoriums" class="col-form-label">Total Auditoriums :</label>
                                    <input type="text" name="total_auditoriums" value="{{$data->total_auditoriums}}" class="form-control" id="total_auditoriums" placeholder="Total Auditoriums">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="area_border" class="col-form-label">School has Border Wall :</label>
                                    <select class="form-select" name="area_border">
                                        <option value="">Select One</option>
                                        <option value="1" @if($data->area_border == 1) selected @endif>Yes</option>
                                        <option value="0" @if($data->area_border == 0) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end mt-4">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-success"><b>Update School Info</b></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- end row -->

@endsection
