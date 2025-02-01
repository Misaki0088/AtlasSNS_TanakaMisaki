<x-login-layout>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- スマホ・タブレット対応 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>検索フォーム</title>
</head>
<body>

    {{ Form::open(['url' => '/search','method' => 'GET']) }}
        @csrf

    <input type="text" name="search" value="{{ request('search') }}" class="search_form" placeholder="ユーザー名" required>
    <button type="submit" class="Submit_button"><a><img src="images/search.png"></a></button>
    {{ Form::close() }}

<!-- $usersはUserControllerでUserテーブルのすべてのことだよって書いた-->
<!-- $users->isEmpty（←だからUserカラムに無ければ検索結果はありませんって表示してくれってこと）-->
    @if ($users->isEmpty())
    <p>検索結果はありません。</p>
@else
    <ul>
<!-- んで$usersはUserカラムの全てって事なんだけど$userばっかでわかんなくなるから一旦$userって表記にするね -->
<!-- $user->email（←んで$userの中のusernameカラムを一覧で出してくれってこと -->
        @foreach ($users as $user)
            <li>{{ $user->username }}</li>
        @endforeach
    </ul>
@endif


</x-login-layout>
