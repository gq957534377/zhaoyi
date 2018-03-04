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
            <i class="am-icon-wpforms"></i>
            <span>表单</span>
            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
        </a>
        <ul class="tpl-left-nav-sub-menu" style="display: block;">
            <li>
                <a href="form-amazeui.html">
                    <i class="am-icon-angle-right"></i>
                    <span>Amaze UI 表单</span>
                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                </a>

                <a href="form-line.html">
                    <i class="am-icon-angle-right"></i>
                    <span>线条表单</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="tpl-left-nav-item">
        <a href="login.html" class="nav-link tpl-left-nav-link-list">
            <i class="am-icon-key"></i>
            <span>登录</span>

        </a>
    </li>
</ul>
