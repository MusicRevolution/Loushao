@extends('layouts/master')
@section('header')
    <link rel="stylesheet" href="{{ asset('js/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-star-rating/css/star-rating.min.css') }}">
@endsection
@section('content')
    <section class="hiver-breadcrumb">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><span>你的位置:</span></li>
                    <li><a href="{{ url('/') }}">首页</a></li>
                    <li><a href="{{ url('/') }}">资源下载</a></li>
                    <li class="active"><span>{{ $comic->title }}</span></li>
                    <span class="breadcrumb-end"></span>
                </ol>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card-item">
                    <img src="{{ $comic->big_img }}"  />
                </div>
                <div class="card">
                    <h3>{{ $comic->title }}</h3>
                    <div class="myquote">{!! $comic->content !!}</div>
                </div>
                <div class="card">
                    <div class="review-list-title">
                        <h3>资源下载</h3>
                    </div>
                    <ul class="download-list">
                        @if($downloads != null && count($downloads) > 0)
                            @foreach($downloads as $d)
                                <li><a href="magnet:{{ $d->url }}">[迅雷下载]{{ $d->title }}</a></li>
                                <li><a class="ddplay" href="ddplay:magnet:{{ $d->url }}">[弹弹play]{{ $d->title }}</a></li>
                            @endforeach
                        @else
                            <li>暂无动画资源</li>
                        @endif
                    </ul>
                </div>
                <div class="card">
                    <div class="review-list-title">
                        <h3>推广</h3>
                    </div>
                    <div class="card-ad">
                        @if($ads != null)
                            <a href="{{ $ads->url }}" target="_blank">
                                <img src="{{ $ads->img }}" alt="{{ $ads->title }}" />
                            </a>
                        @endif
                    </div>
                </div>
                <div class="review">
                    <div class="review-list">
                        <div class="review-rating">
                            <div class="review-list-container">
                                <div class="review-other">

                                </div>
                                <div class="review-rating-total">

                                </div>
                            </div>
                        </div>
                        <div class="review-add">
                            @if(!Auth::check())
                            <div class="review-add-login">
                                <img src="{{ asset('images/avator.png') }}" alt="" class="img-circle" style="margin-bottom: 10px;">
                                <p>请先<a href="{{ url('/auth/login') }}">登录</a>后，再进行操作</p>
                            </div>
                            @else
                            <textarea class="form-control" name="coment" cols="30" rows="6" placeholder="请写下你的宝贵意见" readonly="readonly"></textarea>
                            <div style="margin-top: 10px">
                                <button class="btn btn-primary" type="button">提交评论</button>
                            </div>
                            @endif
                        </div>
                        <div class="review-list-title">
                            <h3>用户评价</h3>
                        </div>
                        <ul class="reviewList">
                            <li class="review-list-item">
                                评价功能待开放
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card dandanplay-card">
                            <h1>能追番的播放器</h1>
                            <p> 免费下载，立即体验视频播放器和在线追番工具的完美结合</p>
                            <!-- <a class="button home" href="http://www.loushao.net/dandanplay/dandanplay_7.4.2.exe" style="margin-right: 5px;">Windows版</a> -->
                            <a class="button home" href="https://pan.baidu.com/s/1AcatXvPJLEmvirDp8FHSaQ" target="_blank" style="margin-right: 5px;">Windows版</a>
                            <a class="button home" href="https://itunes.apple.com/cn/app/id1189757764" style="margin-right: 5px;">iOS版</a>
                            <a class="button home" href="https://www.coolapk.com/apk/cn.swt.danmuplayer">Android版</a>
                            <p class="other-down">
                                <a href="http://pan.baidu.com/s/1o7FWGCa#path=%252F%25E5%25BC%25B9%25E5%25BC%25B9play" target="_blank">macOS版</a> |
                                <a href="https://www.microsoft.com/store/apps/9nwpvd7t1hpw" target="_blank">UWP版</a> |
                                <a href="http://pan.baidu.com/s/1skFQG6T#path=%252F%25E5%25BC%25B9%25E5%25BC%25B9play%252F%25E5%25BC%25B9%25E5%25BC%25B9play%25E5%25AE%2598%25E6%2596%25B9%25E7%2589%2588%25E6%259C%25AC" target="_blank">从网盘下载</a>
                            </p>
                            <!--wx image-->
                            <div id="wxImg" style="display: none; position: absolute;"><img src="images/qrcode_weixinmp.jpg" width="256" height="256" border="0" alt=""></div>
                            <div class="memo">最新版本: v7.4.2</div>
                            <div class="memo">发布日期: 2018年2月28日</div>
                            <div class="memo">系统需求: Windows Vista/7/8/10</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-main-title">
                            <h3>推广</h3>
                        </div>
                        <div class="card-item">
                            @if($ads != null)
                                <a href="{{ $ads->url }}" target="_blank">
                                    <img src="{{ $ads->img }}" alt="{{ $ads->title }}" />
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <iframe id="hiddenIframe" src="about:blank" style="display:none"></iframe>
@stop

