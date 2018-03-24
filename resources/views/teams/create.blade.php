@extends('layouts.app')
@section('type','generalComponents')
@section('title','添加班级')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            班级管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">班级管理</a></li>
            <li><a href="{{url('/teams')}}">班级列表</a></li>
            <li class="am-active">添加班级</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 添加班级
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" action="{{url('teams')}}" method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">班级名</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name" required maxlength="64" value="{{old('name')}}"
                                           placeholder="班级名">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">级</label>
                                <div class="am-u-sm-9">
                                    <input type="number" name="stage" required maxlength="64" value="{{old('stage')}}"
                                           placeholder="eg:2013级">
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
