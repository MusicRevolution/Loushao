@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">用户管理</h1>
        <ol class="breadcrumb">
            <li>
                <a>首页</a>
            </li>
            <li>
                <a href="javascript:;">系统管理</a>
            </li>
            <li class="active">用户管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">Edit Banner #{{ $banner->id }}</div>
            <div class="panel-body container-fluid">
                <a href="{{ url('/admin/banner') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($banner, [
                    'method' => 'PATCH',
                    'url' => ['/admin/banner', $banner->id],
                    'class' => '',
                    'files' => true
                ]) !!}
                @include ('admin::banner.form', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
