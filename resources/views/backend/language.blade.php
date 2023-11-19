@extends('backend.master')


@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Languages</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website Config Modules</a></li>
                        <li class="breadcrumb-item active">Languages</li>
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
                    <h4 class="mb-3 header-title mt-0">Set Default Language</h4>

                    <div class="row">
                        @foreach ($languages as $language)
                        <div class="col-lg-3 text-center">
                            <div class="language_box" style="@if($language->status == 1) box-shadow: 2px 2px 5px #c8c8c8; border: 1px solid green; @else border: 1px solid #e4e4e4; @endif border-radius: 4px; padding: 25px;">
                                <img src="{{url($language->icon)}}" width="60px">
                                <h5 class="pt-2 pb-1">language: {{$language->name}}</h5>
                                <p class="mb-0">
                                    {{$language->description}}
                                </p>
                                <select class="form-select mt-3" @if($language->status == 1) style="color: white !important; border-color: #06B8AC !important; background-color: #06B8AC !important;" @endif id="language_{{$language->code}}" onchange="setDefaultLanguage('{{$language->code}}', this.value)">
                                    <option value="1" @if($language->status == 1) selected @endif>Active</option>
                                    <option value="0" @if($language->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('footer_js')
    <script>
        function setDefaultLanguage(code, value){
            $.ajax({
                type: "GET",
                url: "{{ url('set/default/language') }}"+'/'+code+'/'+value,
                success: function (data) {
                    toastr.success("Language is Changed Successfully")
                    setTimeout(function() {
                        console.log("Wait For 1 Sec");
                        location.reload(true);
                    }, 1000);
                },
                error: function (data) {
                    toastr.error("Something Went Wrong")
                    console.log('Error:', data);
                }
            });
        }
    </script>
@endsection
