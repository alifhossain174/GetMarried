@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Slider</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Content Modules</a></li>
                        <li class="breadcrumb-item active">Slider</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Slider</h4>

                    <form class="form-horizontal" action="{{url('update/slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="slider_id" value="{{$data->id}}">
                        <div class="row mb-3">
                            <label for="text" class="col-lg-2 col-md-2 col-form-label">Slider Text</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="text" value="{{$data->text}}" class="form-control @error('text') is-invalid @enderror" id="text" placeholder="Slider Text">
                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-lg-2 col-md-2 col-form-label">Slider Image</label>
                            <div class="form-group col-lg-10 col-md-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
                                            <i class="fi fi-rr-picture"></i> Upload Image
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control @error('image') is-invalid @enderror" value="{{url($data->image)}}" type="text" name="image" readonly>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 1320px * 480px ]</small>

                                @if($data->image && file_exists(public_path($data->image)))
                                <label for="image" class="d-block col-form-label">Current Image :</label>
                                <div class="w-75">
                                    <img src="{{url($data->image)}}" class="img-fluid w-25">
                                </div>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="status" class="col-sm-2 col-form-label">Status<span class="text-danger">*</span> : </label>
                            <div class="col-sm-3 pt-1">
                                <select name="status" data-plugin="customselect" class="form-select" required>
                                    <option value="">Select One</option>
                                    <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                    <option value="0" @if($data->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">Update Slider</button>
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
    </script>

@endsection
