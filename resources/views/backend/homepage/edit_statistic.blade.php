@extends('backend.master')

@section('header_css')
    <link href="{{ url('backend_assets') }}/css/spectrum.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Homepage Statistic</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Modules</a></li>
                        <li class="breadcrumb-item active">Edit Homepage Statistic</li>
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
                    <h4 class="mb-3 header-title mt-0">Edit Home Page Statistic</h4>

                    <form class="form-horizontal" action="{{ url('update/homepage/statistic') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="row mb-3">
                            <label for="title" class="col-lg-2 col-md-2 col-form-label">Title</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="title" value="{{$data->title}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Make Biodata">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title_bn" class="col-lg-2 col-md-2 col-form-label">Title (Bn)</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="title_bn" value="{{$data->title_bn}}" class="form-control @error('title_bn') is-invalid @enderror" id="title_bn" placeholder="বায়োডাটা তৈরি করুন">
                                @error('title_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="number" class="col-lg-2 col-md-2 col-form-label">Number</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="number" name="number" value="{{$data->number}}" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="153">
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-lg-2 col-md-2 col-form-label">Icon</label>
                            <div class="form-group col-lg-10 col-md-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
                                            <i class="fi fi-rr-picture"></i> Upload Icon
                                        </a>
                                    </span>
                                    <input id="thumbnail" @if($data->image && file_exists(public_path($data->image))) value="{{url($data->image)}}" @endif class="form-control @error('image') is-invalid @enderror" type="text"
                                        name="image" readonly>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">[Please upload jpg, jpeg, png file of 86px * 86px]</small>

                                @if ($data->image && file_exists(public_path($data->image)))
                                    <label for="image" class="d-block col-form-label">Current Icon :</label>
                                    <div class="w-50">
                                        <img src="{{ url($data->image) }}" class="img-fluid w-25">
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="status" class="col-lg-2 col-md-2 col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-lg-3 col-md-3">
                                <select name="status" data-plugin="customselect" class="form-select" required>
                                    <option value="">Select One</option>
                                    <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                    <option value="0" @if($data->status == 0) selected @endif>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
