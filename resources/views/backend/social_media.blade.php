@extends('backend.master')


@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Social Media Links</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config Module</a></li>
                        <li class="breadcrumb-item active">Social Media Links</li>
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
                    <h4 class="mb-3 header-title mt-0">Update Social Media Links</h4>

                    <form class="needs-validation" method="POST" action="{{url('update/social/media/link')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="facebook" class="col-form-label"><i class="bi-facebook" style="color: #1877F2;"></i> Facebook Page Link :</label>
                                    <input type="text" name="facebook" class="form-control" value="{{$data->facebook}}" id="facebook" placeholder="https://facebook.com/">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('facebook')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="messenger" class="col-form-label"><i class="bi-messenger" style="color: #44bec7;"></i> Messenger :</label>
                                    <input type="text" name="messenger" class="form-control" value="{{$data->messenger}}" id="messenger" placeholder="https://messenger.com/">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('messenger')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="twitter" class="col-form-label"><i class="bi-twitter" style="color: #00acee;"></i> Twitter Link :</label>
                                    <input type="text" name="twitter" class="form-control" value="{{$data->twitter}}" id="twitter" placeholder="https://twitter.com/">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('twitter')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="instagram" class="col-form-label"><i class="bi-instagram" style="color: #ffb719;"></i> Instagram Link :</label>
                                    <input type="text" name="instagram" class="form-control" value="{{$data->instagram}}" id="instagram" placeholder="https://instagram.com/">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('instagram')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="linkedin" class="col-form-label"><i class="bi-linkedin" style="color: #0072b1;"></i> Linkedin Profile :</label>
                                    <input type="text" name="linkedin" class="form-control" value="{{$data->linkedin}}" id="linkedin" placeholder="https://linkedin.com/">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('linkedin')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="whatsapp" class="col-form-label"><i class="bi-whatsapp" style="color: #075e54;"></i> Whats App :</label>
                                    <input type="text" name="whatsapp" class="form-control" value="{{$data->whatsapp}}" id="whatsapp" placeholder="https://whatsapp.com/">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('whatsapp')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="telegram" class="col-form-label"><i class="bi-telegram" style="color: #0088cc;"></i> Telegram :</label>
                                    <input type="text" name="telegram" class="form-control" value="{{$data->telegram}}" id="telegram" placeholder="https://telegram.com/">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('telegram')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="youtube" class="col-form-label"><i class="bi-youtube" style="color: #FF0000;"></i> Youtube Channel Link :</label>
                                    <input type="text" name="youtube" class="form-control" value="{{$data->youtube}}" id="youtube" placeholder="https://youtube.com/">
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('youtube')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center pt-3 mt-3">
                            <a href="{{url('/home')}}" style="width: 130px;" class="btn btn-danger bi-x-octagon text-white m-2" type="submit"><i class="mdi mdi-cancel"></i> Cancel</a>
                            <button class="btn btn-primary m-2" type="submit" style="width: 130px;">✓ Update Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

