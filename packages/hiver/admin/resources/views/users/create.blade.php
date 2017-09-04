@extends('admin::master')

@section('style')
    @parent
    <link rel="stylesheet" href="{{ admin_asset('vendor/lou-multi-select/css/multi-select.css') }}">
@endsection

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">添加新用户</h1>
        <ol class="breadcrumb hide">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}">用户管理</a>
            </li>
            <li class="active">添加新用户</li>
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
                {!! Form::open(['url' => '/admin/users', 'class' => '', 'files' => true]) !!}
                @include ('admin::users.form')  
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script src="{{ admin_asset('vendor/lou-multi-select/js/jquery.multi-select.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.multiselect').multiSelect();
        });
    </script>
@endsection