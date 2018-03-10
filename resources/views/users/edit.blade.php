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
                        <form class="am-form tpl-form-line-form" action="{{url('/update_info/'.$user->id)}}"
                              method="post">
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
                                    <input type="text" disabled class="tpl-form-input" id="no"
                                           value="{{$user->no??''}}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">手机 <span
                                            class="tpl-form-line-small-title">Tel</span></label>
                                <div class="am-u-sm-9">
                                    <input type="number" class="tpl-form-input" required name="tel"
                                           value="{{$user->tel??''}}"
                                           placeholder="请输入手机号">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">邮箱 <span
                                            class="tpl-form-line-small-title">Email</span></label>
                                <div class="am-u-sm-9">
                                    <input type="email" class="am-form-field tpl-form-no-bg" name="email" required
                                           value="{{$user->email??''}}" placeholder="请输入邮箱"/>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span
                                            class="tpl-form-line-small-title">HeadImg</span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <div class="tpl-form-file-img">
                                            <img class="js_headImg" src="{{url($user->head_img??'assets/img/a5.png')}}"
                                                 alt="">
                                        </div>
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 选择照片
                                        </button>
                                        <input id="doc-form-file" type="file" multiple
                                               accept="image/gif, image/jpeg, image/png">
                                        <input type="hidden" multiple name="head_img">
                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success">提交
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <input type="hidden" class="js_storeToken">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajax({
            url: '/get_qiniu_token',
            success: function (e) {
                $('.js_storeToken').val(e.uptoken);
            }
        });
        $('#doc-form-file').change(function () {
            var formData = new FormData();
            formData.append('file', $(this)[0].files[0]);
            formData.append('token', $('.js_storeToken').val());

            $.ajax({
                url: 'http://upload.qiniup.com/',
                data: formData,
                type: 'post',
                processData: false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
                contentType: false, // 不设置Content-type请求头
                success: function (e) {
                    $('input[name="head_img"]').val('//ol0fkmsij.bkt.clouddn.com/' + e.key);
                    $('img.js_headImg').attr('src', '//ol0fkmsij.bkt.clouddn.com/' + e.key);
                }
            })
        })
    </script>
@endsection
