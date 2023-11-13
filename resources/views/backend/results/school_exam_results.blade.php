@extends('backend.master')

@section('header_css')
    <link href="{{url('dataTableBootstrap5')}}/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('dataTableBootstrap5')}}/DataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <style>
        table.dataTable tbody td{
            text-align: center !important;
        }
        table.dataTable tbody td:nth-child(6){
            color: green;
            font-weight: 600;
        }
        table.dataTable tbody td:nth-child(7){
            color: red;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">School Exam Results</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config</a></li>
                        <li class="breadcrumb-item active">School Exam Results</li>
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

                    <form class="form-horizontal" action="{{url('update/school/result/page/title')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="page_title" class="col-lg-2 col-md-2 col-form-label">Page Title :</label>
                            <div class="col-lg-8 col-md-8">
                                <input type="text" name="page_title" value="{{$pageTitle}}" class="form-control" id="page_title" placeholder="Page Title">
                                @error('page_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <button type="submit" class="btn btn-success w-100"><b>✅︎ Update Page Title</b></button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <h4 class="mb-3 header-title mt-0">View All School Exam Results</h4>
                    <label id="customFilter" style="float: right;">
                        <button class="btn btn-success btn-sm" id="addNewPricing" style="margin-left: 10px"><b><i class="bi bi-plus-lg"></i> Add New Result</b></button>
                        <a href="{{url('rearrange/school/exam/results')}}" class="btn btn-success btn-sm" style="margin-left: 5px"><b><i class="bi bi-shuffle"></i> Rearrange Results</b></a>
                    </label>

                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Class</th>
                                    <th class="text-center">School Exam</th>
                                    <th class="text-center">Year</th>
                                    <th class="text-center">Total Students</th>
                                    <th class="text-center">Total Passed</th>
                                    <th class="text-center">Total Failed</th>
                                    <th class="text-center">Attachment</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>


                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #dbdbdb;">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="productForm" name="productForm" class="form-horizontal">
                        <input type="hidden" name="result_id" id="result_id">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-1">
                                    <label for="class_id" class="col-form-label">Class <span class="text-danger">*</span></label>
                                    <select class="form-select" id="class_id" name="class_id">
                                        @php
                                            echo App\Models\SchoolClass::getDropDownList('name');
                                        @endphp
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-1">
                                    <label for="school_exam_id" class="col-form-label">School Exam <span class="text-danger">*</span></label>
                                    <select class="form-select" id="school_exam_id" name="school_exam_id">
                                        @php
                                            echo App\Models\SchoolExam::getDropDownList('name');
                                        @endphp
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-1">
                                    <label for="year" class="col-form-label">Year <span class="text-danger">*</span></label>
                                    <select class="form-select" id="year" name="year">
                                        <option value="">Select One</option>
                                        @for ($i=2005; $i<=date("Y"); $i++)
                                            <option value="{{$i}}" @if($i == date("Y")) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-1">
                                    <label for="total_students" class="col-form-label">Total Students <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="total_students" name="total_students">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-1">
                                    <label for="total_passed" class="col-form-label">Total Passed <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="total_passed" name="total_passed">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-1">
                                    <label for="total_failed" class="col-form-label">Total Failed <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="total_failed" name="total_failed">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-form-label">Attachment</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
                                        <i class="fi fi-rr-picture"></i> Upload File
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control attachment" type="text" name="attachment" readonly>
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label class="col-form-label">Status</label>
                            <select class="form-select" id="class_status" name="status">
                                <option value="">Select One</option>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('footer_js')

    <script src="{{url('dataTableBootstrap5')}}/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="{{url('dataTableBootstrap5')}}/DataTables/js/dataTables.bootstrap.min.js"></script>
    <script>
        var table = $('.yajra-datatable').DataTable({
            processing: true,stateSave: true,
            serverSide: true,
            pageLength: 10,
            lengthMenu: [10, 20, 50, 100],
            ajax: "{{ url('school/exam/results') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'class_name', name: 'class_name'},
                {data: 'exam_name', name: 'exam_name'},
                {data: 'year', name: 'year'},
                {data: 'total_students', name: 'total_students'},
                {data: 'total_passed', name: 'total_passed'},
                {data: 'total_failed', name: 'total_failed'},
                {data: 'attachment', name: 'attachment'},
                {data: 'status', name: 'status'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
        $(".dataTables_filter").append($("#customFilter"));
    </script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addNewPricing').click(function() {
            $('#productForm').trigger("reset");
            $("#result_id").val(0);
            $("#exampleModalLabel").html("Add New Result");
            $('#exampleModal').modal('show');
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();

            var classId = $('#result_id').val();
            if(classId > 0){ // update

                $(this).html('Saving...');
                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ url('update/school/exam/result') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtn').html('Save');
                        $('#productForm').trigger("reset");
                        $('#exampleModal').modal('hide');
                        toastr.success("Result Info Updated", "Updated Successfully");
                        table.draw(false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        toastr.warning("Something Went Wrong", "Error Occured");
                        $('#saveBtn').html('Save');
                    }
                });

            } else { //create

                $(this).html('Saving..');
                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ url('save/school/exam/result') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtn').html('Save');
                        $('#productForm').trigger("reset");
                        $('#exampleModal').modal('hide');
                        toastr.success("New Result Added", "Added Successfully");
                        table.draw(false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        toastr.warning("Something Went Wrong", "Error Occured");
                        $('#saveBtn').html('Save');
                    }
                });
            }
        });

        $('body').on('click', '.editBtn', function () {
            var slug = $(this).data('id');
            $.get("{{ url('get/school/exam/result') }}" +'/' + slug, function (data) {
                $("#exampleModalLabel").html("Update Public Exam Result");
                $('#exampleModal').modal('show');
                $('#result_id').val(data.id);
                $('#school_exam_id').val(data.school_exam_id);
                $('#class_id').val(data.class_id);
                $('#year').val(data.year);
                $('#total_students').val(data.total_students);
                $('#total_passed').val(data.total_passed);
                $('#total_failed').val(data.total_failed);
                $('#class_status').val(data.status);
                $('.attachment').val(data.attachment);
            })
        });


        $('body').on('click', '.deleteBtn', function () {
            var slug = $(this).data("id");
            if(confirm("Are You sure want to delete !")){
                $.ajax({
                    type: "GET",
                    url: "{{ url('delete/school/exam/result') }}"+'/'+slug,
                    success: function (data) {
                        table.draw(false);
                        toastr.error("Data has been Deleted", "Deleted Successfully");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

    </script>

    <script>
        var route_prefix = "/filemanager";
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
        $('#lfm').filemanager('file', {prefix: route_prefix});
    </script>
@endsection
