<div class="form-group form-material {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', '用户名', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', '电子邮箱', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div><div class="form-group form-material {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', '密码', ['class' => 'control-label']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div><div class="form-group">
    {!! Form::label('roles', '角色列表', ['class' => 'control-label']) !!}
    <div>
        <select multiple="multiple" class="multiselect" name="roles[]">
            @foreach($roles as $role)
                <option value='{{ $role->id }}' @if($user->hasRole($role->name)) selected="selected" @endif>{{ $role->display_name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '添加', ['class' => 'btn btn-primary']) !!}
</div>