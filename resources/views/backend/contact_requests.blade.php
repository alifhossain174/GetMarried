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
                <h4 class="page-title">Contact Requests</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Contact Requests</a></li>
                        <li class="breadcrumb-item active">View All Contact Requests</li>
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
                    <h4 class="mb-3 header-title mt-0">View All Contact Requests</h4>

                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Message</th>
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
    <script>
        var table = $('.yajra-datatable').DataTable({
            processing: true,stateSave: true,
            serverSide: true,
            pageLength: 10,
            lengthMenu: [10, 20, 50, 100],
            ajax: "{{ url('contact/requests') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'subject', name: 'subject'},
                {data: 'message', name: 'message'},
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

 {{-- js code for user crud --}}
 <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.deleteBtn', function () {
        var slug = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
            $.ajax({
                type: "GET",
                url: "{{ url('delete/contact/request') }}"+'/'+slug,
                success: function (data) {
                    table.draw(false);
                    toastr.error("Request has been Deleted", "Deleted Successfully");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });

    $('body').on('click', '.approveStatus', function () {
        var slug = $(this).data("id");
        if(confirm("Are You sure want to Change Status !")){
            $.ajax({
                type: "GET",
                url: "{{ url('approve/contact/request') }}"+'/'+slug,
                success: function (data) {
                    table.draw();
                    toastr.success("Request has been Changed", "Changed Successfully");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });

    $('body').on('click', '.denyStatus', function () {
        var slug = $(this).data("id");
        if(confirm("Are You sure want to Change Status !")){
            $.ajax({
                type: "GET",
                url: "{{ url('deny/contact/request') }}"+'/'+slug,
                success: function (data) {
                    table.draw();
                    toastr.error("Request has been Changed", "Changed Successfully");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
</script>
@endsection
