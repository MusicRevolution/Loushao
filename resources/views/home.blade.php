@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="index-header">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="{{ asset('images/banner/banner1.jpg') }}" class="img-responsive" alt="Fate Zero">
                                <div class="carousel-caption"></div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('images/banner/banner2.jpg') }}" class="img-responsive" alt="Fate Zero">
                                <div class="carousel-caption"></div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('images/banner/banner3.jpg') }}" class="img-responsive" alt="Fate Zero">
                                <div class="carousel-caption"></div>
                            </div>
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

                </div>
                <a id="more" href="javascript:void(0);">加载更多</a>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            sffsaf
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title">
                            <h3>推广</h3>
                        </div>
                        <div class="card">
                            adafsdfsa
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
            <a href="" class="card-image"><img src="http://localhost/uploads/img/2018-03-11/@{{= small_img }}" /></a>
            <p class="card-index">@{{= content }}</p>
        </div>
    </script>
    <script type="text/javascript">
        $(function () {
            $("#more").click(function () {
                $.ajax({
                    url : "{{ url('/api/comics') }}",
                    dataType: 'json',
                    success: function (data) {
                        $("#comics_list").tmpl(data.data).appendTo('.main-content');
                    }
                })
            })
        })
    </script>
@endsection