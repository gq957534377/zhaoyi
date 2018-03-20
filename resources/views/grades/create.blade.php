@extends('layouts.app')
@section('type','generalComponents')
@section('title','添加学生')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            学生管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">学生管理</a></li>
            <li><a href="{{url('/students')}}">学生列表</a></li>
            <li class="am-active">添加学生</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 添加学生
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" action="{{url('students')}}" method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">学生名</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name" required maxlength="64" value="{{old('name')}}"
                                           placeholder="学生名">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">所在班级</label>
                                <div class="am-u-sm-9">
                                    <select name="team_id" data-am-selected="{searchBox: 1}">
                                        @foreach($teams as $team)
                                            <option value="{{$team->id}}">{{$team->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">账号(学号)</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="no" required maxlength="64" value="{{old('no')}}"
                                           placeholder="请输入账号/学号">
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
