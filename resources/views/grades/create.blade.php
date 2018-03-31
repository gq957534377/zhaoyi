@extends('layouts.app')
@section('type','generalComponents')
@section('title','导入成绩')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            成绩管理
        </div>
        <ol class="am-breadcrumb">
            <li class="am-active">导入成绩</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 导入成绩
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
                                <label for="user-name" class="am-u-sm-3 am-form-label">学号所在列 <span
                                            class="tpl-form-line-small-title">No_Num</span></label>
                                <div class="am-u-sm-9">
                                    <input type="number" required name="no_num" class="tpl-form-input">
                                </div>
                            </div>

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

        <!-- 模态框（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 187px">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">成绩预览</h4>
                    </div>
                    <div class="modal-body" id="form-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" data-num="" data-day="" class="btn btn-primary js_dr">确认导入</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
    </div>
@endsection

@section('script')
    <script src="/modal.js"></script>
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
                    if (res.StatusCode === 200) {
                        var html = '<table class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">\n' +
                            '<thead>\n' +
                            '<tr role="row">\n' +
                            '<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"\n' +
                            'aria-sort="ascending" aria-label="Name: activate to sort column descending"\n' +
                            'style="width: 249px;">\n' +
                            '学号\n' +
                            '</th>\n' +
                            '<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"\n' +
                            'aria-label="Position: activate to sort column ascending" style="width: 396px;">\n' +
                            '姓名\n' +
                            '</th>\n' +
                            '<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"\n' +
                            'aria-label="Office: activate to sort column ascending" style="width: 189px;">\n' +
                            '成绩\n' +
                            '</th>\n' +
                            '</tr>\n' +
                            '</thead>\n' +
                            '<tbody>';

                        html += res.ResultData.map(function (item) {
                            return '<tr role="row" class="odd">\n' +
                                '<td class="sorting_1">' + item.no + '</td>\n' +
                                '<td>' + item.name + '</td>\n' +
                                '<td>' + item.grade + '</td>\n' +
                                '</tr>';
                        });
                        html += '</tbody></table>';
                        $('#form-body').html(html);
                        $('#myModal').modal('show');

                        $('.js_dr').click(function () {
                            $.ajax({
                                url: '/store_many_grades',
                                type: 'post',
                                data: {
                                    data:res.ResultData,
                                    semester:'{{request('semester')}}',
                                    course_id:'{{request('course_id')}}',
                                },
                                success: function (res) {
                                    alert(res.ResultData);
                                    if (res.StatusCode === 200) {
                                        location.reload();
                                    }
                                },
                                error: function () {
                                    alert('导入失败');
                                }
                            });
                        });
                    } else {
                        alert(res.ResultData);
                    }
                },
                error: function () {
                    alert('请求异常，请稍后再试');
                }
            });
            return false;
        })
    </script>
@endsection
