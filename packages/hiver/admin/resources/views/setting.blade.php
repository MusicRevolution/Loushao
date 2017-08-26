@extends('admin::master')

@section('content')
    <div class="page animation-fade page-index">
        <div class="page-header">
            <h1 class="page-title">显示设置</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/admin') }}">首页</a>
                </li>
                <li>
                    <a href="javascript:;">系统设置</a>
                </li>
                <li class="active">显示设置</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body container-fluid">
                    {!! Form::open(['url' => '/admin/setting', 'class' => '', 'files' => true]) !!}
                    <div class="form-group form-material {{ $errors->has('title') ? 'has-error' : ''}}">
                        {!! Form::label('title', '网站标题', ['class' => 'control-label']) !!}
                        {!! Form::text('title', Setting::get('setting.title', '天津海文科技有限公司'), ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '保存', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop