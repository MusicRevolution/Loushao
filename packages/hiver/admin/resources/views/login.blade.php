<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>后台管理系统</title>
    <meta charset="utf-8">
    <meta name="keywords" content="hiver,hiver官网,loushao,营销,产品,海文科技,漏勺网,通用后台管理系统,后台框架,ui框架" />
    <meta name="description" content="基于Laravel5.1框架开发后台插件" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 移动设备 viewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
    <meta name="author" content="hiver.cc">
    <!-- 360浏览器默认使用Webkit内核 -->
    <meta name="renderer" content="webkit">
    <!-- 禁止百度SiteAPP转码 -->
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <!-- Chrome浏览器添加桌面快捷方式（安卓） -->
    <link rel="icon" type="image/png" href="{{ admin_asset('favicon.ico') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- Safari浏览器添加到主屏幕（IOS） -->
    <link rel="icon" sizes="192x192" href="{{ admin_asset('apple-touch-icon-114x114.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Admui">
    <!-- Win8标题栏及ICON图标 -->
    <link rel="apple-touch-icon-precomposed" href="{{ admin_asset('apple-touch-icon-72x72.png') }}">
    <meta name="msapplication-TileImage" content="{{ admin_asset('apple-touch-icon-114x114.png') }}">
    <meta name="msapplication-TileColor" content="#62a8ea">
    <!-- 样式 -->
    <link rel="stylesheet" href="{{ admin_asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('css/site.css') }}">
    <!--[if lte IE 9]>
    <meta http-equiv="refresh" content="0; url='http://www.loushao.net/ie.html'" />
    <![endif]-->
</head>
<body class="page-login layout-full page-dark">
    <div class="page height-full">
        <div class="page-content height-full">
            <div class="page-brand-info vertical-align animation-slide-left hidden-xs">

            </div>
            <div class="page-login-main animation-fade">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="vertical-align">
                    <div class="vertical-align-middle">
                        <h3 class="hidden-xs">登录 Admui</h3>
                        <p class="hidden-xs">Admui 在线演示系统</p>
                        <form class="login-form fv-form fv-form-bootstrap" id="loginForm" action="loginValidate" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="sr-only" for="identity">选择身份</label>
                                <select class="form-control" id="identity">
                                    <option value="">我自己</option>
                                    <option data-divider="true"></option>
                                    <option value="xiaxuan@admui_demo" data-password="123456">夏瑄</option>
                                    <option value="zhangzhiyuan@admui_demo" data-password="123456">张致远</option>
                                    <option value="wangshiqi@admui_demo" data-password="123456">王诗琪</option>
                                    <option value="lixin@admui_demo" data-password="123456">李欣</option>
                                    <option value="qinshouren@admui_demo" data-password="123456">秦守仁</option>
                                    <option value="liuyiming@admui_demo" data-password="123456">刘一鸣</option>
                                    <option value="wangjiaqi@admui_demo" data-password="123456">王佳琪</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="username">用户名</label>
                                <input type="text" class="form-control" id="username" name="loginName" placeholder="请输入用户名">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">密码</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">验证码</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="validCode" placeholder="请输入验证码">
                                    <a class="input-group-addon padding-0 reload-vify" href="javascript:;">
                                        <img src="{{ Captcha::src() }}" height="40">
                                    </a>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">自动登录</label>
                                </div>
                                <div class="pull-right">
                                    <a href="http://www.admui.com/?sendUrl=http%3A%2F%2Fdemo.admui.com%2Flogin#register" target="_blank">注册账号</a>
                                    ·
                                    <a class="collapsed" data-toggle="collapse" href="#forgetPassword" aria-expanded="false" aria-controls="forgetPassword">
                                        找回密码
                                    </a>
                                </div>
                            </div>
                            <div class="collapse" id="forgetPassword" aria-expanded="true">
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    请返回官网点击登录按钮找回密码
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block margin-top-30">立即登录</button>
                        </form>
                    </div>
                </div>
                <footer class="page-copyright">
                    <p>海文科技 ©
                        <a href="http://www.hiver.cc" target="_blank">hiver.cc</a>
                    </p>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ admin_asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ admin_asset('js/login.js') }}"></script>
</body>
</html>