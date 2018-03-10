@extends('layouts.app')
@section('type','generalComponents')
@section('title','修改密码')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            个人密码
        </div>
        <ol class="am-breadcrumb">
            <li class="am-active">修改密码</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 修改密码
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form tpl-form-line-form" action="{{url('/change_pwd')}}" method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">旧密码 <span
                                            class="tpl-form-line-small-title">OldPwd</span></label>
                                <div class="am-u-sm-9">
                                    <input type="password" class="tpl-form-input" value="{{old('oldPwd')}}"
                                           name="oldPwd" required minlength="6">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">新密码 <span
                                            class="tpl-form-line-small-title">Password</span></label>
                                <div class="am-u-sm-9">
                                    <input type="password" class="tpl-form-input" value="{{old('password')}}"
                                           name="password" required minlength="6">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交
                                    </button>
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
