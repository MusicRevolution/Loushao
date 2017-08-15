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
            <div class="panel-heading">查看用户 #{{ $user->id }}</div>
            <div class="panel-body container-fluid">
                <a href="{{ url('/admin/users') }}" title="返回"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> 返回</button></a>
                <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="编辑用户"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/users', $user->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => '删除用户',
                    'onclick'=>'return confirm("您约定要删除该信息吗？")'
                ))!!}
                {!! Form::close() !!}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th><td>{{ $user->id }}</td>
                    </tr>
                    <tr><th> Name </th><td> {{ $user->name }} </td></tr><tr><th> Email </th><td> {{ $user->email }} </td></tr><tr><th> Password </th><td> {{ $user->password }} </td></tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
