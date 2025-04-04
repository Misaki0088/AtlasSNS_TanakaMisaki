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

<div class="profile-header">
    <div class="profile_icon_name">
        {{ Form::open(['url' => '/profile/update', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
        @if( Auth::user()->icon_image!="icon1.png")
        <img src="{{ asset('storage/' . Auth::user()->icon_image) }}"height="60" width="60">
        @else
        <img src="{{ asset('images/icon1.png') }}">
        @endif

        <div class="username-container">
            {{ Form::label('ユーザー名') }}
            {{ Form::text('username',Auth::user()->username,['class' => 'input']) }}
        </div>
    </div>

        <div class="mail-container">
        {{ Form::label('メールアドレス') }}
        {{ Form::email('email',Auth::user()->email,['class' => 'input']) }}
        <div class="mail-container">

        <div class="password-container">
            {{ Form::label('パスワード') }}
            {{ Form::password('password',null,['class' => 'input']) }}
        </div>

        <div class="password-confirmation-container">
            {{ Form::label('パスワード確認') }}
            {{ Form::password('password_confirmation',null,['class' => 'input']) }}
        </div>

        <div class="bio-container">
            {{ Form::label('自己紹介') }}
            {{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}
        </div>

        <div class="file-container">
            {{ Form::label('プロフィール画像') }}
            {{ Form::file('IconImage', ['class' => 'input']) }}
        </div>

        <div class="submit-container">
            {{ Form::submit('更新', ['class' => 'btn btn-danger new-button']) }}
        </div>

        {{ Form::close() }}
</div>
</x-login-layout>
