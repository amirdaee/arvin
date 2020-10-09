@extends('layouts.panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>ایجاد پروژه جدید</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> بازگشت</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>خطا!</strong> در ورود داده ها دقت کنید.<br><br>
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
                    <form method="POST" action="{{ route('projects.store') }}">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <strong>نام پروژه:</strong>
                                <input name="project" type="text" placeholder="نام پروژه" class="form-control" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <strong>نام شرکت:</strong>
                                <input name="company" type="text" placeholder="نام شرکت" class="form-control" value="{{old('company')}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="comment">توضیحات:</label>
                                <textarea name="note" class="form-control" rows="3">{{old('note')}}</textarea>
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
