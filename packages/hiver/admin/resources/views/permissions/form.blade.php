<div class="form-group form-material {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', '权限名', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('display_name') ? 'has-error' : ''}}">
    {!! Form::label('display_name', '显示名称', ['class' => 'control-label']) !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', '描述', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '添加', ['class' => 'btn btn-primary']) !!}
    &nbsp;&nbsp;
    <a href="{{ url('/admin/permissions') }}" class="btn btn-warning">返回</a>
</div>