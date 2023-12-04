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
                <h4 class="page-title">Pricing Packages</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Config Module</a></li>
                        <li class="breadcrumb-item active">Pricing Packages</li>
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
                    <h4 class="mb-3 header-title mt-0">View All Pricing Packages</h4>

                    <label id="customFilter" style="float: right;">
                        <button class="btn btn-success btn-sm" id="addNewQuestionSet" style="margin-left: 10px"><b><i class="bi bi-plus-lg"></i> Add New</b></button>
                        <a href="{{url('rearrange/pricing/packages')}}" class="btn btn-success btn-sm" style="margin-left: 5px"><b><i class="bi bi-shuffle"></i> Rearrange</b></a>
                    </label>

                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Title (Bangla)</th>
                                <th class="text-center">Connections</th>
                                <th class="text-center">Price (BDT)</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Pricing Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="questionsetForm" name="questionsetForm" class="form-horizontal">
                        <input type="hidden" name="package_id" id="package_id">

                        <div class="form-group mb-1">
                            <label for="title" class="col-form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="ex. Basic">
                        </div>
                        <div class="form-group mb-1">
                            <label for="title_bn" class="col-form-label">Title (Bangla)</label>
                            <input type="text" class="form-control" id="title_bn" name="title_bn" placeholder="ex. বেসিক">
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-1">
                                    <label for="title_bn" class="col-form-label">Connections</label>
                                    <input type="number" class="form-control" id="connections" name="connections">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-1">
                                    <label for="title_bn" class="col-form-label">Price (BDT)</label>
                                    <input type="number" class="form-control" id="price" name="price">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <label for="description" class="col-form-label">Short Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="ex. ১টি বায়োডাটার যোগাযোগ তথ্য দেখা যাবে।"></textarea>
                        </div>
                        <div class="form-group mb-1">
                            <label for="description" class="col-form-label">Short Description (Bangla)</label>
                            <textarea class="form-control" id="description_bn" name="description_bn" placeholder="ex. 1 biodata contact information will be displayed."></textarea>
                        </div>

                        <div class="form-group mb-1">
                            <label class="col-form-label">Status</label>
                            <select class="form-select" id="questionset_status" name="status">
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
            ajax: "{{ url('view/pricing/packages') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'title_bn', name: 'title_bn'},
                {data: 'connections', name: 'connections'},
                {data: 'price', name: 'price'},
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

        $('#addNewQuestionSet').click(function() {
            $('#questionSetForm').trigger("reset");
            $("#package_id").val(0);
            $("#exampleModalLabel").html("Add New Pricing Package");
            $('#exampleModal').modal('show');
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();

            var package_id = $('#package_id').val();
            if(package_id > 0){ // update

                $(this).html('Saving..');
                $.ajax({
                    data: $('#questionsetForm').serialize(),
                    url: "{{ url('update/pricing/package') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtn').html('Save');
                        $('#questionsetForm').trigger("reset");
                        $('#exampleModal').modal('hide');
                        toastr.success("Question Set Updated", "Updated Successfully");
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
                    url: "{{ url('save/pricing/package') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#saveBtn').html('Save');
                        $('#questionsetForm').trigger("reset");
                        $('#exampleModal').modal('hide');
                        toastr.success("Question Set Added", "Added Successfully");
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
            $.get("{{ url('get/pricing/package/info') }}" +'/' + slug, function (data) {
                $("#exampleModalLabel").html("Update Pricing Package");
                $('#exampleModal').modal('show');
                $('#package_id').val(data.id);
                $('#title').val(data.title);
                $('#title_bn').val(data.title_bn);
                $('#connections').val(data.connections);
                $('#price').val(data.price);
                $('#description').val(data.description);
                $('#description_bn').val(data.description_bn);
                $('#questionset_status').val(data.status);
            })
        });


        $('body').on('click', '.deleteBtn', function () {
            var slug = $(this).data("id");
            if(confirm("Are You sure want to delete !")){
                $.ajax({
                    type: "GET",
                    url: "{{ url('delete/pricing/package') }}"+'/'+slug,
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
