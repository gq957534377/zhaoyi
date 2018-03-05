@extends('layouts.app')
@section('type','generalComponents')
@section('title','添加教务')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            教务管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">教务管理</a></li>
            <li><a href="{{url('/deans')}}">教务列表</a></li>
            <li class="am-active">添加教务</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 添加教务
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" action="{{url('deans')}}" method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">教务名</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name" required maxlength="64" value="{{old('name')}}"
                                           placeholder="教务名">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">账号</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="no" required maxlength="64" value="{{old('no')}}"
                                           placeholder="请输入账号">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">密码</label>
                                <div class="am-u-sm-9">
                                    <input type="password" name="password" required maxlength="64" value="{{old('password')}}"
                                           placeholder="请输入密码">
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
