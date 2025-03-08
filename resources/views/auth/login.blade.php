<x-logout-layout>
<div class="form-container">
  <!-- 適切なURLを入力してください -->
  {{ Form::open(['url' => 'login']) }}

  <p class="Atlas">AtlasSNSへようこそ</p>
  <div class="form-group">
  {{ Form::label('メールアドレス') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('パスワード') }}
  {{ Form::password('password',['class' => 'input']) }}
  </div>
  <div class="loginbutton">
  {{ Form::submit('ログイン') }}
  </div>
  <p class="register"><a href="register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}
</div>

</x-logout-layout>
