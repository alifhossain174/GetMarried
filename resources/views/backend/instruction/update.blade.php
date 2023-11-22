@extends('backend.master')

@section('header_css')
    <link href="{{ url('backend_assets') }}/css/spectrum.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Instruction</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Modules</a></li>
                        <li class="breadcrumb-item active">Edit Instruction</li>
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
                    <h4 class="mb-3 header-title mt-0">Edit Instruction</h4>

                    <form class="form-horizontal" action="{{ url('update/instruction') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="slug" value="{{$data->slug}}">
                        <div class="row mb-3">
                            <label for="question" class="col-lg-2 col-md-2 col-form-label">Question</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="question" value="{{$data->question}}" class="form-control @error('question') is-invalid @enderror" id="question" placeholder="Question">
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="question_bn" class="col-lg-2 col-md-2 col-form-label">Question (BN)</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="question_bn" value="{{$data->question_bn}}" class="form-control @error('question_bn') is-invalid @enderror" id="question_bn" placeholder="Question in Bangla">
                                @error('question_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="answer" class="col-lg-2 col-md-2 col-form-label">Description</label>
                            <div class="col-lg-10 col-md-10">
                                <textarea id="answer" name="answer">{!! $data->answer !!}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="answer_bn" class="col-lg-2 col-md-2 col-form-label">Answer (BN)</label>
                            <div class="col-lg-10 col-md-10">
                                <textarea id="answer_bn" name="answer_bn">{!! $data->answer_bn !!}</textarea>
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

        CKEDITOR.replace('answer', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 300,
        });

        CKEDITOR.replace('answer_bn', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 300,
        });
    </script>
@endsection
