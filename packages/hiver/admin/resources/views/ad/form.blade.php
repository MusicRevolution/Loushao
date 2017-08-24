<div class="form-group form-material {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('img') ? 'has-error' : ''}}">
    {!! Form::label('img', 'Img', ['class' => 'control-label']) !!}
    {!! Form::file('img', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('url') ? 'has-error' : ''}}">
    {!! Form::label('url', 'Url', ['class' => 'control-label']) !!}
    {!! Form::textarea('url', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('hits') ? 'has-error' : ''}}">
    {!! Form::label('hits', 'Hits', ['class' => 'control-label']) !!}
    {!! Form::number('hits', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('hits', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '添加', ['class' => 'btn btn-primary']) !!}
</div>