@extends('layouts.app')
@section('type','generalComponents')
@section('title','课程表管理')

@section('style')
    <link rel="stylesheet"
          href="{{ url('/vendors/sweet-alert/css/sweet-alert.min.css')}}">
    <style>
        @media screen and (min-width: 997px) {
            .am-u-lg-2.zxz {
                width: 14.2857143%;
            }
        }

        .tpl-edit-content-btn button {
            width: 50% !important;
        }
    </style>
@endsection
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            课程表管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">课程表管理</a></li>
            <li><a href="{{ url('/team_has_courses/create') }}">添加课程表</a></li>
            <li class="am-active">课程表列表</li>
        </ol>
        @include('layouts.errors')
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 课程表列表
                </div>
            </div>
            <div class="">
                <label for="">班级</label>
                <select name="teacher_id" id="team_id" data-am-selected="{searchBox: 1}">
                    <option value="">请选择班级</option>
                    @foreach($teams as $team)
                        <option value="{{$team->id}}"
                                @if(!empty(request('team_id')) && request('team_id')==$team->id) selected @endif>{{$team->class}}</option>
                    @endforeach
                </select>
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

                <button type="button"
                        class="download am-btn am-btn-default am-btn-secondary">
                    <span class="am-icon-save"></span> 下载
                </button>
                @if(!empty(request('team_id')))
                    <div class="am-g">
                        {{-- 上午 第一节课 --}}
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <center><h3>周一</h3></center>
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">上午 第一节</div>
                                    @if(empty($one_one=$teamHasCourses->where('day',1)->where('num',1)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$one_one->course->name??''}}<br>
                                        {{$one_one->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($one_one))
                                                {{$one_one->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="1"
                                                        data-num="1"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($one_one))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$one_one->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <center><h3>周二</h3></center>
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">上午 第一节</div>
                                    @if(empty($two_one=$teamHasCourses->where('day',2)->where('num',1)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$two_one->course->name??''}}<br>
                                        {{$two_one->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($two_one))
                                                {{$two_one->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="2"
                                                        data-num="1"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($two_one))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$two_one->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <center><h3>周三</h3></center>
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">上午 第一节</div>
                                    @if(empty($three_one=$teamHasCourses->where('day',3)->where('num',1)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$three_one->course->name??''}}<br>
                                        {{$three_one->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($three_one))
                                                {{$three_one->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="3"
                                                        data-num="1"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($three_one))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$three_one->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <center><h3>周四</h3></center>
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">上午 第一节</div>
                                    @if(empty($four_one=$teamHasCourses->where('day',4)->where('num',1)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$four_one->course->name??''}}<br>
                                        {{$four_one->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($four_one))
                                                {{$four_one->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="4"
                                                        data-num="1"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($four_one))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$four_one->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <center><h3>周五</h3></center>
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">上午 第一节</div>
                                    @if(empty($five_one=$teamHasCourses->where('day',5)->where('num',1)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$five_one->course->name??''}}<br>
                                        {{$five_one->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($five_one))
                                                {{$five_one->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="5"
                                                        data-num="1"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($five_one))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$five_one->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <center><h3>周六</h3></center>
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">上午 第一节</div>
                                    @if(empty($six_one=$teamHasCourses->where('day',6)->where('num',1)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$six_one->course->name??''}}<br>
                                        {{$six_one->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($six_one))
                                                {{$six_one->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="6"
                                                        data-num="1"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($six_one))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$six_one->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <center><h3>周日</h3></center>
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">上午 第一节</div>
                                    @if(empty($sun_one=$teamHasCourses->where('day',7)->where('num',1)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$sun_one->course->name??''}}<br>
                                        {{$sun_one->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($sun_one))
                                                {{$sun_one->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="7"
                                                        data-num="1"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($sun_one))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$sun_one->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 上午 第二节课 --}}
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">上午 第二节</div>
                                    @if(empty($one_two=$teamHasCourses->where('day',1)->where('num',2)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$one_two->course->name??''}}<br>
                                        {{$one_two->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($one_two))
                                                {{$one_two->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="1"
                                                        data-num="2"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($one_two))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$one_two->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">上午 第二节</div>
                                    @if(empty($two_two=$teamHasCourses->where('day',2)->where('num',2)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$two_two->course->name??''}}<br>
                                        {{$two_two->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($two_two))
                                                {{$two_two->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="2"
                                                        data-num="2"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($two_two))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$two_two->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">上午 第二节</div>
                                    @if(empty($three_two=$teamHasCourses->where('day',3)->where('num',2)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$three_two->course->name??''}}<br>
                                        {{$three_two->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($three_two))
                                                {{$three_two->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="3"
                                                        data-num="2"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($three_two))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$three_two->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">上午 第二节</div>
                                    @if(empty($four_two=$teamHasCourses->where('day',4)->where('num',2)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$four_two->course->name??''}}<br>
                                        {{$four_two->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($four_two))
                                                {{$four_two->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="4"
                                                        data-num="2"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($four_two))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$four_two->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">上午 第二节</div>
                                    @if(empty($five_two=$teamHasCourses->where('day',5)->where('num',2)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$five_two->course->name??''}}<br>
                                        {{$five_two->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($five_two))
                                                {{$five_two->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="5"
                                                        data-num="2"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($five_two))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$five_two->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">上午 第二节</div>
                                    @if(empty($six_two=$teamHasCourses->where('day',6)->where('num',2)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$six_two->course->name??''}}<br>
                                        {{$six_two->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($six_two))
                                                {{$six_two->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="6"
                                                        data-num="2"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($six_two))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$six_two->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">上午 第二节</div>
                                    @if(empty($sun_two=$teamHasCourses->where('day',7)->where('num',2)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$sun_two->course->name??''}}<br>
                                        {{$sun_two->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($sun_two))
                                                {{$sun_two->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="7"
                                                        data-num="2"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($sun_two))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$sun_two->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 下午 第一节课 --}}
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">下午 第一节</div>
                                    @if(empty($one_three=$teamHasCourses->where('day',1)->where('num',3)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$one_three->course->name??''}}<br>
                                        {{$one_three->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($one_three))
                                                {{$one_three->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="1"
                                                        data-num="3"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($one_three))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$one_three->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">下午 第一节</div>
                                    @if(empty($two_three=$teamHasCourses->where('day',2)->where('num',3)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$two_three->course->name??''}}<br>
                                        {{$two_three->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($two_three))
                                                {{$two_three->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="2"
                                                        data-num="3"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($two_three))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$two_three->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">下午 第一节</div>
                                    @if(empty($three_three=$teamHasCourses->where('day',3)->where('num',3)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$three_three->course->name??''}}<br>
                                        {{$three_three->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($three_three))
                                                {{$three_three->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="3"
                                                        data-num="3"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($three_three))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$three_three->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">下午 第一节</div>
                                    @if(empty($four_three=$teamHasCourses->where('day',4)->where('num',3)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$four_three->course->name??''}}<br>
                                        {{$four_three->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($four_three))
                                                {{$four_three->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="4"
                                                        data-num="3"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($four_three))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$four_three->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">下午 第一节</div>
                                    @if(empty($five_three=$teamHasCourses->where('day',5)->where('num',3)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$five_three->course->name??''}}<br>
                                        {{$five_three->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($five_three))
                                                {{$five_three->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="5"
                                                        data-num="3"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($five_three))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$five_three->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">下午 第一节</div>
                                    @if(empty($six_three=$teamHasCourses->where('day',6)->where('num',3)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$six_three->course->name??''}}<br>
                                        {{$six_three->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($six_three))
                                                {{$six_three->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="6"
                                                        data-num="3"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($six_three))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$six_three->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                    <div class="tpl-table-images-content-i-time">下午 第一节</div>
                                    @if(empty($sun_three=$teamHasCourses->where('day',7)->where('num',3)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$sun_three->course->name??''}}<br>
                                        {{$sun_three->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($sun_three))
                                                {{$sun_three->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="7"
                                                        data-num="3"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($sun_three))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$sun_three->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 下午 第二节课 --}}
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">下午 第二节</div>
                                    @if(empty($one_four=$teamHasCourses->where('day',1)->where('num',4)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$one_four->course->name??''}}<br>
                                        {{$one_four->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($one_four))
                                                {{$one_four->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="1"
                                                        data-num="4"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($one_four))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$one_four->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">下午 第二节</div>
                                    @if(empty($two_four=$teamHasCourses->where('day',2)->where('num',4)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$two_four->course->name??''}}<br>
                                        {{$two_four->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($two_four))
                                                {{$two_four->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="2"
                                                        data-num="4"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($two_four))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$two_four->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">下午 第二节</div>
                                    @if(empty($three_four=$teamHasCourses->where('day',3)->where('num',4)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$three_four->course->name??''}}<br>
                                        {{$three_four->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($three_four))
                                                {{$three_four->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="3"
                                                        data-num="4"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($three_four))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$three_four->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">下午 第二节</div>
                                    @if(empty($four_four=$teamHasCourses->where('day',4)->where('num',4)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$four_four->course->name??''}}<br>
                                        {{$four_four->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($four_four))
                                                {{$four_four->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="4"
                                                        data-num="4"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($four_four))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$four_four->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">下午 第二节</div>
                                    @if(empty($five_four=$teamHasCourses->where('day',5)->where('num',4)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$five_four->course->name??''}}<br>
                                        {{$five_four->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($five_four))
                                                {{$five_four->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="5"
                                                        data-num="4"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($five_four))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$five_four->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">下午 第二节</div>
                                    @if(empty($six_four=$teamHasCourses->where('day',6)->where('num',4)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$six_four->course->name??''}}<br>
                                        {{$six_four->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($six_four))
                                                {{$six_four->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="6"
                                                        data-num="4"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($six_four))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$six_four->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">下午 第二节</div>
                                    @if(empty($sun_four=$teamHasCourses->where('day',7)->where('num',4)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$sun_four->course->name??''}}<br>
                                        {{$sun_four->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($sun_four))
                                                {{$sun_four->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="7"
                                                        data-num="4"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($sun_four))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$sun_four->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 晚上 第一节课 --}}
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">晚上 第一节</div>
                                    @if(empty($one_five=$teamHasCourses->where('day',1)->where('num',5)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$one_five->course->name??''}}<br>
                                        {{$one_five->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($one_five))
                                                {{$one_five->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="1"
                                                        data-num="5"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($one_five))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$one_five->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">晚上 第一节</div>
                                    @if(empty($two_five=$teamHasCourses->where('day',2)->where('num',5)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$two_five->course->name??''}}<br>
                                        {{$two_five->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($two_five))
                                                {{$two_five->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="2"
                                                        data-num="5"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($two_five))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$two_five->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">晚上 第一节</div>
                                    @if(empty($three_five=$teamHasCourses->where('day',3)->where('num',5)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$three_five->course->name??''}}<br>
                                        {{$three_five->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($three_five))
                                                {{$three_five->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="3"
                                                        data-num="5"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($three_five))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$three_five->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">晚上 第一节</div>
                                    @if(empty($four_five=$teamHasCourses->where('day',4)->where('num',5)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$four_five->course->name??''}}<br>
                                        {{$four_five->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($four_five))
                                                {{$four_five->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="4"
                                                        data-num="5"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($four_five))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$four_five->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">晚上 第一节</div>
                                    @if(empty($five_five=$teamHasCourses->where('day',5)->where('num',5)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$five_five->course->name??''}}<br>
                                        {{$five_five->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($five_five))
                                                {{$five_five->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="5"
                                                        data-num="5"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($five_five))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$five_five->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">晚上 第一节</div>
                                    @if(empty($six_five=$teamHasCourses->where('day',6)->where('num',5)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$six_five->course->name??''}}<br>
                                        {{$six_five->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($six_five))
                                                {{$six_five->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="6"
                                                        data-num="5"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($six_five))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$six_five->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">晚上 第一节</div>
                                    @if(empty($sun_five=$teamHasCourses->where('day',7)->where('num',5)->first()))
                                        <div class="tpl-i-title" style="margin-bottom: 30px">
                                            <center>无</center>
                                        </div>
                                    @else
                                        {{$sun_five->course->name??''}}<br>
                                        {{$sun_five->course->teacher->name??''}}
                                    @endif
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-more">
                                            @if(!empty($sun_five))
                                                {{$sun_five->course->classroom??''}}
                                            @endif
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <button type="button"
                                                        class="edit am-btn am-btn-default am-btn-secondary"
                                                        data-day="7"
                                                        data-num="5"><span
                                                            class="am-icon-edit"></span> 编辑
                                                </button>
                                                @if(!empty($sun_five))
                                                    <button type="button"
                                                            class="del am-btn am-btn-default am-btn-danger"
                                                            data-id="{{$sun_five->id}}"><span
                                                                class="am-icon-trash-o"></span> 删除
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="am-g" style="min-height: 1024px">
                        <center>请选择所要设置班级</center>
                    </div>
                @endif
            </div>
            <div class="tpl-alert"></div>
        </div>
    </div>
    <button class="hidden js_modal" data-toggle="modal" data-target="#myModal"></button>
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 300px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">修改</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">选择课程</label>
                        <select class="form-control" id="course_id">
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->name.'--'.$course->teacher->name??''}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" data-num="" data-day="" class="btn btn-primary js_gqsb">提交更改</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
@endsection
@section('script')
    <script src="/modal.js"></script>
    <script src="{{url('/vendors/sweet-alert/js/sweet-alert.min.js')}}"></script>
    <script>
        $('#team_id').change(function () {
            location.href = '/team_has_courses?team_id=' + $(this).val() + '&semester=' + $('#semester').val();
        });
        $('#semester').change(function () {
            location.href = '/team_has_courses?semester=' + $(this).val() + '&team_id=' + $('#team_id').val();
        });
        $('.edit').click(function () {
            $('.js_gqsb').data('num', $(this).data('num')).data('day', $(this).data('day'));
            $('.js_modal').click();
        });
        $('.js_gqsb').click(function () {
            var url = ' team_has_courses';
            $.ajax({
                url: url,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'day': $(this).data('day'),
                    'num': $(this).data('num'),
                    'course_id': $('#course_id').val(),
                    'team_id': $('#team_id').val(),
                    'semester': $('#semester').val(),
                },
                type: 'post',
                success: function (data) {
                    if (data.StatusCode === 200) {
                        swal({
                            title: '设置成功！',
                            text: '课表更新成功',
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
        // 单选删除操作
        $('.del').click(function () {
            var url = ' team_has_courses/' + $(this).data('id');
            $.ajax({
                url: url,
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                type: 'DELETE',
                success: function (data) {
                    if (data.StatusCode === 200) {
                        swal({
                            title: '删除成功！',
                            text: '删除课程成功',
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


