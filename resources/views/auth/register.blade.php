<x-logout-layout>
    <!-- 適切なURLを入力してください -->
{{ Form::open(['url' => 'register']) }}
<!-- <Form action=" " method=" "></Form> -->

<div class="form-container ">
<p class="Atlas">新規ユーザー登録</p>
    <div class="form-group">
        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}

        {{ Form::label('メールアドレス') }}
        {{ Form::email('email',null,['class' => 'input']) }}

        {{ Form::label('パスワード') }}
        {{ Form::text('password',null,['class' => 'input']) }}

        {{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null,['class' => 'input']) }}
    </div>
<div class="submit-btn">
{{ Form::submit('新規登録', ['class' => 'btn btn-danger resister-button']) }}
</div>
<p class="register"><a href="login">ログイン画面へ戻る</a></p>
</div>
{!! Form::close() !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
@endif

</x-logout-layout>
