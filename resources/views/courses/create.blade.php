@extends('layouts.app')
@section('type','generalComponents')
@section('title','添加课程')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            课程管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">课程管理</a></li>
            <li><a href="{{url('/courses')}}">课程列表</a></li>
            <li class="am-active">添加课程</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 添加课程
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" action="{{url('courses')}}" method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">课程名</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name" required maxlength="64" value="{{old('name')}}"
                                           placeholder="课程名">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">学分</label>
                                <div class="am-u-sm-9">
                                    <input type="number" name="credit" required value="{{old('credit')}}"
                                           placeholder="学分">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">人数</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="max_num" required maxlength="64" value="{{old('max_num')}}"
                                           placeholder="请输入做多容纳人数">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">代课教师</label>
                                <div class="am-u-sm-9">
                                    <select name="teacher_id" data-am-selected="{searchBox: 1}">
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">上课时间</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="time" required maxlength="64" value="{{old('time')}}"
                                           placeholder="请输入上课时间">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">上课地点</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="classroom" required maxlength="64"
                                           value="{{old('classroom')}}"
                                           placeholder="请输入上课地点">
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
