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
                <h4 class="page-title">Update Personnel</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Content Modules</a></li>
                        <li class="breadcrumb-item active">Update Personnel</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Personnel</h4>

                    <form class="form-horizontal" action="{{url('update/personnel')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="personnel_id" value="{{$data->id}}">

                        <div class="row mb-3">
                            <label for="designated_title" class="col-lg-2 col-md-2 col-form-label">Designated Title</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="designated_title" value="{{$data->designated_title}}" class="form-control" id="designated_title" placeholder="অধ্যক্ষের বাণী">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-lg-2 col-md-2 col-form-label">Personnel Name</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="name" value="{{$data->name}}" class="form-control" id="name" placeholder="Personnel Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-lg-2 col-md-2 col-form-label">Personnel Image</label>
                            <div class="form-group col-lg-10 col-md-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
                                            <i class="fi fi-rr-picture"></i> Upload Image
                                        </a>
                                    </span>
                                    <input id="thumbnail" value="{{url($data->image)}}" class="form-control @error('image') is-invalid @enderror" type="text" name="image" readonly>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 160px * 180px ]</small>


                                @if($data->image && file_exists(public_path($data->image)))
                                <label for="image" class="d-block col-form-label">Current Image :</label>
                                <div class="w-75">
                                    <img src="{{url($data->image)}}" class="img-fluid w-25">
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-lg-2 col-md-2 col-form-label">Personnel Speech</label>
                            <div class="col-lg-10 col-md-10">
                                <textarea id="speech" name="speech">{!! $data->speech !!}</textarea>
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
                                <button type="submit" class="btn btn-success">Update Personnel Info</button>
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

        CKEDITOR.replace('speech', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 200,
        });
    </script>

@endsection
