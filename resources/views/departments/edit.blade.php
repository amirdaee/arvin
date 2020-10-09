@extends('layouts.panel.master')

@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>اصلاح اطلاعات دپارتمان</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('departments.index') }}"> بازگشت</a>
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
    <form method="POST" action="{{ route('departments.update' , $dep->id) }}">
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>نام دپارتمان:</strong>
                    <input name="name" type="text" placeholder="نام دپارتمان" class="form-control" value="{{$dep->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>مدیریت</strong>
                    <select name="parent_id" class="form-control">
                        <option value=""></option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{$dep->parent_id ==$department->id?"selected":""}}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>مدیر</strong>
                    <select name="manager_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{$user->id == $dep->manager_id ?"selected":""}}>
                                {{ $user->first_name." ".$user->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <label for="comment">توضیحات:</label>
                    <textarea name="note" class="form-control" rows="5">{{$dep->note}}</textarea>
                </div>
            </div>
            {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </div>
    </form>
@endsection