@section('footer')
    <script src="{{ asset('js/plugins/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-star-rating/js/star-rating.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-star-rating/js/star-rating.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-star-rating/js/locales/zh.js') }}"></script>
    <script>
        //Default State
        var isSupported = false;

        //Helper Methods
        function getUrl(){
            return "ddplay://test";
        }

        function result(e){
            if(!isSupported){
                alert("您尚未安装播放器，请先下载弹弹play播放器。");
                e.preventDefault();
            }
        }

        //Handle Click on Launch button
        $(document).ready(function(){
            $('.image-link').magnificPopup({type:'image'});
            $('.ddplay').click(function(e){
                if(/firefox/.test(navigator.userAgent.toLowerCase())){
                    launchMozilla(e);
                }else if(/chrome/.test(navigator.userAgent.toLowerCase())){
                    launchChrome(e);
                }else if(/msie/.test(navigator.userAgent.toLowerCase())){
                    launchIE(e);
                }
            });
        });

        //Handle IE
        function launchIE(ev){
            var url = getUrl(),
                aLink = $('#hiddenLink')[0];
            isSupported = false;
            aLink.href = url;
            //Case 1: protcolLong
            console.log("Case 1");
            if(navigator.appName=="Microsoft Internet Explorer"
                && (aLink.protocolLong=="Unknown Protocol" || aLink.protocolLong == "未知协议" || aLink.protocolLong == "未知协议")){
                isSupported = false;
                result(ev);
                return;
            }

            //IE10+
            if(navigator.msLaunchUri){
                navigator.msLaunchUri(url,
                    function(){ isSupported = true; result(ev); }, //success
                    function(){ isSupported=false; result(ev);  }  //failure
                );
                return;
            }

            //Case2: Open New Window, set iframe src, and access the location.href
            console.log("Case 2");
            var myWindow = window.open('','','width=0,height=0');
            myWindow.document.write("<iframe src='"+ url + "></iframe>");
            setTimeout(function(){
                try{
                    myWindow.location.href;
                    isSupported = true;
                }catch(e){
                    //Handle Exception
                }
                if(isSupported){
                    myWindow.setTimeout('window.close()', 100);
                }else{
                    myWindow.close();
                }
                result(ev);
            }, 100)
        };

        //Handle Firefox
        function launchMozilla(ev){
            var url = getUrl(),
                iFrame = $('#hiddenIframe')[0];
            isSupported = false;
            //Set iframe.src and handle exception
            try{
                iFrame.contentWindow.location.href = url;
                isSupported = true;
                result(ev);
            }catch(e){
                //FireFox
                if (e.name == "NS_ERROR_UNKNOWN_PROTOCOL"){
                    isSupported = false;
                    result(ev);
                }
            }
        }

        //Handle Chrome
        function launchChrome(ev){
            var url = getUrl(),
                protcolEl = $('.ddplay')[0];
            isSupported = false;
            protcolEl.focus();
            protcolEl.onblur = function(){
                isSupported = true;
                console.log("Text Field onblur called");
            };
            //will trigger onblur
            location.href = url;
            //Note: timeout could vary as per the browser version, have a higher value
            setTimeout(function(){
                protcolEl.onblur = null;
                result(ev)
            }, 500);
        }
    </script>
@endsection