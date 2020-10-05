<!DOCTYPE html>
<html>
<head>
@include('layouts.panel.includes.head')
</head>
<body class="skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper ">
    @include('layouts.panel.includes.main-header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.panel.includes.main-sidebar')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    پیشخوان
                    <small>پنل مدیریت</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            Copyright © 2018 <a href="https://skillpro.ir" target="_blank">skillpro.ir</a>. All rights reserved. develop By <a href="http://skillpro.ir" target="_blank">amir daee</a>
        </footer>

    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

@include('layouts.panel.includes.footer')
</body>
</html>
