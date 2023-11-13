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
                <h4 class="page-title">Change Password Form</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Change Password</a></li>
                        <li class="breadcrumb-item active">Change Password Form</li>
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
                    <h4 class="mb-3 header-title mt-0">Change User Password</h4>

                    <form class="form-horizontal" action="{{url('change/password')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-lg-2 col-md-2 col-form-label">User Name <span class="text-danger">*</span> :</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="name" placeholder="User Name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-lg-2 col-md-2 col-form-label">User Email <span class="text-danger">*</span> :</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" id="name" placeholder="User Email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-lg-2 col-md-2 col-form-label">Current Password <span class="text-danger">*</span> :</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="password" name="prev_password" id="password" class="form-control mb-2 d-inline-block @error('prev_password') is-invalid @enderror" id="colFormLabel" required>
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-lg-2 col-md-2 col-form-label">New Password <span class="text-danger">*</span> :</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="password" name="new_password" id="new_password" class="form-control mb-2 d-inline-block @error('new_password') is-invalid @enderror" id="colFormLabel" placeholder="********" required>
                                <i class="bi bi-eye-slash" id="togglePassword2"></i>
                                @error('password')
                                        {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">Change Password</button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('footer_js')

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


        // new password toggle
        const togglePassword2 = document.querySelector("#togglePassword2");
        const newPassword = document.querySelector("#new_password");

        togglePassword2.addEventListener("click", function () {
            // toggle the type attribute
            const type = newPassword.getAttribute("type") === "password" ? "text" : "password";
            newPassword.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form2 = document.querySelector("form");
        form2.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>

@endsection
