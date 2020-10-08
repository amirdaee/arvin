@extends('layouts.panel.master')

@section('content')
    <div class="row">
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
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>نام کاربری:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ایمیل:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>نقش:</strong>
                            @if(!empty($user->roles))
                                @foreach($user->roles as $v)
                                    <label class="label label-success">{{ $v->display_name }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>نام و نام خوانوادگی:</strong>
                            {{ $user->first_name." ".$user->last_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>شماره همراه:</strong>
                            {{ $user->mobile }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
