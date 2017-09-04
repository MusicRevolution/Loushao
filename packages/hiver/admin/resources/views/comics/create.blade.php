@extends('admin::master')

@section('style')
@parent
  <link rel="stylesheet" href="{{ admin_asset('js/plugins/dropify/css/dropify.css') }}">
  <link rel="stylesheet" href="{{ admin_asset('vendor/wysibb/theme/default/wbbtheme.css') }}">
  <link rel="stylesheet" href="{{ admin_asset('vendor/wysibb/theme/hiver/wbbtheme.css') }}">
  <link rel="stylesheet" href="{{ admin_asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">添加动漫资源</h1>
        <ol class="breadcrumb hide">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/comics') }}">动漫资源管理</a>
            </li>
            <li class="active">添加动漫资源</li>
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
                {!! Form::open(['url' => '/admin/comics', 'class' => '', 'files' => true]) !!}
                @include ('admin::comics.form')
                {!! Form::close() !!}
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
    <script>
        var wbbOpt = {
            lang: "cn",
            img_uploadurl: "{{ admin_asset('vendor/wysibb/php/iupload.php') }}",
            imgupload: true,
            buttons: "bold,italic,underline,|,img,link,|,removeformat",
            allButtons: {
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
        $(document).ready(function(){
            $('.dropify').dropify();
            $(".editor").wysibb(wbbOpt);
            $('.tagsinput').tagsinput();
        });
    </script>
@endsection