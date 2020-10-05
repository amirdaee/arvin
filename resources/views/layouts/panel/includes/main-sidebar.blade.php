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
                @permission('user-list')
                <a href="#">
                    <i class="fa fa-magic"></i>
                    <span>مدیریت</span>
                    <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                </a>
                @endpermission
                <ul class="treeview-menu">
                    @permission('party-list')
                    <li>
                        <a href="#">
                            <i class="fa fa-share"></i>
                            <span>اشخاص</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('parties.index') }}">
                                    <i class="fa fa-users"></i> <span> همه اشخاص</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('parties.create') }}">
                                    <i class="fa fa-user"></i> <span>شخص جدید </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endpermission

                    @permission('user-list')
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
                    @endpermission

                    @permission('role-list')
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
                    @endpermission

                    @permission('employee-list')
                    <li>
                        <a href="{{ route('employees.index') }}">
                            <i class="fa fa-users"></i> <span>کارمندان</span>
                        </a>
                    </li>
                    @endpermission

                    @permission('bank-list')
                    <li>
                        <a href="#">
                            <i class="fa fa-code-fork"></i> <span>بانک</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('banks.index') }}">
                                    <span>همه اطلاعات بانکی</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('banks.create') }}">
                                    <span>بانک جدید</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endpermission

                    @permission('department-list')
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
                    @endpermission

                    @permission('address-list')
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
                    @endpermission

                    @permission('grade-list')
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
                    @endpermission

                    @permission('field-list')
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
                    @endpermission

                    @permission('customer-list')
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
                    @endpermission

                    @permission('service-list')
                    <li>
                        <a href="{{ route('services.index') }}">
                            <i class="fa fa-server"></i> <span>خدمات</span>
                        </a>
                    </li>
                    @endpermission

                    @permission('process-list')
                    <li>
                        <a href="{{ route('processes.index') }}">
                            <i class="fa fa-server"></i> <span>مراحل</span>
                        </a>
                    </li>
                    @endpermission

                    @permission('worklist-list')
                    <li>
                        <a href="{{ route('worklists.index') }}">
                            <i class="fa fa-code-fork"></i> <span>لیست کاری</span>
                        </a>
                    </li>
                    @endpermission
                    @permission('sms-list')
                    <li>
                        <a href="{{ route('sms.index') }}">
                            <i class="fa fa-code-fork"></i> <span>پیامک ها</span>
                        </a>
                    </li>
                    @endpermission
                    @permission('contract-list')
                    <li>
                        <a href="{{ route('contracts.index') }}">
                            <i class="fa fa-code-fork"></i> <span>قراردادها</span>
                        </a>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endrole

            @if(!empty($is_manager))
                @if($is_manager)
                    <li class="">
                        <a href="#">
                            <i class="fa fa-child"></i> <span>مدیران</span>
                            <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>

                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-share"></i>
                                    <span>گزارش</span>
                                    <i class="fa fa-angle-left pull-left icon-left-center pull-left-container"></i>
                                </a>
                                <ul class="treeview-menu">
                                    @permission('employee-doing')
                                    <li>
                                        <a href="{{ route('employees_doing.report') }}">
                                            <i class="fa fa-users"></i> <span>کارهای در حال انجام</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('contact-report')
                                    <li>
                                        <a href="{{ route('contact.report') }}">
                                            <i class="fa fa-users"></i> <span>تماس های تلفنی</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('employee-done')
                                    <li>
                                        <a href="{{ route('employees_done.report') }}">
                                            <i class="fa fa-users"></i> <span>کارهای روزانه</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('consultation-report')
                                    <li>
                                        <a href="{{ route('consultation.report') }}">
                                            <i class="fa fa-users"></i> <span>مشاورین حضوری</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('contract-report')
                                    <li>
                                        <a href="{{ route('contract.report') }}">
                                            <i class="fa fa-users"></i> <span>گزارش قراردادها</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('admision-report')
                                    <li>
                                        <a href="{{ route('admision.report') }}">
                                            <i class="fa fa-users"></i> <span>ادمیشنرها</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('admision-doing')
                                    <li>
                                        <a href="{{ route('admision_doing.report') }}">
                                            <i class="fa fa-users"></i> <span>قراردادهای در حال پیگیری</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('present-report')
                                    <li>
                                        <a href="{{ route('present.report') }}">
                                            <i class="fa fa-users"></i> <span>حضور و غیاب</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('convertcontact-report')
                                    <li>
                                        <a href="{{ route('convertcontact.report') }}">
                                            <i class="fa fa-users"></i> <span>تبدیل مشاوره تلفنی به حضوری</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('convertconsoltation-report')
                                    <li>
                                        <a href="{{ route('cconvertconsoltation.report') }}">
                                            <i class="fa fa-users"></i> <span>تبدیل مشاوره حضوری به قرارداد</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('customers-report')
                                    <li>
                                        <a href="{{ route('customers.report') }}">
                                            <i class="fa fa-users"></i> <span>گزارش مشتریان</span>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('score-reports')
                                    <li>
                                        <a href="{{ route('score.evaluation') }}">
                                            <i class="fa fa-users"></i> <span>ارزیابی عملکرد</span>
                                        </a>
                                    </li>
                                    @endpermission
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
            @endif

            @permission('customer-list')
            <li>
                <a href="{{ route('customers.index') }}">
                    <i class="fa fa-users"></i>
                    <span>همه مشتریان</span>
                </a>
            </li>
            @endpermission

            @permission('customer-create')
            <li class="">
                <a href="{{route('customers.check')}}"><i class="fa fa-user"></i>ثبت مشتری</a>
            </li>
            @endpermission


            @permission('contract-customer-list')
            <li>
                <a href="{{ route('contracts.customers.index') }}">
                    <i class="fa fa-file"></i> <span>قراردادهای موکّل</span>
                </a>
            </li>
            @endpermission
            @permission('customer-user-create')
            <li>
                <a href="{{ route('customers.user') }}">
                    <i class="fa fa-file"></i> <span>ایجاد کاربر جدید</span>
                </a>
            </li>
            @endpermission

            @permission('service-list')
            <li>
                <a href="{{ route('services.index') }}">
                    <i class="fa fa-server"></i> <span>خدمات</span>
                </a>
            </li>
            @endpermission

            @permission('process-list')
            <li>
                <a href="{{ route('processes.index') }}">
                    <i class="fa fa-server"></i> <span>مراحل</span>
                </a>
            </li>
            @endpermission

            @permission('customer_excel-report')
            <li>
                <a href="{{route('customer_excel.report')}}">
                    <i class="fa fa-book"></i>
                    <span>خروجی اکسل مشتریان</span>
                </a>
            </li>
            @endpermission
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
