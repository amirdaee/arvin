@extends('layouts.panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>ساخت نقش جدید</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> بازگشت</a>
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
                    <form method="POST" action="{{ route('roles.store') }}">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>نام</strong>
                                <input name="name" type="text" placeholder="نام" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>نام نمایشی:</strong>
                                <input name="display_name" type="text" placeholder="نام نمایشی" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <strong>توضیحات:</strong>
                                <textarea name="description" placeholder="توضیحات" class="form-control" style="height:100px"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>دسترسی ها:</strong>
                                <br/>
                                @foreach ($permission->chunk(4) as $chunk)
                                        @foreach ($chunk as $permisionId => $perm)
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <label>
                                                    <input name="permission[]" value="{{$perm->id}}" type="checkbox" class="name">
                                                    {{ $perm->display_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
