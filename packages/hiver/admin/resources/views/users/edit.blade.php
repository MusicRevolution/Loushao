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
            <div class="panel-heading">编辑用户 #{{ $user->id }}</div>
            <div class="panel-body container-fluid">
                <a href="{{ url('/admin/users') }}" title="返回"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> 返回</button></a>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($user, [
                    'method' => 'PATCH',
                    'url' => ['/admin/users', $user->id],
                    'class' => '',
                    'files' => true
                ]) !!}
                @include ('admin::users.form', ['submitButtonText' => '更新'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
