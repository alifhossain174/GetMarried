@extends('backend.master')

@section('header_css')
    <style>
        ol.rearrangement {
            font-weight: 500;
        }

        ol.rearrangement li {
            border: 1px solid;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            box-shadow: 2px 2px 5px rgb(199, 199, 199);
            width: 47%;
        }

        .clearfix::before,
        .clearfix::after {
            content: ' ';
            display: table;
        }

        .clearfix::after {
            clear: both;
        }

        small.instruction_text {
            color: #1e1e1e;
            font-weight: 500;
            font-size: 13px;
            display: block;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Rearrange Questions</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Config</a></li>
                        <li class="breadcrumb-item active">Rearrange Questions</li>
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
                    <form action="{{ url('save/rearranged/questions') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mb-3 header-title mt-0">Rearrange Items by Dragging them</h4>
                            </div>
                            <div class="col-lg-4 text-end">
                                <button type="submit" class="btn rounded btn-primary">Save Rearranged Order</button>
                            </div>
                        </div>
                        <small class="instruction_text">[N/B: Drag the Item using your Mouse Cursor to Rearrange their
                            Order.
                            Then Press the save button to save the Rearranged Order]</small>


                        @csrf

                        @php
                            $sl = 1;
                        @endphp
                        <ol class="clearfix rearrangement">
                            @foreach ($questionSets as $questionSet)
                                <b>{{ $questionSet->title }}:</b>
                                @php
                                    $data = DB::table('questions')
                                        ->leftJoin('question_sets', 'questions.question_set_id', '=', 'question_sets.id')
                                        ->where('questions.question_set_id', $questionSet->id)
                                        ->select('questions.*', 'question_sets.title', 'question_sets.serial')
                                        ->orderBy('question_sets.serial', 'asc')
                                        ->orderBy('questions.serial', 'asc')
                                        ->get();
                                @endphp

                                @foreach ($data as $question)
                                    <li style="background: #{{ rand(1000, 9999) }};">
                                        <input type="hidden" value="{{ $question->id }}" name="id[]">
                                        {{ $sl++ }}) {{ $question->question }}
                                    </li>
                                @endforeach

                                <br>
                            @endforeach
                        </ol>

                        <button type="submit" class="btn rounded btn-primary">Save Rearranged Order</button>
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection


@section('footer_js')
    <script src="{{ url('backend_assets') }}/js/jquery.dragndrop.js"></script>
    <script>
        $(function() {
            $('ol').dragndrop({
                onDrop: function(element, droppedElement) {
                    console.log('element dropped: ');
                    console.log(droppedElement);
                }
            });
        });
    </script>
@endsection
