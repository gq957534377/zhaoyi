@extends('layouts.app')
@section('type','generalComponents')
@section('title','修改班级'.$team->name)
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            班级管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">班级管理</a></li>
            <li><a href="{{url('/teams')}}">班级列表</a></li>
            <li class="am-active">修改班级</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 修改班级
                </div>
            </div>
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" action="{{url('teams/'.$team->id)}}"
                              method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">班级名</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name" required maxlength="64"
                                           value="{{$team->class}}"
                                           placeholder="班级名">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">级</label>
                                <div class="am-u-sm-9">
                                    <input type="number" name="stage" required
                                           value="{{$team->stage}}"
                                           placeholder="2013级别">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button class="am-btn am-btn-primary">修改</button>
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
