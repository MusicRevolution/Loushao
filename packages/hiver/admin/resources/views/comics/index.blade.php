@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">动漫资源管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li class="active">动漫资源管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ url('/admin/comics/create') }}" class="btn btn-success btn-sm" title="添加动漫资源">
                    <i class="fa fa-plus" aria-hidden="true"></i> 添加动漫资源
                </a>
                {!! Form::open(['method' => 'GET', 'url' => '/admin/comics', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                        <th>标题</th>
                        <th>小图</th>
                        <th>大图</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comics as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td><td>{{ $item->small_img }}</td><td>{{ $item->big_img }}</td>
                        <td>
                            <a href="{{ url('/admin/comics/' . $item->id) }}" title="查看动漫资源"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> 查看</button></a>
                            <a href="{{ url('/admin/comics/' . $item->id . '/edit') }}" title="编辑动漫资源"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/comics', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => '删除动漫资源',
                                'onclick'=>'return confirm("确定要删除该信息？")'
                            )) !!}
                            {!! Form::close() !!}
                            <a href="{{ url('/admin/download/index?id='.$item->id) }}" title="添加下载资源"><button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> 添加下载资源</button></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $comics->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
