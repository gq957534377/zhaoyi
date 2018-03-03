@extends ('agent.layouts.master')

@section ('title','添加角色')
@section ('style')
    <link rel="stylesheet" href="{{res(config('setting.admin_source').'/css/admin_permission_create.css')}}">
@endsection
@section('content')
    <form class="form-horizontal form-label-left" action="{{ url('roles/'.$role->id) }}" method="post">

        <div class="col-md-6 col-xs-12">

            <div class="x_panel">
                @include('public.errors')
                <div class="x_content">
                    <br/>
                    {{method_field('put')}}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">角色中文名称</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="role_cn" value="{{$role->name_cn}}" required
                                   placeholder="请输入角色中文名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">角色英文名称</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="role_en" value="{{$role->name_en}}" required
                                   placeholder="请输入角色英文名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">关联的权限</label>
                        <!--权限框-->
                        <div class="col-md-9 col-sm-9 col-xs-12 permission-box">
                            <!--一级权限框-->
                            @foreach($permissions as $firstId => $firstGroup)
                                <div class="first-group">
                                    <div class="first-title"><input type="checkbox" class="first-group-checkbox"><span>{{$firstGroup['group_name']}}</span></div>
                                @if(!empty($firstGroup['seconds']))

                                    <!--二级权限组-->
                                        @foreach($firstGroup['seconds'] as $seconds)
                                            <div class="second-group">
                                                <div class="third-title"><input type="checkbox" class="second-group-checkbox">{{$seconds['group_name']}}</div>
                                                <div class="third-group">
                                                    <!--三级权限-->
                                                    @foreach($seconds['permissions'] as $secondPermission)
                                                        <div class="third-permission-box">
                                                            <input type="checkbox" class="permission-item" @if(in_array($secondPermission->name,$rolePermissions)) checked @endif value="{{$secondPermission->name}}" name="permission[]"><span>{{$secondPermission->label}}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                                <!--二级权限-->
                                    @foreach($firstGroup['permissions'] as $firstPermission)
                                        <div class="second-group">
                                            <div class="third-permission-box">
                                                <input type="checkbox" class="permission-item"  @if(in_array($firstPermission->name,$rolePermissions)) checked @endif value="{{$firstPermission->name}}" name="permission[]"><span>{{$firstPermission->label}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="reset" class="btn btn-primary">重置</button>
                            <button type="submit" class="btn btn-success">提交</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

@section ('script')
    <script src="{{res(config('setting.admin_source').'/js/admin_permission_create.js')}}"></script>
@endsection
