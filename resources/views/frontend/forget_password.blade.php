@extends('frontend.master')

@section('content')
    <!-- Auth Page  Area -->
    <section class="auth-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                    <div class="auth-card">
                        <div class="auth-card-head">
                            <div class="auth-card-head-icon">
                                <img src="{{url('frontend_assets')}}/assets/images/icons/edit.svg" alt="#" />
                            </div>
                            <h4 class="auth-card-title">Forgotten Password?</h4>
                        </div>
                        <div class="auth-card-form-body">
                            <form class="auth-card-form" action="{{url('send/forget/password/code')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-ss-user"></i>
                                    </div>
                                    <input name="username" placeholder="Email or phone number" required="" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"/>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="auth-card-form-btn theme-btn btn btn-primary">
                                    Next
                                </button>
                            </form>
                            <div class="auth-card-bottom">
                                <p class="auth-card-bottom-link" style="margin-top: 32px">Remember credentials?<a href="{{url('user/login')}}">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Auth Page  Area -->
@endsection
