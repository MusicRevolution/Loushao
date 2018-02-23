@extends('layouts/common')

@section('content')
<section class="hiver-breadcrumb">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><span>你的位置:</span></li>
                <li><a href="{{ url('/') }}">首页</a></li>    
                <li class="active"><span>登录</span></li>
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
                    <h1 class="auth-main-title">登录</h1>
                    <!--<div class="main-body-header">
                        <p>
                            <span>即刻加入游戏狂热者行列</span>
                        </p>
                    </div>-->
                    <div class="main-body-login">
                        <div class="phone-register">
                            <form method="POST" action="{{ url('/auth/login' ) }}">
                            {!! csrf_field() !!}
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <span class="label-name">电子邮箱</span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group login-form-group">
                                <span class="label-name">密码</span>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="help-block" style="margin-top: 0;margin-bottom: 15px">
                                <p class="pull-right"><a href="{{ url('auth/register') }}" class="go-register-link">没有账号? 去注册&gt;</a></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">登录</button>
                            </div>
                            <div class="checkbox main-body-links">
                                <label>
                                    <input type="checkbox" name="remember"> 记住我
                                </label>
                                <a href="{{ url('password/email') }}" class="pull-right">忘记密码</a>
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