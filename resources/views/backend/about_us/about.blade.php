@extends('backend.master')

@section('header_css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <style>
        img.gridProductImage:hover{
            scale: 2;
            cursor: pointer;
            transition: all .2s linear;
        }
    </style>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">About Us</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Modules</a></li>
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
                    <h4 class="mb-3 header-title mt-0">Update About Us</h4>

                    <form class="form-horizontal" action="{{ url('update/about/us') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label for="image" class="col-form-label">Slider Image</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
                                                <i class="fi fi-rr-picture"></i> Upload Image
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control @error('image') is-invalid @enderror" type="text" name="image" readonly>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">[Please upload jpg, jpeg, png file of 810px * 540px]</small>.


                                    <label for="background_image" class="d-block col-form-label">All Slider Images :</label>
                                    <table class="table table-stripped table-bordered w-100 table-sm">
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @php
                                            $imageSl = 1;
                                        @endphp
                                        @foreach(json_decode($data->images) as $img)
                                        <tr>
                                            <th class="text-center">{{$imageSl++}}</th>
                                            <td class="text-center">
                                                @if(file_exists(public_path($img)))
                                                    <img src="{{ url($img) }}" class="gridProductImage" width="60">
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{url('delete/slider/image')}}/{{$imageSl-2}}" class="btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>

                                </div>


                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Title</label>
                                            <input type="text" name="title" value="{{$data->title}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Know About Us">
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
                                            <input type="text" name="title_bn" value="{{$data->title_bn}}" class="form-control @error('title_bn') is-invalid @enderror" id="title_bn" placeholder="আমাদের সম্পর্কে জানুন">
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

        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 300,
        });

        CKEDITOR.replace('description_bn', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 300,
        });
    </script>
@endsection
