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
    <!-- 自定义 -->
    <link rel="stylesheet" href="{{ admin_asset('css/site.css') }}">
    <!--[if lte IE 9]>
    <meta http-equiv="refresh" content="0; url='http://www.loushao.net/ie.html'" />
    <![endif]-->
</head>
<body class="site-contabs-open site-menubar-unfold">
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided" data-toggle="menubar">
                <span class="sr-only">切换菜单</span> <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-target="#hiver-navbarCollapse" data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                <img class="navbar-brand-logo visible-lg visible-xs navbar-logo" src="http://cdn.admui.com/demo/1.1.0/images/logo-white.svg" title="Hiver">
                <img class="navbar-brand-logo hidden-xs hidden-lg navbar-logo-mini" src="http://cdn.admui.com/demo/1.1.0/images/logo-white-min.svg" title="Hiver">
            </div>
        </div>
        <div class="navbar-container container-fluid">
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="hiver-navbarCollapse">
                <ul class="nav navbar-toolbar navbar-left">
                    <li class="hidden-float">
                        <a data-toggle="menubar" class="hidden-float" href="javascript:;" role="button" id="hiver-toggleMenubar">
                            <i class="icon hamburger hamburger-arrow-left">
                                <span class="sr-only">切换目录</span>
                                <span class="hamburger-bar"></span>
                            </i>
                        </a>
                    </li>
                    <li class="navbar-menu nav-tabs-horizontal nav-tabs-animate is-load" id="hiver-navMenu">
                        <ul class="nav navbar-toolbar nav-tabs" role="tablist">
                            <!-- 顶部菜单 -->
                            <li role="presentation" class="active">
                                <a data-toggle="tab" href="#hiver-navTabsItem-1" aria-controls="hiver-navTabsItem-1" role="tab">
                                    <i class="icon wb-library"></i> <span>CMS系统</span>
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a data-toggle="tab" href="#hiver-navTabsItem-2" aria-controls="hiver-navTabsItem-2" role="tab">
                                    <i class="icon wb-settings"></i> <span>系统管理</span>
                                </a>
                            </li>
                            <li class="dropdown" id="hiver-navbarSubMenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" data-animation="slide-bottom" aria-expanded="true" role="button">
                                    <i class="icon wb-more-vertical"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="no-menu" role="presentation">
                                        <a href="/sitemap" target="_blank" role="menuitem" data-pjax>
                                            <i class="icon wb-list-numbered"></i><span>网站地图</span>
                                        </a>
                                    </li>
                                    <li class="no-menu" role="presentation">
                                        <a href="/system/menu" target="_blank" role="menuitem" data-pjax>
                                            <i class="icon wb-wrench"></i><span>菜单管理</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="open-kf" id="hiver-service" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="在线咨询">
                        <a class="icon wb-user" href="#" role="button">
                            <span class="sr-only">在线咨询</span>
                        </a>
                    </li>
                    <li class="hidden-xs" id="hiver-navbarFullscreen" data-toggle="tooltip" data-placement="bottom" title="全屏">
                        <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                            <span class="sr-only">全屏</span>
                        </a>
                    </li>
                    <li>
                        <a class="fa fa-sign-out" id="admui-signOut" data-ctx="" data-user="15" href="/system/logout" role="button">
                            <span class="sr-only">退出</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="site-menubar site-menubar-dark">
        <div class="site-menubar-body">
            <div class="tab-content height-full" id="hiver-navTabs">
                <div class="tab-pane animation-fade height-full active" id="hiver-navTabsItem-1" role="tabpanel">
                    <div>
                        <ul class="site-menu">
                            <li class="site-menu-category">UI 示例</li>
                            <li class="site-menu-item has-sub">
                                <a href="javascript:;">
                                    <i class="site-menu-icon fa fa-laptop" aria-hidden="true"></i>
                                    <span class="site-menu-title">布局</span><span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item has-sub">
                                        <a href="javascript:;">
                                            <span class="site-menu-title">栅格</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <!-- 五级菜单 -->
                                            <li class="site-menu-item ">
                                                <a data-pjax href="/components/layouts/grids" target="_blank">
                                                    <span class="site-menu-title">基本栅格</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item ">
                                                <a data-pjax href="/components/layouts/layout-grid" target="_blank">
                                                    <span class="site-menu-title">布局栅格</span>
                                                </a>
                                            </li>
                                            <!-- 五级菜单 -->
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane animation-fade height-full" id="hiver-navTabsItem-2" role="tabpanel">
                    <div>
                        <ul class="site-menu">
                            <li class="site-menu-category">UI 示例1</li>
                            <li class="site-menu-item has-sub">
                                <a href="javascript:;">
                                    <i class="site-menu-icon fa fa-laptop" aria-hidden="true"></i>
                                    <span class="site-menu-title">布局</span><span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item has-sub">
                                        <a href="javascript:;">
                                            <span class="site-menu-title">栅格</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <!-- 五级菜单 -->
                                            <li class="site-menu-item ">
                                                <a data-pjax href="/components/layouts/grids" target="_blank">
                                                    <span class="site-menu-title">基本栅格</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item ">
                                                <a data-pjax href="/components/layouts/layout-grid" target="_blank">
                                                    <span class="site-menu-title">布局栅格</span>
                                                </a>
                                            </li>
                                                <!-- 五级菜单 -->
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="site-page">
        <div class="page-container" id="admui-pageContent">
            <div class="page animation-fade page-index">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <footer class="site-footer">
        <div class="site-footer-legal">海文科技 ©
            <a href="http://www.hiver.cc" target="_blank">hiver.cc</a>
        </div>
        <div class="site-footer-right">
            当前版本：v1.1.0
            <a class="margin-left-5" data-toggle="tooltip" title="" href="http://www.hiver.cc/buy" target="_blank" data-original-title="升级">
                <i class="icon fa-cloud-upload"></i>
            </a>
        </div>
    </footer>
    <script src="{{ admin_asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ admin_asset('vendor/animsition/js/animsition.js') }}"></script>
    <script src="{{ admin_asset('vendor/modernizr.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/breakpoints.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/template.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/toastr/toastr.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootbox.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#admui-navMenu').tab('show')
        })
    </script>
</body>
</html>