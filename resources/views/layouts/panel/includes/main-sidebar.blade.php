<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <ul class="sidebar-menu">
            @role('admin')
            <li class="">
                <a href="{{ route('panel') }}">
                    <i class="fa fa-home"></i>
                    <span>صفحه اصلی</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-magic"></i>
                    <span>مدیریت</span>
                    <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-share"></i>
                            <span>کاربران</span>
{{--                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>--}}
                        </a>
{{--                        <ul class="treeview-menu">--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('users.index') }}">--}}
{{--                                    <i class="fa fa-users"></i> <span> همه کاربران</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('users.create') }}">--}}
{{--                                    <i class="fa fa-user"></i> <span>کاربر جدید </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </li>

                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-code-fork"></i> <span>نقش ها</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('departments.index') }}">
                            <i class="fa fa-code-fork"></i> <span>دپارتمان</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('projects.index') }}">
                            <i class="fa fa-code-fork"></i> <span>پروژه ها</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
