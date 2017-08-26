@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">反馈管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li class="active">反馈管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                {!! Form::open(['method' => 'GET', 'url' => '/admin/feedback', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                        <th>反馈内容</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedback as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->feedback }}</td>
                        <td>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/feedback', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => '删除反馈',
                                'onclick'=>'return confirm("确定要删除该信息？")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $feedback->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
