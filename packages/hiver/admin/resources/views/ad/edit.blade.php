@extends('admin::master')

@section('content')
<div class="page animation-fade page-forms">
    <div class="page-header">
        <h1 class="page-title">Ad管理</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin') }}">首页</a>
            </li>
            <li>
                <a href="{{ url('/admin/ad') }}">Ad管理</a>
            </li>
            <li class="active">编辑Ad</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">编辑Ad #{{ $ad->id }}</div>
            <div class="panel-body">
                <a href="{{ url('/admin/ad') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($ad, [
                    'method' => 'PATCH',
                    'url' => ['/admin/ad', $ad->id],
                    'class' => '',
                    'files' => true
                ]) !!}
                @include ('admin::ad.form', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
