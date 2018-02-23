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
    <link rel="stylesheet" href="{{ asset('css/web-icons/web-icons.css') }}">
    <!-- 自定义 -->
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <style type="text/css">
    .page-login:before {
        background-image: url("{{ asset('/images/welcome.jpg')}}");
    }
    .vertical-align-middle {
        text-align: center;
    }
    .page-login .page-content {
        padding-right: 20px;
        text-align: center;
    }
    .page-login .page-brand-info .page-brand h2 {
        margin-bottom: 160px;
    }
    </style>
</head>
<body class="page-login layout-full page-dark">
    <div class="page height-full">
        <div class="page-content height-full">
            <div class="page-brand-info vertical-align animation-slide-left hidden-xs">
                <div class="page-brand vertical-align-middle">
                    <div class="brand">
                        <img class="brand-img" src="{{ admin_asset('images/admin_logo.png') }}" height="50" alt="Admui">
                    </div>
                    <h2 class="hidden-sm">系统维护中……</h2>
                    <div class="hidden-sm">
                        <a href="http://www.hiver.cc" class="btn btn-primary margin-right-5" target="_blank"><i class="icon wb-home"></i> 返回官网</a>
                        <div class="btn-group margin-right-5">
                            <button type="button" class="btn btn-success dropdown-toggle" id="demoApp" data-toggle="dropdown" aria-expanded="false">
                                <i class="icon wb-download"></i> 合作伙伴 <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-success bullet" aria-labelledby="demoApp" role="menu">
                                <li role="presentation">
                                    <a href="http://www.dandanplay.com" role="menuitem" target="_blank"><i class="icon fa-windows"></i> 弹弹Play</a>
                                </li>
                                <li role="presentation">
                                    <a href="http://www.musicalnova.com" role="menuitem" target="_blank"><i class="icon fa-apple"></i> 音乐革命</a>
                                </li>
                            </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-info open-kf"><i class="icon wb-user"></i> 联系客服</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/bootstrap.js') }}"></script>
</body>
</html>