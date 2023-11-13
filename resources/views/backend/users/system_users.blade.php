@extends('backend.master')

@section('header_css')
    <link href="{{url('backend_assets')}}/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
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
        table#DataTables_Table_0 img{
            transition: all .2s linear;
        }
        img.gridProductImage:hover{
            scale: 2;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">System Users</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">System Users</a></li>
                        <li class="breadcrumb-item active">View All System Users</li>
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

                    <h4 class="mb-3 header-title mt-0">View All System Users</h4>
                    <label id="customFilter" style="float: right;">
                        <a href="{{url('add/new/system/user')}}" class="btn btn-success btn-sm d-inline-block text-white" style="margin-left: 5px; cursor:pointer"><b><i class="feather-repeat"></i> Create System User</b></a>
                    </label>

                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Account Created</th>
                                <th class="text-center">User Type</th>
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

@endsection


@section('footer_js')

    <script src="{{url('dataTableBootstrap5')}}/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="{{url('dataTableBootstrap5')}}/DataTables/js/dataTables.bootstrap.min.js"></script>
    <script src="{{url('backend_assets')}}/switchery/switchery.min.js"></script>

    <script type="text/javascript">
        var table = $('.yajra-datatable').DataTable({
            processing: true,stateSave: true,
            serverSide: true,
            pageLength: 10,
            lengthMenu: [10, 20, 50, 100],
            ajax: "{{ url('view/system/users') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                }, //orderable: true, searchable: true
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'user_type', name: 'user_type'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            initComplete: function() {
                $('[data-toggle="switchery"]').each(function (idx, obj) {
                    new Switchery($(this)[0], $(this).data());
                });
            }
        });
        $(".dataTables_filter").append($("#customFilter"));
    </script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.deleteBtn', function () {
            var id = $(this).data("id");
            if(confirm("Are You sure want to delete !")){
                $.ajax({
                    type: "GET",
                    url: "{{ url('delete/system/user') }}"+'/'+id,
                    success: function (data) {
                        // table.draw(false);
                        toastr.error("User has been Deleted", "Deleted Successfully");
                        location.reload(true);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        $('body').on('click', '.makeSuperAdmin', function () {
            var id = $(this).data("id");
            if(confirm("Are You sure want to Make this SuperAdmin !")){
                $.ajax({
                    type: "GET",
                    url: "{{ url('make/user/superadmin') }}"+'/'+id,
                    success: function (data) {
                        toastr.success("User is SuperAdmin Now", "Successfull");
                        location.reload(true);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        $('body').on('click', '.revokeSuperAdmin', function () {
            var id = $(this).data("id");
            if(confirm("Are You sure want to Revoke SuperAdmin !")){
                $.ajax({
                    type: "GET",
                    url: "{{ url('revoke/user/superadmin') }}"+'/'+id,
                    success: function (data) {
                        toastr.success("User is Not SuperAdmin Now", "Successfull");
                        location.reload(true);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        function changeUserStatus(id){
            var userId = id;
            $.ajax({
                type: "GET",
                url: "{{ url('change/user/status') }}"+'/'+userId,
                success: function (data) {
                    toastr.success("User Status has been Changed", "Changed Successfully");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }

    </script>
@endsection

