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
                <h4 class="page-title">Approved Biodatas</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Functional Module</a></li>
                        <li class="breadcrumb-item active">Approved Biodatas</li>
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
                    <h4 class="mb-3 header-title mt-0">View Approved Biodatas</h4>

                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Biodata No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Birth Date</th>
                                    <th class="text-center">Height</th>
                                    <th class="text-center">Skin Tone</th>
                                    <th class="text-center">Views</th>
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
            ajax: "{{ url('view/approved/biodatas') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, full, meta) {
                        if (data) {
                            return "<img class=\"gridProductImage\" src=" + data + " width=\"50\"/>";
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'biodata_no',
                    name: 'biodata_no'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'birth_date',
                    name: 'birth_date'
                },
                {
                    data: 'height_foot',
                    name: 'height_foot'
                },
                {
                    data: 'skin_tone',
                    name: 'skin_tone'
                },
                {
                    data: 'views',
                    name: 'views'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    </script>
@endsection
