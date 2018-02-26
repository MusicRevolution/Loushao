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
        <h1 class="page-title">编辑动漫资源</h1>
        <ol class="breadcrumb hide">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/comics') }}">动漫资源管理</a>
            </li>
            <li class="active">编辑动漫资源</li>
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
                {!! Form::model($comic, [
                    'method' => 'PATCH',
                    'url' => ['/admin/comics', $comic->id],
                    'class' => '',
                    'files' => true
                ]) !!}
                @include ('admin::comics.form', ['submitButtonText' => '更新'])
                {!! Form::close() !!}
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