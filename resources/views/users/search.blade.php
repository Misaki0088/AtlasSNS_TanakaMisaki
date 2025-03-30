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
<!-- submitはinputの船ようなイメージで大体一緒にいることが多い（今回はsubmit号でinputのkeywordのものを乗せてく） -->
    <input type="text" name="keyword" value="{{ request('keyword') }}" class="search_form" placeholder="ユーザー名" required>
    <a><img src="images/search.png" ></a>
    </button>
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
        <div class="search_user_icon">
        @if( $user->icon_image!="icon1.png")
        <img src="{{ asset('storage/' . $user->icon_image) }}" height="60" width="60">
        @else
        <img src="{{ asset('images/icon1.png') }}">
        @endif
        </div>
            <li class="follows">{{ $user->username }}</li>
    @if (auth()->user()->isFollowing($user->id))
        <form action="/unfollow/{{$user->id}}" method="post">
            @csrf
            <button type="submit" style="background-color: #ccffcc;">フォロー解除</button>
        </form>
    @else
        <form action="/follow/{{$user->id}}" method="post">
            @csrf
            <button type="submit" style="background-color: #efc9d2;">フォローする</button>
        </form>
    @endif
@endforeach

    </ul>

@endif




</x-login-layout>
