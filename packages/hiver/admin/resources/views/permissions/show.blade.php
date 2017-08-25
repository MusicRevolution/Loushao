@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">查看权限</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/permissions') }}">权限管理</a>
            </li>
            <li class="active">查看权限</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ url('/admin/permissions/' . $permission->id . '/edit') }}" title="编辑权限"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/permissions', $permission->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger',
                    'title' => '删除权限',
                    'onclick'=>'return confirm("确定要删除该信息？")'
                ))!!}
                {!! Form::close() !!}
                <br /><br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $permission->id }}</td>
                    </tr>
                    <tr>
                        <th>权限名</th>
                        <td>{{ $permission->name }}</td>
                    </tr>
                    <tr>
                        <th>显示名称</th>
                        <td>{{ $permission->display_name }}</td>
                    </tr>
                    <tr>
                        <th>描述</th>
                        <td>{{ $permission->description }}</td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
