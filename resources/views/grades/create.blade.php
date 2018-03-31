@extends('layouts.app')
@section('type','generalComponents')
@section('title','倒入成绩')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            成绩管理
        </div>
        <ol class="am-breadcrumb">
            <li class="am-active">倒入成绩</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 倒入成绩
                </div>
            </div>
            @include('layouts.errors')
            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form tpl-form-line-form" id="form" action="{{url('/export_grades')}}"
                              enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">姓名所在列 <span
                                            class="tpl-form-line-small-title">Name_Num</span></label>
                                <div class="am-u-sm-9">
                                    <input type="number" required name="name_num" class="tpl-form-input">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">成绩所在列 <span
                                            class="tpl-form-line-small-title">Grade_Num</span></label>
                                <div class="am-u-sm-9">
                                    <input type="number" required name="grade_num" class="tpl-form-input">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">从第N行开始 <span
                                            class="tpl-form-line-small-title">Start_Num</span></label>
                                <div class="am-u-sm-9">
                                    <input type="number" required name="start_num" class="tpl-form-input">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">成绩表 <span
                                            class="tpl-form-line-small-title">excel</span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group ">
                                        <input name="file_excel" required type="file" multiple accept="">
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
        $('#form').on('submit', function () {
            var submitData = new FormData($(this)[0]);
            $.ajax({
                url: $('#form').attr('action'),
                type: 'post',
                data: submitData,
                cache: false,
                processData: false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
                contentType: false, // 不设置Content-type请求头
                success: function (res) {
                    console.log(res);
                },
                error: function () {
                    alert('请求异常，请稍后再试');
                }
            });
            return false;
        })
    </script>
@endsection
