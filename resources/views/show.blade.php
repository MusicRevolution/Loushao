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
                <div class="card-item" style="display: none">
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
                    @if(Setting::get('setting.download', '0') == 1)
                    <ul class="download-list" id="copy-content">
                        @if($downloads != null && count($downloads) > 0)
                            @foreach($downloads as $d)
                                <!--<li><a href="magnet:?xt=urn:btih:{{ $d->url }}">[迅雷下载]{{ $d->title }}</a></li>-->
                                <li><a class="ddplay" href="ddplay:magnet:?xt=urn:btih:{{ $d->url }}">{{ $d->title }}</a></li>
                            @endforeach
                            <li>
                                <button class="btn btn-primary" id="copy">批量复制</button>
                            </li>
                        @else
                            <li>暂无动画资源</li>
                        @endif
                    </ul>
                    @else
                    <ul class="download-list">
                        <li>由于版权问题，暂不支持下载，如果有问题请联系管理员</li>
                    </ul>
                    @endif
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
                            {!! Setting::get('setting.dandanplay', '') !!}
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
                                {!! $ads->adcontent !!}
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
    </script>
@endsection