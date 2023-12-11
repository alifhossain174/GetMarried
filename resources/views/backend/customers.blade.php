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
        table.dataTable tbody td:nth-child(4){
            width: 180px;
        }
    </style>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Registered Customers</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Registered Customers</a></li>
                        <li class="breadcrumb-item active">View All Registered Customers</li>
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
                    <h4 class="mb-3 header-title mt-0">View All Registered Customers</h4>

                    <label id="customFilter">
                        <a href="{{url('download/registered/customer/excel')}}" class="btn btn-sm btn-success rounded" style="display:inline-block; margin-left: 10px;"><i class="feather-download"></i> Download As Excel</a>
                    </label>

                    <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Social Login</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Connections</th>
                                <th class="text-center">Last Purchase</th>
                                <th class="text-center">Account Created</th>
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

@endsection


@section('footer_js')

    <script src="{{url('dataTableBootstrap5')}}/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="{{url('dataTableBootstrap5')}}/DataTables/js/dataTables.bootstrap.min.js"></script>
    <script>
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            stateSave: true,
            serverSide: true,
            pageLength: 15,
            lengthMenu: [15, 25, 50, 100],
            ajax: "{{ url('view/all/customers') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'provider_name', name: 'provider_name'},
                {data: 'address', name: 'address'},
                {data: 'connections', name: 'connections'},
                {data: 'last_purchase_date', name: 'last_purchase_date'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
        $("#DataTables_Table_0_length").append($("#customFilter"));
    </script>

@endsection
