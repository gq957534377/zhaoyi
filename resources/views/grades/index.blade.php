@extends('layouts.app')
@section('type','generalComponents')
@section('title','成绩管理')

@section('style')
    <link rel="stylesheet"
          href="{{ url('/vendors/sweet-alert/css/sweet-alert.min.css')}}">
@endsection
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            成绩管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">成绩管理</a></li>
            <li><a href="{{ url('/grades/create') }}">添加成绩</a></li>
            <li class="am-active">成绩列表</li>
        </ol>
        @include('layouts.errors')
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 成绩列表
                </div>
            </div>

            <label for="">所带课程</label>
            <select name="" id="course_id" data-am-selected="{searchBox: 1}">
                <option value="">请选择课程</option>
                @foreach($courses as $course)
                    <option value="{{$course->id}}"
                            @if(!empty(request('course_id')) && request('course_id')==$course->id) selected @endif>{{$course->name}}</option>
                @endforeach
            </select>

            <label for="">所带班级</label>
            <select name="" id="team_id" data-am-selected="{searchBox: 1}">
                <option value="">请选择班级</option>
                @foreach($teams as $team)
                    <option value="{{$team->id}}"
                            @if(!empty(request('team_id')) && request('team_id')==$team->id) selected @endif>{{$team->class}}</option>
                @endforeach
            </select>

            <label for="">学期</label>
            <select name="semester" id="semester" data-am-selected="{searchBox: 1}">
                <option value="1" @if(!empty(request('semester')) && request('semester')==1) selected @endif>
                    大一第一学期
                </option>
                <option value="2" @if(!empty(request('semester')) && request('semester')==2) selected @endif>
                    大一第二学期
                </option>
                <option value="3" @if(!empty(request('semester')) && request('semester')==3) selected @endif>
                    大二第一学期
                </option>
                <option value="4" @if(!empty(request('semester')) && request('semester')==4) selected @endif>
                    大二第二学期
                </option>
                <option value="5" @if(!empty(request('semester')) && request('semester')==5) selected @endif>
                    大三第一学期
                </option>
                <option value="6" @if(!empty(request('semester')) && request('semester')==6) selected @endif>
                    大三第二学期
                </option>
                <option value="7" @if(!empty(request('semester')) && request('semester')==7) selected @endif>
                    大四第一学期
                </option>
                <option value="8" @if(!empty(request('semester')) && request('semester')==8) selected @endif>
                    大四第二学期
                </option>
            </select>

            <div class="">
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">班级</th>
                                <th class="table-title">学生名</th>
                                <th class="table-title">成绩</th>
                                <th class="table-date am-hide-sm-only">修改日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($StatusCode==200)
                                @foreach($ResultData as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->class->first()->class??'暂无'}}</td>
                                        <td>
                                            <a>{{$student->name}}</a>
                                        </td>
                                        <td>{{$student->grade??'暂无'}}</td>
                                        <td class="am-hide-sm-only">{{$student->updated_at}}</td>
                                        <td>
                                            <div class="am-btn-toolbar">
                                                <div class="am-btn-group am-btn-group-xs">
                                                    <a href="javascript:;" >
                                                        <button data-grade_id="{{$student->grade_id}}"
                                                                data-student_id="{{$student->id}}"
                                                                data-class_name="{{$student->class->first()->class??''}}"
                                                                data-student_name="{{$student->name}}"
                                                                class="edit am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                                    class="am-icon-pencil-square-o"></span> 编辑
                                                        </button>
                                                    </a>
                                                    @if(!empty($student->grade_id))
                                                        <a href="javascript:;">
                                                            <button data-grade_id="{{$student->grade_id}}"
                                                                    class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del">
                                                                <span class="am-icon-trash-o"></span> 删除
                                                            </button>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">
                                        <center>
                                            {{$ResultData}}
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
            <button class="hidden js_modal" data-toggle="modal" data-target="#myModal"></button>
            <!-- 模态框（Modal） -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 300px">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">编辑成绩</h4>
                        </div>
                        <input type="hidden" name="student_id" id="form-student_id">

                        <div class="modal-body">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-4 am-form-label" id="class_name"></label>
                                <label for="user-name" class="am-u-sm-4 am-form-label" id="student_name"></label>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">成绩</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="grade" required id="form-grade"
                                           placeholder="请输入成绩">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="submit" data-num="" data-day="" class="btn btn-primary js_sub_grade">提交更改
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/modal.js"></script>
    <script src="{{url('/vendors/sweet-alert/js/sweet-alert.min.js')}}"></script>
    <script>
        $('#team_id').change(function () {
            location.href = '/grades?team_id=' + $('#team_id').val() + '&semester=' + $('#semester').val() + '&course_id=' + $('#course_id').val();
        });
        $('#semester').change(function () {
            location.href = '/grades?semester=' + $('#semester').val() + '&team_id=' + $('#team_id').val() + '&course_id=' + $('#course_id').val();
        });
        $('#course_id').change(function () {
            location.href = '/grades?semester=' + $('#semester').val() + '&team_id=' + $('#team_id').val() + '&course_id=' + $('#course_id').val();
        });
        $('.edit').click(function () {
            $('.js_gqsb').data('num', $(this).data('num')).data('day', $(this).data('day'));
            $('#form-student_id').val($(this).data('student_id'));
            $('#class_name').html($(this).data('class_name'));
            $('#student_name').html($(this).data('student_name'));
            $('.js_modal').click();
        });
        // 单选删除操作
        $('.del').click(function () {
            var url = ' grades/' + $(this).data('grade_id');
            $.ajax({
                url: url,
                data: {'_token': '{{ csrf_token() }}'},
                type: 'DELETE',
                success: function (data) {
                    if (data.StatusCode === 200) {
                        swal({
                            title: '删除成功！',
                            text: '同时该成绩下的用户也失效',
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

        // 提交成绩
        $('.js_sub_grade').click(function () {
            var url = '/grades';
            if (!$('#form-grade').val()){
                alert('请输入成绩');
                return false;
            }
            $.ajax({
                url: url,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'student_id': $('#form-student_id').val(),
                    'grade': $('#form-grade').val(),
                    'course_id': $('#course_id').val(),
                    'team_id': $('#team_id').val(),
                    'semester': $('#semester').val(),
                },
                type: 'post',
                success: function (data) {
                    if (data.StatusCode === 200) {
                        swal({
                            title: '设置成功！',
                            text: '成绩更新成功',
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: '确认',
                            closeOnConfirm: false,
                        }, function (isConfirm) {
                            location.reload();
                        });
                    } else {
                        swal("添加失败!", data.ResultData, 'error');
                    }
                }
            });
        });
    </script>
@endsection


