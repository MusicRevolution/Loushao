@extends('admin::master')

@section('style')
    @parent
    <link rel="stylesheet" href="{{ admin_asset('js/plugins/magnific-popup/magnific-popup.css') }}">
@endsection

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">查看广告</h1>
        <ol class="breadcrumb hide">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/ad') }}">广告管理</a>
            </li>
            <li class="active">查看广告</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <a href="{{ url('/admin/ad/' . $ad->id . '/edit') }}" title="编辑广告"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/ad', $ad->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger',
                    'title' => '删除广告',
                    'onclick'=>'return confirm("确定要删除该信息？")'
                ))!!}
                {!! Form::close() !!}
                <a href="{{ url('/admin/ad') }}" class="btn btn-warning">返回</a>
                <br /><br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>编号</th>
                        <td>{{ $ad->id }}</td>
                    </tr>
                    <tr>
                        <th>标题</th>
                        <td>{{ $ad->title }}</td>
                    </tr>
                    <tr>
                        <th>图片</th>
                        <td>
                            <a href="{{ url($ad->img) }}" class="image-link">
                                <img width="200px" height="200px" src="{{ url($ad->img) }}" class="img-thumbnail">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>URL地址</th>
                        <td>{{ $ad->url }}</td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script src="{{ admin_asset('js/plugins/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.image-link').magnificPopup({type:'image'});
        });
    </script>
@endsection
