@extends('layouts.app')

@php
    $logoFavicon = App\Models\LogoFavicon::where('id', 1)->first();
@endphp

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-6 p-4">
                            <div class="mx-auto">

                                @if ($logoFavicon->logo && file_exists(public_path($logoFavicon->logo)))
                                    <a href="{{ url('/login') }}"><img src="{{ url($logoFavicon->logo) }}" height="44"
                                            alt="#" /></a>
                                @else
                                    <a href="{{ url('/login') }}"><img src="{{ url('backend_assets') }}/images/logo.svg"
                                            height="44" alt="#" /></a>
                                @endif

                                {{-- <a href="{{ url('/login') }}">
                                    <img src="{{ url('backend_assets') }}/images/logo.svg" height="44"
                                        alt="Image Not Found" />
                                </a> --}}
                            </div>

                            <h6 class="h5 mb-0 mt-3">Welcome back!</h6>
                            <p class="text-muted mt-1 mb-4">
                                Enter your email address and password to access admin panel.
                            </p>

                            <form method="POST" action="{{ route('login') }}" class="authentication-form">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="icon-dual" data-feather="mail"></i>
                                        </span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="hello@demo.com" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="icon-dual" data-feather="lock"></i>
                                        </span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" required autocomplete="current-password"
                                            placeholder="Enter your password">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 text-center d-grid">
                                    <button class="btn btn-primary" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6 d-none d-md-inline-block">
                            <div class="auth-page-sidebar"
                                style="background-image: url({{ url('backend_assets') }}/images/login_images/login_bg1.jpg);">
                                <div class="overlay" style="background-color: rgba(0,0,0,0.2);"></div>
                                <div class="auth-user-testimonial" style="border: 1px solid gray; background: #0000006b;">
                                    <p class="fs-24 fw-bold text-white mb-1" style="text-shadow: 1px 1px 2px black;">Powered
                                        By Getup Ltd.</p>
                                    <p class="lead" style="text-shadow: 1px 1px 2px black; font-weight: 400">Guardian of
                                        Your Growth</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->
            <!-- end row -->

        </div> <!-- end col -->
    </div>
@endsection
