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
                <li class="sub-menu">
                    <a href="javascript:;" class="{{( Request::path() === 'admin/request-bloods/donated' ||  Request::path() === 'admin/request-bloods/received' ) ? 'active' : '' }}"  >
                        <i class="fa fa-wpforms"></i>
                        <span>Yêu cầu hiến/nhận máu</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{( Request::path() === 'admin/request-bloods/donated' ) ? 'active' : '' }}" href="{{ route('request-bloods.donated') }}">Yêu cầu hiến máu</a></li>
                        <li><a class="{{( Request::path() === 'admin/request-bloods/received' ) ? 'active' : '' }}" href="{{ route('request-bloods.received') }}">Yêu cầu nhận máu</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="{{( Request::path() === 'admin/blood-bags/import' ||  Request::path() === 'admin/blood-bags/search' ) ? 'active' : '' }}"  >
                        <i class="fa fa-wpforms"></i>
                        <span>Nhập kết quả</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{( Request::path() === 'admin/blood-bags/import' ) ? 'active' : '' }}" href="{{ route('blood-bags.getImport') }}">Nhập túi máu</a></li>
                        <li><a class="{{( Request::path() === 'admin/blood-bags/search' ) ? 'active' : '' }}" href="">Tra cứu</a></li>
                    </ul>
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
