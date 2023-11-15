@extends('backend.master')

@section('header_css')
    <link href="{{ url('backend_assets') }}/css/spectrum.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Home Page Banner</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Modules</a></li>
                        <li class="breadcrumb-item active">Home Page Banner</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Home Page Banner</h4>

                    <form class="form-horizontal" action="{{ url('update/homepage/banner') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="banner_title" class="col-lg-2 col-md-2 col-form-label">Banner Title</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="banner_title" value="{{$data->banner_title}}" class="form-control @error('banner_title') is-invalid @enderror" id="banner_title" placeholder="Trusted Platform for Bride & Groom">
                                @error('banner_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="banner_title_bn" class="col-lg-2 col-md-2 col-form-label">Banner Title (BN)</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="banner_title_bn" value="{{$data->banner_title_bn}}" class="form-control @error('banner_title_bn') is-invalid @enderror" id="banner_title_bn" placeholder="পাত্র পাত্রী খোঁজার একমাত্র বিশ্বস্ত মাধ্যম!">
                                @error('banner_title_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="banner_description" class="col-lg-2 col-md-2 col-form-label">Banner
                                Description</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="banner_description" value="{{$data->banner_description}}" class="form-control @error('banner_description') is-invalid @enderror" id="banner_description" placeholder="Find from your own area">
                                @error('banner_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="banner_description_bn" class="col-lg-2 col-md-2 col-form-label">Banner Description (BN)</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="banner_description_bn" value="{{$data->banner_description_bn}}" class="form-control @error('banner_description_bn') is-invalid @enderror" id="banner_description_bn" placeholder="আপনার জেলার পাত্র/পাত্রী খুঁজে নিন খুব সহজেই। ">
                                @error('banner_description_bn')
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
                                    <option value="1" selected>Background Image</option>
                                    <option value="2">Background Color</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">✅︎ Update Info</button>
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

        $("#background_color").spectrum({
            preferredFormat: 'hex',
        });
    </script>
@endsection
