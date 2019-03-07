<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="{{( Request::path() === 'admin/index' || Request::path() === 'admin' )? 'active' : '' }}" href="">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="{{( Request::path() === 'admin/calendar' )? 'active' : '' }}" href="{{ route('calendar.index') }}">
                        <i class="fa fa-calendar"></i>
                        <span>Quản Lý Lịch</span>
                    </a>
                </li>
                <li>
                    <a class="{{( Request::path() === 'users' )? 'active' : '' }}" href="{{route('users.list')}}">
                        <i class="fa fa-user"></i>
                        <span>Quản lý người dùng</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('bloods.list')}}">
                        <i class="fa fa-bullhorn"></i>
                        <span>Quản lý nhóm máu</span>
                    </a>
                </li>
                <li>
                    <a class="{{( Request::path() === 'admin/request-bloods' ) ? 'active' : '' }}" href="{{ route('request-bloods.index') }}">
                        <i class="fa fa-wpforms"></i>
                        <span>Yêu cầu hiến máu</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class="sub">
                        <li><a href="basic_table.html">Basic Table</a></li>
                        <li><a href="responsive_table.html">Responsive Table</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
