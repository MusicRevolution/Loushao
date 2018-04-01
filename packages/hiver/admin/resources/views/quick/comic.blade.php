@extends('admin::master')

@section('style')
    @parent
    <link rel="stylesheet" href="{{ admin_asset('js/plugins/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('vendor/wysibb/theme/default/wbbtheme.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('vendor/wysibb/theme/hiver/wbbtheme.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('vendor/wysibb/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="page animation-fade page-forms">
        <div class="page-header">
            <h1 class="page-title">发布资源（快捷）</h1>
            <ol class="breadcrumb hide">
                <li>
                    <a href="{{ url('/admin') }}">首页</a>
                </li>
                <li>
                    <a href="{{ url('/admin/comics') }}">动漫资源管理</a>
                </li>
                <li class="active">发布资源（快捷）</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {!! Form::open(['url' => '/admin/quick/saveComic', 'class' => '', 'files' => true]) !!}
                        <div class="form-group form-material {{ $errors->has('title') ? 'has-error' : ''}}">
                            {!! Form::label('title', '动漫标题', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('small_img') ? 'has-error' : ''}}">
                            {!! Form::label('small_img', '图片（小）', ['class' => 'control-label']) !!}
                            {!! Form::file('small_img', ['class' => 'form-control dropify', 'data-default-file' => $small_img, 'data-show-remove' => false]) !!}
                            {!! $errors->first('small_img', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('big_img') ? 'has-error' : ''}}">
                            {!! Form::label('big_img', '图片（大）', ['class' => 'control-label']) !!}
                            {!! Form::file('big_img', ['class' => 'form-control dropify', 'data-default-file' => $big_img, 'data-show-remove' => false]) !!}
                            {!! $errors->first('big_img', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('score') ? 'has-error' : ''}}">
                            {!! Form::label('score', '总评分', ['class' => 'control-label']) !!}
                            {!! Form::number('score', 0, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('hits') ? 'has-error' : ''}}">
                            {!! Form::label('hits', '点击率', ['class' => 'control-label']) !!}
                            {!! Form::number('hits', 0, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('hits', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('intro') ? 'has-error' : ''}}">
                            {!! Form::label('intro', '动漫简介', ['class' => 'control-label']) !!}
                            {!! Form::textarea('intro', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! $errors->first('intro', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('content') ? 'has-error' : ''}}">
                            {!! Form::label('content', '详细说明', ['class' => 'control-label']) !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control editor']) !!}
                            {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('intro') ? 'has-error' : ''}}">
                            {!! Form::label('download_list', '资源下载', ['class' => 'control-label']) !!}
                            {!! Form::textarea('download_list', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('download_list', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('comment') ? 'has-error' : ''}}">
                            {!! Form::label('comment', '评论总数', ['class' => 'control-label']) !!}
                            {!! Form::number('comment', 0, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('topic') ? 'has-error' : ''}}">
                            {!! Form::label('topic', '论坛相关总数', ['class' => 'control-label']) !!}
                            {!! Form::number('topic', 0, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('tags') ? 'has-error' : ''}}">
                            {!! Form::label('tags', '动漫标签', ['class' => 'control-label']) !!}
                            {!! Form::text('tags', null, ['class' => 'form-control tagsinput', 'style' => 'width: 100%']) !!}
                            {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('country') ? 'has-error' : ''}}">
                            {!! Form::label('country', '所属国家', ['class' => 'control-label']) !!}
                            {!! Form::text('country', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                        </div><div class="form-group form-material {{ $errors->has('source') ? 'has-error' : ''}}">
                            {!! Form::label('source', '来源', ['class' => 'control-label']) !!}
                            {!! Form::select('source', array('0' => '无', '1' => '编辑推荐'), null, ['class' => 'form-control']) !!}
                            {!! $errors->first('source', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '继续添加', ['class' => 'btn btn-primary']) !!}
                            &nbsp;&nbsp;
                            <a href="{{ url('/admin/comics') }}" class="btn btn-warning">返回资源列表</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade hiver-modal" data="0" id="insertAnimationModal" role="dialog" aria-labelledby="insertAnimationModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="insertAnimationModalLabel">添加动画</h4>
                </div>
                <div class="modal-body">
                    <select class="form-control" id="animation_select2" style="width: 100%;">
                        <option value="0" selected="selected"></option>
                    </select>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">添加</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{ admin_asset('js/plugins/dropify/js/dropify.js') }}"></script>
    <script src="{{ admin_asset('vendor/wysibb/jquery.wysibb.min.js') }}"></script>
    <script src="{{ admin_asset('vendor/wysibb/lang/cn.js') }}"></script>
    <script src="{{ admin_asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ admin_asset('vendor/wysibb/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        function formatRepo (repo) {
            if (repo.loading) return repo.text;
            var markup = repo.full_name ;
            return markup;
        }

        function formatRepoSelection (repo) {
            return repo.full_name || repo.text;
        }

        $(document).ready(function() {
            $("#animation_select2").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }};
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
            // 点击确定
            $(".btn-primary").click(function(){
                var id = $("#animation_select2").val();
                var title = $("#animation_select2").select2("data")[0].full_name;
                if(id > 0) {
                    var data = '<img data-app-id="'+id+'" data-app-title="'+title.trim()+'" src="1.jpg">';
                    $(".editor").insertAtCursor(data);
                }
            });
            var mymodal = function(cmd, opt, queryState) {
                $('#insertAnimationModal').modal();
                if (queryState) {
                    this.wbbRemoveCallback(cmd, true);
                }
            }

            var wbbOpt = {
                lang: "cn",
                img_uploadurl: "{{ admin_asset('vendor/wysibb/php/iupload.php') }}",
                imgupload: true,
                buttons: "bold,italic,underline,|,img,link,|,animation,removeformat",
                allButtons: {
                    animation: {
                        title: '插入动漫',
                        buttonText: "animation",
                        modal: mymodal,
                        transform: {
                            '<img data-app-id="{ID}" data-app-title="{TITLE}" src="1.jpg" />':'[animation={ID}]{TITLE}[/animation]'
                        }
                    },
                    img: {
                        title: '插入图片',
                        buttonText: '<span class="fonticon ve-tlb-img1">\uE006</span>',
                        hotkey: 'ctrl+shift+1',
                        addWrap: true,
                        modal: {
                            title: '插入图片',
                            width: "600px",
                            tabs: [
                                {
                                    html: '<div id="imguploader">'
                                    +'<form id="fupform" class="upload" action="{img_uploadurl}" method="post" enctype="multipart/form-data" target="fupload">'
                                    +'<input type="hidden" name="iframe" value="1"/>'
                                    +'<input type="hidden" name="idarea" value="img" />'
                                    +'<div class="fileupload">'
                                    +'<input id="fileupl" class="file inp-text" type="file" name="img" />'
                                    +'<button id="nicebtn" class="wbb-button">选择文件</button>'
                                    +'</div></form></div>'
                                    +'<iframe id="fupload" name="fupload" src="about:blank" frameborder="0" style="width:0px;height:0px;display:none"></iframe></div>'
                                }
                            ],
                            onLoad: this.imgLoadModal,
                            onSubmit: function() {}
                        },
                        transform: {
                            '<img src="{{ url('/') }}/{SRC}" />':"[img]{{ url('/') }}/{SRC}[/img]",
                            '<img src="{{ url('/') }}/{SRC}" width="{WIDTH}" height="{HEIGHT}"/>':"[img width={WIDTH},height={HEIGHT}]{{ url('/') }}/{SRC}[/img]"
                        }
                    }
                }
            }
            $(".editor").wysibb(wbbOpt);
            $('.dropify').dropify();
            $('.tagsinput').tagsinput();
        });
    </script>
@endsection