<x-login-layout>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- スマホ・タブレット対応 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
@if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif


{{ Form::open(['url' => '/profile/update']) }}

{{ Form::label('ユーザー名') }}
{{ Form::text('username',Auth::user()->username,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::email('email',Auth::user()->email,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::label('自己紹介') }}
{{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}

<!-- 画像アップロードフィールド -->
{{ Form::label('プロフィール画像') }}
<img src="{{ asset('storage/app/public' . Auth::user()->profile_image) }}">
{{ Form::file('profile_image', ['class' => 'input']) }}



{{ Form::submit('更新') }}

{{ Form::close() }}

</x-login-layout>
