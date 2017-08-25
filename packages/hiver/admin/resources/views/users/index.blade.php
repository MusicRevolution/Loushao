@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">用户管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li class="active">用户管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="添加新用户">
                    <i class="fa fa-plus" aria-hidden="true"></i> 添加新用户
                </a>
                {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ Input::get('search') }}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
                {!! Form::close() !!}
                <div class="list">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>用户名</th>
                        <th>电子邮箱</th>
                        <th>密码</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->password }}</td>
                        <td>
                            <a href="{{ url('/admin/users/' . $item->id) }}" title="查看用户"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> 查看</button></a>
                            <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="编辑用户"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/users', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => '删除用户',
                                'onclick'=>'return confirm("您确定要删除该信息吗？")'
                            )) !!}
                            {!! Form::close() !!}
                            <a href="{{ url('/admin/profile/'.$item->id.'/edit') }}" title="详细信息"><button class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 详细信息</button></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
