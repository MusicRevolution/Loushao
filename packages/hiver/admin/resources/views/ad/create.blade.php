@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">Ad管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/ad') }}">Ad管理</a>
            </li>
            <li class="active">添加Ad</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">添加新Ad</div>
                <div class="panel-body">
                    <a href="{{ url('/admin/ad') }}" title="返回"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> 返回</button></a>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {!! Form::open(['url' => '/admin/ad', 'class' => '', 'files' => true]) !!}
                    @include ('admin::ad.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
