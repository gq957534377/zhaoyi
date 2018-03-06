@extends('layouts.app')
@section('type','generalComponents')
@section('title','修改老师')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            老师管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">老师管理</a></li>
            <li><a href="{{url('/teachers')}}">老师列表</a></li>
            <li class="am-active">修改老师</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 修改老师
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" action="{{url('teachers/'.$teacher->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">老师名</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name" required maxlength="64" value="{{$teacher->name}}"
                                           placeholder="老师名">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">账号(工号)</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="no" required maxlength="64" value="{{$teacher->no}}"
                                           placeholder="请输入账号/工号">
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
