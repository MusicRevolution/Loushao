<form method="POST" action="{{ url('password/email') }}">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <button type="submit">
            发送密码重置链接
        </button>
    </div>
</form>