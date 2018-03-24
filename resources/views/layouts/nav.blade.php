<ul class="tpl-left-nav-menu">
    <li class="tpl-left-nav-item">
        <a href="{{url('/home')}}" class="nav-link @if(request()->path()=='home') active @endif">
            <i class="am-icon-home"></i>
            <span>首页</span>
        </a>
    </li>
    <li class="tpl-left-nav-item">
        <a href="{{url('/log-viewer/logs')}}" class="nav-link @if(request()->path()=='log-viewer/logs') active @endif">
            <i class="am-icon-home"></i>
            <span>日志管理</span>
        </a>
    </li>
    <li class="tpl-left-nav-item">
        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-table"></i>
            <span>角色管理</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu">
            <li>
                <a href="{{url('/roles')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>角色列表</span>
                </a>

                <a href="{{url('/roles/create')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>添加角色</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-table"></i>
            <span>权限管理</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu">
            <li>
                <a href="{{url('/permissions')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>权限列表</span>
                </a>

                <a href="{{url('/permissions/create')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>添加权限</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-table"></i>
            <span>教务管理</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu">
            <li>
                <a href="{{url('/deans')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>教务列表</span>
                </a>

                <a href="{{url('/deans/create')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>添加教务</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-table"></i>
            <span>学生管理</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu">
            <li>
                <a href="{{url('/students')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>学生列表</span>
                </a>

                <a href="{{url('/students/create')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>添加学生</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-table"></i>
            <span>老师管理</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu">
            <li>
                <a href="{{url('/teachers')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>老师列表</span>
                </a>

                <a href="{{url('/teachers/create')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>添加老师</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-table"></i>
            <span>课程管理</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu">
            <li>
                <a href="{{url('/courses')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>课程列表</span>
                </a>

                <a href="{{url('/courses/create')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>添加课程</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-table"></i>
            <span>班级管理</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu">
            <li>
                <a href="{{url('/teams')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>班级列表</span>
                </a>

                <a href="{{url('/teams/create')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>添加班级</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-table"></i>
            <span>成绩管理</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu">
            <li>
                <a href="{{url('/grades')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>成绩录入</span>
                </a>

                <a href="{{url('/grades/1')}}">
                    <i class="am-icon-angle-right"></i>
                    <span>我的成绩</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="{{url('/team_has_courses')}}" class="nav-link @if(request()->path()=='team_has_courses') active @endif">
            <i class="am-icon-home"></i>
            <span>班级课程管理</span>
        </a>
    </li>
    <li class="tpl-left-nav-item">
        <a href="{{url('/team_has_courses/my_course')}}" class="nav-link @if(request()->path()=='team_has_courses') active @endif">
            <i class="am-icon-home"></i>
            <span>我的课表</span>
        </a>
    </li>
    <li class="tpl-left-nav-item">
        <a href="{{url('/team_has_courses/my_team')}}" class="nav-link @if(request()->path()=='team_has_courses') active @endif">
            <i class="am-icon-home"></i>
            <span>我的课程</span>
        </a>
    </li>
</ul>
