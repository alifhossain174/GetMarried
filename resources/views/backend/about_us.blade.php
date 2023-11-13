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
                <h4 class="page-title">About Us</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Content Modules</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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

                    <form class="form-horizontal" action="{{url('update/about/us')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="mb-3 header-title mt-0">Update About Us</h4>

                                <div class="row mb-3">
                                    <label for="page_title" class="col-lg-2 col-md-2 col-form-label">Page Title :</label>
                                    <div class="col-lg-10 col-md-10">
                                        <input type="text" name="page_title" value="{{$data->page_title}}" class="form-control" id="page_title" placeholder="Page Title" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-lg-2 col-md-2 col-form-label">About Us Image :</label>
                                    <div class="form-group col-lg-10 col-md-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
                                                    <i class="fi fi-rr-picture"></i> Upload Image
                                                </a>
                                            </span>
                                            <input id="thumbnail" @if($data->image) value="{{url($data->image)}}" @endif class="form-control" type="text" name="image" readonly>
                                        </div>
                                        <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 648px * 480px ]</small>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @if($data->image && file_exists(public_path($data->image)))
                                        <label for="image" class="d-block col-form-label">Current Image :</label>
                                        <div class="w-75">
                                            <img src="{{url($data->image)}}" class="img-fluid w-25">
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="title" class="col-lg-2 col-md-2 col-form-label">About Us Section Title :</label>
                                    <div class="col-lg-10 col-md-10">
                                        <input type="text" name="title" value="{{$data->title}}" class="form-control" id="title" placeholder="About Us Title" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description" class="col-lg-2 col-md-2 col-form-label">About Us Description :</label>
                                    <div class="col-lg-10 col-md-10">
                                        <textarea id="description" name="description" rows="5" class="form-control" placeholder="Write About Us Description Here">{{$data->description}}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mb-3">
                                    <label for="mission_image" class="col-lg-2 col-md-2 col-form-label">Mission Image :</label>
                                    <div class="form-group col-lg-10 col-md-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-success text-white">
                                                    <i class="fi fi-rr-picture"></i> Upload Image
                                                </a>
                                            </span>
                                            <input id="thumbnail2" @if($data->mission_image) value="{{url($data->mission_image)}}" @endif class="form-control" type="text" name="mission_image" readonly>
                                        </div>
                                        <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 648px * 480px ]</small>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @if($data->mission_image && file_exists(public_path($data->mission_image)))
                                        <label for="image" class="d-block col-form-label">Current Image :</label>
                                        <div class="w-75">
                                            <img src="{{url($data->mission_image)}}" class="img-fluid w-25">
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="mission_title" class="col-lg-2 col-md-2 col-form-label">Mission Section Title :</label>
                                    <div class="col-lg-10 col-md-10">
                                        <input type="text" name="mission_title" value="{{$data->mission_title}}" class="form-control" id="mission_title" placeholder="Mission Title" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="mission_description" class="col-lg-2 col-md-2 col-form-label">Mission Description :</label>
                                    <div class="col-lg-10 col-md-10">
                                        <textarea id="mission_description" name="mission_description" rows="5" class="form-control" placeholder="Write Mission Description Here">{{$data->mission_description}}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mb-3">
                                    <label for="vision_image" class="col-lg-2 col-md-2 col-form-label">Vision Image :</label>
                                    <div class="form-group col-lg-10 col-md-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm3" data-input="thumbnail3" data-preview="holder" class="btn btn-success text-white">
                                                    <i class="fi fi-rr-picture"></i> Upload Image
                                                </a>
                                            </span>
                                            <input id="thumbnail3" @if($data->vision_image) value="{{url($data->vision_image)}}" @endif class="form-control" type="text" name="vision_image">
                                        </div>
                                        <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 648px * 480px ]</small>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @if($data->vision_image && file_exists(public_path($data->vision_image)))
                                        <label for="image" class="d-block col-form-label">Current Image :</label>
                                        <div class="w-75">
                                            <img src="{{url($data->vision_image)}}" class="img-fluid w-25">
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="vision_title" class="col-lg-2 col-md-2 col-form-label">Vision Section Title :</label>
                                    <div class="col-lg-10 col-md-10">
                                        <input type="text" name="vision_title" value="{{$data->vision_title}}" class="form-control" id="vision_title" placeholder="Vision Title" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="vision_description" class="col-lg-2 col-md-2 col-form-label">Vision Description :</label>
                                    <div class="col-lg-10 col-md-10">
                                        <textarea id="vision_description" name="vision_description" rows="5" class="form-control" placeholder="Write Vision Description Here">{{$data->vision_description}}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3" style="padding-top: 3px; background: #f5f5f5; color: #1e1e1e;">
                                <div class="from-group">
                                    <label for="statistics_section_title" class="col-form-label">Statistical Section Title :</label>
                                    <input type="text" name="statistics_section_title" value="{{$data->statistics_section_title}}" class="form-control" id="statistics_section_title" placeholder="Statistical Section Title" required>
                                </div>
                                <hr style="color: #9cbaff;">

                                <div class="from-group mt-1">
                                    <label for="total_students" class="col-form-label">Statistics 1 :</label>
                                    <input type="number" name="total_students" value="{{$data->total_students}}" class="form-control" id="total_students">
                                </div>
                                <div class="from-group mt-1">
                                    <label for="total_students_label" class="col-form-label">Statistics 1 Label :</label>
                                    <input type="text" name="total_students_label" value="{{$data->total_students_label}}" class="form-control" id="total_students_label">
                                </div>
                                <hr style="color: #9cbaff;">

                                <div class="from-group mt-1">
                                    <label for="total_teachers" class="col-form-label">Statistics 2 :</label>
                                    <input type="number" name="total_teachers" value="{{$data->total_teachers}}" class="form-control" id="total_teachers">
                                </div>
                                <div class="from-group mt-1">
                                    <label for="total_teachers_label" class="col-form-label">Statistics 2 Label :</label>
                                    <input type="text" name="total_teachers_label" value="{{$data->total_teachers_label}}" class="form-control" id="total_teachers_label">
                                </div>
                                <hr style="color: #9cbaff;">

                                <div class="from-group mt-1">
                                    <label for="total_employees" class="col-form-label">Statistics 3 :</label>
                                    <input type="number" name="total_employees" value="{{$data->total_employees}}" class="form-control" id="total_employees">
                                </div>
                                <div class="from-group mt-1">
                                    <label for="total_employees_label" class="col-form-label">Statistics 3 Label :</label>
                                    <input type="text" name="total_employees_label" value="{{$data->total_employees_label}}" class="form-control" id="total_employees_label">
                                </div>
                                <hr style="color: #9cbaff;">

                                <div class="from-group mt-1">
                                    <label for="total_rooms" class="col-form-label">Statistics 4 :</label>
                                    <input type="number" name="total_rooms" value="{{$data->total_rooms}}" class="form-control" id="total_employees">
                                </div>
                                <div class="from-group mt-1">
                                    <label for="total_rooms_label" class="col-form-label">Statistics 4 Label :</label>
                                    <input type="text" name="total_rooms_label" value="{{$data->total_rooms_label}}" class="form-control" id="total_rooms_label">
                                </div>
                                <hr style="color: #9cbaff;">

                                <div class="from-group mt-1">
                                    <label for="total_buildings" class="col-form-label">Statistics 5 :</label>
                                    <input type="number" name="total_buildings" value="{{$data->total_buildings}}" class="form-control" id="total_buildings">
                                </div>
                                <div class="from-group mt-1">
                                    <label for="total_buildings_label" class="col-form-label">Statistics 5 Label :</label>
                                    <input type="text" name="total_buildings_label" value="{{$data->total_buildings_label}}" class="form-control" id="total_buildings_label">
                                </div>
                            </div>

                            <div class="row justify-content-end pt-2">
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-success">Update About Us</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
    <!-- end row -->

@endsection


@section('footer_js')

    <script>
        var route_prefix = "/filemanager";
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
        $('#lfm').filemanager('file', {prefix: route_prefix});
        $('#lfm2').filemanager('file', {prefix: route_prefix});
        $('#lfm3').filemanager('file', {prefix: route_prefix});


        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 150,
        });

        CKEDITOR.replace('mission_description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 150,
        });

        CKEDITOR.replace('vision_description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 150,
        });
    </script>


@endsection
