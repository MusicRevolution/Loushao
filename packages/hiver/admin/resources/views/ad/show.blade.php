@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">Ad管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/ad') }}">Ad管理</a>
            </li>
            <li class="active">查看Ad</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">Ad {{ $ad->id }}</div>
            <div class="panel-body">
                <a href="{{ url('/admin/ad') }}" title="返回"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> 返回</button></a>
                <a href="{{ url('/admin/ad/' . $ad->id . '/edit') }}" title="编辑Ad"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/ad', $ad->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Ad',
                    'onclick'=>'return confirm("确定要删除该信息？")'
                ))!!}
                {!! Form::close() !!}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $ad->id }}</td>
                    </tr>
                    <tr><th> Title </th><td> {{ $ad->title }} </td></tr><tr><th> Img </th><td> {{ $ad->img }} </td></tr><tr><th> Url </th><td> {{ $ad->url }} </td></tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
