@extends('backend.master')


@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Google Recaptcha</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config Modules</a></li>
                        <li class="breadcrumb-item active">Google Recaptcha</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Google Recaptcha Config</h4>

                    <form class="form-horizontal" action="{{url('update/google/recaptcha')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="tab_title" class="col-lg-2 col-md-2 col-form-label">Google Recaptcha Key</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="recaptcha_key" class="form-control" id="recaptcha_key" value="{{$data->recaptcha_key}}" placeholder="6LcAaecoAAAAFGFFGCr2ixy1wg4TNuMb_Sk3oHJKbgfrP">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tab_title" class="col-lg-2 col-md-2 col-form-label">Google Recaptcha Secret</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="recaptcha_secret" class="form-control" id="recaptcha_secret" value="{{$data->recaptcha_secret}}" placeholder="6LcAaecoGAAAFGFFGCr2ixy1wg4TNuMb_Sk3oHJKbgfasdUHE">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tab_title" class="col-lg-2 col-md-2 col-form-label">Google Recaptcha Status</label>
                            <div class="col-lg-3 col-md-3">
                                <select name="status" class="form-select" required>
                                    <option value="">Select One</option>
                                    <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                    <option value="0" @if($data->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">Update Config</button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
