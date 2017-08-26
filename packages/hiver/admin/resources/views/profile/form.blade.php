<div class="form-group form-material {{ $errors->has('avatar') ? 'has-error' : ''}}">
    {!! Form::label('avatar', '头像', ['class' => 'control-label']) !!}
    {!! Form::text('avatar', null, ['class' => 'form-control dropify']) !!}
    {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', '状态', ['class' => 'control-label']) !!}
    <div class="checkbox">
        {!! Form::radio('status', '1', true) !!} 正常
        {!! Form::radio('status', '0') !!} 锁定
    </div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('follows') ? 'has-error' : ''}}">
    {!! Form::label('follows', '关注数', ['class' => 'control-label']) !!}
    {!! Form::number('follows', null, ['class' => 'form-control']) !!}
    {!! $errors->first('follows', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('logins') ? 'has-error' : ''}}">
    {!! Form::label('logins', '登录次数', ['class' => 'control-label']) !!}
    {!! Form::number('logins', null, ['class' => 'form-control']) !!}
    {!! $errors->first('logins', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('times') ? 'has-error' : ''}}">
    {!! Form::label('times', '在线总时长', ['class' => 'control-label']) !!}
    {!! Form::number('times', null, ['class' => 'form-control']) !!}
    {!! $errors->first('times', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('fans') ? 'has-error' : ''}}">
    {!! Form::label('fans', '粉丝数', ['class' => 'control-label']) !!}
    {!! Form::number('fans', null, ['class' => 'form-control']) !!}
    {!! $errors->first('fans', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '添加', ['class' => 'btn btn-primary']) !!}
</div>