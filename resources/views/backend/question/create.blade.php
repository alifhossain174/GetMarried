@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Add New Question</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Modules</a></li>
                        <li class="breadcrumb-item active">Add New Question</li>
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
                    <h4 class="mb-3 header-title mt-0">Add New Question</h4>

                    <form class="form-horizontal" action="{{ url('save/new/question') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-lg-2 col-md-2 col-form-label">Question Set</label>
                            <div class="col-lg-4 col-md-4">
                                <select class="form-select @error('question_set_id') is-invalid @enderror" id="question_set_id" name="question_set_id" required>
                                    <option value="">Select One</option>
                                    @foreach ($questionSets as $questionSet)
                                    <option value="{{$questionSet->id}}">{{$questionSet->title}}</option>
                                    @endforeach
                                </select>
                                @error('question_set_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-lg-2 col-md-2 col-form-label">Question</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" class="form-control @error('question') is-invalid @enderror" placeholder="Write Your Quesrtion Here" id="question" name="question" required>
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title_bn" class="col-lg-2 col-md-2 col-form-label">Question (BN)</label>
                            <div class="col-lg-10 col-md-10">
                                <input type="text" class="form-control @error('question') is-invalid @enderror" placeholder="এখানে আপনার প্রশ্ন লিখুন" id="question_bn" name="question_bn" required>
                                @error('question_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hints" class="col-lg-2 col-md-2 col-form-label">Question Hints</label>
                            <div class="col-lg-10 col-md-10">
                                <textarea class="form-control @error('hints') is-invalid @enderror" id="hints" name="hints" placeholder="Question Hints"></textarea>
                                @error('hints')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hints_bn" class="col-lg-2 col-md-2 col-form-label">Question Hints (BN)</label>
                            <div class="col-lg-10 col-md-10">
                                <textarea class="form-control @error('hints_bn') is-invalid @enderror" id="hints_bn" name="hints_bn" placeholder="প্রশ্ন ইঙ্গিত"></textarea>
                                @error('hints_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-lg-2 col-md-2 col-form-label">Question Type</label>
                            <div class="col-lg-3 col-md-3">
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                    <option value="1" selected>Open Ended</option>
                                    <option value="2">MCQ</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="required" class="col-lg-2 col-md-2 col-form-label">Is Required?</label>
                            <div class="col-lg-3 col-md-3">
                                <select class="form-select @error('required') is-invalid @enderror" id="required" name="required">
                                    <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                </select>
                                @error('required')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-lg-2 col-md-2 col-form-label">Question Status</label>
                            <div class="col-lg-3 col-md-3">
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0 justify-content-end">
                            <div class="col-lg-10 col-md-10">
                                <button type="submit" class="btn btn-success">✅︎ Create</button>
                                <a href="{{url('view/all/questions')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
