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
    <!-- 图标 -->
    <link rel="stylesheet" href="{{ admin_asset('css/web-icons/web-icons.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('css/font-awesome/css/font-awesome.css') }}">
    <!--插件 -->
    <link rel="stylesheet" href="{{ admin_asset('vendor/animsition/css/animsition.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('vendor/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('vendor/metismenu/Metismenu.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('css/awesome-bootstrap-checkbox.css') }}">
    @section('style')
    @show
    <!-- 自定义 -->
    <link rel="stylesheet" href="{{ admin_asset('css/site.css') }}">
    <!--[if lte IE 9]>
    <meta http-equiv="refresh" content="0; url='http://www.loushao.net/ie.html'" />
    <![endif]-->
</head>
<body style="background: #f1f4f5">
<main class="site-page">
    @yield('content')
</main>
<script src="{{ admin_asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ admin_asset('vendor/animsition/js/animsition.js') }}"></script>
    <script src="{{ admin_asset('vendor/modernizr.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/breakpoints.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/template.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/toastr/toastr.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootbox.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/screenfull/screenfull.min.js') }}"></script>
    <script src="{{ admin_asset('js/plugins/formatter/jquery.formatter.js') }}"></script>
    <script src="{{ admin_asset('js/tab.js') }}"></script>
    @section('script')
    @show
    <script>
        $(document).ready(function(){
            $('#admui-navMenu').tab('show')
            $('.site-menu').metisMenu();
            $("#hiver-navbarFullscreen").click(function(){
                $a = $(this).find("a");
                if($a.hasClass("active")) {
                    screenfull.exit();
                    $a.removeClass("active");
                } else {
                    screenfull.request();
                    $(this).find("a").addClass("active");
                }
            });
            $(".site-menu-item a").tab();
        })
        @if(Session::has('flash_message'))
            toastr.info("{{Session::get('flash_message')}}", "系统提示", {
                "positionClass": "toast-bottom-right",
                "progressBar": true
            })
        @endif
    </script>
</body>
</html>