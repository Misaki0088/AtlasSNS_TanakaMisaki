<x-login-layout>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- スマホ・タブレット対応 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
{{ Form::open(['url' => '/profile/update']) }}

{{ Form::text('username',Auth::user()->username,['class' => 'input']) }}

{{ Form::email('email',Auth::user()->email,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}

{{ Form::submit('更新') }}

{{ Form::close() }}

</x-login-layout>
