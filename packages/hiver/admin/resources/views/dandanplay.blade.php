@extends('admin::master')

@section('content')
    <div class="page animation-fade page-index">
        <div class="page-header">
            <h1 class="page-title">弹弹Play关联</h1>
            <ol class="breadcrumb hide">
                <li>
                    <a href="{{ url('/admin') }}">首页</a>
                </li>
                <li>
                    <a href="javascript:;">系统设置</a>
                </li>
                <li class="active">弹弹Play关联</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body container-fluid">
                    {!! Form::open(['url' => '/admin/dandanplay', 'class' => '', 'files' => true]) !!}
                    <div class="form-group form-material {{ $errors->has('username') ? 'has-error' : ''}}">
                        {!! Form::label('username', '用户名', ['class' => 'control-label']) !!}
                        {!! Form::text('username', Setting::get('dandanplay.username', ''), ['class' => 'form-control']) !!}
                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('password') ? 'has-error' : ''}}">
                        {!! Form::label('password', '密码', ['class' => 'control-label']) !!}
                        {!! Form::text('password', Setting::get('dandanplay.password', ''), ['class' => 'form-control']) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('appid') ? 'has-error' : ''}}">
                        {!! Form::label('appid', 'AppID', ['class' => 'control-label']) !!}
                        {!! Form::text('appid', Setting::get('dandanplay.appid', ''), ['class' => 'form-control']) !!}
                        {!! $errors->first('appid', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('appsecret') ? 'has-error' : ''}}">
                        {!! Form::label('appsecret', 'AppSecret', ['class' => 'control-label']) !!}
                        {!! Form::text('appsecret', Setting::get('dandanplay.appsecret', ''), ['class' => 'form-control']) !!}
                        {!! $errors->first('appsecret', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group form-material {{ $errors->has('appsecret') ? 'has-error' : ''}}">
                        {!! Form::label('auth', 'Auth', ['class' => 'control-label']) !!}
                        {!! Form::text('auth', Setting::get('dandanplay.auth', ''), ['class' => 'form-control']) !!}
                        {!! $errors->first('auth', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-danger" value="获取权限" id="dandanplay_js" />
                        &nbsp;
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '保存', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dandanplay_js').click(function () {
                $username = $('#username').val();
                $password = $('#password').val();
                $appid = $('#appid').val();
                $appsecret = $('#appsecret').val();
                $.ajax({
                    url: "{{ url('/api/dandanplay/login') }}/" + $username + "/" + $password + "/" + $appid + "/" + $appsecret,
                    dataType: 'json',
                    success: function (data) {
                        if(data.success) {
                            $('#auth').val(data.token);
                        } else {
                            alert("获取权限失败");
                        }
                    }
                })
            })
        });
    </script>
@endsection