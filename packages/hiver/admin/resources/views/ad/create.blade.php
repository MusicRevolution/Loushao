@extends('admin::master')

@section('style')
@parent
  <link rel="stylesheet" href="{{ admin_asset('js/plugins/dropify/css/dropify.css') }}">
@endsection

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">添加新广告</h1>
        <ol class="breadcrumb hide">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/ad') }}">广告管理</a>
            </li>
            <li class="active">添加新广告</li>
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
                {!! Form::open(['url' => '/admin/ad', 'class' => '', 'files' => true]) !!}
                @include ('admin::ad.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@parent
    <script src="{{ admin_asset('js/plugins/dropify/js/dropify.js') }}"></script>
    <script>
        $(document).ready(function(){
           $('.dropify').dropify(); 
        });
    </script>
@endsection