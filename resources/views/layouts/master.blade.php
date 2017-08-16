<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>漏勺网</title>
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
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarSlide" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://www.loushao.net">
                <img src="{{ asset('images/logo.png') }}" alt="Loushao" title="Loushao">
            </a>
            <a href="https://www.loushao.net/mobile" class="navbar-header-download">
                <i class="taptap-icon icon-mobile"></i>
                <i class="taptap-icon icon-mobile-download"></i>
                <span>客户端</span>
            </a>
        </div>
        <div class="navbar-collapse" id="navbarSlide">
            <div class="narbar-collapse-btn">
                <button class="btn btn-default" data-toggle="collapse" data-target="#navbarSlide" type="button">
                    <i class="taptap-icon icon-arrow-left"></i>
                </button>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li class="active">
                    <a href="#">首页</a>
                </li>
                <li>
                    <a href="#">排行榜</a>
                </li>
                <li>
                    <a href="#">安利墙</a>
                </li>
                <li>
                    <a href="#">发现</a>
                </li>
                <li>
                    <a href="#">论坛</a>
                </li>
            </ul>
        </div>
        <div class="navbar-mask" data-toggle="collapse" data-target="#navbarSlide"></div>
        <form class="navbar-form" id="search" role="search" method="get" action="#">
            <button type="submit" class="btn btn-default">
                <i class="taptap-icon icon-search"></i>
            </button>
            <div class="form-group">
                <input type="text" class="form-control js-emit" autocomplete="off" id="search-kw" name="kw" value="" placeholder="搜索...">
            </div>
        </form>
        <button class="navbar-search btn btn-default js-emit" tap-event="search.show" type="button">
            <i class="taptap-icon icon-search-white"></i>
        </button>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown navbar-notice hide">
                <button id="taptap-notification" class="btn btn-default taptap-notice-bell" data-message-total="条新消息" data-toggle="dropdown" type="button" data-unread="0" data-get-unread-total-url="https://www.taptap.com/ajax/notification/un-read-total" data-url="https://www.taptap.com/ajax/notification">
                    <i></i>
                </button>
                <div class="taptap-notice-widget dropdown-menu" id="ajaxNotifications">
                    <div class="notice-widget-loading" data-taptap-ajax-notification="loading">
                        <img src="{{ asset('images/loading.gif') }}" alt="">
                    </div>
                </div>
                <span class="taptap-notice-triangle" data-taptap-ajax-notification="triangle"></span>
            </li>
            <li class="dropdown navbar-user">
                <a href="#" class="img-circle" rel="nofollow" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('images/avator.png') }}" alt="">
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="container event-gift-container">
    @yield('content')
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 clearfix">
                <div class="pull-right">
                    <p>Contact Us</p>
                    <ul class="list-inline">
                        <li>
                            <a href="#" target="_blank" title="Facebook" rel="nofollow"></a>
                        </li>
                        <li>
                            <button class="btn" type="button" title="微信"></button>
                            <div>
                                <span class="thumbnail">
                                    <img src="https://img.taptapdada.com/market/images/c4bf2701e3ee9993e1ee0b8222480a35.jpg" alt="">
                                </span>
                            </div>
                        </li>
                        <li>
                            <button class="btn" type="button" title="QQ"></button>
                            <div>
                                <span class="thumbnail">官方QQ群: </span>
                            </div>
                        </li>
                        <li>
                            <a href="#" target="_blank" title="知乎" rel="nofollow"></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" title="微博" rel="nofollow"></a>
                        </li>
                        <li>
                            <button class="btn" type="button" title="邮箱"></button>
                            <div>
                                <span class="thumbnail">
                                    合作邮箱: <a href="mailto:delicacylee@vip.sina.com" rel="nofollow">delicacylee@vip.sina.com</a>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="pull-left">
                    <div class="footer-left-header">
                        <span class="left-header-logo"></span>
                        <div class="dropdown">
                            <button id="languageSelect" type="button" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                简体中文
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="languageSelect">
                                <li>
                                    <a href="#" rel="nofollow">English</a>
                                </li>
                                <li>
                                    <a href="#" rel="nofollow">日本語</a>
                                </li>
                                <li>
                                    <a href="#" rel="nofollow">한국어</a>
                                </li>
                                <li>
                                    <a href="#" rel="nofollow">繁體中文</a>
                                </li>
                                <li class="active">
                                    <a href="#" rel="nofollow">简体中文</a>
                                </li>
                            </ul>
                            <span class="link">
                                <a href="#" rel="nofollow">开发者中心</a>
                            </span>
                            <span class="link">
                                <a href="#" rel="nofollow">广告投放</a>
                            </span>
                            <span class="link">
                                <a href="#" rel="nofollow">关于我们</a>
                            </span>
                        </div>
                    </div>
                    <p>Discover superb animations.</p>
                    <span>
                        <span>Copyright © 2017 <a href="https://www.loushao.net">Loushao</a>. All rights Reserved.</span>
                        <br>
                        <span>适龄提示：本公司产品适合10周岁以上玩家使用</span>
                        <span>&nbsp;&nbsp;<a href="#" target="_blank" rel="nofollow">未成年人家长监护</a>&nbsp;&nbsp;<a href="#" rel="nofollow">隐私权和条款</a></span>
                        <br>
                        <span><a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">XXX</a>&nbsp;&nbsp;XXX&nbsp;&nbsp;</span>
                        天津海文科技有限公司
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="taptap-button-top" data-taptap-widgets="container" data-taptap-go="top" style="display: block;">
    <i></i>
</section>
<script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/bootstrap.js') }}"></script>
</body>
</html>