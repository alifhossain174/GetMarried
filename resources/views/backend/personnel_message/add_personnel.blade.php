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
                <h4 class="page-title">Add New Personnel</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Content Modules</a></li>
                        <li class="breadcrumb-item active">Add New Personnel</li>
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
                    <h4 class="mb-3 header-title mt-0">Add New Personnel</h4>

                    <form class="form-horizontal" action="{{url('save/personnel')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="designated_title" class="col-lg-2 col-md-2 col-form-label">Designated Title</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="designated_title" class="form-control" id="designated_title" value="{{ old('designated_title') }}" placeholder="অধ্যক্ষের বাণী">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-lg-2 col-md-2 col-form-label">Personnel Name</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Personnel Name">
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
                                    <input id="thumbnail" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" type="text" name="image" readonly>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 160px * 180px ]</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-lg-2 col-md-2 col-form-label">Personnel Speech</label>
                            <div class="col-lg-10 col-md-10">
                                <textarea id="speech" name="speech">{!! old('speech') !!}</textarea>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">Save Personnel</button>
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
