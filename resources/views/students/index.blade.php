@extends('layouts.app')
@section('type','generalComponents')
@section('title','学生管理')

@section('style')
    <link rel="stylesheet"
          href="{{ url('/vendors/sweet-alert/css/sweet-alert.min.css')}}">
@endsection
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            学生管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">学生管理</a></li>
            <li><a href="{{ url('/students/create') }}">添加学生</a></li>
            <li class="am-active">学生列表</li>
        </ol>
        @include('layouts.errors')
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 学生列表
                </div>
            </div>
            <div class="">
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">学生名</th>
                                <th class="table-title">所在班级</th>
                                <th class="table-type">账号</th>
                                <th class="table-date am-hide-sm-only">修改日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($students->count()))
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>
                                            <a href="{{ url('/students/'.$student->id.'/edit') }}">{{$student->name}}</a>
                                        </td>
                                        <td>{{$student->class->first()->class??'暂无'}}</td>
                                        <td>{{$student->no}}</td>
                                        <td class="am-hide-sm-only">{{$student->updated_at}}</td>
                                        <td>
                                            <div class="am-btn-toolbar">
                                                <div class="am-btn-group am-btn-group-xs">
                                                    <a href="{{ url('/students/'.$student->id.'/edit') }}">
                                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                                    class="am-icon-pencil-square-o"></span> 编辑
                                                        </button>
                                                    </a>
                                                    <a href="javascript:;">
                                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del"
                                                                data-id="{{$student->id}}">
                                                            <span class="am-icon-trash-o"></span> 删除
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <center>
                                            暂无学生,请添加学生
                                        </center>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <hr>
                    </div>

                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('/vendors/sweet-alert/js/sweet-alert.min.js')}}"></script>
    <script>
        // 单选删除操作
        $('.del').click(function () {
            var url = ' students/' + $(this).data('id');
            $.ajax({
                url: url,
                data: {'_token': '{{ csrf_token() }}'},
                type: 'DELETE',
                success: function (data) {
                    if (data.StatusCode === 200) {
                        swal({
                            title: '删除成功！',
                            text: '同时该学生下的用户也失效',
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: '确认',
                            closeOnConfirm: false,
                        }, function (isConfirm) {
                            location.reload();
                        });
                    } else {
                        swal("操作失败!", data.ResultData, 'error');
                    }
                }
            });
        });
    </script>
@endsection


