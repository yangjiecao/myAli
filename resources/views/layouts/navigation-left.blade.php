<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> 博文管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/article') }}">博文列表</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="#">
                <i class="fa fa-sitemap fa-fw"></i>
                说点什么
                <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li>
                <a href="https://adm.yingxiongshe.com/qa">说点什么</a>
                </li>
                </ul>
            </li>
            <li class="">
                <a href="#">
                <i class="fa fa-sitemap fa-fw"></i>
                简历管理
                <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li>
                <a href="{{ url('admin/resume') }}">基本信息</a>
                </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
