@extends('backend.master')

@section('header_css')
    <link href="{{url('dataTableBootstrap5')}}/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('dataTableBootstrap5')}}/DataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <style>
        table.dataTable tbody td:nth-child(1){
            text-align: center !important;
            font-weight: 600;
        }
        table.dataTable tbody td:nth-child(2){
            text-align: center !important;
        }
        table.dataTable tbody td:nth-child(3){
            text-align: center !important;
        }
        table.dataTable tbody td:nth-child(4){
            text-align: center !important;
            width: 180px;
        }
        table.dataTable tbody td:nth-child(5){
            text-align: center !important;
        }
        table.dataTable tbody td:nth-child(6){
            text-align: center !important;
        }
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Religion</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config</a></li>
                        <li class="breadcrumb-item active">Religion</li>
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
                    <h4 class="mb-3 header-title mt-0">View All Religions</h4>

                    <label id="customFilter" style="float: right;">
                        <button class="btn btn-success btn-sm" id="addNewPricing" style="margin-left: 10px"><b><i class="bi bi-plus-lg"></i> Add New Religion</b></button>
                        <a href="{{url('rearrange/religion')}}" class="btn btn-success btn-sm" style="margin-left: 5px"><b><i class="bi bi-shuffle"></i> Rearrange Religion</b></a>
                    </label>

                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Name (Bangla)</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #dbdbdb;">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Religion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="productForm" name="productForm" class="form-horizontal">
                        <input type="hidden" name="religion_id" id="religion_id">

                        <div class="form-group mb-1">
                            <label for="name" class="col-form-label">Religion Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group mb-1">
                            <label for="name" class="col-form-label">Religion Name (Bangla)</label>
                            <input type="text" class="form-control" id="bn_name" name="bn_name">
                        </div>

                        <div class="form-group mb-1">
                            <label class="col-form-label">Status</label>
                            <select class="form-select" id="religion_status" name="status">
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
            ajax: "{{ url('view/all/religions') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'bn_name', name: 'bn_name'},
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
            $("#religion_id").val(0);
            $("#exampleModalLabel").html("Add New Religion");
            $('#exampleModal').modal('show');
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();

            var religionId = $('#religion_id').val();
            if(religionId > 0){ // update

                $(this).html('Saving..');
                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ url('update/religion/info') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtn').html('Save');
                        $('#productForm').trigger("reset");
                        $('#exampleModal').modal('hide');
                        toastr.success("Religion Info Updated", "Updated Successfully");
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
                    url: "{{ url('add/new/religion') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtn').html('Save');
                        $('#productForm').trigger("reset");
                        $('#exampleModal').modal('hide');
                        toastr.success("New Religion Added", "Added Successfully");
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
            $.get("{{ url('get/religion/info') }}" +'/' + slug, function (data) {
                $("#exampleModalLabel").html("Update Religion Info");
                $('#exampleModal').modal('show');
                $('#religion_id').val(data.id);
                $('#name').val(data.name);
                $('#bn_name').val(data.bn_name);
                $('#religion_status').val(data.status);
            })
        });


        $('body').on('click', '.deleteBtn', function () {
            var slug = $(this).data("id");
            if(confirm("Are You sure want to delete !")){
                $.ajax({
                    type: "GET",
                    url: "{{ url('delete/religion') }}"+'/'+slug,
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
