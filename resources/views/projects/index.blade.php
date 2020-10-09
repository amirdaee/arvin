@extends('layouts.panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>مدیریت پروژه ها</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('projects.create') }}">ساخت پروژه</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach( $errors->all() as $message )
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @endforeach

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>نام پروژه</th>
                            <th>نام شرکت</th>
                            <th>توضحیات</th>
                            <th width="350px"></th>
                        </tr>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->project }}</td>
                                <td>{{ $project->company }}</td>
                                <td>{{ $project->note }}</td>
                                <td>
                                    @permission('read-projects')
                                    <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">مشاهده</a>
                                    @endpermission
                                    @permission('update-projects')
                                    <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">اصلاح</a>
                                    @endpermission
                                    @permission('delete-projects')
                                    <form method="POST" action="{{ route('projects.destroy', $project->id) }}" style="display: inline">
                                        <input name="_method" type="hidden" value="DELETE">

                                        <input type="submit" class="btn btn-danger" value="حذف">

                                        {{csrf_field()}}
                                    </form>
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $projects->render() !!}
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
