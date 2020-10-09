@extends('layouts.panel.master')

@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>اصلاح پروژه</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> بازگشت</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>اخطار!</strong> در ورود دادهای خود دقت کنید.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <form method="POST" action="{{ route('projects.update' , $project->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <strong>نام پروژه:</strong>
                                <input name="project" type="text" placeholder="نام پروژه" class="form-control" value="{{$project->project}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <strong>نام شرکت:</strong>
                                <input name="company" type="text" placeholder="نام شرکت" class="form-control" value="{{$project->company}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="comment">توضیحات:</label>
                                <textarea name="note" class="form-control" rows="3">{{$project->note}}</textarea>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-success">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
