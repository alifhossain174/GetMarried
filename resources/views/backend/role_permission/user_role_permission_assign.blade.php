@extends('backend.master')

@section('header_css')
    <link href="{{url('backend_assets')}}/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">User Role Permission Assign</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Assign Role Permission</a></li>
                        <li class="breadcrumb-item active">User Role Permission Assign</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Assign Role to this User</h4>

                    <form class="needs-validation" method="POST" action="{{url('save/assigned/role/permission')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="user_id" value="{{$userId}}">

                            @php
                                $userRoles = App\Models\UserRole::orderBy('id', 'desc')->get();
                            @endphp

                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach ($userRoles as $userRoles)
                                    @php
                                        $permissionsUnderRole = '';
                                        $rolePermissions = App\Models\RolePermission::where('role_id', $userRoles->id)->get();
                                        foreach($rolePermissions as $rolePermission){
                                            $permissionsUnderRole .= $rolePermission->route_name.", ";
                                        }
                                    @endphp
                                    <div class="form-group border-bottom" style="padding: 7px 0px;">
                                        <table>
                                            <tr>
                                                <td style="padding-right: 10px; vertical-align: middle;">
                                                    <input type="checkbox" @if(App\Models\UserRolePermission::where('user_id', $userId)->where('role_id', $userRoles->id)->exists()) checked @endif data-size="small" id="role{{$userRoles->id}}" value="{{$userRoles->id}}" name="role_id[]" data-toggle="switchery" data-color="#08da82" data-secondary-color="#df3554"/>
                                                </td>
                                                <td style="padding-top: 5px; vertical-align: middle;">
                                                    <label for="role{{$userRoles->id}}" style="cursor: pointer">
                                                        {{$userRoles->name}} [ {{rtrim($permissionsUnderRole, ", ")}} ]
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endforeach
                                </div>
                            </div>


                            @php
                                $permissionRoutes1 = App\Models\PermissionRoutes::orderBy('id', 'desc')->orderBy('route', 'asc')->skip(0)->limit(100)->get();
                                $permissionRoutes2 = App\Models\PermissionRoutes::orderBy('id', 'desc')->orderBy('route', 'asc')->skip(100)->limit(100)->get();
                                $permissionRoutes3 = App\Models\PermissionRoutes::orderBy('id', 'desc')->orderBy('route', 'asc')->skip(200)->limit(100)->get();
                            @endphp

                            <h4 class="card-title mb-4 mt-4">Assign Permission to this User</h4>
                            <div class="row">
                                <div class="col-lg-4 border-right">
                                    @foreach ($permissionRoutes1 as $permissionRoute)
                                    <div class="form-group border-bottom" style="margin-bottom: .3rem;">
                                        <table>
                                            <tr>
                                                <td style="padding-right: 10px; vertical-align: middle;">
                                                    <input type="checkbox" @if(App\Models\UserRolePermission::where('user_id', $userId)->where('permission_id', $permissionRoute->id)->exists()) checked @endif data-size="small" id="per{{$permissionRoute->id}}" value="{{$permissionRoute->id}}" name="permission_id[]" data-toggle="switchery" data-color="#08da82" data-secondary-color="#df3554"/>
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
                                    <div class="form-group border-bottom" style="margin-bottom: .3rem;">
                                        <table>
                                            <tr>
                                                <td style="padding-right: 10px; vertical-align: middle;">
                                                    <input type="checkbox" @if(App\Models\UserRolePermission::where('user_id', $userId)->where('permission_id', $permissionRoute->id)->exists()) checked @endif data-size="small" id="per{{$permissionRoute->id}}" value="{{$permissionRoute->id}}" name="permission_id[]" data-toggle="switchery" data-color="#08da82" data-secondary-color="#df3554"/>
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
                                    <div class="form-group border-bottom" style="margin-bottom: .3rem;">
                                        <table>
                                            <tr>
                                                <td style="padding-right: 10px; vertical-align: middle;">
                                                    <input type="checkbox" @if(App\Models\UserRolePermission::where('user_id', $userId)->where('permission_id', $permissionRoute->id)->exists()) checked @endif data-size="small" id="per{{$permissionRoute->id}}" value="{{$permissionRoute->id}}" name="permission_id[]" data-toggle="switchery" data-color="#08da82" data-secondary-color="#df3554"/>
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
                            <button class="btn btn-primary m-2" type="submit"><i class="fas fa-save"></i>&nbsp; Assign Role Permission</button>
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
