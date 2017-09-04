@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">角色管理</h1>
        <ol class="breadcrumb hide">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li class="active">角色管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ url('/admin/role/create') }}" class="btn btn-success btn-sm" title="添加新角色">
                    <i class="fa fa-plus" aria-hidden="true"></i> 添加新角色
                </a>
                {!! Form::open(['method' => 'GET', 'url' => '/admin/role', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                        <th>角色名</th>
                        <th>显示名称</th>
                        <th>描述</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($role as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td><td>{{ $item->display_name }}</td><td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ url('/admin/role/' . $item->id) }}" title="查看角色"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> 查看</button></a>
                            <a href="{{ url('/admin/role/' . $item->id . '/edit') }}" title="编辑角色"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/role', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => '删除角色',
                                'onclick'=>'return confirm("确定要删除该信息？")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $role->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
