<x-login-layout>
<!-- フォローしているユーザーのプロフィール表示 -->
    <div>
        <h3>{{ $users->username }}</h3> <!-- ユーザー名を表示 -->
        <p>{{ $users->bio }}</p> <!-- ユーザーの自己紹介を表示 -->
        @if( $users->icon_image!="icon1.png")
        <img src="{{ asset('storage/' . $user->icon_image) }}"alt="アイコン" id="icon">
        @else
        <img src="{{ asset('images/icon1.png') }}"alt="初期アイコン" id="firsticon">
        @endif
    </div>

    <!-- ユーザーの投稿を表示 -->
    @foreach ($posts as $post)
        @if ($post->user_id === $users->id) <!-- 投稿のユーザーIDが一致する場合 -->
            <div>
                <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                <p>{{ $post->created_at }}</p> <!-- 投稿日付 -->
            </div>
        @endif
    @endforeach

    @if (auth()->user()->isFollowing($users->id))
        <form action="/unfollow/{{$users->id}}" method="post">
            @csrf
        <button type="submit" style="background-color: #ccffcc;">フォロー解除</button>
        </form>
            @else
        <form action="/follow/{{$users->id}}" method="post">
            @csrf
        <button type="submit" style="background-color: #efc9d2;">フォローする</button>
        </form>
    @endif

</x-login-layout>