@extends('backend.master')

@section('header_css')
    <style>
        table tr td {
            padding: 5px 10px !important;
            color: #1e1e1e;
        }

        table tr td:nth-child(1) {
            font-weight: 500;
        }

        table tr td:nth-child(2) {
            color: #093659;
        }
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Biodata Details</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Functional Module</a></li>
                        <li class="breadcrumb-item active">Biodata Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title m-0">General Info</h4>
                </div>
                <div class="card-body pb-0">
                    <div class="text-center">
                        @if ($data->image && file_exists(public_path($data->image)))
                            <img src="{{ url($data->image) }}" style="max-width: 250px; margin-bottom: 20px; border-radius: 6px;">
                        @endif
                    </div>
                    <table class="table table-bordered w-100">
                        <tr>
                            <td>Name</td>
                            <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <td>Biodata Type</td>
                            <td>{{ $data->biodata_type }}</td>
                        </tr>
                        <tr>
                            <td>Marrital Status</td>
                            <td>{{ $data->marital_condition }}</td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td>{{ date('jS F, Y', strtotime($data->birth_date)) }}</td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td>{{ $data->height_foot }}' {{ $data->height_foot }}''</td>
                        </tr>
                        <tr>
                            <td>Skin Tone</td>
                            <td>
                                @if ($data->skin_tone == 1)
                                    {{ __('label.skin_tone_black') }}
                                @elseif ($data->skin_tone == 2)
                                    {{ __('label.skin_tone_brown') }}
                                @elseif ($data->skin_tone == 3)
                                    {{ __('label.skin_tone_bright_brown') }}
                                @elseif ($data->skin_tone == 4)
                                    {{ __('label.skin_tone_white') }}
                                @elseif ($data->skin_tone == 5)
                                    {{ __('label.skin_tone_bright_white') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>{{ $data->weight }}</td>
                        </tr>
                        <tr>
                            <td>Blood Group</td>
                            <td>
                                @if ($data->blood_group == 1)
                                    A+
                                @elseif ($data->blood_group == 2)
                                    A-
                                @elseif ($data->blood_group == 3)
                                    B+
                                @elseif ($data->blood_group == 4)
                                    B-
                                @elseif ($data->blood_group == 5)
                                    AB+
                                @elseif ($data->blood_group == 6)
                                    AB-
                                @elseif ($data->blood_group == 7)
                                    O+
                                @elseif ($data->blood_group == 8)
                                    O-
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Nationality</td>
                            <td>{{ $data->nationality_label }}</td>
                        </tr>
                    </table>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title m-0">Change Biodata Status</h4>
                </div>
                <div class="card-body text-center pb-3">
                    <h5 style="font-size: 18px; margin-top: 0px;">Biodata No: {{ $data->biodata_no }} ({{ $data->views }}
                        Views)</h5>
                    <h5 style="font-size: 18px">Created At: {{ date('h:sa jS F, Y', strtotime($data->created_at)) }}</h5>
                    <form action="{{ url('/change/biodata/status') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="biodata_id" value="{{ $data->id }}">
                        <select class="form-select" name="status" style="width: 235px; margin: auto; display: inline">
                            <option value="0" @if ($data->status == 0) selected @endif>Pending</option>
                            <option value="1" @if ($data->status == 1) selected @endif>Approved</option>
                            <option value="2" @if ($data->status == 2) selected @endif>Blocked</option>
                        </select>
                        <button class="btn btn-success rounded" style="margin-top: -3px;"><b>Save</b></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="header-title m-0">Address & Contact Info</h4>
                </div>
                <div class="card-body pb-0">
                    <table class="table table-bordered w-100">
                        <tr>
                            <td>District</td>
                            <td>{{ $data->permenant_district_name }}</td>
                        </tr>
                        <tr>
                            <td>Upazilla</td>
                            <td>{{ $data->permenant_upazila_name }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $data->permenant_address }}</td>
                        </tr>
                        <tr>
                            <td>District (Present)</td>
                            <td>{{ $data->present_district_name }}</td>
                        </tr>
                        <tr>
                            <td>Upazilla (Present)</td>
                            <td>{{ $data->present_upazila_name }}</td>
                        </tr>
                        <tr>
                            <td>Address (Present)</td>
                            <td>{{ $data->present_address }}</td>
                        </tr>
                        <tr>
                            <td>Contact No</td>
                            <td>{{ $data->contact_no }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $data->email }}</td>
                        </tr>
                        <tr>
                            <td>Gurdian Contact</td>
                            <td>{{ $data->gurdians_mobile_no }} ({{ $data->relation_with_gurdian }})</td>
                        </tr>
                        <tr>
                            <td>Show Image Publicly</td>
                            <td>
                                @if($data->show_image)
                                    <span class="badge bg-success" style="padding: 0.50em .6em;">Yes</span>
                                @else
                                    <span class="badge bg-danger" style="padding: 0.50em .6em;">No</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div> <!-- end card-body -->
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @foreach ($questionSets as $set)
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title m-0">{{ $set->title }}</h4>
                    </div>
                    <div class="card-body">
                        @php
                            $questions = DB::table('questions')
                                    ->where('question_set_id', $set->id)
                                    ->where('status', 1)
                                    ->orderBy('serial', 'asc')
                                    ->get();
                        @endphp


                        <table class="table table-bordered w-100">
                            @foreach ($questions as $question)
                                @php
                                    $questionAnswer = DB::table('biodata_question_answers')
                                        ->where('user_id', $data->user_id)
                                        ->where('question_id', $question->id)
                                        ->first();

                                    $option = App\Models\MCQ::where('id', $questionAnswer ? $questionAnswer->answer : '')->first();
                                @endphp
                                <tr>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->type == 2 ? ($option ? $option->option : '') : ($questionAnswer ? $questionAnswer->answer : '') }}</td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- end row -->
@endsection
