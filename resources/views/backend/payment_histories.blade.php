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
                <h4 class="page-title">Payment Histories</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Config</a></li>
                        <li class="breadcrumb-item active">Payment Histories</li>
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
                    <h4 class="mb-3 header-title mt-0">View All Payment Histories</h4>

                    <table class="table table-sm table-striped table-bordered table-hover yajra-datatable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Payment Through</th>
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">Card Type</th>
                                <th class="text-center">Card Brand</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Store Amount</th>
                                <th class="text-center">Currency</th>
                                <th class="text-center">Bank Tran ID</th>
                                <th class="text-center">Datetime</th>
                                <th class="text-center">Status</th>
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
            ajax: "{{ url('view/payment/histories') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'payment_through', name: 'payment_through'},
                {data: 'tran_id', name: 'tran_id'},
                {data: 'card_type', name: 'card_type'},
                {data: 'card_brand', name: 'card_brand'},
                {data: 'amount', name: 'amount'},
                {data: 'store_amount', name: 'store_amount'},
                {data: 'currency', name: 'currency'},
                {data: 'bank_tran_id', name: 'bank_tran_id'},
                {data: 'tran_date', name: 'tran_date'},
                {data: 'status', name: 'status'},
            ]
        });
    </script>
@endsection
