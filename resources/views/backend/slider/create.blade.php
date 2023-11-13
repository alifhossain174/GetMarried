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
                    <h4 class="mb-3 header-title mt-0">Add New Slider</h4>

                    <form class="form-horizontal" action="{{url('save/new/slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="text" class="col-lg-2 col-md-2 col-form-label">Slider Text</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" id="text" placeholder="Slider Text">
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
                                    <input id="thumbnail" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" type="text" name="image" readonly>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 1320px * 480px ]</small>

                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">Save Slider</button>
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
