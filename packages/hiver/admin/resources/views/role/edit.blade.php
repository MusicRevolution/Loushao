@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">编辑角色</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/role') }}">角色管理</a>
            </li>
            <li class="active">编辑角色</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($role, [
                    'method' => 'PATCH',
                    'url' => ['/admin/role', $role->id],
                    'class' => '',
                    'files' => true
                ]) !!}
                @include ('admin::role.form', ['submitButtonText' => '更新'])
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
