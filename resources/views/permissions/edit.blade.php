@extends('layouts.app')
@section('type','generalComponents')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            权限管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="{{url('/')}}" class="am-icon-home">首页</a></li>
            <li><a href="{{url('/permissions')}}">权限列表</a></li>
            <li class="am-active">添加权限</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 添加权限
                </div>
            </div>
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" action="{{url('permissions')}}" method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">权限中文名</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name_cn" required maxlength="64" value="{{old('name_cn')}}"
                                           placeholder="权限中文名">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">权限英文名</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name" required maxlength="64" value="{{old('name')}}"
                                           placeholder="权限英文名">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button class="am-btn am-btn-primary">添加</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
