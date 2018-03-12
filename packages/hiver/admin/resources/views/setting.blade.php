@extends('admin::master')

@section('content')
    <div class="page animation-fade page-index">
        <div class="page-header">
            <h1 class="page-title">显示设置</h1>
            <ol class="breadcrumb hide">
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
                    <div class="form-group form-material {{ $errors->has('welcome') ? 'has-error' : ''}}">
                        {!! Form::label('welcome', '网站访问', ['class' => 'control-label']) !!}
                        <div class="radio-list">
                            <div class="radio">
                                {!! Form::radio('welcome', '1', Setting::get('setting.welcome', '1') == '1', ['id' => 'radio1']) !!}
                                <label for="radio1">
                                    正常
                                </label>
                            </div>
                            <div class="radio">
                                {!! Form::radio('welcome', '0', Setting::get('setting.welcome', '0') == '0', ['id' => 'radio2']) !!}
                                <label for="radio2">
                                    锁定
                                </label>
                            </div>
                        </div>
                        {!! $errors->first('welcome', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('keywords') ? 'has-error' : ''}}">
                        {!! Form::label('keywords', 'Meta Keywords', ['class' => 'control-label']) !!}
                        {!! Form::text('keywords', Setting::get('setting.keywords', 'hiver,hiver官网,loushao,营销,产品,海文科技,漏勺网,通用后台管理系统,后台框架,ui框架'), ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('keywords', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('description') ? 'has-error' : ''}}">
                        {!! Form::label('description', 'Meta Description', ['class' => 'control-label']) !!}
                        {!! Form::text('description', Setting::get('setting.description', '基于Laravel5.1框架开发后台插件'), ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('icp') ? 'has-error' : ''}}">
                        {!! Form::label('icp', 'ICP', ['class' => 'control-label']) !!}
                        {!! Form::text('icp', Setting::get('setting.icp', '互联网ICP备案：闽ICP备12004074号-8 闽网文（2015）1788-036号'), ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('icp', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('copyright') ? 'has-error' : ''}}">
                        {!! Form::label('copyright', '版权信息', ['class' => 'control-label']) !!}
                        {!! Form::text('copyright', Setting::get('setting.copyright', '© 2018 漏勺网 本站不提供任何视听上传服务，所有内容均来自视频分享站点所提供的公开引用资源'), ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('copyright', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('tongji') ? 'has-error' : ''}}">
                        {!! Form::label('tongji', '统计代码', ['class' => 'control-label']) !!}
                        {!! Form::textarea('tongji', Setting::get('setting.tongji', ''), ['class' => 'form-control']) !!}
                        {!! $errors->first('tongji', '<p class="help-block">:message</p>') !!}
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