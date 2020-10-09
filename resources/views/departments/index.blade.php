@extends('layouts.panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>مدیریت دپارتمان ها</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('departments.create') }}"> ثبت اطلاعات بخش جدید</a>
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
                            <th>شماره</th>
                            <th>نام دپارتمان</th>
                            <th>مدیریت</th>
                            <th>مدیر</th>
                            <th>توضحیات</th>
                            <th width="350px"></th>
                        </tr>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->getParent()?$department->getParent()->name:"" }}</td>
                                <td>
                                    @if($department->manager)
                                        <p>{{ ($department->manager()->first()->first_name) ." ". ($department->manager()->first()->last_name)}}</p>
                                    @else
                                        <p>مدیر تعیین نشده است.</p>
                                    @endif
                                </td>
                                <td>{{ $department->note }}</td>
                                <td>
                                    @permission('read-departments')
                                    <a class="btn btn-info" href="{{ route('departments.show',$department->id) }}">مشاهده</a>
                                    @endpermission
                                    @permission('update-departments')
                                    <a class="btn btn-primary" href="{{ route('departments.edit',$department->id) }}">اصلاح</a>
                                    @endpermission
                                    @permission('delete-departments')
                                    <form method="POST" action="{{ route('departments.destroy', $department->id) }}" style="display: inline">
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
                    {!! $departments->render() !!}
                </div>
            <!-- /.box-body -->
            </div>
        <!-- /.box -->
        </div>
    </div>
@endsection
