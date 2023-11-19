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
                <h4 class="page-title">Privacy Policy</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Modules</a></li>
                        <li class="breadcrumb-item active">Privacy Policy</li>
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
                    <form class="form-horizontal" action="{{ url('update/privacy/policy') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mb-3 header-title mt-0">Privacy Policy</h4>
                            </div>
                            <div class="col-lg-4 text-end">
                                <button type="submit" class="btn btn-success">✅︎ Update Privacy Policy</button>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="title" class="col-form-label">Write Privacy Policy in English Here :</label>
                            <textarea name="details" class="form-control">{!! $data->details !!}</textarea>
                        </div>

                        <div class="form-group pt-3">
                            <label for="title" class="col-form-label">এখানে বাংলায় গোপনীয়তা নীতিমালা লিখুন :</label>
                            <textarea name="details_bn" class="form-control">{!! $data->details_bn !!}</textarea>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-12 col-md-12 text-center pt-3">
                                <button type="submit" class="btn btn-success">✅︎ Update Privacy Policy</button>
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

        CKEDITOR.replace('details', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 300,
        });
        CKEDITOR.replace('details_bn', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 300,
        });
    </script>
@endsection
