<div class="form-group form-material {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', '标题', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('img') ? 'has-error' : ''}}">
    {!! Form::label('img', '图片', ['class' => 'control-label']) !!}
    {!! Form::file('img', ['class' => 'form-control dropify', 'data-default-file' => $img, 'data-show-remove' => false]) !!}
    {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('url') ? 'has-error' : ''}}">
    {!! Form::label('url', 'URL地址', ['class' => 'control-label']) !!}
    {!! Form::text('url', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('hits') ? 'has-error' : ''}}">
    {!! Form::label('hits', '点击数', ['class' => 'control-label']) !!}
    {!! Form::number('hits', 0, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('hits', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', '状态', ['class' => 'control-label']) !!}
    <div class="radio-list">
        <div class="radio">
            {!! Form::radio('status', '1', true, ['id' => 'radio1']) !!}
            <label for="radio1">
                正常
            </label>
        </div>
        <div class="radio">
            {!! Form::radio('status', '0', false, ['id' => 'radio2']) !!}
            <label for="radio2">
                锁定
            </label>
        </div>
    </div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '添加', ['class' => 'btn btn-primary']) !!}
    &nbsp;&nbsp;
    <a href="{{ url('/admin/banner') }}" class="btn btn-warning">返回</a>
</div>