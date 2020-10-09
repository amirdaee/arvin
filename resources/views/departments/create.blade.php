@extends('layouts.panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>ایجاد بخش جدید</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('departments.index') }}"> بازگشت</a>
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
                    <form method="POST" action="{{ route('departments.store') }}">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <strong>نام بخش:</strong>
                                    <input name="name" type="text" placeholder="نام بخش" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>مدیریت</strong>
                                    <select name="parent_id" class="form-control">
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>مدیر</strong>
                                    <select name="manager_id" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name." ".$user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="comment">توضیحات:</label>
                                    <textarea name="note" class="form-control" rows="5"></textarea>
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
