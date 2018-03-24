@extends('layouts.app')
@section('type','generalComponents')
@section('title','添加消息')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            消息管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">消息管理</a></li>
            <li><a href="{{url('/news')}}">消息列表</a></li>
            <li class="am-active">添加消息</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 添加消息
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" action="{{url('news')}}" method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">接收人</label>
                                <div class="am-u-sm-9">
                                    <select name="receive_id" data-am-selected="{searchBox: 1}">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->roles->first()->name_cn??''}}-{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">消息内容</label>
                                <div class="am-u-sm-9">
                                    <textarea name="content" required maxlength="128">
                                    {{old('content')}}
                                    </textarea>
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
