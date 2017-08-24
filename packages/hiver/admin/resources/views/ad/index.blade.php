@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">Ad管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li class="active">Ad管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">Ad管理</div>
                <div class="panel-body">
                    <a href="{{ url('/admin/ad/create') }}" class="btn btn-success btn-sm" title="Add New Ad">
                        <i class="fa fa-plus" aria-hidden="true"></i> 添加新Ad
                    </a>
                    {!! Form::open(['method' => 'GET', 'url' => '/admin/ad', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
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
                            <th>ID</th><th>Title</th><th>Img</th><th>Url</th><th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ad as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td><td>{{ $item->img }}</td><td>{{ $item->url }}</td>
                            <td>
                                <a href="{{ url('/admin/ad/' . $item->id) }}" title="查看Ad"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> 查看</button></a>
                                <a href="{{ url('/admin/ad/' . $item->id . '/edit') }}" title="编辑Ad"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/admin/ad', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => '删除 Ad',
                                        'onclick'=>'return confirm("确定要删除该信息？")'
                                    )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $ad->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
