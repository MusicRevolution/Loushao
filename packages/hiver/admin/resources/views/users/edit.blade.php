@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">编辑用户</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admdin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}">用户管理</a>
            </li>
            <li class="active">编辑用户</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
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
