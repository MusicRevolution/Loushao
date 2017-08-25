@extends('admin::master')

@section('style')
@parent
  <style type="text/css">
    .modal-open .modal {
        margin-top: 150px;
    }
  </style>
@endsection

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">下载资源管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/comics') }}">动漫资源管理</a>
            </li>
            <li class="active">下载资源管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <button class="btn btn-success btn-sm" title="添加资源" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> 添加资源
                </button>
                {!! Form::open(['method' => 'GET', 'url' => '/admin/download/index', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                <input type="hidden" name="id" value="{{ Input::get('id') }}" />
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
                        <th>下载地址</th>
                        <th>文件大小</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($download as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->url }}</td>
                        <td>{{ $item->filesize }}</td>
                        <td>
                            <button title="编辑资源" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-download-id="{{ $item->id }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑
                            </button>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/download', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> 删除', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => '删除资源',
                                'onclick'=>'return confirm("确定要删除该信息？")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $download->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        {!! Form::open(['url' => '/admin/download', 'class' => 'modal-form', 'files' => true]) !!}
            <input type="hidden" name="comic_id" value="{{ Input::get('id') }}" />
            <input type="hidden" name="id" class="download-id" value="" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加资源</h4>
            </div>
            <div class="modal-body">
                @include ('admin::download.form')
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">保存</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@parent
    <script>
        $(document).ready(function(){
           $('#myModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var download_id = button.data('download-id');
                if(download_id > 0)
                {
                    var modal = $(this);
                    modal.find('.download-id').val(download_id);
                    $.ajax({
                        url: "{{ url('api/downloadByID') }}/"+download_id,
                        type: "GET",
                        async: true,
                        success: function($data) {
                            modal.find('.modal-form').attr("action", "{{ url('/admin/download') }}/"+download_id);
                            modal.find('.download-title').val($data['download']['title']);
                            modal.find('.download-url').val($data['download']['url']);
                            modal.find('.download-filesize').val($data['download']['filesize']);
                            modal.find('.download-download').val($data['download']['download']);
                        },
                        dataType: "json"
                    })
                } else {
                    var modal = $(this);
                    modal.find('.modal-form').attr("action", "{{ url('/admin/download') }}");
                }
            })
        });
    </script>
@endsection