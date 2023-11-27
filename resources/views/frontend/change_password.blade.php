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
                            <h4 class="auth-card-title">Set A New Password</h4>
                        </div>
                        <div class="auth-card-form-body">
                            <form class="auth-card-form" action="{{url('change/forgotten/password')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rr-edit"></i>
                                    </div>
                                    <input name="code" placeholder="Verification Code" required="" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}"/>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fi fi-rr-lock"></i>
                                    </div>
                                    <input name="password" placeholder="New Password" required="" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"/>
                                    @error('password')
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
                                <p class="auth-card-bottom-link" style="margin-top: 32px">Remember credentials?<a href="{{url('login')}}">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Auth Page  Area -->
@endsection
