@extends('layouts.panel.master')

@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> بازگشت</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
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
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>نام کاربری (نام برای ورود به سیستم)</strong>
                                <input  class="form-control" name="name" type="text" placeholder="نام" value="{{ $user->name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <strong>دپارتمان *</strong>
                            <select name="department_id" class="form-control">
                                <option value=""></option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{$department->id == $user->department_id ?"selected":""}}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>نام</strong>
                                <input name="first_name" type="text" placeholder="نام" class="form-control" value="{{ $user->first_name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>نام خانوادگی</strong>
                                <input name="last_name" type="text" placeholder="نام خانوادگی" class="form-control" value="{{$user->last_name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>ایمیل</strong>
                                <input name="email" type="text" placeholder="ایمیل" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>کدملی</strong>
                                <input name="national_id" type="text" placeholder="کد ملی" class="form-control" value="{{$user->national_id}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>شماره موبایل</strong>
                                <input name="mobile" type="text" placeholder="شماره موبایل" class="form-control" value="{{$user->mobile}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>کلمه عبور:</strong>
                                <input name="password" type="text" placeholder="کلمه عبور" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>نقش:</strong>
                                @foreach ($roles->chunk(3) as $chunk)
                                    <div class="row">
                                        @foreach ($chunk as $id => $role)
                                            <div class="col-xs-6 col-sm-4 col-md-2">
                                                <label>
                                                    <input name="roles[]" value="{{$id}}" type="checkbox" class="name" {{ collect($userRole)->contains($id)? 'checked' : '' }}>
                                                    {{ $role }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
