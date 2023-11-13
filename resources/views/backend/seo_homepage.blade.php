@extends('backend.master')

@section('header_css')
    <link href="{{url('backend_assets')}}/css/tagsinput.css" rel="stylesheet" type="text/css" />
    <style>
        .bootstrap-tagsinput .badge {
            margin: 2px 2px !important;
        }

        #meta_keywords{
            display: none
        }

        .badge-info{
            background-color: #38b3d6;
        }
    </style>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">SEO for HomePage & Genearte Sitemap</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config Module</a></li>
                        <li class="breadcrumb-item active">SEO for HomePage & Genearte Sitemap</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-body pb-3">
                    <h4 class="mb-3 header-title mt-0">Optimize HomePage for Search Engine Optimization</h4>
                    <form class="needs-validation" method="POST" action="{{url('update/seo/homepage')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row pt-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" value="{{$data->meta_title}}" class="form-control" placeholder="Enter Meta Title Here">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('meta_title')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords <small>("," Comma Separated)</small></label>
                                    <input type="text" id="meta_keywords" data-role="tagsinput" name="meta_keywords" value="{{$data->meta_keywords}}" class="form-control">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('meta_keywords')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" rows="5" class="form-control" placeholder="Write Meta Description Here">{{$data->meta_description}}</textarea>
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('meta_description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-2">
                            <a href="{{url('/home')}}" style="width: 130px;" class="btn btn-danger bi-x-octagon text-white m-2" type="submit"><i class="mdi mdi-cancel"></i> Cancel</a>
                            <button class="btn btn-success m-2" type="submit" style="width: 140px;">✓ Update Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body pb-4">
                    <h4 class="mb-2 header-title mt-0">Genearte Sitemap</h4>
                    <div class="row" style="padding-top: 28px;">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="meta_title">Click the Button to Generate Sitemap</label>
                                <a href="{{url('generate/sitemap')}}" class="btn btn-success rounded text-center d-block mt-1"><b><i class="uil uil-sitemap"></i> Auto Generate Sitemap</b></a>
                            </div>

                            <ul style="list-style: none; padding-left: 0px !important; margin-top: 15px">
                                <li style="margin-bottom: 5px"><b>Generate DateTime :</b> @if($data->sitemap_generate_time) {{date("l jS \of F Y h:i:s A", strtotime($data->sitemap_generate_time))}} @endif</li>
                                <li>
                                    <b>Download Sitemap :</b>
                                    @if(file_exists(public_path('sitemap.xml')))
                                    <a href="{{url('sitemap.xml')}}" stream target="_blank">Sitemap.xml</a>
                                    @endif
                                </li>
                            </ul>

                            <hr>
                            <form action="{{url('upload/sitemap')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="meta_title">Upload Custom Sitemap</label>
                                    <input type="file" class="form-control mt-1 mb-1 @error('sitemap') is-invalid @enderror" name="sitemap" required>
                                    @error('sitemap')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success rounded d-block w-100 mt-2"><b>Upload</b></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_js')
    <script src="{{url('backend_assets')}}/js/tagsinput.js"></script>
@endsection
