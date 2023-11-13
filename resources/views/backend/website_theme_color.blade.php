@extends('backend.master')

@section('header_css')
    <link href="{{ url('backend_assets') }}/css/spectrum.min.css" rel="stylesheet" type="text/css" />
@endsection


@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Website Theme Color</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config Module</a></li>
                        <li class="breadcrumb-item active">Website Theme Color</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Website Theme Color</h4>

                    <form class="needs-validation" method="POST" action="{{url('update/website/theme/color')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="primary_color" class="col-form-label">Primary Color :</label>
                                    <input type="text" name="primary_color" class="form-control" value="{{$data->primary_color}}" id="primary_color">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('primary_color')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="secondary_color" class="col-form-label">Secondary Color :</label>
                                    <input type="text" name="secondary_color" class="form-control" value="{{$data->secondary_color}}" id="secondary_color">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('secondary_color')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="tertiary_color" class="col-form-label">Tertiary Color :</label>
                                    <input type="text" name="tertiary_color" class="form-control" value="{{$data->tertiary_color}}" id="tertiary_color">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('tertiary_color')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="white_color_1" class="col-form-label">White Color 1 :</label>
                                    <input type="text" name="white_color_1" class="form-control" value="{{$data->white_color_1}}" id="white_color_1">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('white_color_1')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center pt-3">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="white_color_2" class="col-form-label">White Color 2 :</label>
                                    <input type="text" name="white_color_2" class="form-control" value="{{$data->white_color_2}}" id="white_color_2">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('white_color_2')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="white_color_3" class="col-form-label">White Color 3 :</label>
                                    <input type="text" name="white_color_3" class="form-control" value="{{$data->white_color_3}}" id="white_color_3">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('white_color_3')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="title_color" class="col-form-label">Title Color :</label>
                                    <input type="text" name="title_color" class="form-control" value="{{$data->title_color}}" id="title_color">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('title_color')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="paragraph_color" class="col-form-label">Paragraph Color :</label>
                                    <input type="text" name="paragraph_color" class="form-control" value="{{$data->paragraph_color}}" id="paragraph_color">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('paragraph_color')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center pt-3">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="hints_color" class="col-form-label">Hints Color :</label>
                                    <input type="text" name="hints_color" class="form-control" value="{{$data->hints_color}}" id="hints_color">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('hints_color')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="border_color" class="col-form-label">Border Color :</label>
                                    <input type="text" name="border_color" class="form-control" value="{{$data->border_color}}" id="border_color">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('border_color')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center pt-3 mt-3">
                            <a href="{{url('/home')}}" style="width: 130px;" class="btn btn-danger bi-x-octagon text-white m-2" type="submit"><i class="mdi mdi-cancel"></i> Cancel</a>
                            <button class="btn btn-primary m-2" type="submit" style="width: 140px;">✓ Update Color</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_js')
    <script src="{{ url('backend_assets') }}/js/spectrum.min.js"></script>
    <script>

        $("#primary_color").spectrum({
            preferredFormat: 'hex',
        });
        $("#secondary_color").spectrum({
            preferredFormat: 'hex',
        });
        $("#tertiary_color").spectrum({
            preferredFormat: 'hex',
        });
        $("#white_color_1").spectrum({
            preferredFormat: 'hex',
        });
        $("#white_color_2").spectrum({
            preferredFormat: 'hex',
        });
        $("#white_color_3").spectrum({
            preferredFormat: 'hex',
        });
        $("#title_color").spectrum({
            preferredFormat: 'hex',
        });
        $("#paragraph_color").spectrum({
            preferredFormat: 'hex',
        });
        $("#hints_color").spectrum({
            preferredFormat: 'hex',
        });
        $("#border_color").spectrum({
            preferredFormat: 'hex',
        });

    </script>
@endsection
