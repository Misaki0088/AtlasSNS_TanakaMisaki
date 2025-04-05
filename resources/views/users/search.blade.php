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

{{ Form::open(['url' => '/search', 'method' => 'GET', 'class' => 'form_group']) }}
        @csrf
<!-- submitはinputの船ようなイメージで大体一緒にいることが多い（今回はsubmit号でinputのkeywordのものを乗せてく） -->
    <input type="text" name="keyword" value="{{ request('keyword') }}" class="search_form" placeholder="ユーザー名" required>
    <input type="image" id="search_button" src="images/search.png" alt="検索ボタン">
{{ Form::close() }}

<!-- $usersはUserControllerでUserテーブルのすべてのことだよって書いた-->
<!-- $users->isEmpty（←だからUserカラムに無ければ検索結果はありませんって表示してくれよってこと）-->
@if ($users->isEmpty())
    <p>検索結果はありません。</p>
@else
<ul>
<!-- んで$usersはUserカラムの全てって事なんだけど$userばっかりでわかんなくなるから一旦$userって表記にするね -->
<!-- $user->username（←んで$userの中のusernameカラムを一覧で出してくれよってこと -->
@foreach ($users as $user)
<div class="search_user">
        <p class="search_user_icon">
            @if( $user->icon_image!="icon1.png")
            <img src="{{ asset('storage/' . $user->icon_image) }}" height="60" width="60">
            @else
            <img src="{{ asset('images/icon1.png') }}">
            @endif
        </p>
        <div class="follows_user">
            <p class="follows">{{ $user->username }}</p>
            @if (auth()->user()->isFollowing($user->id))
            <form action="/unfollow/{{$user->id}}" method="post">
                @csrf
                <button type="submit" class="danger_button">フォロー解除</button>
            </form>
                @else
            <form action="/follow/{{$user->id}}" method="post">
                @csrf
                <button type="submit" class="primary_button">フォローする</button>
            </form>
            @endif
        </div>
</div>
@endforeach
</ul>
@endif
</x-login-layout>
