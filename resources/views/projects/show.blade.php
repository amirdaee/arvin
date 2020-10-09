@extends('layouts.panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>اطلاعات پروژه</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> بازگشت</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>نام پروژه</strong>
                            {{ $project->project }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>نام شرکت</strong>
                            {{ $project->company }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>توضیحات</strong>
                            {{ $project->note }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
