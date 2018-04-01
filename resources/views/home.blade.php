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
                            <a href="{{ url('/show_comic_'.$item->id.'.html') }}" target="_blank" class="card-title">
                                <h2>{{ $item->title }}</h2>
                            </a>
                            <a href="{{ url('/show_comic_'.$item->id.'.html') }}" target="_blank" class="card-image"><img src="{{ $item->small_img }}" /></a>
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
                                <a href="{{ $ads->url }}" target="_blank" style="display: none">
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
            <a href="/show_comic_@{{= id }}.html" target="_blank" class="card-title">
                <h2>@{{= title }}</h2>
            </a>
            <a href="/show_comic_@{{= id }}.html" target="_blank" class="card-image"><img src="@{{= small_img }}" /></a>
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