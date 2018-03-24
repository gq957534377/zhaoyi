@extends('layouts.app')
@section('title', '我的成绩')
@section('type','generalComponents')

@section('style')
    <link rel="stylesheet"
          href="{{ url('/vendors/sweet-alert/css/sweet-alert.min.css')}}">
@endsection
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            我的成绩
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">我的成绩</a></li>
        </ol>
        @include('layouts.errors')
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 成绩列表
                </div>
                <div class="tpl-portlet-input tpl-fz-ml">
                    <div class="portlet-input input-small input-inline">
                        <div class="input-icon right">
                            <i class="am-icon-search"></i>
                            <input type="text" class="form-control form-control-solid" placeholder="搜索..."></div>
                    </div>
                </div>
            </div>

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
                                <th class="table-title">课程</th>
                                <th class="table-type">成绩</th>
                                <th class="table-type">学分</th>
                                <th class="table-date am-hide-sm-only">修改日期</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($grades->count()))
                                @foreach($grades as $grade)
                                    <tr>
                                        <td>{{$grade->id}}</td>
                                        <td>{{$grade->course->name??''}}</td>
                                        <td>{{$grade->grade}}</td>
                                        <td>{{ $grade->course->credit??'' }}</td>
                                        <td class="am-hide-sm-only">{{$grade->updated_at}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">
                                        <center>
                                            本学期暂无成绩
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
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('/vendors/sweet-alert/js/sweet-alert.min.js')}}"></script>
    <script>
        $('#semester').change(function () {
            location.href = '/grades/my_grade?semester=' + $('#semester').val();
        });
    </script>
@endsection



























