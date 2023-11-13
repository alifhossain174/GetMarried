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
                <h4 class="page-title">Permission Route List</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Permission Routes</a></li>
                        <li class="breadcrumb-item active">View All Permission Routes</li>
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
                    <h4 class="mb-3 header-title mt-0">View All Permission Routes</h4>


                    <label id="customFilter" style="float: right;">
                        <a href="{{url('regenerate/permission/routes')}}" class="btn btn-success btn-sm d-inline-block text-white" style="margin-left: 5px; cursor:pointer"><i class="bi bi-arrow-repeat" style="margin-right: 2px; font-size: 14px;"></i> Regenerate Routes</b></a>
                    </label>

                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Route</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Method</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
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
    <script>
        var table = $('.yajra-datatable').DataTable({
            processing: true,stateSave: true,
            serverSide: true,
            pageLength: 15,
            lengthMenu: [15, 25, 50, 100],
            ajax: "{{ url('view/permission/routes') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'route', name: 'route'},
                {data: 'name', name: 'name'},
                {data: 'method', name: 'method'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
            ]
        });
        $(".dataTables_filter").append($("#customFilter"));
    </script>

@endsection

