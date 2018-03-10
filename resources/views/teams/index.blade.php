@extends('layouts.app')
@section('type','generalComponents')
@section('title','班级管理')

@section('style')
    <link rel="stylesheet"
          href="{{ url('/vendors/sweet-alert/css/sweet-alert.min.css')}}">
@endsection
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            班级管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">班级管理</a></li>
            <li><a href="{{ url('/teams/create') }}">添加班级</a></li>
            <li class="am-active">班级列表</li>
        </ol>
        @include('layouts.errors')
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 班级列表
                </div>
            </div>
            <div class="">
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">班级</th>
                                <th class="table-type">学生数</th>
                                <th class="table-date am-hide-sm-only">修改日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($teams->count()))
                                @foreach($teams as $team)
                                    <tr>
                                        <td>{{$team->id}}</td>
                                        <td>
                                            <a href="{{ url('/teams/'.$team->id.'/edit') }}">{{$team->class}}</a>
                                        </td>
                                        <td>{{ $team->students->count() }}</td>
                                        <td class="am-hide-sm-only">{{$team->updated_at}}</td>
                                        <td>
                                            <div class="am-btn-toolbar">
                                                <div class="am-btn-group am-btn-group-xs">
                                                    <a href="{{ url('/teams/'.$team->id.'/edit') }}">
                                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                                    class="am-icon-pencil-square-o"></span> 编辑
                                                        </button>
                                                    </a>
                                                    <a href="javascript:;">
                                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del"
                                                                data-id="{{$team->id}}">
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
                                    <td colspan="5">
                                        <center>
                                            暂无班级,请添加班级
                                        </center>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <hr>
                        @if(!empty($teams->count()))
                            {{$teams->links()}}
                        @endif
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
            var url = ' teams/' + $(this).data('id');
            $.ajax({
                url: url,
                data: {'_token': '{{ csrf_token() }}'},
                type: 'DELETE',
                success: function (data) {
                    if (data.StatusCode === 200) {
                        swal({
                            title: '删除成功！',
                            text: '同时该班级下的用户也失效',
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


