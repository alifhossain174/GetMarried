@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">File Manager</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">File Manager</a></li>
                        <li class="breadcrumb-item active">Manage Your Files</li>
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
                    <h4 class="mb-3 header-title mt-0">Manage Your Files</h4>

                    <iframe src="/laravel-filemanager?editor=src&type=files" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
                    {{-- <iframe src="/laravel-filemanager?editor=src&type=Images" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe> --}}

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
