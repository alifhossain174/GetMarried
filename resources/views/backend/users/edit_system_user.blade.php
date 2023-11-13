@extends('backend.master')

@section('header_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <style>
        form i {
            margin-left: -30px;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit System User</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">System Users</a></li>
                        <li class="breadcrumb-item active">Edit System User</li>
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
                    <h4 class="mb-3 header-title mt-0">System User Update Form</h4>

                    <form class="needs-validation" method="POST" action="{{url('update/system/user')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$userInfo->id}}">
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="colFormLabel" value="{{$userInfo->name}}" placeholder="Full Name" required>
                                <div class="invalid-feedback" style="display: block;">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="email" value="{{$userInfo->email}}" placeholder="example@bestu.com" required>
                                <div class="invalid-feedback" style="display: block;">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="phone" name="phone" class="form-control" id="phone" value="{{$userInfo->phone}}" placeholder="+8801*********">
                                <div class="invalid-feedback" style="display: block;">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="address" name="address" class="form-control" value="{{$userInfo->address}}" id="address" placeholder="Dhaka, Bangladesh">
                                <div class="invalid-feedback" style="display: block;">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control d-inline-block" id="password" placeholder="********">
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                                <div class="invalid-feedback" style="display: block;">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="password" class="col-sm-2 col-form-label">&nbsp;</label>
                            <div class="col-sm-10">
                                <button class="btn btn-primary" type="submit">Update User Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("footer_js")
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
@endsection

