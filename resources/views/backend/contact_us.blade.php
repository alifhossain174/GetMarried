@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Contact Page</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Module</a></li>
                        <li class="breadcrumb-item active">Contact Page</li>
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
                    <form class="form-horizontal" action="{{url('update/contact/page/info')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="from-group">
                                            <label for="page_title" class="col-form-label">Page Title</label>
                                            <input type="text" name="page_title" class="form-control" value="{{$data->page_title}}" id="page_title" placeholder="Page Title" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="from-group">
                                            <label for="map_iframe_src" class="col-form-label">School Map Iframe</label>
                                            <input type="text" name="map_iframe_src" class="form-control" value="{{$data->map_iframe_src}}" id="map_iframe_src" placeholder="https://maps.google.com/maps/embed" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="map_direction_button_text" class="col-form-label">Map Direction Button Text</label>
                                            <input type="text" name="map_direction_button_text" class="form-control" value="{{$data->map_direction_button_text}}" id="map_direction_button_text" placeholder="ex. দিকনির্দেশ পান">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="map_direction" class="col-form-label">School Map Direction</label>
                                            <input type="text" name="map_direction" class="form-control" id="map_direction" value="{{$data->map_direction}}" placeholder="https://maps.app.goo.gl/yvoniqhrU7vBL6pZ8">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="from-group">
                                            <label for="image" class="col-form-label">Contact Form Image</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
                                                        <i class="fi fi-rr-picture"></i> Upload Teacher Image
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="image" value="{{$data->contact_form_image}}" readonly required>
                                            </div>
                                            <small class="form-text text-muted">[ Please upload jpg, jpeg, png file of 560px * 617px ]</small>
                                            @error('image')
                                                <span class="invalid-feedback d-inline" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <label for="contact_section_title" class="col-form-label">Contact Medium Section Title</label>
                                    <input type="text" name="contact_section_title" class="form-control" id="contact_section_title" value="{{$data->contact_section_title}}" placeholder="ex. যোগাযোগের মাধ্যমসমূহ">
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="address_label" class="col-form-label">Address Label</label>
                                            <input type="text" name="address_label" class="form-control" id="address_label" value="{{$data->address_label}}" placeholder="ex. কলেজের ঠিকানা">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="from-group">
                                            <label for="address" class="col-form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="address" value="{{$data->address}}" placeholder="Address">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="contact_label" class="col-form-label">Contact Label</label>
                                            <input type="text" name="contact_label" class="form-control" id="contact_label" value="{{$data->contact_label}}" placeholder="ex. মোবাইল নাম্বার">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="primary_contact" class="col-form-label">Primary Contact</label>
                                            <input type="text" name="primary_contact" class="form-control" id="primary_contact" value="{{$data->primary_contact}}" placeholder="+8801">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="secondary_contact" class="col-form-label">Secondary Contact</label>
                                            <input type="text" name="secondary_contact" class="form-control" id="secondary_contact" value="{{$data->secondary_contact}}" placeholder="+8801">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="email_label" class="col-form-label">Email Label</label>
                                            <input type="text" name="email_label" class="form-control" id="email_label" value="{{$data->email_label}}" placeholder="ex. ইমেইল ঠিকানা">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="primary_email" class="col-form-label">Primary Email</label>
                                            <input type="text" name="primary_email" class="form-control" id="primary_email" value="{{$data->primary_email}}" placeholder="school-1@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="secondary_email" class="col-form-label">Secondary Email</label>
                                            <input type="text" name="secondary_email" class="form-control" id="secondary_email" value="{{$data->secondary_email}}" placeholder="school-2@gmail.com">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row justify-content-end mt-4">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-success"><b>Update Contact Info</b></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


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
