@extends('backend.master')

@section('header_css')
    <link href="{{url('dataTableBootstrap5')}}/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('dataTableBootstrap5')}}/DataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <style>
        table.dataTable tbody td:nth-child(1){
            font-weight: 600;
        }
        table.dataTable tbody td{
            text-align: center !important;
        }
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Upazila & Thana</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Config Module</a></li>
                        <li class="breadcrumb-item active">Upazila & Thana</li>
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
                    <h4 class="mb-3 header-title mt-0">View All Upazila & Thana</h4>

                    <label id="customFilter" style="float: right;">
                        <button class="btn btn-success btn-sm" id="addNewQuestionSet" style="margin-left: 10px"><b><i class="bi bi-plus-lg"></i> Add New</b></button>
                    </label>

                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">District Name</th>
                                    <th class="text-center">District Name (Bangla)</th>
                                    <th class="text-center">Upazila Name</th>
                                    <th class="text-center">Upazila Name (Bangla)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #dbdbdb;">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Upazila & Thana</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="questionsetForm" name="questionsetForm" class="form-horizontal">
                        <input type="hidden" name="upazila_id" id="upazila_id" value="">
                        <div class="form-group mb-1">
                            <label for="title" class="col-form-label">District <span class="text-danger">*</span></label>
                            <select class="form-select" name="district_id" id="district_id" required>
                                <option value="">Select One</option>
                                @foreach ($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <label for="name" class="col-form-label">Upazila/Thana Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ex. Comilla">
                        </div>
                        <div class="form-group mb-1">
                            <label for="bn_name" class="col-form-label">Upazila/Thana Name (Bangla) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bn_name" name="bn_name" placeholder="ex. কুমিল্লা">
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
            pageLength: 20,
            lengthMenu: [20, 50, 100, 200],
            ajax: "{{ url('view/all/upazilas') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'district_name', name: 'district_name'},
                {data: 'district_bn_name', name: 'district_bn_name'},
                {data: 'name', name: 'name'},
                {data: 'bn_name', name: 'bn_name'},
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

        $('#addNewQuestionSet').click(function() {
            $('#questionSetForm').trigger("reset");
            $("#upazila_id").val(0);
            $('#district_id').val("");
            $('#name').val("");
            $('#bn_name').val("");
            $("#exampleModalLabel").html("Add New Upazila & Thana");
            $('#exampleModal').modal('show');
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();

            var upazila_id = $('#upazila_id').val();
            if(upazila_id > 0){ // update

                $(this).html('Saving..');
                $.ajax({
                    data: $('#questionsetForm').serialize(),
                    url: "{{ url('update/upazila') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtn').html('Save');
                        $('#questionsetForm').trigger("reset");
                        $('#exampleModal').modal('hide');
                        toastr.success("Upazila Info Updated", "Updated Successfully");
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
                    data: $('#questionsetForm').serialize(),
                    url: "{{ url('save/upazila') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtn').html('Save');
                        $('#questionsetForm').trigger("reset");
                        $('#exampleModal').modal('hide');
                        toastr.success("Upazila Added", "Added Successfully");
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
            $.get("{{ url('get/upazila/info') }}" +'/' + slug, function (data) {
                $("#exampleModalLabel").html("Update Upazila & Thana");
                $('#exampleModal').modal('show');
                $('#upazila_id').val(data.id);
                $('#district_id').val(data.district_id);
                $('#name').val(data.name);
                $('#bn_name').val(data.bn_name);
            })
        });


        $('body').on('click', '.deleteBtn', function () {
            var id = $(this).data("id");
            if(confirm("Are You sure want to delete !")){
                $.ajax({
                    type: "GET",
                    url: "{{ url('delete/upazila') }}"+'/'+id,
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
@endsection
