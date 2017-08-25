<div class="form-group form-material {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', '动画标题', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control download-title', 'required' => 'required']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('url') ? 'has-error' : ''}}">
    {!! Form::label('url', '下载地址', ['class' => 'control-label']) !!}
    {!! Form::text('url', null, ['class' => 'form-control download-url', 'required' => 'required']) !!}
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('filesize') ? 'has-error' : ''}}">
    {!! Form::label('filesize', '文件大小', ['class' => 'control-label']) !!}
    {!! Form::number('filesize', 0, ['class' => 'form-control download-filesize', 'required' => 'required']) !!}
    {!! $errors->first('filesize', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('download') ? 'has-error' : ''}}">
    {!! Form::label('download', '下载量', ['class' => 'control-label']) !!}
    {!! Form::number('download', 0, ['class' => 'form-control download-download', 'required' => 'required']) !!}
    {!! $errors->first('download', '<p class="help-block">:message</p>') !!}
</div>