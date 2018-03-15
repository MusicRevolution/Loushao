@extends('layouts/master')
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
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@stop

@section('footer')

@endsection