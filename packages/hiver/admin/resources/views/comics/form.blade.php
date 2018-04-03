<div class="form-group form-material {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', '动漫标题', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('small_img') ? 'has-error' : ''}}">
    {!! Form::label('small_img', '图片（小）', ['class' => 'control-label']) !!}
    {!! Form::file('small_img', ['class' => 'form-control dropify', 'data-default-file' => $small_img, 'data-show-remove' => false]) !!}
    {!! $errors->first('small_img', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('big_img') ? 'has-error' : ''}}">
    {!! Form::label('big_img', '图片（大）', ['class' => 'control-label']) !!}
    {!! Form::file('big_img', ['class' => 'form-control dropify', 'data-default-file' => $big_img, 'data-show-remove' => false]) !!}
    {!! $errors->first('big_img', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('score') ? 'has-error' : ''}}">
    {!! Form::label('score', '总评分', ['class' => 'control-label']) !!}
    {!! Form::number('score', 0, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('hits') ? 'has-error' : ''}}">
    {!! Form::label('hits', '点击率', ['class' => 'control-label']) !!}
    {!! Form::number('hits', 0, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('hits', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('intro') ? 'has-error' : ''}}">
    {!! Form::label('intro', '动漫简介', ['class' => 'control-label']) !!}
    {!! Form::textarea('intro', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    {!! $errors->first('intro', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', '详细说明', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control editor']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('anidbid') ? 'has-error' : ''}}">
    {!! Form::label('anidbid', '弹弹Play关联', ['class' => 'control-label']) !!}
    {!! Form::select('anidbid', array(), null, ['class' => 'form-control']) !!}
    {!! $errors->first('anidbid', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('comment') ? 'has-error' : ''}}">
    {!! Form::label('comment', '评论总数', ['class' => 'control-label']) !!}
    {!! Form::number('comment', 0, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('topic') ? 'has-error' : ''}}">
    {!! Form::label('topic', '论坛相关总数', ['class' => 'control-label']) !!}
    {!! Form::number('topic', 0, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('tags') ? 'has-error' : ''}}">
    {!! Form::label('tags', '动漫标签', ['class' => 'control-label']) !!}
    {!! Form::text('tags', null, ['class' => 'form-control tagsinput', 'style' => 'width: 100%']) !!}
    {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('country') ? 'has-error' : ''}}">
    {!! Form::label('country', '所属国家', ['class' => 'control-label']) !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('source') ? 'has-error' : ''}}">
    {!! Form::label('source', '来源', ['class' => 'control-label']) !!}
    {!! Form::select('source', array('0' => '无', '1' => '编辑推荐'), null, ['class' => 'form-control']) !!}
    {!! $errors->first('source', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '添加', ['class' => 'btn btn-primary']) !!}
    &nbsp;&nbsp;
    <a href="{{ url('/admin/comics') }}" class="btn btn-warning">返回</a>
</div>