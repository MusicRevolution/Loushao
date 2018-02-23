@extends('layouts/common')

@section('content')
<section class="hiver-breadcrumb">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><span>你的位置:</span></li>
                <li><a href="{{ url('/') }}">首页</a></li>    
                <li class="active"><span>注册</span></li>
                <span class="breadcrumb-end"></span>
            </ol>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <section class="auth-main">
                <div class="auth-main-body login register">
                    <h1 class="auth-main-title">新用户注册</h1>
                    <!--<div class="main-body-header">
                        <p>
                            <span>即刻加入游戏狂热者行列</span>
                        </p>
                    </div>-->
                    <div class="main-body-login">
                        <div class="phone-register">
                            <form method="POST" action="{{ url('auth/register' ) }}">
                            {!! csrf_field() !!}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <span class="label-name">用户名</span>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <span class="label-name">电子邮箱</span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <span class="label-name">密码</span>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <span class="label-name">密码确认</span>
                                <input type="password" name="password_confirmation" class="form-control">    
                            </div>
                            <div class="help-block">
                                <p class="pull-right">
                                    <a href="{{ url('auth/login') }}">有账号? 去登录&gt;</a>
                                </p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">注册</button>
                            </div>
                            </form>
                        </div>
                        <div class="third-account">
                            <div class="third-account-tip">
                                <span>社交账号登录</span>
                            </div>
                            <div class="third-account-wrapper">
                                <div class="third-account-wrapper-item">
                                    <a href="{{ url('oauth/wechat_open') }}" class="weixinweb">
                                        <div class="icon icon-weixinweb"></div>
                                        <span>微信</span>
                                    </a>
                                </div>
                                <div class="third-account-wrapper-item">
                                    <a href="{{ url('oauth/qq') }}" class="qq">
                                        <div class="icon icon-qq"></div>
                                        <span>QQ</span>
                                    </a>
                                </div>
                                <div class="third-account-wrapper-item">
                                    <a href="{{ url('oauth/weibo') }}" class="facebook">
                                        <div class="icon icon-weibo"></div>
                                        <span>微博</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection