@extends('layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            欢迎使用成绩管理系统
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li><a href="#">分类</a></li>
            <li class="am-active">内容</li>
        </ol>
        <div class="tpl-content-scope">
            <div class="note note-info">
                <h3>该平台具有以下特点：
                    <span class="close" data-close="note"></span>
                </h3>
                <p>
                    1）微信查询成绩和课表</p>
                <p> 2）微信接收消息通知</p>
                <p> 3）平时成绩，期末成绩的一键导入。</p>
                <p> 4）成绩按照比例自动计算，自动统计学生成绩比例、历年成绩走势图等众多统计。</p>
                <p> 5）可以完成高并发抢课。</p>
                <p> 6）在线课表、教师、课程、学生、成绩管理。
                </p>
            </div>
        </div>
    </div>
@endsection
