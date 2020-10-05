<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            @role('admin')
            <li class="">
                <a href="#">
                    <i class="fa fa-magic"></i>
                    <span>مدیریت</span>
                    <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-share"></i>
                            <span>کاربران</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-users"></i> <span> همه کاربران</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.create') }}">
                                    <i class="fa fa-user"></i> <span>کاربر جدید </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-code-fork"></i> <span>نقش ها</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('roles.index') }}">
                                    <span>همه نقش ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('roles.create') }}">
                                    <span>نقش جدید</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-code-fork"></i> <span>دپارتمان</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('departments.index') }}">
                                    <span>همه دپارتمان ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('departments.create') }}">
                                    <span>دپارتمان جدید</span>
                                </a>
                            </li>
                        </ul>
                    </li>
  )
                    <li>
                        <a href="#">
                            <i class="fa fa-code-fork"></i> <span>آدرس ها</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('addresses.index') }}">
                                    <span>همه آدرس ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('addresses.create') }}">
                                    <span>آدرس جدید</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-code-fork"></i> <span>سطح تحصیلات</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('grades.index') }}">
                                    <span>همه سطوح</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('grades.create') }}">
                                    <span>سطح جدید</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-code-fork"></i> <span>رشته تحصیلی</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('fields.index') }}">
                                    <span>همه سطوح</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('fields.create') }}">
                                    <span>سطح جدید</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-code-fork"></i> <span>مشتریان</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('customers.index') }}">
                                    <span>همه مشتریان</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customers.create') }}">
                                    <span>مشتری جدید</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('services.index') }}">
                            <i class="fa fa-server"></i> <span>خدمات</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('processes.index') }}">
                            <i class="fa fa-server"></i> <span>مراحل</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('worklists.index') }}">
                            <i class="fa fa-code-fork"></i> <span>لیست کاری</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('sms.index') }}">
                            <i class="fa fa-code-fork"></i> <span>پیامک ها</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contracts.index') }}">
                            <i class="fa fa-code-fork"></i> <span>قراردادها</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endrole
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
