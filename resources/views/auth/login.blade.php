<x-logout-layout>

<div class="form-container">
    {{ Form::open(['url' => 'login']) }}

    <p class="Atlas">AtlasSNSへようこそ</p>
  <div class="form-group">
    {{ Form::label('メールアドレス') }}
    {{ Form::text('email',null,['class' => 'input']) }}
    {{ Form::label('パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>

    {{ Form::submit('ログイン', ['class' => 'btn btn-danger login-button']) }}

  <p class="register"><a href="register">新規ユーザーの方はこちら</a></p>
</div>
  {!! Form::close() !!}

</x-logout-layout>
