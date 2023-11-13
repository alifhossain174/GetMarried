@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Logo & Favicon</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config Modules</a></li>
                        <li class="breadcrumb-item active">Logo & Favicon</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Logo & Favicon</h4>

                    <form class="form-horizontal" action="{{url('update/logo/favicon')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="tab_title" class="col-lg-2 col-md-2 col-form-label">Browser Tab Title</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="tab_title" value="{{$data->tab_title}}" class="form-control @error('tab_title') is-invalid @enderror" id="tab_title" placeholder="Tab Title">
                                @error('tab_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-lg-2 col-md-2 col-form-label">Website Logo</label>
                            <div class="form-group col-lg-10 col-md-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
                                            <i class="fi fi-rr-picture"></i> Upload Logo
                                        </a>
                                    </span>
                                    <input id="thumbnail" @if($data->logo && file_exists(public_path($data->logo))) value="{{url($data->logo)}}" @endif class="form-control" type="text" name="logo" readonly>
                                </div>
                                <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 285px * 56px ]</small>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @if ($data->logo && file_exists(public_path($data->logo)))
                                    <label for="image" class="d-block col-form-label">Current Logo :</label>
                                    <div class="w-75">
                                        <img src="{{ url($data->logo) }}" class="img-fluid w-25">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-lg-2 col-md-2 col-form-label">Website Favicon</label>
                            <div class="form-group col-lg-10 col-md-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-success text-white">
                                            <i class="fi fi-rr-picture"></i> Upload Favicon
                                        </a>
                                    </span>
                                    <input id="thumbnail2" @if($data->favicon && file_exists(public_path($data->favicon))) value="{{url($data->favicon)}}" @endif class="form-control" type="text" name="favicon" readonly>
                                </div>
                                <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 32px * 32px ]</small>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @if ($data->favicon && file_exists(public_path($data->favicon)))
                                    <label for="image" class="d-block col-form-label">Current Favicon :</label>
                                    <div class="w-75">
                                        <img src="{{ url($data->favicon) }}" class="img-fluid w-25">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">Update Info</button>
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

    <script>
        var route_prefix = "/filemanager";
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
        $('#lfm').filemanager('file', {prefix: route_prefix});
        $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>

@endsection
