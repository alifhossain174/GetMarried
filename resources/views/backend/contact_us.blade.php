@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Contact Page</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Module</a></li>
                        <li class="breadcrumb-item active">Contact Page</li>
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
                    <form class="form-horizontal" action="{{url('update/contact/page/info')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="page_title" class="col-lg-2 col-md-2 col-form-label">Page Title</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="page_title" value="{{$data->page_title}}" class="form-control @error('page_title') is-invalid @enderror" id="page_title" placeholder="Contact Us">
                                @error('page_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="page_title_bn" class="col-lg-2 col-md-2 col-form-label">Page Title (BN)</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="page_title_bn" value="{{$data->page_title_bn}}" class="form-control @error('page_title_bn') is-invalid @enderror" id="page_title_bn" placeholder="যোগাযোগ করুন">
                                @error('page_title_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="google_map_link" class="col-lg-2 col-md-2 col-form-label">Google Map Link</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="google_map_link" value="{{$data->google_map_link}}" class="form-control @error('google_map_link') is-invalid @enderror" id="google_map_link" placeholder="https://maps.google.com/maps/embed?pb=!1m18!1m12!1md3651.010433632!2d90.4127091144!3d23.78264279346122i768!4f13.1!3m3!1m20cb0cb41!2sSoftifyBD%20Ltd.!5e0!3m2!1sen!2sbd">
                                @error('google_map_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="background_image" class="col-lg-2 col-md-2 col-form-label">Background Image</label>
                            <div class="form-group col-lg-10 col-md-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-success text-white">
                                            <i class="fi fi-rr-picture"></i> Upload Background
                                        </a>
                                    </span>
                                    <input id="thumbnail"
                                        @if ($data->background_image && file_exists(public_path($data->background_image))) value="{{ url($data->background_image) }}" @endif
                                        class="form-control @error('background_image') is-invalid @enderror" type="text"
                                        name="background_image" readonly>
                                    @error('background_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">[Please upload jpg, jpeg, png file of 1920px * 1280px]</small>

                                @if ($data->background_image && file_exists(public_path($data->background_image)))
                                    <label for="image" class="d-block col-form-label">Current Background Image :</label>
                                    <div class="w-75">
                                        <img src="{{ url($data->background_image) }}" class="img-fluid w-25">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="background_color" class="col-lg-2 col-md-2 col-form-label">Background Color</label>
                            <div class="col-lg-3 col-md-3">
                                <input type="text" name="background_color" value="{{$data->background_color}}" class="form-control @error('background_color') is-invalid @enderror" id="background_color" placeholder="Background Color">
                                @error('background_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="priority" class="col-sm-2 col-form-label">Which one to use ?</label>
                            <div class="col-sm-3 pt-1">
                                <select name="priority" id="priority" data-plugin="customselect" class="form-select" required>
                                    <option value="">Select One</option>
                                    <option value="1" @if($data->priority == 1) selected @endif>Background Image</option>
                                    <option value="2" @if($data->priority == 2) selected @endif>Background Color</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">✅︎ Update Info</button>
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
    </script>

@endsection
