@extends('admin::master')

@section('style')
@parent
  <link rel="stylesheet" href="{{ admin_asset('js/plugins/dropify/css/dropify.css') }}">
@endsection

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">编辑Banner</h1>
        <ol class="breadcrumb">
             <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/banner') }}">Banner管理</a>
            </li>
            <li class="active">编辑Banner</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($banner, [
                    'method' => 'PATCH',
                    'url' => ['/admin/banner', $banner->id],
                    'class' => '',
                    'files' => true
                ]) !!}
                @include ('admin::banner.form', ['submitButtonText' => '更新'])
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
    <script>
        $(document).ready(function(){
           $('.dropify').dropify(); 
        });
    </script>
@endsection