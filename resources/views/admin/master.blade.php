<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="/admin/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/admin/dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="/admin/dist/css/rtl.css">
    <!-- persian Date Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker-0.4.5.min">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/admin/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/admin/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/admin/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="icon" href="/admin/logo.png">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <div href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">پنل</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">۴ پیام خوانده نشده</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-right">
                                                <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                علیرضا
                                                <small><i class="fa fa-clock-o"></i> ۵ دقیقه پیش</small>
                                            </h4>
                                            <p>متن پیام</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-right">
                                                <img src="/admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                نگین
                                                <small><i class="fa fa-clock-o"></i> ۲ ساعت پیش</small>
                                            </h4>
                                            <p>متن پیام</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-right">
                                                <img src="/admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                نسترن
                                                <small><i class="fa fa-clock-o"></i> امروز</small>
                                            </h4>
                                            <p>متن پیام</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-right">
                                                <img src="/admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                نگین
                                                <small><i class="fa fa-clock-o"></i> دیروز</small>
                                            </h4>
                                            <p>متن پیام</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-right">
                                                <img src="/admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                نسترن
                                                <small><i class="fa fa-clock-o"></i> ۲ روز پیش</small>
                                            </h4>
                                            <p>متن پیام</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">نمایش تمام پیام ها</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">۱۰</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">۱۰ اعلان جدید</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> ۵ کاربر جدید ثبت نام کردند
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> اخطار دقت کنید
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> ۴ کاربر جدید ثبت نام کردند
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> ۲۵ سفارش جدید
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> نام کاربریتان را تغییر دادید
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">نمایش همه</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">۹</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">۹ کار برای انجام دارید</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                ساخت دکمه
                                                <small class="pull-left">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% تکمیل شده</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                ساخت قالب جدید
                                                <small class="pull-left">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% تکمیل شده</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                تبلیغات
                                                <small class="pull-left">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% تکمیل شده</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                ساخت صفحه فرود
                                                <small class="pull-left">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% تکمیل شده</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">نمایش همه</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(!file_exists(public_path() . Auth::user()->image))
                                <img src="/upload/images/default-profile.png" class="user-image img-circle" alt="User Image">
                            @else
                                <img src="{{ Auth::user()->image }}" class="user-image img-circle" alt="User Image">
                            @endif
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if(!file_exists(public_path() . Auth::user()->image))
                                    <img src="/upload/images/default-profile.png" class="img-circle" alt="User Image">
                                @else
                                    <img src="{{ Auth::user()->image }}" class="img-circle" alt="User Image">
                                @endif

                                <p>
                                    {{ Auth::user()->username }}
                                    <small>{{ Auth::user()->name }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{ route('admin.profile.index') }}" class="btn btn-default btn-flat">پروفایل</a>
                                </div>
                                <div class="pull-left">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                       class="btn btn-default btn-flat">
                                        {{ __('خروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-right image">
                    @if(!file_exists(public_path() . Auth::user()->image))
                        <img src="/upload/images/default-profile.png" class="img-circle" alt="User Image">
                    @else
                        <img src="{{ Auth::user()->image }}" class="img-circle" alt="User Image" >
                    @endif
                </div>
                <div class="pull-right info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">منو</li>
                <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i><span>داشبورد</span></a></li>
                <li class="treeview {{ in_array(Route::currentRouteName(), ['users.create', 'users.index', 'users.verify']) ? 'menu-open' : ''  }}">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>مدیریت کاربران</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" style="{{ in_array(Route::currentRouteName(), ['users.create', 'users.index', 'users.verify']) ? 'display: block;' : '' }}">
                        @if (Gate::allows('index-land') || Auth::user()->level == 2)
                            <li class="{{ Route::currentRouteName() == 'users.create' ? 'active' : '' }}"><a href="{{ route('users.create') }}"><i class="fa fa-plus"></i>ایجاد کاربر</a></li>
                        @endif
                        <li class="{{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i>لیست کاربران</a></li>
                        <li class="{{ Route::currentRouteName() == 'users.verify' ? 'active' : '' }}">
                            <a href="{{ route('users.verify') }}">
                                <i class="fa fa-users"></i> <span>کاربران تایید نشده</span>
                                <span class="pull-left-container">
                                    @if(\App\Models\User::where('status', 0)->get()->count())
                                        <small class="label pull-left bg-yellow">{{ \App\Models\User::where('status', 0)->get()->count() }}</small>
                                    @endif
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @if (Auth::user()->level == 2)
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview {{ in_array(Route::currentRouteName(), ['roles.index', 'users-role.index', 'roles.create', 'roles.edit', 'users-role.create', 'users-role.edit']) ? 'menu-open' : ''  }}">
                        <a href="#">
                            <i class="fa fa-lock"></i> <span>سطوح دسترسی</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu" style="{{ in_array(Route::currentRouteName(), ['roles.index', 'users-role.index', 'roles.create', 'roles.edit', 'users-role.create', 'users-role.edit']) ? 'display: block;' : '' }}">
                            <li class="{{ in_array(Route::currentRouteName(), ['roles.index', 'roles.create', 'roles.edit']) ? 'active' : '' }}"><a href="{{route('roles.index')}}"><i class="fa fa-expeditedssl"></i>مدیریت نقش ها</a></li>
                            <li class="{{ in_array(Route::currentRouteName(), ['users-role.index', 'users-role.create', 'users-role.edit']) ? 'active' : '' }} }}"><a href="{{ route('users-role.index') }}"><i class="fa fa-users"></i>نقش کاربران</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview {{ in_array(Route::currentRouteName(), ['lands.create', 'lands.index']) ? 'menu-open' : ''  }}">
                    <a href="#">
                        <i class="fa  fa-safari"></i> <span>مدیریت زمین ها</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" style="{{ in_array(Route::currentRouteName(), ['lands.create', 'lands.index']) ? 'display: block;' : '' }}">
                        @if (Gate::allows('create-land') || Auth::user()->level == 2)
                            <li class="{{ Route::currentRouteName() == 'lands.create' ? 'active' : '' }}"><a href="{{ route('lands.create') }}"><i class="fa fa-plus"></i>ایجاد زمین</a></li>
                        @endif
                        <li class="{{ Route::currentRouteName() == 'lands.index' ? 'active' : '' }}"><a href="{{ route('lands.index') }}"><i class="fa fa-users"></i>لیست زمین ها</a></li>
                    </ul>
                </li>
                <li class="{{ Route::currentRouteName() == 'sensors.index' ? 'active' : '' }}"><a href="{{ route('sensors.index') }}"><i class="fa fa-dot-circle-o"></i> <span>مدیریت ایستگاه ها</span></a></li>
            </ul>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview {{ in_array(Route::currentRouteName(), ['filters.create', 'filters.index']) ? 'menu-open' : ''  }}">
                    <a href="#">
                        <i class="fa  fa-filter"></i> <span>مدیریت پارامتر ها</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" style="{{ in_array(Route::currentRouteName(), ['filters.create', 'filters.index']) ? 'display: block;' : '' }}">
                        @if (Gate::allows('create-filter') || Auth::user()->level == 2)
                            <li class="{{ Route::currentRouteName() == 'filters.create' ? 'active' : '' }}"><a href="{{ route('filters.create') }}"><i class="fa fa-plus"></i>ایجاد پارامتر</a></li>
                        @endif
                        <li class="{{ Route::currentRouteName() == 'filters.index' ? 'active' : '' }}"><a href="{{ route('filters.index') }}"><i class="fa fa-users"></i>لیست پارامتر ها</a></li>
                    </ul>
                </li>
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
    @yield('main-content')
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-left" style="text-align: center">
        <strong>شرکت ناهید آسمان ایرانیان</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">فعالیت ها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">تولد غلوم</h4>

                                <p>۲۴ مرداد</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">آپدیت پروفایل سجاد</h4>

                                <p>تلفن جدید (800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">نورا به خبرنامه پیوست</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">کرون جابز اجرا شد</h4>

                                <p>۵ ثانیه پیش</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">پیشرفت کارها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                ساخت پوستر های تبلیغاتی
                                <span class="label label-danger pull-left">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                آپدیت رزومه
                                <span class="label label-success pull-left">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                آپدیت لاراول
                                <span class="label label-warning pull-left">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                بخش پشتیبانی سایت
                                <span class="label label-primary pull-left">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">وضعیت</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">تنظیمات عمومی</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            گزارش کنترلر پنل
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            ثبت تمامی فعالیت های مدیران
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            ایمیل مارکتینگ
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            اجازه به کاربران برای ارسال ایمیل
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            در دست تعمیرات
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            قرار دادن سایت در حالت در دست تعمیرات
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">تنظیمات گفتگوها</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            آنلاین بودن من را نشان نده
                            <input type="checkbox" class="pull-left" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            اعلان ها
                            <input type="checkbox" class="pull-left">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            حذف تاریخته گفتگوهای من
                            <a href="javascript:void(0)" class="text-red pull-left"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>--}}

<!-- jQuery 3 -->
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/admin/bower_components/raphael/raphael.min.js"></script>
{{--<script src="/admin/bower_components/morris.js/morris.min.js"></script>--}}
<!-- Sparkline -->
<script src="/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin/bower_components/moment/min/moment.min.js"></script>
<script src="/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="/admin/dist/js/pages/dashboard.js"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>

@yield('script')

</body>
</html>
