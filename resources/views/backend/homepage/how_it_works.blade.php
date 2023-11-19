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
                <h4 class="page-title">Manage How It Works</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Content Module</a></li>
                        <li class="breadcrumb-item active">Manage How It Works</li>
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

                    <h4 class="mb-3 header-title mt-0">Manage How It Works</h4>
                    <label id="customFilter" style="float: right;">
                        <a href="{{url('add/new/how/it/works')}}" class="btn btn-success btn-sm d-inline-block text-white" style="margin-left: 5px; cursor:pointer"><b><i class="bi bi-plus-lg"></i> Add New Data</b></a>
                        <a href="{{url('rearrange/how/it/works')}}" class="btn btn-success btn-sm" style="margin-left: 0px"><b><i class="bi bi-shuffle"></i> Rearrange Items</b></a>
                    </label>

                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Title (BN)</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Description (BN)</th>
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

@endsection


@section('footer_js')

    <script src="{{url('dataTableBootstrap5')}}/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="{{url('dataTableBootstrap5')}}/DataTables/js/dataTables.bootstrap.min.js"></script>
    <script src="{{url('backend_assets')}}/switchery/switchery.min.js"></script>

    <script type="text/javascript">
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            stateSave: true,
            serverSide: true,
            pageLength: 10,
            lengthMenu: [10, 20, 50, 100],
            ajax: "{{ url('view/how/it/works') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function( data, type, full, meta ) {
                        if(data){
                            return "<img class=\"gridProductImage\" src=" + data + " width=\"40\"/>";
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'title',
                    name: 'title'
                }, //orderable: true, searchable: true
                {
                    data: 'title_bn',
                    name: 'title_bn'
                },
                {data: 'description', name: 'description'},
                {data: 'description_bn', name: 'description_bn'},
                {data: 'status', name: 'status'},
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
                    url: "{{ url('delete/how/it/works') }}"+'/'+id,
                    success: function (data) {
                        table.draw(false);
                        toastr.error("Item has been Removed", "Deleted Successfully");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

    </script>
@endsection

