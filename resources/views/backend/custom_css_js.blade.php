@extends('backend.master')

@section('header_css')
    <link rel="stylesheet" href="{{url('codeMirror')}}/css/codemirror.css">
    <link rel="stylesheet" href="{{url('codeMirror')}}/css/themes/material.css">
    <style>
        .CodeMirror {
            border-radius: 6px;
            padding: 12px 3px;
        }
        .CodeMirror-scroll{
            width: 100%;
        }
    </style>
@endsection

@section('header_js')
    <script src="{{url('codeMirror')}}/js/codemirror.js"></script>
    <script src="{{url('codeMirror')}}/js/xml.js"></script>
    <script src="{{url('codeMirror')}}/js/php.js"></script>
    <script src="{{url('codeMirror')}}/js/javascript.js"></script>
    <script src="{{url('codeMirror')}}/js/python.js"></script>
    <script src="{{url('codeMirror')}}/js/addons/closetag.js"></script>
    <script src="{{url('codeMirror')}}/js/addons/closebrackets.js"></script>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Custom CSS & JS</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config Modules</a></li>
                        <li class="breadcrumb-item active">Custom CSS & JS</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Custom CSS & JS</h4>

                    <form class="form-horizontal" action="{{url('update/custom/css/js')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="tab_title" class="col-lg-2 col-md-2 col-form-label">Custom CSS</label>
                            <div class="col-lg-10 col-md-10">
                                <textarea name="custom_css" class="form-control" id="code_editor_css" style="cursor: pointer">{{$data->custom_css}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tab_title" class="col-lg-2 col-md-2 col-form-label">Custom JS</label>
                            <div class="col-lg-10 col-md-10">
                                <textarea name="custom_js" class="form-control" id="code_editor_js" style="cursor: pointer">{{$data->custom_js}}</textarea>
                                <small>*Write without script tag</small>
                            </div>
                        </div>
                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">Update Codes</button>
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
        var textareas = document.getElementById("code_editor_css");
        editor = CodeMirror.fromTextArea(textareas, {
            mode: "javascript",
            theme: "material",
            lineNumbers: true,
            autoCloseTags: true,
            autoCloseBrackets: true
        });
        editor.setSize("100%", "200");

        var textareas = document.getElementById("code_editor_js");
        editor = CodeMirror.fromTextArea(textareas, {
            mode: "javascript",
            theme: "material",
            lineNumbers: true,
            autoCloseTags: true,
            autoCloseBrackets: true
        });
        editor.setSize("100%", "200");
    </script>
@endsection
