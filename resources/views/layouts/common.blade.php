<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>{{ Setting::get('setting.title', '天津海文科技有限公司') }}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="{{ Setting::get('setting.keywords', '天津海文科技有限公司') }}" />
    <meta name="description" content="{{ Setting::get('setting.description', '天津海文科技有限公司') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 移动设备 viewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
    <meta name="author" content="hiver.cc">
    <!-- 360浏览器默认使用Webkit内核 -->
    <meta name="renderer" content="webkit">
    <!-- 禁止百度SiteAPP转码 -->
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <!-- Chrome浏览器添加桌面快捷方式（安卓） -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- Safari浏览器添加到主屏幕（IOS） -->
    <link rel="icon" sizes="192x192" href="{{ asset('apple-touch-icon-114x114.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Admui">
    <!-- Win8标题栏及ICON图标 -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('apple-touch-icon-72x72.png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('apple-touch-icon-114x114.png') }}">
    <meta name="msapplication-TileColor" content="#62a8ea">
    <!-- 样式 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">
    <!-- 图标 -->
    <link rel="stylesheet" href="{{ asset('css/web-icons/web-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.css') }}">
    <!--插件 -->
    <link rel="stylesheet" href="{{ asset('vendor/animsition/css/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.css') }}">
    <!-- 自定义 -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--[if lte IE 9]>
    <meta http-equiv="refresh" content="0; url='http://www.loushao.net/ie.html'" />
    <![endif]-->
</head>
<body>
<div class="top">

</div>
@yield('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 footer clearfix">
            <div class="footleft pull-left">
                <div class="footlink">
                    <a href="http://www.loushao.net">漏勺网</a>
                    <span>|</span>
                    <a href="http://www.dandanplay.com">弹弹play</a>
                    <span>|</span>
                    <a href="#">官方微博</a>
                    <span>|</span>
                    <a href="http://www.hiver.cc">海文科技</a>
                    <span>|</span>
                    <a href="http://www.musicalnova.com">音乐革命</a>
                </div>
                <div class="copyright">
                    <p>{{ Setting::get('setting.icp', '天津海文科技有限公司') }}</p>
                    <p>{{ Setting::get('setting.copyright', '天津海文科技有限公司') }}</p>
                </div>
            </div>
            <div class="wechat pull-right">

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/bootstrap.js') }}"></script>
</body>
</html>