@extends('layouts.panel.master')

@section('content')
@permission('delete-roles')
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
                            <form method="post" action="{{route('home')}}">
                                <div id="example2" class="bs-docs-example">
                                    <select class="project" name="project">
                                        <option value="">سطح یک</option>
                                    </select>
                                    <select class="level1" name="level1">
                                        <option value="">سطح دو</option>
                                    </select>
                                    <select class="level2" name="level2">
                                        <option value="">سطح سه</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('script')
<script src="{{URL::asset('bower_components/cascading-dropdown/src/jquery.cascadingdropdown.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function (e) {
        $('#example2').cascadingDropdown({
            selectBoxes: [
                {
                    selector: '.project',
                    source: function(request, response) {

                        $.getJSON('/api/projects', request, function(data) {
                            var selectOnlyOption = data.length <= 1;
                            console.log(data);
                            response($.map(data, function(item, index) {
                                return {
                                    label: item.project + item.company,
                                    value: item.id,
                                    selected: selectOnlyOption // Select if only option
                                };
                            }));
                        });
                    }
                },
                {
                    selector: '.level1',
                    requires: ['.project'],
                    source: function(request, response) {
                        $.getJSON('/api/resolutions', request, function(data) {
                            var selectOnlyOption = data.length <= 1;
                            response($.map(data, function(item, index) {
                                return {
                                    label: item.project + item.company,
                                    value: item.id,
                                    selected: selectOnlyOption // Select if only option
                                };
                            }));
                        });
                    }
                },
                {
                    selector: '.level2',
                    requires: ['.project', '.level1'],
                    requireAll: true,
                    source: function(request, response) {
                        $.getJSON('/api/storages', request, function(data) {
                            response($.map(data, function(item, index) {
                                return {
                                    label: item.project + item.company,
                                    value: item.id,
                                    selected: index == 0 // Select first available option
                                };
                            }));
                        });
                    },
                    onChange: function(event, value, requiredValues, requirementsMet){
                        // do stuff
                    }
                }
            ]
        });
    });
</script>

@endsection

