@extends('layouts.panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>اطلاعات بخش</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('departments.index') }}"> بازگشت</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>نام بخش</strong>
                {{ $department->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>توضیحات</strong>
                {{ $department->note }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>زیر مجموعه</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <ul id="tree1">
            @forelse($department->childs as $child)
                @if($child->id != 1)
                <li>
                    {{ $child->name }}
                    @if(count($child->childs))
                        @include('includes.manageChild',['childs' => $child->childs])
                    @endif
                </li>
                @endif
            @empty
            @endforelse
        </ul>
    </div>
@endsection