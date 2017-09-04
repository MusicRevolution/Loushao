@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">查看用户</h1>
        <ol class="breadcrumb hide">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}">用户管理</a>
            </li>
            <li class="active">查看用户</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="编辑用户"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/users', $user->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger',
                    'title' => '删除用户',
                    'onclick'=>'return confirm("您约定要删除该信息吗？")'
                ))!!}
                {!! Form::close() !!}
                <a href="{{ url('/admin/users') }}" class="btn btn-warning">返回</a>
                <br /><br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>编号</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>用户名</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>电子邮箱</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>密码</th>
                        <td>{{ $user->password }}</td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
