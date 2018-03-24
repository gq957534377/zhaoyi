@extends('layouts.app')
@section('type','generalComponents')
@section('title','消息管理')

@section('style')
    <link rel="stylesheet"
          href="{{ url('/vendors/sweet-alert/css/sweet-alert.min.css')}}">
@endsection
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            消息管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="{{url('/')}}" class="am-icon-home">首页</a></li>
        </ol>
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 我的消息
                </div>
            </div>
            <div class="tpl-block">
                <div class="am-g">
                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">
                                <a href="{{url('/news/create')}}">
                                    <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <select id="type" data-am-selected="{btnSize: 'sm'}">
                                <option value="receive"
                                        @if(empty(request('type')) || request('type')=='receive') selected @endif>收件箱
                                </option>
                                <option value="send"
                                        @if(!empty(request('type')) && request('type')=='send') selected @endif>已发送
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <ul class="tpl-task-list">
                    @foreach($news as $new)
                        <li>
                            <div class="task-checkbox">
                                <input type="hidden" value="1" name="test">
                                <input type="hidden" class="liChild" value="2" name="test"></div>
                            <div class="task-title">
                                <span class="task-title-sp"> {{$new->content}} </span>
                                @if($new->status == 1)
                                    <span class="label label-sm label-success">未读</span>
                                    <span class="task-bell">
                                            <i class="am-icon-bell-o"></i>
                                        </span>
                                @else
                                    <span class="label label-sm label-default">已读</span>
                                @endif
                            </div>
                            <div class="task-config">
                                <div class="am-dropdown tpl-task-list-dropdown" data-am-dropdown="">
                                    <a href="###" class="am-dropdown-toggle tpl-task-list-hover "
                                       data-am-dropdown-toggle="">
                                        <i class="am-icon-cog"></i> <span class="am-icon-caret-down"></span>
                                    </a>
                                    <ul class="am-dropdown-content tpl-task-list-dropdown-ul">
                                        @if(empty($request->type)||$request->type=='receive')
                                            @if($new->status!=2)
                                                <li>
                                                    <a href="javascript:;" class="edit" data-id="{{$new->id}}">
                                                        <i class="am-icon-check"></i> 已读 </a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="javascript:;" class="del" data-id="{{$new->id}}">
                                                    <i class="am-icon-trash-o"></i> 删除 </a>
                                            </li>
                                        @endif
                                    </ul>


                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>


    </div>
@endsection
@section('script')
    <script src="{{url('/vendors/sweet-alert/js/sweet-alert.min.js')}}"></script>
    <script>

        $('#type').change(function () {
            location.href = '/news?type=' + $(this).val();
        });
        // 单选删除操作
        $('.del').click(function () {
            var url = ' news/' + $(this).data('id');
            $.ajax({
                url: url,
                data: {'_token': '{{ csrf_token() }}'},
                type: 'DELETE',
                success: function (data) {
                    if (data.StatusCode === 200) {
                        swal({
                            title: '删除成功！',
                            text: '删除成功',
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

        // 操作
        $('.edit').click(function () {
            var url = ' news/' + $(this).data('id') + '/edit';
            $.ajax({
                url: url,
                success: function (data) {
                    location.reload();
                }
            });
        });

    </script>
@endsection


