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
            <div class="panel-heading">Banner {{ $banner->id }}</div>
            <div class="panel-body">
                <a href="{{ url('/admin/banner') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/admin/banner/' . $banner->id . '/edit') }}" title="Edit Banner"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/banner', $banner->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Banner',
                    'onclick'=>'return confirm("Confirm delete?")'
                ))!!}
                {!! Form::close() !!}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th><td>{{ $banner->id }}</td></tr>
                        <tr><th> Title </th><td> {{ $banner->title }} </td></tr><tr><th> Img </th><td> {{ $banner->img }} </td></tr><tr><th> Url </th><td> {{ $banner->url }} </td></tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
