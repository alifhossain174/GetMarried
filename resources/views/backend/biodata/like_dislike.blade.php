@extends('backend.master')

@section('header_css')
    <link href="{{ url('dataTableBootstrap5') }}/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('dataTableBootstrap5') }}/DataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <style>
        table.dataTable tbody td:nth-child(1) {
            font-weight: 600;
        }

        table.dataTable tbody td {
            text-align: center !important;
        }
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Biodata Likes/Dislikes</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Functional Module</a></li>
                        <li class="breadcrumb-item active">Biodata Likes/Dislikes</li>
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
                    <h4 class="mb-3 header-title mt-0">View All Biodata Likes/Dislikes</h4>

                    <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Biodata No</th>
                                <th class="text-center">Biodata Type</th>
                                <th class="text-center">Like/Dislike</th>
                                <th class="text-center">Action By (Name)</th>
                                <th class="text-center">Action By (Contact)</th>
                                <th class="text-center">Datetime</th>
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
    <script src="{{ url('dataTableBootstrap5') }}/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('dataTableBootstrap5') }}/DataTables/js/dataTables.bootstrap.min.js"></script>
    <script>
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            stateSave: true,
            serverSide: true,
            pageLength: 15,
            lengthMenu: [15, 25, 50, 100],
            ajax: "{{ url('view/biodata/likes/dislikes') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'biodata_no',
                    name: 'biodata_no'
                },
                {
                    data: 'biodata_type_title',
                    name: 'biodata_type_title'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'user_name',
                    name: 'user_name'
                },
                {
                    data: 'user_email',
                    name: 'user_email'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }
            ]
        });
    </script>
@endsection
