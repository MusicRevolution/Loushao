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
                <a href="javascript:;">Banner管理</a>
            </li>
            <li class="active">Banner管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">Banner列表</div>
            <div class="panel-body">
                <a href="{{ url('/admin/banner/create') }}" class="btn btn-success btn-sm" title="Add New Banner">
                    <i class="fa fa-plus" aria-hidden="true"></i> 添加新Banner
                </a>
                {!! Form::open(['method' => 'GET', 'url' => '/admin/banner', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                    @foreach($banner as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td><td>{{ $item->img }}</td><td>{{ $item->url }}</td>
                        <td>
                            <a href="{{ url('/admin/banner/' . $item->id) }}" title="View Banner"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                            <a href="{{ url('/admin/banner/' . $item->id . '/edit') }}" title="Edit Banner"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/banner', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Banner',
                                'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $banner->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection