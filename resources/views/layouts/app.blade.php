<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',config('app.name', 'Laravel') )</title>
    <meta name="description" content="成绩管理系统">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <script src="/assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap/css/bootstrap.css">
    <!-----私有样式-------->
    @yield('style')
</head>

<body data-type="@yield('type','index')">


<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <a href="javascript:;" class="tpl-logo">
            <img src="/assets/img/logo.png" alt="">
        </a>
    </div>
    <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
                class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <?php
                $news = \App\Models\News::where([
                    'receive_id' => \Illuminate\Support\Facades\Auth::user()->id,
                    'status' => 1
                ])->get();
                ?>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="am-icon-comment-o"></span> 消息 <span
                            class="am-badge tpl-badge-danger am-round">{{$news->count()??''}}</span></span>
                </a>
                <ul class="am-dropdown-content tpl-dropdown-content">
                    <li class="tpl-dropdown-content-external">
                        <h3>你有 <span class="tpl-color-danger">{{$news->count()}}</span> 条新消息</h3><a
                                href="{{url('/news')}}">全部</a></li>
                    <li>
                        @foreach($news as $new)
                            <a href="{{url('/news')}}" class="tpl-dropdown-content-message">
                                <span class="tpl-dropdown-content-photo">
                      <img src="{{$new->send->head_img??''}}" alt=""> </span>
                                <span class="tpl-dropdown-content-subject">
                      <span class="tpl-dropdown-content-from"> {{$new->send->name}} </span>
                                <span class="tpl-dropdown-content-time">{{$new->updated_at}}</span>
                                </span>
                                <span class="tpl-dropdown-content-font">{{$new->content}}</span>
                            </a>
                        @endforeach
                    </li>

                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span
                            class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                        <span class="tpl-header-list-user-nick">{{ Auth::user()->name }} </span><span
                                class="tpl-header-list-user-ico"> <img src="{{ Auth::user()->head_img }} "></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="#"><span class="am-icon-bell-o"></span>
                                上次登录时间：{{session()->get('login_last_time')}}</a></li>
                        <li><a href="#"><span class="am-icon-bell-o"></span> 上次登录IP：{{session()->get('login_last_ip')}}
                            </a></li>
                        <li><a href="{{url('user_info')}}"><span class="am-icon-bell-o"></span> 资料</a></li>
                        <li><a href="{{url('change_pwd_view')}}"><span class="am-icon-cog"></span> 修改密码</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="am-icon-power-off"></span>退出
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
            <li><a href="###" class="tpl-header-list-link"><span
                            class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
        </ul>
    </div>
</header>

<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-title">
            导航
        </div>
        <div class="tpl-left-nav-list">
            @include('layouts.nav')
        </div>
    </div>
    @yield('content')
</div>
</body>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/amazeui.min.js"></script>
<script src="/assets/js/iscroll.js"></script>
<script src="/assets/js/app.js"></script>
<script>
    var gq_height = $(window).height();
    $('.tpl-content-wrapper').css('min-height', gq_height + 'px');
    $('.tpl-portlet-components').css('min-height', gq_height + 'px');
</script>
@yield('script')
</html>
