@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="index-header">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($banner as $key => $item)
                                <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            @foreach($banner as $key => $item)
                                <div class="item @if($key == 0)active @endif">
                                    <img src="{{ $item->img }}" class="img-responsive" alt="{{ $item->title }}">
                                    <div class="carousel-caption"></div>
                                </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="main-content">
                    @foreach($comics as $item)
                        <div class="card">
                            <a href="" class="card-title">
                                <h2>{{ $item->title }}</h2>
                            </a>
                            <a href="" class="card-image"><img src="{{ $item->small_img }}" /></a>
                            <p class="card-index">{{ $item->intro }}</p>
                        </div>
                    @endforeach
                </div>
                <div style="text-align: center">
                    <a id="more" class="btn btn-primary" href="javascript:void(0);" data-page="2">加载更多</a>
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
@stop

@section('footer')
    <script id="comics_list" type="text/tmpl">
        <div class="card">
            <a href="" class="card-title">
                <h2>@{{= title }}</h2>
            </a>
            <a href="" class="card-image"><img src="@{{= small_img }}" /></a>
            <p class="card-index">@{{= intro }}</p>
        </div>
    </script>
    <script type="text/javascript">
        $(function () {
            $("#more").click(function () {
                var page = $(this).data("page");
                $.ajax({
                    url : "{{ url('/api/comics') }}?page="+page,
                    dataType: 'json',
                    success: function (data) {
                        $("#comics_list").tmpl(data.data).appendTo('.main-content');
                        if(data.data == "" || data.data == undefined)
                            $("#more").hide();
                        else
                            $("#more").data("page", data.current_page + 1);
                    }
                })
            })
        })
    </script>
@endsection