<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="{{( Request::path() === 'admin/index' || Request::path() === 'admin' )? 'active' : '' }}"
                        href="{{ route('admin.index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a class="{{( Request::path() === 'admin/users' )? 'active' : '' }}" href="{{route('users.list')}}">
                        <i class="fa fa-user"></i>
                        <span>Quản lý người dùng</span>
                    </a>
                </li>
                <li>
                    <a class="{{( Request::path() === 'admin/bloods' )? 'active' : '' }}"
                        href="{{route('bloods.list')}}">
                        <i class="fa fa-tint"></i>
                        <span>Quản lý nhóm máu</span>
                    </a>
                </li>
                <li>
                    <a class="{{(Request::path() === 'admin/calendar' )? 'active' : '' }}"
                        href="{{ route('calendar.index') }}">
                        <i class="fa fa-calendar"></i>
                        <span>Quản Lý Lịch</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="{{( Request::path() === 'admin/request-bloods/listDonated')
                            ||  Request::path() === 'admin/request-bloods/listRegisterDonated'
                            ||  Request::path() === 'admin/request-bloods/listSuccessDonated'  ? 'active' : ''
                             }}">
                        <i class="fa fa-wpforms"></i>
                        <span>Quản lý người hiến máu</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{( Request::path() === 'admin/request-bloods/listDonated' ) ? 'active' : '' }}"
                                href="{{ route('request-bloods.listDonated') }}">Người có nhu cầu hiến máu</a>
                        </li>
                        <li><a class="{{( Request::path() === 'admin/request-bloods/listRegisterDonated' ) ? 'active' : '' }}"
                                href="{{ route('request-bloods.listRegisterDonated') }}">Người đăng ký hiến theo
                                lịch</a></li>
                        <li><a class="{{( Request::path() === 'admin/request-bloods/listSuccessDonated') ? 'active' : '' }}"
                                href="{{ route('request-bloods.listRegisterSuccess') }}">Người đã lấy máu</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="{{( Request::path() === 'admin/request-bloods/list-received')
                            ||  Request::path() === 'admin/request-bloods/received'  ? 'active' : ''
                             }}">
                        <i class="fa fa-wpforms"></i>
                        <span>Quản lý người nhận máu</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{( Request::path() === 'admin/request-bloods/list-received' ) ? 'active' : '' }}"
                                href="{{ route('request-bloods.listReceived') }}">Danh sách người nhận máu</a>
                        </li>
                        <li><a class="{{( Request::path() === 'admin/request-bloods/received' ) ? 'active' : '' }}"
                                href="{{ route('request-bloods.received') }}">Danh sách yêu cầu nhận máu</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="{{( Request::path() === 'admin/blood-bags/import'
                            || Request::path() === 'admin/blood-bags/search' ) ? 'active' : '' }}">
                        <i class="fa fa-area-chart"></i>
                        <span>Kết quả xét nghiệm</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{( Request::path() === 'admin/blood-bags/import' ) ? 'active' : '' }}"
                                href="{{ route('blood-bags.getImport') }}">Nhập kết quả xét nghiệm</a></li>
                        <li><a class="{{( Request::path() === 'admin/blood-bags/search' ) ? 'active' : '' }}"
                                href="{{ route('blood-bags.getSearch') }}">Tra cứu kết quả</a></li>
                    </ul>
                </li>
                <li class="sub">
                    <a class="|| Request::path() === 'admin/bloodbags/blood-bag' ? 'active' : '' }}"
                        href="{{route('import-loods.index')}}">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Nhập túi máu vào kho</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="{{( Request::path() === 'admin/warehouses'
                            || Request::path() === 'admin/warehouses/import-blood' )
                            || Request::path() === 'admin/warehouses/blood-bag'
                            || Request::path() === 'warehouses/export-blood' ? 'active' : '' }}">
                        <i class="fa fa-university"></i>
                        <span>Quản lý kho máu</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="{{( Request::path() === 'admin/warehouses' ) ? 'active' : '' }}"
                                href="{{route('warehouses.index')}}">Danh sách kho máu</a>
                        </li>
                        <li>
                            <a class="{{( Request::path() === 'admin/warehouses/blood-bag' ) ? 'active' : '' }}"
                                href="{{route('blood-bags.index')}}">Quản lý túi máu trong kho</a>
                        </li>
                        <li>
                            <a class="{{( Request::path() === 'warehouses/export-blood' ) ? 'active' : '' }}"
                                href="{{route('export-bloods.index')}}">Xuất túi máu</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="{{(Request::path() == 'admin/diary' )? 'active' : '' }}"
                        href="{{ route('diary.index') }}">
                        <i class="fa fa-clipboard"></i>
                        <span>Nhật ký hiến/nhận máu</span>
                    </a>
                </li>
                <li>
                    <a class="{{(Request::path() == 'admin/posts' )? 'active' : '' }}"
                        href="{{ route('posts.index') }}">
                        <i class="fa fa-tags"></i>
                        <span>Quản lý tin tức</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
