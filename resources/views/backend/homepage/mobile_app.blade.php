@extends('backend.master')

@section('header_css')
    <link href="{{ url('backend_assets') }}/css/spectrum.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Homepage Mobile App</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Modules</a></li>
                        <li class="breadcrumb-item active">Homepage Mobile App</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Homepage Mobile App</h4>

                    <form class="form-horizontal" action="{{ url('update/mobile/app/section') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label for="image" class="col-form-label">Background Image</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-success text-white">
                                                <i class="fi fi-rr-picture"></i> Upload Image
                                            </a>
                                        </span>
                                        <input id="thumbnail2" @if ($data->background_image && file_exists(public_path($data->background_image))) value="{{ url($data->background_image) }}" @endif class="form-control @error('image') is-invalid @enderror" type="text" name="background_image" readonly>
                                        @error('background_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">[Please upload jpg, jpeg, png file of 5599px * 2360px]</small>
                                    @if ($data->background_image && file_exists(public_path($data->background_image)))
                                        <label for="background_image" class="d-block col-form-label">Current Background Image :</label>
                                        <div class="w-75">
                                            <img src="{{ url($data->background_image) }}" class="img-fluid w-50">
                                        </div>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="background_color" class="col-form-label">Background Color</label>
                                    <input type="text" name="background_color" value="{{$data->background_color}}" class="form-control @error('background_color') is-invalid @enderror" id="background_color" placeholder="Background Color">
                                    @error('background_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="priority" class="col-form-label">Which one to use ?</label>
                                    <select name="priority" id="priority" data-plugin="customselect" class="form-select" required>
                                        <option value="">Select One</option>
                                        <option value="1" @if($data->priority == 1) selected @endif>Background Image</option>
                                        <option value="2" @if($data->priority == 2) selected @endif>Background Color</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Title</label>
                                            <input type="text" name="title" value="{{$data->title}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Create Biodata without any cost">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title_bn" class="col-form-label">Title (BN)</label>
                                            <input type="text" name="title_bn" value="{{$data->title_bn}}" class="form-control @error('title_bn') is-invalid @enderror" id="title_bn" placeholder="সাদিকরুনে সম্পূর্ণ বিনামূল্যে বায়োডাটা তৈরি করা যায়">
                                            @error('title_bn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Description</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" id="description" placeholder="Write Description Here">{{$data->description}}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="description_bn" class="col-form-label">Description (BN)</label>
                                            <textarea name="description_bn" class="form-control @error('description_bn') is-invalid @enderror" rows="3" id="description_bn" placeholder="অ্যাপ এর মাধ্যমে আপনি সবচেয়ে দ্রুত এবং সহজ উপায়ে...">{{$data->description_bn}}</textarea>
                                            @error('description_bn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="play_store_link" class="col-form-label">Playstore Link</label>
                                            <input name="play_store_link" value="{{$data->play_store_link}}" class="form-control @error('play_store_link') is-invalid @enderror" id="play_store_link" placeholder="https://">
                                            @error('play_store_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="app_store_link" class="col-form-label">App Store Link</label>
                                            <input name="app_store_link" value="{{$data->app_store_link}}" class="form-control @error('app_store_link') is-invalid @enderror" id="app_store_link" placeholder="https://">
                                            @error('app_store_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image" class="col-form-label">Side Image</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                        class="btn btn-success text-white">
                                                        <i class="fi fi-rr-picture"></i> Upload Image
                                                    </a>
                                                </span>
                                                <input id="thumbnail"
                                                    @if ($data->image && file_exists(public_path($data->image))) value="{{ url($data->image) }}" @endif
                                                    class="form-control @error('image') is-invalid @enderror" type="text"
                                                    name="image" readonly>
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <small class="form-text text-muted">[Please upload jpg, jpeg, png file of 1999px * 1550px]</small>
                                            @if ($data->image && file_exists(public_path($data->image)))
                                                <label for="image" class="d-block col-form-label">Current Side Image :</label>
                                                <div class="w-75">
                                                    <img src="{{ url($data->image) }}" class="img-fluid w-50">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="status" class="col-form-label">Status</label>
                                            <select class="form-select" name="status">
                                                <option value="1" @if($data->status == 1) selected @endif>Show this Section</option>
                                                <option value="0" @if($data->status == 0) selected @endif>Hide this Section</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 pt-4">
                                        <button type="submit" class="btn btn-success">✅︎ <b>Update Info</b></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection


@section('footer_js')
    <script src="{{ url('backend_assets') }}/js/spectrum.min.js"></script>
    <script>
        var route_prefix = "/filemanager";
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
        $('#lfm').filemanager('file', {
            prefix: route_prefix
        });
        $('#lfm2').filemanager('file', {
            prefix: route_prefix
        });

        $("#background_color").spectrum({
            preferredFormat: 'hex',
        });
    </script>
@endsection
