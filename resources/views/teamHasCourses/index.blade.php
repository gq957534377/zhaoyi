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
                <div class="am-g">
                    {{-- 上午 第一节课 --}}
                    <div class="tpl-table-images">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                            <center><h3>周一</h3></center>
                            <div class="tpl-table-images-content" style="margin-bottom:0 !important;">
                                <div class="tpl-table-images-content-i-time">上午  第一节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                            data-day="1"
                                            data-num="1"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                            data-day="1"
                                            data-num="1"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-table-images-content-i-time">上午  第一节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                            data-day="2"
                                            data-num="1"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                            data-day="2"
                                            data-num="1"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-table-images-content-i-time">上午  第一节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                            data-day="3"
                                            data-num="1"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                            data-day="3"
                                            data-num="1"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-table-images-content-i-time">上午  第一节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                            data-day="4"
                                            data-num="1"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                            data-day="4"
                                            data-num="1"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-table-images-content-i-time">上午  第一节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                            data-day="5"
                                            data-num="1"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                            data-day="5"
                                            data-num="1"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-table-images-content-i-time">上午  第一节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                            data-day="6"
                                            data-num="1"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                            data-day="6"
                                            data-num="1"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-table-images-content-i-time">上午  第一节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                            data-day="7"
                                            data-num="1"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                            data-day="7"
                                            data-num="1"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-table-images-content-i-time">上午  第二节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="1"
                                                    data-num="2"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="1"
                                                    data-num="2"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tpl-table-images">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                            <div class="tpl-table-images-content">
                                <div class="tpl-table-images-content-i-time">上午  第二节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="2"
                                                    data-num="2"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="2"
                                                    data-num="2"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tpl-table-images">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                            <div class="tpl-table-images-content">
                                <div class="tpl-table-images-content-i-time">上午  第二节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="3"
                                                    data-num="2"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="3"
                                                    data-num="2"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tpl-table-images">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                            <div class="tpl-table-images-content">
                                <div class="tpl-table-images-content-i-time">上午  第二节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="4"
                                                    data-num="2"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="4"
                                                    data-num="2"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tpl-table-images">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                            <div class="tpl-table-images-content">
                                <div class="tpl-table-images-content-i-time">上午  第二节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="5"
                                                    data-num="2"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="5"
                                                    data-num="2"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tpl-table-images">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                            <div class="tpl-table-images-content">
                                <div class="tpl-table-images-content-i-time">上午  第二节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="6"
                                                    data-num="2"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="6"
                                                    data-num="2"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tpl-table-images">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-2 zxz">
                            <div class="tpl-table-images-content">
                                <div class="tpl-table-images-content-i-time">上午  第二节</div>
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="7"
                                                    data-num="2"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="7"
                                                    data-num="2"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="1"
                                                    data-num="3"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="1"
                                                    data-num="3"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="2"
                                                    data-num="3"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="2"
                                                    data-num="3"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="3"
                                                    data-num="3"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="3"
                                                    data-num="3"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="4"
                                                    data-num="3"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="4"
                                                    data-num="3"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="5"
                                                    data-num="3"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="5"
                                                    data-num="3"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="6"
                                                    data-num="3"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="6"
                                                    data-num="3"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="7"
                                                    data-num="3"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="7"
                                                    data-num="3"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="1"
                                                    data-num="4"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="1"
                                                    data-num="4"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="2"
                                                    data-num="4"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="2"
                                                    data-num="4"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="3"
                                                    data-num="4"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="3"
                                                    data-num="4"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="4"
                                                    data-num="4"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="4"
                                                    data-num="4"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="5"
                                                    data-num="4"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="5"
                                                    data-num="4"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="6"
                                                    data-num="4"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="6"
                                                    data-num="4"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="7"
                                                    data-num="4"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="7"
                                                    data-num="4"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="1"
                                                    data-num="5"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="1"
                                                    data-num="5"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="2"
                                                    data-num="5"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="2"
                                                    data-num="5"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="3"
                                                    data-num="5"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="3"
                                                    data-num="5"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="4"
                                                    data-num="5"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="4"
                                                    data-num="5"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="5"
                                                    data-num="5"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="5"
                                                    data-num="5"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="6"
                                                    data-num="5"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="6"
                                                    data-num="5"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
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
                                <div class="tpl-i-title">
                                    C语言～郭庆
                                </div>
                                <div class="tpl-table-images-content-block">
                                    <div class="tpl-i-more">
                                        主角楼321
                                    </div>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-secondary"
                                                    data-day="7"
                                                    data-num="5"><span
                                                        class="am-icon-edit"></span> 编辑
                                            </button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"
                                                    data-day="7"
                                                    data-num="5"><span
                                                        class="am-icon-trash-o"></span> 删除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            var url = ' team_has_courses/' + $(this).data('id');
            $.ajax({
                url: url,
                data: {'_token': '{{ csrf_token() }}'},
                type: 'DELETE',
                success: function (data) {
                    if (data.StatusCode === 200) {
                        swal({
                            title: '删除成功！',
                            text: '同时该课程表下的用户也失效',
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


