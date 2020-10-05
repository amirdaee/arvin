@extends('layouts.panel.master')

@section('content')
@permission('delete-role')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-cog"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">تعداد کل قراردادها</span>
                    <span class="info-box-number">90</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-magic"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">تعداد کل اسناد مالی</span>
                    <span class="info-box-number">20</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">کل اشخاص سیستم</span>
                    <span class="info-box-number">50</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">کاربران سیستم</span>
                    <span class="info-box-number">30</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
@endpermission
    <div class="row">
        <div class="col-md-6">
                <div class="box box-info">
                    <header class="box-header"><h3>پیام های سیستم</h3></header>
                    <div class="box-body">
                        <div class="container" style="max-width: 400px;">

                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

