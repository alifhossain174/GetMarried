@extends('backend.master')

@section('header_css')
    <link href="{{ url('dataTableBootstrap5') }}/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
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
                <h4 class="page-title">Complain Messages</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Functional Module</a></li>
                        <li class="breadcrumb-item active">Complain Messages</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pb-4" id="div1">

                    <h4 class="card-title mb-1">Customer</h4>
                    <div class="w-75 text-left mb-3" style="background: lightgoldenrodyellow; padding: 10px; border-radius: 5px;">
                        {{ $complain->details }}
                        <div class="row pt-1 border-top mt-2">
                            <div class="col-lg-6">
                                @if($complain->attachment)
                                <a href="{{url($complain->attachment)}}" stream target="_blank"><i class="feather-download"></i> Download Attachment</a>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <small style="display:block; text-align:right; font-size: 11px">{{date("h:i:s A, jS F Y", strtotime($complain->created_at))}}</small>
                            </div>
                        </div>
                    </div>

                    @foreach ($messages as $msg)
                        @if($msg->user_type == 2)
                            <h4 class="card-title-admin mb-1" style="text-align: right;">Support Agent</h4>
                            <div class="w-75 text-right mb-3" style="margin-left:auto; background: lightcyan; padding: 10px; border-radius: 5px;">
                                {{$msg->message}}
                                <div class="row pt-1 border-top mt-2">
                                    <div class="col-lg-6 text-left">
                                        @if($msg->attachment)
                                        <a href="{{url($msg->attachment)}}" stream target="_blank"><i class="feather-download"></i> Download Attachment</a>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <small style="display:block; text-align:right; font-size: 11px">{{date("h:i:s A, jS F Y", strtotime($msg->created_at))}}</small>
                                    </div>
                                </div>
                            </div>
                        @else
                            <h4 class="card-title mb-1">Customer</h4>
                            <div class="w-75 text-left mb-3" style="background: lightgoldenrodyellow; padding: 10px; border-radius: 5px;">
                                {{$msg->message}}
                                <div class="row pt-1 border-top mt-2">
                                    <div class="col-lg-6">
                                        @if($msg->attachment)
                                        <a href="{{url($msg->attachment)}}" stream target="_blank"><i class="feather-download"></i> Download Attachment</a>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <small style="display:block; text-align:right; font-size: 11px">{{date("h:i:s A, jS F Y", strtotime($msg->created_at))}}</small>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('reply/complain/message')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="complain_id" value="{{$complain->id}}">
                        <div class="invalid-feedback" style="display: block;">
                            @error('support_ticket_id')
                                {{ $message }}
                            @enderror
                        </div>

                        <textarea class="form-control" name="message" required></textarea>
                        <div class="invalid-feedback" style="display: block;">
                            @error('message')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-8">
                                <input type="file" class="form-control" name="attachment">
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-success rounded w-100"><i class="feather-send"></i> Send Message</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_js')
    <script>
        $(document).ready(function() {
            $("#div1").animate({ scrollTop: $('#div1').prop("scrollHeight")}, 1000);
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });
    </script>
@endsection
