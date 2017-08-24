@extends('admin::master')

@section('style')
@parent
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
  <style style="text/css">
  select.input-sm {
      line-height: 15px;
  }
  table.dataTable thead > tr > th {
      padding-left: 8px;
      padding-right: 8px;
  }
  h1, .h1, h2, .h2, h3, .h3 {
      margin-top: 0px;
  }
  .panel {
      padding: 20px;
  }
  </style>
@endsection

@section('content')
<div class="page animation-fade page-index">
    <div class="page-header">
        <h1 class="page-title">日志管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admdin') }}">首页</a>
            </li>
            <li>
                <a href="javascript:;">系统设置</a>
            </li>
            <li class="active">日志管理</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <h3>Laravel日志文件</h3>
                <div class="list-group">
                    @foreach($files as $file)
                        <a href="?l={{ base64_encode($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                          {{$file}}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-9 col-md-10 table-container panel">
                @if ($logs === null)
                <div>
                    Log file >50M, please download it.
                </div>
                @else
                <table id="table-log" class="table table-striped">
                <thead>
                <tr>
                    <th style="width:100px">级别</th>
                    <th style="width:100px">上下文关联</th>
                    <th style="width:100px">日志日期</th>
                    <th>日志内容</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $key => $log)
                <tr data-display="stack{{{$key}}}">
                    <td class="text-{{{$log['level_class']}}}">
                        <span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign" aria-hidden="true"></span>
                        &nbsp;{{$log['level']}}
                    </td>
                    <td class="text">{{$log['context']}}</td>
                    <td class="date">{{{$log['date']}}}</td>
                    <td class="text">
                        @if ($log['stack']) <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{{$key}}}">
                        <span class="glyphicon glyphicon-search"></span></a>@endif
                        {{{$log['text']}}}
                        @if (isset($log['in_file'])) <br/>{{{$log['in_file']}}}@endif
                        @if ($log['stack'])
                        <div class="stack" id="stack{{{$key}}}" style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}</div>@endif
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                @endif
                <div>
                @if($current_file)
                    <a href="?dl={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-download-alt"></span> 下载日志文件</a>
                    -
                    <a id="delete-log" href="?del={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-trash"></span> 删除日志文件</a>
                    @if(count($files) > 1)
                    -
                    <a id="delete-all-log" href="?delall=true"><span class="glyphicon glyphicon-trash"></span> 清空所有日志文件</a>
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
@parent
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
  <script>
  $(document).ready(function () {
      $('.table-container tr').on('click', function () {
          $('#' + $(this).data('display')).toggle();
      });
      $('#table-log').DataTable({
          "order": [1, 'desc'],
          "stateSave": true,
          "stateSaveCallback": function (settings, data) {
              window.localStorage.setItem("datatable", JSON.stringify(data));
          },
          "stateLoadCallback": function (settings) {
              var data = JSON.parse(window.localStorage.getItem("datatable"));
              if (data) data.start = 0;
              return data;
          }
      });
      $('#delete-log, #delete-all-log').click(function () {
          return confirm('确定要清空系统日志吗？');
      });
  });
  </script>
@endsection