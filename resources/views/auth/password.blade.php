@extends('layouts/common')

@section('content')
<section class="hiver-breadcrumb">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><span>你的位置:</span></li>
                <li><a href="{{ url('/') }}">首页</a></li>    
                <li class="active"><span>找回密码</span></li>
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
                    <div class="main-body-login" style="margin-bottom: 0px" >
                        <div class="phone-register">
                        <form method="POST" action="{{ url('password/email') }}">
                            {!! csrf_field() !!}
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <span class="label-name">电子邮箱</span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">提交</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection