@extends('layouts.app')
@section('type','generalComponents')
@section('title','修改资料')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            个人资料
        </div>
        <ol class="am-breadcrumb">
            <li class="am-active">修改资料</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 修改资料
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form tpl-form-line-form" action="{{url('/update_info/'.$user->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">姓名 <span
                                            class="tpl-form-line-small-title">Name</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="{{$user->name??''}}" disabled>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">账号 <span
                                            class="tpl-form-line-small-title">No</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" disabled class="tpl-form-input" id="no" value="{{$user->no??''}}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">手机 <span
                                            class="tpl-form-line-small-title">Tel</span></label>
                                <div class="am-u-sm-9">
                                    <input type="number" class="tpl-form-input" required name="tel" value="{{$user->tel??''}}"
                                           placeholder="请输入手机号">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">邮箱 <span
                                            class="tpl-form-line-small-title">Email</span></label>
                                <div class="am-u-sm-9">
                                    <input type="email" class="am-form-field tpl-form-no-bg" name="email" required value="{{$user->email??''}}" placeholder="请输入邮箱"/>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span
                                            class="tpl-form-line-small-title">HeadImg</span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <div class="tpl-form-file-img">
                                            <img src="assets/img/a5.png" alt="">
                                        </div>
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 选择照片
                                        </button>
                                        <input id="doc-form-file" type="file" multiple>
                                    </div>
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
