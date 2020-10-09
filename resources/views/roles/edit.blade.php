@extends('layouts.panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>ویرایش نقش</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> بازگشت</a>
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
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        {{csrf_field()}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>نام نمایشی:</strong>
                                <input name="display_name" type="text" placeholder="نام نمایشی" class="form-control" value="{{ $role->display_name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>توضحیات:</strong>
                                <textarea name="description" placeholder="توضیحات" class="form-control" style="height:100px">{{ $role->description}}</textarea>
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
                                                    <input type="checkbox" name="permission[]" value="{{ $perm->id }}" {{ in_array($perm->id, $rolePermissions) ? 'checked' : '' }} class="name">
                                                    {{ $perm->display_name }}
                                            </label>
                                        </div>
                                        @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-success">به روز رسانی</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
