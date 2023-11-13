@extends('backend.master')

@section('header_css')
    <link href="{{url('backend_assets')}}/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">User Role Update</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User Roles</a></li>
                        <li class="breadcrumb-item active">Update User Role</li>
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
                    <h4 class="mb-3 header-title mt-0">User Role Update Form</h4>

                    <form class="needs-validation" method="POST" action="{{url('update/user/role')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="role_id" value="{{$userRoleInfo->id}}">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Role Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{$userRoleInfo->name}}" id="name" placeholder="Role Name" required>
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Role Description</label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" class="form-control" placeholder="Role Description Here">{{$userRoleInfo->description}}</textarea>
                                    <div class="invalid-feedback" style="display: block;">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr>

                            @php
                                $permissionRoutes1 = App\Models\PermissionRoutes::orderBy('id', 'desc')->orderBy('route', 'asc')->skip(0)->limit(100)->get();
                                $permissionRoutes2 = App\Models\PermissionRoutes::orderBy('id', 'desc')->orderBy('route', 'asc')->skip(100)->limit(100)->get();
                                $permissionRoutes3 = App\Models\PermissionRoutes::orderBy('id', 'desc')->orderBy('route', 'asc')->skip(200)->limit(100)->get();
                            @endphp

                            <h4 class="card-title mb-4 mt-4">Assign Permission to this Role</h4>
                            <div class="row">
                                <div class="col-lg-4 border-right">
                                    @foreach ($permissionRoutes1 as $permissionRoute)
                                    <div class="form-group border-bottom" style="margin-bottom: .3rem; padding-bottom: 5px;">
                                        <table>
                                            <tr>
                                                <td style="padding-right: 10px; vertical-align: middle;">
                                                    <input type="checkbox" @if(App\Models\RolePermission::where('role_id', $userRoleInfo->id)->where('permission_id', $permissionRoute->id)->exists()) checked @endif data-size="small" id="per{{$permissionRoute->id}}" value="{{$permissionRoute->id}}" name="permission_id[]" data-toggle="switchery" data-color="#08da82" data-secondary-color="#df3554"/>
                                                </td>
                                                <td style="padding-top: 5px; vertical-align: middle;">
                                                    <label for="per{{$permissionRoute->id}}" style="cursor: pointer">
                                                        Route: {{$permissionRoute->route}}<br>
                                                        Name: {{$permissionRoute->name}}
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-4 border-right">
                                    @foreach ($permissionRoutes2 as $permissionRoute)
                                    <div class="form-group border-bottom" style="margin-bottom: .3rem; padding-bottom: 5px;">
                                        <table>
                                            <tr>
                                                <td style="padding-right: 10px; vertical-align: middle;">
                                                    <input type="checkbox" @if(App\Models\RolePermission::where('role_id', $userRoleInfo->id)->where('permission_id', $permissionRoute->id)->exists()) checked @endif data-size="small" id="per{{$permissionRoute->id}}" value="{{$permissionRoute->id}}" name="permission_id[]" data-toggle="switchery" data-color="#08da82" data-secondary-color="#df3554"/>
                                                </td>
                                                <td style="padding-top: 5px; vertical-align: middle;">
                                                    <label for="per{{$permissionRoute->id}}" style="cursor: pointer">
                                                        Route: {{$permissionRoute->route}}<br>
                                                        Name: {{$permissionRoute->name}}
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-4">
                                    @foreach ($permissionRoutes3 as $permissionRoute)
                                    <div class="form-group border-bottom" style="margin-bottom: .3rem; padding-bottom: 5px;">
                                        <table>
                                            <tr>
                                                <td style="padding-right: 10px; vertical-align: middle;">
                                                    <input type="checkbox" @if(App\Models\RolePermission::where('role_id', $userRoleInfo->id)->where('permission_id', $permissionRoute->id)->exists()) checked @endif data-size="small" id="per{{$permissionRoute->id}}" value="{{$permissionRoute->id}}" name="permission_id[]" data-toggle="switchery" data-color="#08da82" data-secondary-color="#df3554"/>
                                                </td>
                                                <td style="padding-top: 5px; vertical-align: middle;">
                                                    <label for="per{{$permissionRoute->id}}" style="cursor: pointer">
                                                        Route: {{$permissionRoute->route}}<br>
                                                        Name: {{$permissionRoute->name}}
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        <div class="form-group text-center pt-3">
                            <button class="btn btn-primary m-2" type="submit"><i class="fas fa-save"></i>&nbsp; Update User Role</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_js')
    <script src="{{url('backend_assets')}}/switchery/switchery.min.js"></script>
    <script type="text/javascript">
        $('[data-toggle="switchery"]').each(function (idx, obj) {
            new Switchery($(this)[0], $(this).data());
        });
    </script>
@endsection
